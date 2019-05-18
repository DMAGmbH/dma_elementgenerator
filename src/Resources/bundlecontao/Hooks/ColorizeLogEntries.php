<?php
/*
Der "colorizeLogEntries"-Hook wird im Label-Callback eines tl_log-Eintrags
ausgeführt. Er übergibt den Log-Eintrag als Array und das Label als String
und erwartet einen HTML-String als Rückgabewert. Dieser Hook kann dafür genutzt
werden, ein Label für eigene Log-Kategorien zu generieren oder bestehende
Labels zu modifizieren.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ColorizeLogEntries extends \Widget
{
    public function colorizeLogEntries($row, $label)
    {


        return $label;
    }
}
