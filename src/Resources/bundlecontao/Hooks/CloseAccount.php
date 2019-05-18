<?php
/*
Der "closeAccount"-Hook wird bei der Schließung eines Benutzerkontos ausgeführt.
Er übergibt die ID des Benutzers, den Betriebsmodus und das Modul-Objekt als
Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class CloseAccount extends \Widget
{
    public function closeAccount($intId, $strMode, $objModule)
    {
        if ($strMode == 'close_delete')
        {
        }
    }
}
