<?php
/*
Der "removeOldFeeds"-Hook wird beim Entfernen alter XML-Dateien aus dem Contao-Verzeichnis
ausgeführt. Er übergibt nichts als Argument und erwartet ein Array mit zu erhaltenden
Dateien als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class RemoveOldFeeds extends \Widget
{
    public function removeOldFeeds()
    {
        return array('custom.xml');
    }
}
