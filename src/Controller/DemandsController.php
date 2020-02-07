<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Demands Controller
 *
 * @property \App\Model\Table\DemandsTable $Demands
 *
 * @method \App\Model\Entity\Demand[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DemandsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $demands = $this->paginate($this->Demands);

        $this->set(compact('demands'));
    }

    /**
     * View method
     *
     * @param string|null $id Demand id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $demand = $this->Demands->get($id, [
            'contain' => ['DemandsHistory', 'Releases'],
        ]);

        $this->set('demand', $demand);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $demandHistoryModel = $this->loadModel('DemandsHistory');
        $demandHistory = $this->DemandsHistory->newEmptyEntity();
        $demand = $this->Demands->newEmptyEntity();

        if ($this->request->is('post')) {
            $demand = $this->Demands->patchEntity($demand, $this->request->getData());
            if ($this->Demands->save($demand)) {
                $this->Demands->insertDemandHistory($demandHistoryModel, $demand, $demandHistory);
                $this->Flash->success(__('A Demanda foi criada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A demanda não foi criada. Tente novamente.'));
        }
        $this->set(compact('demand'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Demand id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $demandHistoryModel = $this->loadModel('DemandsHistory');
        $demandHistory = $this->DemandsHistory->newEmptyEntity();
        $demand = $this->Demands->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $demand = $this->Demands->patchEntity($demand, $this->request->getData());
            if ($this->Demands->save($demand)) {
                $this->Demands->updateDemandHistory($demandHistoryModel, $demand, $demandHistory);
                $this->Flash->success(__('A demanda foi editada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A demanda não foi editada. Tente novamente.'));
        }
        $this->set(compact('demand'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Demand id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $demand = $this->Demands->get($id);
        if ($this->Demands->delete($demand)) {
            $this->Flash->success(__('A demanda foi deletada.'));
        } else {
            $this->Flash->error(__('A demanda não foi criada. Tente novamente'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
