<?php
/*
Der "addLogEntry"-Hook wird beim Anlegen eines Log-Eintrags ausgeführt.
Er übergibt den Log-Text, die Funktion und die Aktion als Argument und
erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class AddLogEntry extends \Widget
{
    public function addLogEntry($strText, $strFunction, $strAction)
    {
    }
}
