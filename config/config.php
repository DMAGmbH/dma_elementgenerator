<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');
/**
 * TYPOlight webCMS
 * Extension DMA Elementgenerator
 * Copyright Dialog- und Medienagentur der ACS mbH  (2010)
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Dialog- und Medienagentur der ACS mbH 2010
 * @author     Carsten Kollmeier <kollmeier@dialog-medien.com>
 * @package    DMAElementGenerator
 * @license    LGPL
 * @filesource
 */


// Prefix
define('DMA_EG_PREFIX','dma_eg_');

// Backend module definition
array_insert($GLOBALS['BE_MOD']['design'], 1, array
(
	'dma_eg' => array
	(
		'tables' => array('tl_dma_eg','tl_dma_eg_fields'),
		'icon'       => 'system/modules/dma_elementgenerator/html/icon.png'
	)
));
 
// Get defined frontend modules from configuration 
if ($GLOBALS['TL_CONFIG']['dma_eg_modules'])
{
	$arrModules = unserialize($GLOBALS['TL_CONFIG']['dma_eg_modules']);
} else {
  $arrModules = array();
}
// Get defined Contentelements from configuration 
if ($GLOBALS['TL_CONFIG']['dma_eg_content'])
{
	$arrContent = unserialize($GLOBALS['TL_CONFIG']['dma_eg_content']);
} else {
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

?>
