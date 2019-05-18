<?php
/*
Der "loadFormField"-Hook wird beim Laden eines Formularfeldes ausgeführt. Er übergibt
das Widget-Objekt, die ID und die Metadaten des Formulars als Argument und erwartet
ein Widget-Objekt als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class LoadFormField extends \Widget
{

    public function loadFormField(\Widget $objWidget, $strForm, $arrForm)
    {
    	if ($strForm == "auto_aaa" AND $objWidget->name == "bbb") {
    		$objWidget->value = 'ccc';
    	}

        return $objWidget;
    }

	public function generate()
	{
	}

}
