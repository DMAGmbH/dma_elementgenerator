<?php
/*
Der "generateBreadcrumb"-Hook ermöglicht das Modifizieren der Pfadnavigation.
Er übergibt das Navigations-Array und das Modul-Objekt als Argument und erwartet
ein Array als Rückgabewert. 
*/
namespace Dma\Dma_elementgenerator\Hooks;

class GenerateBreadcrumb extends \Widget
{
    public function generateBreadcrumb($arrItems, \Module $objModule)
    {
      return $arrItems;
    }
}
