<?php
/*
Der "parseTemplate"-Hook wird vor der Verarbeitung eines Templates ausgeführt. Er übergibt
die Template-Instanz als Argument (kann FrontendTemplate und BackendTemplate sein) und
erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ParseTemplate extends \Widget
{
    public function parseTemplate($objTemplate)
    {
        if ($objTemplate->getName() == 'mod_html')
        {
            // Objekt modifizieren
        }
    }
}
