<?php
/*
Der "reviseTable"-Hook wird beim Bereinigen verwaister Datensätze einer Tabelle ausgeführt.
Er übergibt den Namen der Tabelle, die IDs aller neu angelegten Datensätze, den Namen der
Elterntabelle und die Namen aller Kindtabellen als Argument und erwartet einen booleschen
Rückgabewert. Geben Sie true zurück, um die Seite neu zu laden.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ReviseTable extends \Widget
{
    public function reviseTable($table, $new_records, $parent_table, $child_tables)
    {
    }
}
