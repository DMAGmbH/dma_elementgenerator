<?php
/*
Der "addCustomRegexp"-Hook wird beim Antreffen eines unbekannten regulären
Ausdrucks ausgeführt. Er übergibt den Namen des Ausdrucks, den aktuellen
Wert und das Widget-Objekt als Argument und erwartet einen booleschen
Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class AddCustomRegexp extends \Widget
{
    public function addCustomRegexp($strRegexp, $varValue, \Widget $objWidget)
    {
        if ($strRegexp == 'postal')
        {
            if (!preg_match('/^0-9{4,6}$/', $varValue))
            {
                $objWidget->addError('Field ' . $objWidget->label . ' should be a postal code.');
            }

            return true;
        }

        return false;
    }
}
