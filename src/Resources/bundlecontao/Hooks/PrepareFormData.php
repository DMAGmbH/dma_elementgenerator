<?php
/*
Der prepareFormData-Hook wird beim Absenden eines Formulars ausgeführt. Er übergibt
die Formulardaten, die Feldbezeichnungen und das Formular-Objekt. Damit lassen sich
die Daten ändern oder erweitern, bevor Aktionen wie z.B. E-Mail Versand oder in der
Datenbank speichern ausgeführt wird.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class PrepareFormData extends \Widget
{
    public function prepareFormData(&$arrSubmitted, $arrLabels, $objForm)
    {
    }
}
