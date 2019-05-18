<?php
/*
Der "activateAccount"-Hook wird bei der Aktivierung eines neuen Mitgliederkontos
ausgeführt. Er übergibt das Benutzer-Objekt als Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ActivateAccount extends \Widget
{
    public function activateAccount(\Database_Result $objUser)
    {
    }
}
