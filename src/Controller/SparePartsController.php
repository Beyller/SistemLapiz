<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Exception\BadRequestException;
/**
 * SpareParts Controller
 *
 * @property \App\Model\Table\SparePartsTable $SpareParts
 */
class SparePartsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->SpareParts->find()
            ->contain(['Sups']);
        $spareParts = $this->paginate($query);

        $this->set(compact('spareParts'));
    }

    /**
     * View method
     *
     * @param string|null $id Spare Part id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sparePart = $this->SpareParts->get($id, contain: ['Sups']);
        $this->set(compact('sparePart'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $sparePart = $this->SpareParts->newEmptyEntity();

    if ($this->request->is('post')) {
        $sparePart = $this->SpareParts->patchEntity($sparePart, $this->request->getData());
        if ($this->SpareParts->save($sparePart)) {
            $this->Flash->success(__('The spare part has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The spare part could not be saved. Please, try again.'));
    }

    $sups = $this->SpareParts->Sups->find('list', ['limit' => 200])->all();
    $this->set(compact('sparePart', 'sups'));
}
  

    public function searchPrice()
{
    $this->request->allowMethod(['get']);

    if ($this->request->is('ajax')) {
        $this->viewBuilder()
            ->enableAutoLayout(false)
            ->setClassName('Json')
            ->setOption('serialize', ['result']);

        $q = $this->request->getQuery('q');
        if (is_numeric($q)) {
            $sp = $this->SpareParts->find()
                ->where(['spa_id' => $q])
                ->first();
        } else {
            $sp = $this->SpareParts->find()
                ->where(['spa_name LIKE' => "%{$q}%"])
                ->first();
        }

        $result = $sp ? [
            'id'        => $sp->spa_id,
            'name'      => $sp->spa_name,
            'existence' => $sp->spa_existence,
            'price'     => $sp->spa_ednuserprice,
        ] : null;

        $this->set(compact('result'));
        return;
    }

    // Si accedes por navegador, CakePHP buscará templates/SpareParts/search_price.php
}


    /**
     * Edit method
     *
     * @param string|null $id Spare Part id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sparePart = $this->SpareParts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sparePart = $this->SpareParts->patchEntity($sparePart, $this->request->getData());
            if ($this->SpareParts->save($sparePart)) {
                $this->Flash->success(__('The spare part has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The spare part could not be saved. Please, try again.'));
        }
        $sups = $this->SpareParts->Sups->find('list', limit: 200)->all();
        $this->set(compact('sparePart', 'sups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Spare Part id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sparePart = $this->SpareParts->get($id);
        if ($this->SpareParts->delete($sparePart)) {
            $this->Flash->success(__('The spare part has been deleted.'));
        } else {
            $this->Flash->error(__('The spare part could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
