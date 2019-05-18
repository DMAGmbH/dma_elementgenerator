<?php
/*
Der "printArticleAsPdf"-Hook wird bei der Ausgabe eines Artikels im PDF-Format ausgeführt.
Er übergibt den Artikeltext und das Artikelobjekt als Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class PrintArticleAsPdf extends \Widget
{
    public function printArticleAsPdf($strArticle, \Database_Result $objArticle)
    {

        exit;
    }
}
