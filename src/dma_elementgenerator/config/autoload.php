<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'DMA',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'DMA\DMAElementGenerator'             => 'system/modules/dma_elementgenerator/DMAElementGenerator.php',
	'DMA\DMAElementGeneratorCallbacks'    => 'system/modules/dma_elementgenerator/DMAElementGeneratorCallbacks.php',
	'DMA\DMAElementGeneratorComboBox'     => 'system/modules/dma_elementgenerator/DMAElementGeneratorComboBox.php',
	'DMA\DMAElementGeneratorContent'      => 'system/modules/dma_elementgenerator/DMAElementGeneratorContent.php',
	'DMA\DMAElementGeneratorHiddenWidget' => 'system/modules/dma_elementgenerator/DMAElementGeneratorHiddenWidget.php',
	'DMA\DMAElementGeneratorModule'       => 'system/modules/dma_elementgenerator/DMAElementGeneratorModule.php',
	// Models
	'DMA\DmaEgFieldsModel'                => 'system/modules/dma_elementgenerator/models/DmaEgFieldsModel.php',
	'DMA\DmaEgModel'                      => 'system/modules/dma_elementgenerator/models/DmaEgModel.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_dma_eg_hidden'         => 'system/modules/dma_elementgenerator/templates',
	'ce_dma_eg'                => 'system/modules/dma_elementgenerator/templates',
	'dma_eg_debug'             => 'system/modules/dma_elementgenerator/templates',
	'dma_eg_default'           => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield'              => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_default'      => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_downloads'    => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_gallery'      => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_h1'           => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_h2'           => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_h3'           => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_sortedlist'   => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_table'        => 'system/modules/dma_elementgenerator/templates',
	'dma_egfield_unsortedlist' => 'system/modules/dma_elementgenerator/templates',
	'mod_dma_eg'               => 'system/modules/dma_elementgenerator/templates',
));
