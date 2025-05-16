<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenDate; // Mover esta línea aquí

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 */
class InvoicesController extends AppController
{
   
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Invoices->find();
        $invoices = $this->paginate($query);

        $this->set(compact('invoices'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
{
    if ($id === null) {
        $this->Flash->error(__('ID de factura no válido.'));
        return $this->redirect(['action' => 'index']);
    }

    $invoice = $this->Invoices->get($id, [
        'contain' => ['Clients', 'DetailsInvoices' => ['SpareParts']],
    ]);

    $this->set(compact('invoice'));
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // src/Controller/InvoicesController.php
 
    public function add()
{
    $invoice = $this->Invoices->newEmptyEntity(['associated' => ['DetailsInvoices']]);

    if ($this->request->is('post')) {
        $data = $this->request->getData();
        $invoice = $this->Invoices->patchEntity($invoice, $data, ['associated' => ['DetailsInvoices']]);

        if ($this->Invoices->save($invoice)) {
            // Descontar repuestos vendidos
            $sparePartsTable = TableRegistry::getTableLocator()->get('SpareParts');
            foreach ($invoice->details_invoices as $detail) {
                $sparePart = $sparePartsTable->get($detail->spa_id);

                // Cantidad solicitada (por defecto 1 si no viene)
                $cantidad = isset($detail->di_quantity) ? (int)$detail->di_quantity : 1;

                // Verificar existencia antes de descontar
                if ($sparePart->spa_existence >= $cantidad) {
                    $sparePart->spa_existence -= $cantidad;

                    if ($sparePart->spa_existence <= $sparePart->spa_stock) {
                        $this->Flash->warning(__('Atención: El repuesto "' . $sparePart->spa_name . '" está a punto de agotarse. Quedan ' . $sparePart->spa_existence . ' unidades.'));
                    }

                    $sparePartsTable->save($sparePart);
                } else {
                    $this->Flash->error(__('El repuesto "' . $sparePart->spa_name . '" no tiene suficientes existencias disponibles. Quedan ' . $sparePart->spa_existence . ' unidades.'));
                    return $this->redirect(['action' => 'add']);
                }
            }

            $this->Flash->success(__('Factura y detalles guardados correctamente.'));
            return $this->redirect(['action' => 'view']);
        }

        $this->Flash->error(__('No se pudo guardar. Intenta de nuevo.'));
    }

    // Lista de repuestos como array asociativo
    $spaQuery = TableRegistry::getTableLocator()->get('SpareParts')->find();
    $spas = [];
    foreach ($spaQuery as $spa) {
        $spas[$spa->spa_id] = [
            'name' => $spa->spa_name,
            'price' => $spa->spa_ednuserprice,
        ];
    }

    // Lista de clientes como array asociativo
    $clientQuery = TableRegistry::getTableLocator()->get('Clients')->find();
    $clients = [];
    foreach ($clientQuery as $client) {
        $clients[$client->cli_numberid] = [
            'name' => $client->cli_name,
            'lastname' => $client->cli_lastname,
        ];
    }

    $this->set(compact('invoice', 'spas', 'clients'));
}

public function ventasDia()
{
    $user = $this->request->getAttribute('identity');
    if ($user && $user->role !== 'admin') {
        $this->Flash->error('Acceso denegado.');
        return $this->redirect(['controller' => 'Pages', 'action' => 'inicio']);
    }
    // Fecha de hoy y mañana
    $today    = FrozenDate::today();
    $tomorrow = $today->addDays(1);

    // Traer facturas de hoy, incluyendo datos de cliente
    $ventasHoy = $this->Invoices->find()
        ->where([
            'inv_date >=' => $today,
            'inv_date <'  => $tomorrow
        ])
        ->contain(['Clients'])
        ->all();

    // Estadísticas
    $totalVentas = 0;
    $numFacturas = 0;
    $metodosPago = [
        'Efectivo'      => 0,
        'Transferencia' => 0,
        'Tarjeta'       => 0
    ];

    foreach ($ventasHoy as $venta) {
        $totalVentas += $venta->inv_price;
        $numFacturas++;
        $mp = $venta->inv_paymentmethod;
        if (isset($metodosPago[$mp])) {
            $metodosPago[$mp] += $venta->inv_price;
        }
    }

    $this->set(compact('ventasHoy', 'totalVentas', 'numFacturas', 'metodosPago'));
}




    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   
     public function edit($id = null)
{
    $invoice = $this->Invoices->get($id, [
        'contain' => ['DetailsInvoices']
    ]);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $data = $this->request->getData();

        $invoice = $this->Invoices->patchEntity($invoice, $data, [
            'associated' => ['DetailsInvoices']
        ]);

        if ($this->Invoices->save($invoice)) {
            $this->Flash->success(__('La factura fue actualizada correctamente.'));
            return $this->redirect(['action' => 'view', $invoice->inv_id]);
        }

        $this->Flash->error(__('No se pudo actualizar la factura.'));
    }

    // Agrupar repuestos repetidos en los detalles
    $groupedDetails = [];

    foreach ($invoice->details_invoices as $detail) {
        $spaId = $detail->spa_id;

        if (!isset($groupedDetails[$spaId])) {
            $groupedDetails[$spaId] = $detail;
        } else {
            $groupedDetails[$spaId]->di_quantity += $detail->di_quantity;
        }
    }

    // Reasignar los detalles agrupados al objeto factura
    $invoice->details_invoices = array_values($groupedDetails);

    // Clientes
    $clientsTable = TableRegistry::getTableLocator()->get('Clients');
    $client = $clientsTable->find()->where(['cli_numberid' => $invoice->cli_numberid])->first();

    // Repuestos
    $spaQuery = TableRegistry::getTableLocator()->get('SpareParts')->find();
    $spas = [];

    foreach ($spaQuery as $spa) {
        $price = is_numeric($spa->spa_ednuserprice) ? (float)$spa->spa_ednuserprice : 0.00;
        $spas[$spa->spa_id] = $spa->spa_name . ' - $' . number_format($price, 2);
    }

    $this->set(compact('invoice', 'client', 'spas'));
}



    
}
