<?php
/*
Der "postUpload"-Hook wird nach dem Hochladen einer oder mehrerer Dateien in der Contao-Dateiverwaltung
ausgeführt. Er übergibt ein Array mit Dateinamen als Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class PostUpload extends \Widget
{
    public function postUpload($arrFiles)
    {
    }
}
