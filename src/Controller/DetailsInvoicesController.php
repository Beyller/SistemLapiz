<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class DetailsInvoicesController extends AppController
{
    public function index()
    {
        // Corregimos los contain() para usar los alias reales:
        $query = $this->DetailsInvoices->find()
            ->contain(['SpareParts', 'Invoices']);
        $detailsInvoices = $this->paginate($query);

        $this->set(compact('detailsInvoices'));
    }

    public function view($id = null)
    {
        $detailsInvoice = $this->DetailsInvoices->get($id, [
            'contain' => ['SpareParts', 'Invoices']
        ]);
        $this->set(compact('detailsInvoice'));
    }

    // src/Controller/DetailsInvoicesController.php
public function add()
{
    $detailsInvoice = $this->DetailsInvoices->newEmptyEntity();
    if ($this->request->is('post')) {
        $detailsInvoice = $this->DetailsInvoices->patchEntity(
            $detailsInvoice,
            $this->request->getData()
        );
        if ($this->DetailsInvoices->save($detailsInvoice)) {
            $this->Flash->success('Detalle de factura guardado.');
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error('No se pudo guardar el detalle de la factura.');
    }

    // Cargamos tablas
    $SpareParts = \Cake\ORM\TableRegistry::getTableLocator()->get('SpareParts');
    $Invoices   = \Cake\ORM\TableRegistry::getTableLocator()->get('Invoices');

    // Listado de facturas
    $invs = $Invoices->find('list', ['keyField' => 'inv_id', 'valueField' => 'inv_id'])->toArray();

    // Datos completos de repuestos: id, nombre y precio
    $spaFullData = [];
    foreach ($SpareParts->find() as $r) {
        $spaFullData[$r->spa_id] = [
            'spa_id'          => $r->spa_id,
            'spa_name'        => $r->spa_name,
            'spa_ednuserprice'=> $r->spa_ednuserprice,
        ];
    }

    $this->set(compact('detailsInvoice', 'invs', 'spaFullData'));
}


    public function edit($id = null)
    {
        $detailsInvoice = $this->DetailsInvoices->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsInvoice = $this->DetailsInvoices->patchEntity(
                $detailsInvoice,
                $this->request->getData()
            );
            if ($this->DetailsInvoices->save($detailsInvoice)) {
                $this->Flash->success(__('Detalle de factura actualizado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el detalle de la factura.'));
        }

        // Para edit también usamos TableLocator
        $SpareParts = TableRegistry::getTableLocator()->get('SpareParts');
        $Invoices   = TableRegistry::getTableLocator()->get('Invoices');

        $spas = $SpareParts->find('list', ['keyField'=>'spa_id','valueField'=>'spa_name'])->toArray();
        $invs = $Invoices  ->find('list', ['keyField'=>'inv_id','valueField'=>'inv_id' ])->toArray();

        $this->set(compact('detailsInvoice', 'spas', 'invs'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post','delete']);
        $detailsInvoice = $this->DetailsInvoices->get($id);
        if ($this->DetailsInvoices->delete($detailsInvoice)) {
            $this->Flash->success(__('Detalle de factura eliminado.'));
        } else {
            $this->Flash->error(__('No se pudo eliminar el detalle de la factura.'));
        }
        return $this->redirect(['action'=>'index']);
    }
}
