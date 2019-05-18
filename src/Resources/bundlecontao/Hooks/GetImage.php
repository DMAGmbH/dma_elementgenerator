<?php
/*
Der "getImage"-Hook wird bei der Erstellung eines Vorschaubildes ausgeführt und
ermöglicht das Hinzufügen einer eigenen Routine. Er übergibt den Pfad, die Breite
und Höhe, den Modus, den Cache-Namen und das Dateiobjekt als Argument und erwartet
einen Pfad als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class GetImage extends \Widget
{
    public function getImage($image, $width, $height, $mode, $strCacheName, $objFile)
    {
        return \MyImage::generateThumbnail($image, $widht, $height, $mode);
    }
}
