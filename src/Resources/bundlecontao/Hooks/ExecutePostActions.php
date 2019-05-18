<?php
/*
Der "executePostActions"-Hook wird bei unbekannten Ajax-Anfragen ausgegeben,
die ein DCA-Objekt benötigen. Er übergibt den Namen der Aktion und das
DataContainer-Objekt als Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ExecutePostActions extends \Widget
{
    public function executePostActions($strAction, \DataContainer $dc)
    {
        if ($strAction == 'update')
        {
        }
    }
}
