<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class FinancesController extends AppController
{
    public function index()
    {
        $startDate = $this->request->getQuery('start_date');
        $endDate = $this->request->getQuery('end_date');

        $conditions = [];
        $totalIngreso = 0;
        $ingresosPorCategoria = [
            'repuestos' => 0,
            'mano de obra' => 0,
        ];

        if ($startDate && $endDate) {
            $conditions['Invoices.inv_date >='] = $startDate . ' 00:00:00';
            $conditions['Invoices.inv_date <='] = $endDate . ' 23:59:59';

            // Obtener facturas con sus detalles solo si hay fechas
            $invoicesTable = TableRegistry::getTableLocator()->get('Invoices');
            $query = $invoicesTable->find()
                ->contain(['DetailsInvoices' => ['SpareParts']])
                ->where($conditions);

            foreach ($query as $invoice) {
                foreach ($invoice->details_invoices as $detalle) {
                    $categoriaOriginal = strtolower($detalle->spare_part->spa_category ?? 'otro');

                    switch ($categoriaOriginal) {
                        case 'producto':
                        case 'repuesto':
                        case 'repuestos':
                            $categoria = 'repuestos';
                            break;
                        case 'mano de obra':
                            $categoria = 'mano de obra';
                            break;
                        default:
                            $categoria = 'otro';
                            break;
                    }

                    $subtotal = $detalle->di_price * $detalle->di_quantity;
                    $totalIngreso += $subtotal;

                    if (isset($ingresosPorCategoria[$categoria])) {
                        $ingresosPorCategoria[$categoria] += $subtotal;
                    } else {
                        $ingresosPorCategoria[$categoria] = $subtotal;
                    }
                }
            }
        }

        $this->set(compact('startDate', 'endDate', 'totalIngreso', 'ingresosPorCategoria'));
    }
    // src/Controller/FinancesController.php

public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    $user = $this->request->getAttribute('identity');
    if ($user && $user->role !== 'admin') {
        $this->Flash->error('Acceso denegado.');
        return $this->redirect(['controller' => 'Pages', 'action' => 'inicio']);
    }
}

}
