<?php
/*
Der "createDefinition"-Hook wird beim Import einer Formatdefinition eines
Stylesheets ausgeführt. Er übergibt Schlüssel und Wert, die originale
Formatdefinition sowie das Daten-Array als Argument und erwartet ein
Array oder false als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class CreateDefinition extends \Widget
{
    public function createDefinition($strKey, $strValue, $strDefinition, $arrSet)
    {
        if ($strKey == 'border-radius')
        {
            return array('border-radius'=>$strValue);
        }

        return false;
    }
}
