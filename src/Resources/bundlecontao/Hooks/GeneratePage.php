<?php
/*
Der "generatePage"-Hook wird vor der Erstellung des Seitenlayouts ausgeführt.
Er übergibt das Seitenobjekt, das Layoutobjekt und eine Eigenreferenz als
Argument und erwartet keinen Rückgabewert. 
*/
namespace Dma\Dma_elementgenerator\Hooks;

class GeneratePage extends \Widget
{
    public function generatePage(\PageModel $objPage, \LayoutModel $objLayout, \PageRegular $objPageRegular)
    {
    }
}
