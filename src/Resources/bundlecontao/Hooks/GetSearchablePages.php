<?php
/*
Der "getSearchablePages"-Hook wird beim Aufbau des Suchindex ausgeführt. Er übergibt
das URL-Array und die ID der Wurzelseite als Argument und erwartet ein Array mit
absoluten URLs (!) als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class GetSearchablePages extends \Widget
{
    public function getSearchablePages($arrPages, $intRoot)
    {
        return array_merge($arrPages, array('Additional pages'));
    }
}
