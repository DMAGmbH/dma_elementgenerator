<?php
/*
Der "postDownload"-Hook wird nach dem Herunterladen einer Datei mit Hilfe des Download(s)-Elements ausgeführt.
Er übergibt den Dateinamen als Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class PostDownload extends \Widget
{
    public function postDownload($strFile)
    {
        // Beliebiger Code
    }
}
