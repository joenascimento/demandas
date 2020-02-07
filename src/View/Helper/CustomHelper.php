<?php
namespace App\View\Helper;

use Cake\View\Helper;

class CustomHelper extends Helper
{
    public function convertNumberToString($number)
    {
        switch ($number) {
            case 0:
                return 'Não';
                break;
            case 1:
                return 'Sim';
                break;
            default:
                return '-';
                break;
            }
    }
}
