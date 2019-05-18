<?php

// Prefix
define('DMA_EG_PREFIX', 'dma_eg_');
// Backend module definition
array_insert($GLOBALS['BE_MOD']['design'], 1, array(
	'dma_eg' => array(
		'tables' => array('tl_dma_eg', 'tl_dma_eg_fields')
	)
));


// Get defined frontend modules from configuration
if ($GLOBALS['TL_CONFIG']['dma_eg_modules']) {
	$arrModules = unserialize($GLOBALS['TL_CONFIG']['dma_eg_modules']);
} else {
	$arrModules = array();
}

// Get defined Contentelements from configuration
if ($GLOBALS['TL_CONFIG']['dma_eg_content']) {
	$arrContent = unserialize($GLOBALS['TL_CONFIG']['dma_eg_content']);
} else {
	$arrContent = array();
}

// Include modules in list
foreach ($arrModules as $strCategory => $arrElements) {
	foreach ($arrElements as $strElement) {
		$GLOBALS['FE_MOD'][$strCategory][DMA_EG_PREFIX . $strElement] = 'DMAElementGeneratorModule';
	}
}

// Include Contentelements in list
foreach ($arrContent as $strCategory => $arrElements) {
	foreach ($arrElements as $strElement) {
		$GLOBALS['TL_CTE'][$strCategory][DMA_EG_PREFIX . $strElement] = 'DMAElementGeneratorContent';
	}
}

// Define dummy data widget
$GLOBALS['BE_FFL']['dma_eg_hidden'] = 'DMAElementGeneratorHiddenWidget';
$GLOBALS['BE_FFL']['dma_eg_combobox'] = 'DMAElementGeneratorComboBox';
$GLOBALS['DMA_EG']['EL_COUNT'] = array();


// Hooks
if (version_compare(VERSION . BUILD, '3.10', '>=') && version_compare(VERSION . BUILD, '3.20', '<')) {
	$GLOBALS['TL_HOOKS']['executePostActions'][] = array('DMAElementGenerator', 'fixedAjaxRequest');
}

$GLOBALS['TL_HOOKS']['loadLanguageFile'][] = array('DMAElementGenerator', 'dmaEgLoadLanguageFile');
