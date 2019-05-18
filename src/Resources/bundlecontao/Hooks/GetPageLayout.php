<?php
/*
Der "getPageLayout"-Hook wird vor dem Initialisieren des Frontend-Templates ausgeführt.
Er übergibt das Seitenobjekt, das Layoutobjekt und eine Eigenreferenz als Argument und
erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class GetPageLayout extends \Widget
{
    public function getPageLayout(\PageModel $objPage, \LayoutModel $objLayout, \PageRegular $objPageRegular)
    {
    }
}
