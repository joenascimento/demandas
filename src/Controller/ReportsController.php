<?php
namespace App\Controller;

use App\Controller\AppController;

class ReportsController extends AppController
{
    public function index()
    {
        $demandsModel = $this->loadModel('Demands');
        $demandsCount = $demandsModel->getCount($demandsModel);
        $demands = $demandsModel->getDemands($demandsModel);

        $releasesModel = $this->loadModel('Releases');
        $releasesCount = $releasesModel->getCount($releasesModel);
        $releases = $releasesModel->getReleases($releasesModel);

        $balanceHours = $releasesModel->getEffort($releasesModel);

        $this->set(compact(
            'demands', 
            'releases', 
            'demandsCount', 
            'releasesCount',
            'balanceHours'
        ));
    }
}
