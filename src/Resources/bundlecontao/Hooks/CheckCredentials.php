<?php
/*
Der "checkCredentials"-Hook wird bei der Eingabe eines falschen Passworts
bei der Anmeldung ausgeführt. Er übergibt den Benutzernamen und das Passwort
sowie das Benutzer-Objekt als Argument und erwartet einen booleschen Rückgabewert. 
*/
namespace Dma\Dma_elementgenerator\Hooks;

class CheckCredentials extends \Widget
{
    public function checkCredentials($strUsername, $strPassword, \User $objUser)
    {
    // Eine globale Datenbank abfragen
        if ($this->checkGlobalDbFor($strUsername, $strPassword))
        {
            return true;
        }
        return false;
    }
}
