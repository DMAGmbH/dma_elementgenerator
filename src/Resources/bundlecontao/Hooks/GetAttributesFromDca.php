<?php
/*
Der "getAttributesFromDca"-Hook ermöglicht das Modifizieren der Formularfeldattribute.
Er übergibt die originalen Attribute als Array und das DataContainer-Objekt und
erwartet ein Array von Attributen als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class GetAttributesFromDca extends \Widget
{
    public function getAttributesFromDca($arrAttributes, $objDca)
    {

    return $arrAttributes;
    }
}
