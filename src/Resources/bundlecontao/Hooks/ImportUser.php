<?php
/*
Der "importUser"-Hook wird beim Antreffen eines unbekannten Benutzernamens ausgeführt.
Er übergibt den Benutzernamen, das Passwort und den Tabellennamen als Argument und
erwartet einen booleschen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ImportUser extends \Widget
{
    public function importUser($strUsername, $strPassword, $strTable)
    {
        if ($strTable == 'tl_member')
        {
            // Benutzer von einem LDAP-Server importieren
            if ($this->importUserFromLdap($strUsername, $strPassword))
            {
                return true;
            }
        }

        return false;
    }
}
