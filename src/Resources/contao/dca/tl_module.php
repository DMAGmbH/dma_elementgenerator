<?php
// Define callbacks
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('DMAElementGeneratorCallbacks', 'module_onload');

$GLOBALS['TL_DCA']['tl_dma_eg'] = array(
    'fields' => array(
        'dma_eg_data' => [
            'sql' => "longtext NULL"
        ],
    )
);
