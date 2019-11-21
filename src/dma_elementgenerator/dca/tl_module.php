<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/*
 * Callbacks
 */
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('DMAElementGeneratorCallbacks','module_onload');


/*
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['dma_eg_data'] = array
(
    'sql'                     => "longtext NULL"
);


// Compatibility
if (TL_MODE == 'BE' && version_compare(VERSION.BUILD, '3.10','>=') && version_compare(VERSION.BUILD, '3.20','<'))
{
    $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dma_elementgenerator/html/DMA-uncompressed.js';
}