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


$GLOBALS['TL_DCA']['tl_dma_eg_fields'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'ptable' => 'tl_dma_eg'
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('sorting'),
			'flag'                    => 1,
			'headerFields'            => array('title','tstamp','template','content','module'),
			'panelLayout'             => 'filter,search,limit',
			'child_record_callback'   => array('tl_dma_eg_fields', 'listFormFields')
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
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('type'),
		'default'                     => '{type_legend},type',
		'legend'                      => '{type_legend},type,label,hidden',
		'text'                        => '{type_legend},type,label,title,explanation;{input_legend},default_value,eval_mandatory,eval_rgxp,eval_minlength,eval_maxlength;{style_legend},eval_tl_class;{expert_legend:hide},exclude,eval_allow_html,class',
		'textarea'                    => '{type_legend},type,label,title,explanation;{input_legend},default_value,eval_mandatory,eval_rows,eval_cols,eval_rte,eval_maxlength;{style_legend},eval_tl_class;{expert_legend:hide},exclude,eval_allow_html,class',
		'select'                      => '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory,options;{style_legend},eval_tl_class;{expert_legend:hide},exclude,class',
		'checkbox'                    => '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory,options;{style_legend},eval_tl_class;{expert_legend:hide},exclude,class',
		'radio'                       => '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory,options;{style_legend},eval_tl_class;{expert_legend:hide},exclude,class',
		'fileTree'                    => '{type_legend},type,label,title,explanation;{input_legend},default_value,eval_mandatory,eval_extensions,eval_field_type,eval_path;{style_legend},eval_tl_class;{expert_legend:hide},exclude,class',
		'pageTree'                    => '{type_legend},type,label,title,explanation;{input_legend},default_value,eval_mandatory,eval_field_type;style_legend},eval_tl_class;{expert_legend:hide},exclude,eval_unique,eval_do_not_copy,class',
		'pagePicker'				 => '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory;{style_legend},eval_tl_class;{expert_legend:hide},exclude,class'
	),

	// Subpalettes
	'subpalettes' => array
	(		
	),

	// Fields
	'fields' => array
	(
	  'type' => array
	  (
      'label'     => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['type'],
      'reference'     => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_select'],
      'inputType' => 'select',
      'options' => array('legend','text','textarea','select','checkbox','radio','pageTree','fileTree','pagePicker'),
      'default' => 'text',
      'exclude' => true,
      'eval' => array('submitOnChange' => true)
    ),
		'label' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['label'],
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                  => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50')
		),
		'title' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['title'],
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                    => array('rgxp'=>'alnum', 'doNotCopy'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_dma_eg_fields', 'generateTitle')
			)
		),
		'explanation' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['explanation'],
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                  => array('maxlength'=>255, 'tl_class'=>'w50 clr')
		),
		'default_value' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['default_value'],
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                  => array('maxlength'=>255)
		),
		'options' => array
		(
      'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['options'],
      'inputType'             => 'optionWizard',
      'exclude'               => true,
      'eval'                  => array('tl_class' => 'clr','multiple' => true)
    ),
		'hidden' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['hidden'],
			'inputType'             => 'checkbox',
			'exclude'				=> true,
			'eval'                  => array('maxlength'=>128, 'tl_class'=>'w50 m12', 'isBoolean' => true)
		),
		'eval_mandatory' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_mandatory'],
			'inputType'             => 'checkbox',
			'exclude'				=> true,
			'eval'                  => array('maxlength'=>128, 'tl_class'=>'w50 m12 clr', 'isBoolean' => true)
		),
		'eval_rgxp' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rgxp'],
			'reference'             => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rgxp_select'],
			'inputType'             => 'select',
			'options'                => array('digit',
                                        'alpha',
                                        'alnum',
                                        'prcnt',
                                        'extnd',
                                        'date',
                                        'time',
                                        'datim',
                                        'email',
//                                        'friendly',
                                        'url',
                                        'phone'
                                  ),
			'exclude'				=> true,
			'eval'                  => array('maxlength'=>128, 'tl_class'=>'w50','includeBlankOption' => true)
		),
		'eval_rte' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rte'],
			'inputType'             => 'checkbox',
			'exclude'				=> true,
			'eval'                  => array('maxlength'=>128, 'tl_class'=>'m12 clr', 'isBoolean' => true)
		),
	  'eval_tl_class' => array
	  (
      'label'     => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_tl_class'],
      'reference'     => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_tl_class_options'],
      'inputType' => 'checkbox',
      'options' => array('w50','clr','long','m12'),
      'exclude' => true,
      'eval' => array('multiple' => true)
    ),
		'eval_rows' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rows'],
			'default'              => 5,
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                  => array('mandatory'=>true, 'maxlength'=>3, 'tl_class'=>'w50 clr', 'rgxp' => 'digit')
		),
		'eval_cols' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_cols'],
			'default'              => 100,
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                  => array('mandatory'=>true, 'maxlength'=>3, 'tl_class'=>'w50', 'rgxp' => 'digit')
		),
		'eval_minlength' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_minlength'],
			'default'              => 0,
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                  => array('mandatory'=>true, 'maxlength'=>3, 'tl_class'=>'w50 clr', 'rgxp' => 'digit')
		),
		'eval_maxlength' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_maxlength'],
			'default'              => '',
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                  => array('maxlength'=>3, 'tl_class'=>'w50', 'rgxp' => 'digit')
		),
		'eval_field_type' => array
		(
		  'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_field_type'],
		  'default'               => 'ft_radio',
		  'inputType'             => 'radio',
		  'options'               => array('ft_radio','ft_checkbox'),
		  'exclude'               => true,
		  'eval'                  => array('mandatory' => true, 'multiple' => false, 'tl_class' => 'w50')
    ),
		'eval_extensions' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_extensions'],
			'inputType'             => 'text',
			'exclude'				        => true,
			'eval'                  => array('maxlength'=>255, 'tl_class'=>'w50 clr')
		),
		'eval_path' => array
		(
		  'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_path'],
		  'default'               => 'tl_files',
		  'inputType'             => 'fileTree',
		  'exclude'               => true,
		  'eval'                  => array('mandatory' => false, 'multiple' => true,'fieldType' => 'radio','files'=>false, 'tl_class' => 'clr')
    ),
		'exclude' => array
		(
		  'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['exclude'],
		  'inputType'             => 'checkbox',
		  'exclude'               => true,
		  'eval'                  => array('tl_class' => 'w50 clr')
    ),
		'eval_allow_html' => array
		(
		  'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_allow_html'],
		  'inputType'             => 'checkbox',
		  'exclude'               => true,
		  'eval'                  => array('tl_class' => 'w50')
    ),
		'eval_unique' => array
		(
		  'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_unique'],
		  'inputType'             => 'checkbox',
		  'exclude'               => true,
		  'eval'                  => array('tl_class' => 'w50 clr')
    ),
		'eval_do_not_copy' => array
		(
		  'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_do_not_copy'],
		  'inputType'             => 'checkbox',
		  'exclude'               => true,
		  'eval'                  => array('tl_class' => 'w50')
    ),
		'class' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['class'],
			'inputType'             => 'text',
			'exclude'				        => true,
			'eval'                  => array('maxlength'=>255, 'tl_class'=>'clr', 'rgxp' => 'extnd')
		),    
	)
);


class tl_dma_eg_fields extends Backend
{
	/**
	 * Autogenerate an article alias if it has not been set yet
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function generateTitle($varValue, DataContainer $dc)
	{
		$autoAlias = false;
		// Generate alias if there is none
			$objTitle = $this->Database->prepare("SELECT label,pid FROM tl_dma_eg_fields WHERE id=?")
									   ->limit(1)
									   ->execute($dc->id);
		if (!strlen($varValue))
		{
			$autoAlias = true;
			$varValue = standardize($objTitle->label);
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_dma_eg_fields WHERE id=? AND pid=? AND title=?")
								   ->execute($dc->id, $objTitle->pid, $varValue);

		// Check whether the page alias exists
		if ($objAlias->numRows > 1)
		{
			if (!$autoAlias)
			{
				throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
			}

			$varValue .= '.' . $dc->id;
		}

		return $varValue;
	}
	/**
	 * returns the list output
	 * @param array
	 * @return string
	 */
	public function listFormFields($arrRow)
	{
		return '<div class="cte_type">'
            . ($arrRow['type'] ? ' [' . $arrRow['type'] . ']' : '') . '</div>'."\n"
            .'<div class="block">'
            . $arrRow['title']."\n"
            .'</div>' . "\n";
	}
	
	public function getElementTemplates(DataContainer $dc)
	{
		if(version_compare(VERSION.BUILD, '2.9.0','>='))
		{
			$arrTemplates = array();
			$strPrefix = 'dma_egfield_';
			
			// get the standard-template routine
			$arrControllerTemplates = $this->getTemplateGroup($strPrefix);
			foreach ($arrControllerTemplates as $value)
			{
				$arrTemplates[$value] = $value;
			}
			
			// found other theme-templates
			$objTheme = $this->Database->prepare("SELECT templates FROM tl_theme WHERE templates!=?")
									   ->execute('');

			if ($objTheme->numRows > 0)
			{
				while ($objTheme->next())
				{

					$strFolder = TL_ROOT .'/'. $objTheme->templates;
					
					// Find all matching templates
					$arrFiles = preg_grep('/^' . preg_quote($strPrefix, '/') . '/i',  scan($strFolder));
					$arrThemeTemplates = array();
					foreach ($arrFiles as $strTemplate)
					{
						$strName = basename($strTemplate);
						$arrThemeTemplates[] = substr($strName, 0, strrpos($strName, '.'));
					}
					

					natcasesort($arrThemeTemplates);
					$arrThemeTemplates = array_unique($arrThemeTemplates);

					foreach ($arrThemeTemplates as $value)
					{
						$arrTemplates[$value] = str_replace('templates/','',$objTheme->templates) . '/' . $value;
					}
				}
			}
	   		return $arrTemplates;
		}
		else 
		{
			return $this->getTemplateGroup('dma_egfield_');
		}	
	}
	
}
?>
