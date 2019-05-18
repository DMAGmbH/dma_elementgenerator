<?php
/*
Der "processFormData"-Hook wird nach dem Abschicken eines Formulars ausgeführt.
Er übergibt das Datenarray, das Data Container Array und das Dateiarray als Argument
und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;


//$GLOBALS['TL_HOOKS']['processFormData'][] = array('Dma\\Hooks\\ProcessFormData', 'processFormData');
class ProcessFormData extends \Module
{
    /**
    * Generate the module
    */
    protected function compile()
    {
    }

    // Action possible after the data was Saved
    public function processFormData($arrPost, $arrForm, $arrFiles)
    {
    }
}
