<?php
/*
Der "getAllEvents"-Hook ermöglicht das Modifizieren von Terminen in Kalendern
und Eventmodulen. Er übergibt das originale Datenarray, die IDs der Elternelemente
sowie die Start- und Endzeit als Argument und erwartet ein Datenarray als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class GetAllEvents extends \Widget
{
    public function getAllEvents($arrEvents, $arrCalendars, $intStart, $intEnd, \Module $objModule)
    {
        ksort($arrEvents);
        return $arrEvents;
    }
}
