<?php
/*
Der "validateFormField"-Hook wird beim Abschicken eines Formularfeldes ausgeführt.
Er übergibt das Widget-Objekt und die ID des Formulars als Argument und erwartet
ein Widget-Objekt als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ValidateFormField extends \Widget
{
    public function validateFormField($objWidget, $intId, $arrForm)
    {
        if (\Input::post("FORM_SUBMIT") && (\Input::post("FORM_SUBMIT")=='aaa')) {
            switch ($objWidget->strName) {
                case 'xxx':
                    if (\Input::post($objWidget->strName) == 'bbb') {
                        $objWidget->addError(sprintf($GLOBALS['TL_LANG']['ERR']['mandatory'], $objWidget->strLabel));
                        return $objWidget;
                    }
                break;
            }
        }
        return $objWidget;
    }

    public function generate()
    {

    }
}
