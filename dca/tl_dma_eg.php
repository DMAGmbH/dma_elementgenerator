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
 * @author	   Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 * @license    LGPL
 * @filesource
 */


$GLOBALS['TL_DCA']['tl_dma_eg'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => false,
		'onsubmit_callback'	=> array
		(		
			array('DMAElementGeneratorCallbacks','element_onsubmit')
		),
		'ondelete_callback'	=> array
		(
			array('DMAElementGeneratorCallbacks','element_ondelete')
		),
		'ctable' => array('tl_dma_eg_fields'),
		'switchToEdit' => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 0,
			'fields'                  => array('sorting'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit',

		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s',
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['edit'],
				'href'                => 'table=tl_dma_eg_fields',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
				'attributes'          => 'class="edit-header"'
			),			
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['tl_dma_eg']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(),
		'default'                     => '{title_legend},title,category;{settings_legend},template,content,module;{expert_legend:hide},without_label,display_in_divs,class',
	),

	// Subpalettes
	'subpalettes' => array
	(		
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_dma_eg']['title'],
			'inputType'					=> 'text',
			'exclude'					=> true,
			'filter'						=> true,
			'eval'						=> array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'category' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg']['category'],
			'inputType'             => 'text',
			'exclude'				=> true,
			'filter'				=> true,
			'eval'                  => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'template' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['template'],
			'default'                 => 'ce_designer_default',
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_dma_eg','getElementTemplates'),
			'eval'                    => array('tl_class'=>'w50')
		),
		'module' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['module'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','isBoolean'=> true)
		),
		'content' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['content'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr w50','isBoolean'=> true)
		),
		'class' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg']['class'],
			'inputType'             => 'text',
			'exclude'					=> true,
			'filter'						=> true,
			'eval'                  => array('tl_class'=>'w50','maxlength'=>255, 'tl_class'=>'clr')
		),
		'without_label' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['without_label'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','isBoolean'=> true)
		),
  		'display_in_divs' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['display_in_divs'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','isBoolean'=> true)
		)
	)
);



/**
 * Class tl_dma_eg
 *
 */
class tl_dma_eg extends Backend
{

	/**
	 * Return all dma_eg templates as array
	 * @param object
	 * @return array
	 */
	public function getElementTemplates(DataContainer $dc)
		if(version_compare(VERSION.BUILD, '2.9.0','>='))
		{
			$intPid = $dc->activeRecord->pid;
	    	if ($this->Input->get('act') == 'overrideAll')
			{
				$intPid = $this->Input->get('id');
			}
	    	return $this->getTemplateGroup('dma_eg_', $intPid);
		}
		else
		{
	   	return $this->getTemplateGroup('dma_eg_');
		}
	}
	
}

?>
