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
 * @copyright  DMA GmbH
 * @author     Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 * @license    LGPL
 * @filesource
 */

// Callbacks
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('DMAElementGeneratorCallbacks','content_onload');


// Fields
$GLOBALS['TL_DCA']['tl_content']['fields']['dma_eg_data'] = array
(
    'sql'                     => "longtext NULL"
);


// Compatibility
if (TL_MODE == 'BE' && version_compare(VERSION.BUILD, '3.10','>=') && version_compare(VERSION.BUILD, '3.20','<'))
{
    $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dma_elementgenerator/html/DMA-uncompressed.js';
}

?>
