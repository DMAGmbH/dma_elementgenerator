<?php
/*
Der "validateFormField"-Hook wird beim Abschicken eines Formularfeldes ausgeführt.
Er übergibt das Widget-Objekt und die ID des Formulars als Argument und erwartet
ein Widget-Objekt als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class StoreFormData extends \Widget
{
    /**
    * Generate the module
    */
    public function generate()
    {
    }


    // Modify the Data before it is saved
    // HOOK:
    //$GLOBALS['TL_HOOKS']['storeFormData'][] = array('Dma\\Hooks\\StoreFormData', 'storeFormData');
    public function storeFormData($arrSet, $objForm)
    {
        if ($objForm->formID == 'dataform') {
            $this->objForm = $objForm;
            $arrSet['aaa'] = 'bbb';
        }
        return $arrSet;
    }
}
