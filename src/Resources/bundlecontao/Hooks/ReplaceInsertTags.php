<?php
/*
Der "replaceInsertTags"-Hook wird beim Antreffen eines unbekannten Insert-Tags ausgeführt.
Er übergibt das Insert-Tag als Argument und erwartet die Ersetzung oder false als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ReplaceInsertTags extends \Frontend
{
    public function replaceInsertTag($strTag)
    {
        $arrSplit = explode('::', $strTag);

        if ($arrSplit[0] == 'conversoft') {
            if (isset($arrSplit[1]) && $arrSplit[1] == 'aaa') {
                return 'bbb';
            }
        }
    }
}
