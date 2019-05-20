<?php

/*
 * Callbacks
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('\\DMA\\DMAElementGeneratorCallbacks','module_onload');


/*
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['dma_eg_data'] = array
(
    'sql'                     => "longtext NULL"
);
