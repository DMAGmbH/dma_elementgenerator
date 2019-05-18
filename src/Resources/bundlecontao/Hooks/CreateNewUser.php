<?php
/*
Der "createNewUser"-Hook wird bei der Registrierung eines neuen Mitglieds
ausgeführt. Er übergibt die ID des neuen Benutzers und das Datenarray als
Argument und erwartet keinen Rückgabewert. 
*/
namespace Dma\Dma_elementgenerator\Hooks;

class CreateNewUser extends \Widget
{
    public function createNewUser($intId, $arrData)
    {
    // Den Datensatz modifizieren
    }
}
