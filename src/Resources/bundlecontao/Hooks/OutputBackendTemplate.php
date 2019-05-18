<?php
/*
Der "outputBackendTemplate"-Hook wird bei der Ausgabe eines Backend-Templates auf
dem Bildschirm ausgeführt. Er übergibt Inhalt und Name des Templates als Argument
und erwartet den geänderten Template-Inhalt als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class OutputBackendTemplate extends \Widget
{
    public function outputBackendTemplate($strContent, $strTemplate)
    {
        if ($strTemplate == 'be_main')
        {
            // Ausgabe modifizieren
        }

        return $strContent;
    }
}
