<?php
// Define callbacks
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('DMAElementGeneratorCallbacks', 'module_onload');
$GLOBALS['TL_DCA']['tl_module']['fields']['dma_eg_data'] = array(
    'sql' => "longtext NULL"
);
