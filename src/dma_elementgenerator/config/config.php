<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


// Prefix
define('DMA_EG_PREFIX','dma_eg_');

// Backend module definition
array_insert($GLOBALS['BE_MOD']['design'], 1, array
	(
		'dma_eg' => array
		(
			'tables' => array('tl_dma_eg','tl_dma_eg_fields'),
			'icon'       => 'system/modules/dma_elementgenerator/html/icon.png',
			'javascript' => 'system/modules/dma_elementgenerator/html/tl_dma_eg-uncompressed.js'
		)
	));

// include the localconfig since Contao 3
include TL_ROOT . '/system/config/localconfig.php';

// Get defined frontend modules from configuration
if ($GLOBALS['TL_CONFIG']['dma_eg_modules'] ?? null)
{
	$arrModules = unserialize($GLOBALS['TL_CONFIG']['dma_eg_modules']);
} else
{
	$arrModules = array();
}

// Get defined Contentelements from configuration
if ($GLOBALS['TL_CONFIG']['dma_eg_content'] ?? null)
{
	$arrContent = unserialize($GLOBALS['TL_CONFIG']['dma_eg_content']);
} else
{
	$arrContent = array();
}

// Include modules in list
foreach ($arrModules as $strCategory => $arrElements)
{
	foreach ($arrElements as $strElement) {
		$GLOBALS['FE_MOD'][$strCategory][DMA_EG_PREFIX.$strElement]= 'DMAElementGeneratorModule';
	}
}

// Include Contentelements in list
foreach ($arrContent as $strCategory => $arrElements)
{
	foreach ($arrElements as $strElement) {
		$GLOBALS['TL_CTE'][$strCategory][DMA_EG_PREFIX.$strElement]= 'DMAElementGeneratorContent';
	}
}

// Define dummy data widget
$GLOBALS['BE_FFL']['dma_eg_hidden'] = 'DMAElementGeneratorHiddenWidget';
$GLOBALS['BE_FFL']['dma_eg_combobox'] = 'DMAElementGeneratorComboBox';
$GLOBALS['DMA_EG']['EL_COUNT'] = array();


// Hooks
if(version_compare(VERSION.BUILD, '3.10','>=') && version_compare(VERSION.BUILD, '3.20','<')) {
	$GLOBALS['TL_HOOKS']['executePostActions'][] = array('DMAElementGenerator','fixedAjaxRequest');
}

$GLOBALS['TL_HOOKS']['loadLanguageFile'][] = array('DMA\DMAElementGenerator','dmaEgLoadLanguageFile');
