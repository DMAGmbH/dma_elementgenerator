<?php
/*
Der "isVisibleElement"-Hook wird beim Überprüfen, ob ein Element im Frontend sichtbar
sein soll oder nicht, ausgeführt. Ein "Element" bedeutet an dieser Stelle entweder
ein Artikel, ein Frontend-Modul oder ein Inhaltselement. Im Gegensatz zu den drei
anderen Hooks "getArticle", "getFrontendModule" und "getContentElement" kann hier
das Generieren des gesamten Markups verhindert werden. Der Hook übergibt das Model
des Elements sowie den aktuellen Sichtbarkeitsstatus als Argumente und erwartet den
neuen Sichtbarkeitsstatus als Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class IsVisibleElement extends \Widget
{
    public function isVisibleElement($objElement, $blnIsVisible)
    {
        if ($objElement instanceof ContentElement)
        {
            // Prüfen ob das Inhaltselement angezeigt werden darf
            if ($this->myElementCanBeShownInFrontend($objElement))
            {
                return true;
            }
        }

        // Andernfalls verändern wir den Sichtbarkeitsstatus nicht
        return $blnIsVisible;
    }
}
