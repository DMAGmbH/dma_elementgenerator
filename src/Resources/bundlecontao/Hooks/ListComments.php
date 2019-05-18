<?php
/*
Der "listComments"-Hook wird bei der Darstellung von Kommentaren im Backend ausgeführt.
Er übergibt den aktuellen Datensatz als Argument und erwartet einen String als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ListComments extends \Widget
{
    public function listComments($arrRow)
    {
        return '<a href="contao/main.php?do= … ">' . $arrRow['title'] . '</a>';
    }
}
