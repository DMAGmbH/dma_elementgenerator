<?php
/*
Der "getContentElement"-Hook wird beim Rendern von Inhaltselementen ausgeführt.
Er übergibt das Datenbankobjekt und den Ausgabe-String als Argument und erwartet
einen Ausgabe-String als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class GetContentElement extends \Widget
{
    public function getContentElement(\Database_Result $objElement, $strBuffer)
    {
        return $strBuffer;
    }
}
