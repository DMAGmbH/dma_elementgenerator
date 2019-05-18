<?php
/*
Der "executePreActions"-Hook wird bei unbekannten Ajax-Anfragen ausgeführt,
die keine DCA-Objekt benötigen. Er übergibt den Namen der Aktion als Argument
und erwartet keinen Rückgabewert. 
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ExecutePreActions extends \Widget
{
    public function executePreActions($strAction)
    {
        if ($strAction == 'update')
        {
        }
    }
}
