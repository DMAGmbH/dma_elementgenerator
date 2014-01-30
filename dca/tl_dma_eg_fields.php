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
 * @author     Carsten Kollmeier
 * @author     Janosch Skuplik <skuplik@dma.do>
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
		'__selector__'  => array('type','useCheckboxCondition','optionsType'),
		'default'       => '{type_legend},type',
		'legend'        => '{type_legend},type,label,hidden;{subpalette_legend:hide},useCheckboxCondition',
		'text'          => '{type_legend},type,label,title,explanation;{input_legend},default_value,eval_mandatory,eval_rgxp,eval_minlength,eval_maxlength;{style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,eval_allow_html,class,template',
		'textarea'      => '{type_legend},type,label,title,explanation;{input_legend},default_value,eval_mandatory,eval_rows,eval_cols,eval_rte,eval_maxlength;{style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,eval_allow_html,class,template',
		'select'        => '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory,optionsType;{style_legend},eval_blank_option,eval_chosen,eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,class,template',
		'checkbox'      => '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory,options;{style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,class,template',
		'radio'         => '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory,options;{style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,class,template',
		'fileTree'      => '{type_legend},type,label,title,explanation;{input_legend},default_value,eval_mandatory,eval_extensions,eval_field_type,eval_path;{style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,class,template',
		'pageTree'      => '{type_legend},type,label,title,explanation;{input_legend},default_value,eval_mandatory,eval_field_type;style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,eval_unique,eval_do_not_copy,class,template',
        'pagePicker'	=> '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory;{style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,class,template',
		'listWizard'	=> '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory,eval_allow_html;{style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,eval_unique,eval_do_not_copy,class,template',
	    'tableWizard'	=> '{type_legend},type,label,title,explanation;{input_legend},eval_mandatory,eval_allow_html;{style_legend},eval_tl_class;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,eval_unique,eval_do_not_copy,class,template',
	    'hyperlink'		=> '{type_legend},type,label,title,explanation;{input_legend},hyperlink_data;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,class,template',
	    'image'			=>	'{type_legend},type,label,title,explanation;{input_legend},image_data;{subpalette_legend:hide},useCheckboxCondition;{expert_legend:hide},exclude,class,template'
	),

	// Subpalettes
	'subpalettes' => array
	(		
		'useCheckboxCondition' => 'subpaletteSelector,renderHiddenData',
        'optionsType_manual' => 'options',
        'optionsType_database' => 'optDbTable,optDbTitle,optDbQuery'
	),

	// Fields
	'fields' => array
	(
	  'type' => array
	  (
      'label'     => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['type'],
      'reference'     => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_select'],
      'inputType' => 'select',
      'options' => array('legend','text','textarea','select','checkbox','radio','pageTree','fileTree','pagePicker','listWizard','tableWizard','hyperlink','image'),
      'default' => 'text',
      'exclude' => true,
      'load_callback'        => array(array('tl_dma_eg_fields','loadTypeField')),
      'eval' => array('submitOnChange' => true, 'tl_class' => 'w50')
    ),
		'label' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['label'],
			'inputType'             => 'text',
			'exclude'				=> true,
			'eval'                  => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50 clr')
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
      'eval' => array('tl_class'=>'w50 clr', 'multiple' => true)
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
		  'default'               => '',
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
        'eval_blank_option' => array(
            'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_blank_option'],
            'inputType'             => 'checkbox',
        	'exclude'               => true,
        	'eval'                  => array('tl_class' => 'w50')
        ),
        'eval_chosen' => array(
            'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_chosen'],
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
    'eval_sortable' => array
    (
    	'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_sortable'],
		  'inputType'             => 'checkbox',
		  'exclude'               => true,
		  'eval'                  => array('tl_class' => 'w50')
    ),
		'class' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['class'],
			'inputType'             => 'text',
			'exclude'				        => true,
			'eval'                  => array('maxlength'=>255, 'tl_class'=>'w50 clr', 'rgxp' => 'extnd')
		),   
		'template' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['template'],
			'default'                 => 'dma_egfield_default',
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_dma_eg_fields','getElementTemplates'),
			'eval'                    => array('tl_class'=>'w50')
		),
		'hyperlink_data' => array
		(
			'label' 									=> &$GLOBALS['TL_LANG']['tl_dma_eg_fiels']['hyperlink_data'],
			'exclude' 								=> true,
			'inputType'               => 'checkbox',
			'options'                 => array('url','target','linkTitle','rel','embed'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['hyperlink_data_options'],
			'eval'                    => array('multiple'=>true, 'tl_class'=>'clr')
		),
		'image_data' => array
		(
			'label' 									=> &$GLOBALS['TL_LANG']['tl_dma_eg_fiels']['image_data'],
			'exclude' 								=> true,
			'inputType'               => 'checkbox',
			'options'                 => array('singleSRC','alt','title','size','imagemargin','imageUrl','fullsize','caption','floating'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['image_data_options'],
			'eval'                    => array('multiple'=>true, 'tl_class'=>'clr')
		),
		'useCheckboxCondition' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['useCheckboxCondition'],
			'exclude'               => true,
			'inputType'             => 'checkbox',
			'eval'                  => array('tl_class' => 'w50 m12','submitOnChange' => true)
		),
		'subpaletteSelector' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['subpaletteSelector'],
			'default'                 => '',
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_dma_eg_fields','getCheckboxelements'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
        'renderHiddenData' => array
        (
            'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg_fields']['renderHiddenData'],
            'exclude'               => true,
            'inputType'             => 'checkbox',
            'eval'                  => array('tl_class' => 'w50 m12')
        ),
        'optionsType' => array
        (
           'label' => &$GLOBALS['TL_LANG']['tl_dma_eg']['optionsType'],
            'default' => 'manual',
            'exclude' => true,
            'inputType' => 'select',
            'options' => array('manual','database'),
            'eval' => array('mandatory'=>true,'submitOnChange' => true,'tl_class'=>'w50 clr')
        ),
        'optDbTable' => array(
            'label' => &$GLOBALS['TL_LANG']['tl_dma_eg']['optDbTable'],
            'default' => '',
            'exclude' => true,
            'inputType' => 'select',
            'options_callback' => array('tl_dma_eg_fields','getDatabaseTables'),
            'eval' => array('includeBlankOption'=>true,'mandatory'=> true, 'submitOnChange' => true, 'tl_class'=>'w50 clr')
        ),
        'optDbQuery' => array(
            'label' => &$GLOBALS['TL_LANG']['tl_dma_eg']['optDbQuery'],
            'exclude' => true,
            'inputType' => 'textarea',
            'eval'      => array('preserveTags'=>true, 'style'=>'height:60px', 'tl_class'=>'clr'),
        ),
        'optDbTitle' => array(
            'label' => &$GLOBALS['TL_LANG']['tl_dma_eg']['optDbTitle'],
            'default' => '',
            'exclude' => true,
            'inputType' => 'select',
            'options_callback' => array('tl_dma_eg_fields','getDatabaseTableRows'),
            'eval' => array('includeBlankOption'=>true,'tl_class'=>'w50')
        )
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
    public function loadTypeField($varValue, DataContainer $dc)
    {
        if ($dc->activeRecord->title != '')
        {
            $GLOBALS['TL_DCA']['tl_dma_eg_fields']['fields']['type']['eval']['disabled'] = true;
            $GLOBALS['TL_DCA']['tl_dma_eg_fields']['fields']['type']['label'] = $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_disabled'];
        }
        return $varValue;
    }

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
            . '<strong>' . ($arrRow['type']=='legend' ? '<i>' : '') . $arrRow['label'] . ($arrRow['type']=='legend' ? '</i>' : '') . '</strong>' . ($arrRow['title'] ? (' [' . $arrRow['title'] . ']') : '') ."\n"
            .'</div>' . "\n";
	}
	
	public function getCheckboxelements(DataContainer $dc) 
	{
		$objCheckboxes = $this->Database->prepare("SELECT * FROM tl_dma_eg_fields WHERE pid=? AND type=?")
																		->execute($dc->activeRecord->pid,'checkbox');
		
		if ($objCheckboxes->numRows > 0)
		{
			$arrCheckboxes = array();
			while ($objCheckboxes->next())
			{
                // aktuell werden nur einfache Checkboxen unterstützt
                if (sizeof(deserialize($objCheckboxes->options)) == 1)
                {
				    $arrCheckboxes[$objCheckboxes->id] = $objCheckboxes->label;
                }
			}
			return $arrCheckboxes;
		}
		return false;
	}

    public function getDatabaseTables(DataContainer $dc)
    {
        $arrDbTables = $this->Database->listTables();
        return $arrDbTables;
    }

    public function getDatabaseTableRows(DataContainer $dc)
    {
        if ($dc->activeRecord->optDbTable && $this->Database->tableExists($dc->activeRecord->optDbTable))
        {
            return $this->Database->getFieldNames($dc->activeRecord->optDbTable);
        }
        else
        {
            return false;
        }
    }
	
	public function getElementTemplates(DataContainer $dc)
	{

        if (version_compare(VERSION.BUILD, '3.0.0','>='))
        {
        	return $this->getTemplateGroup('dma_egfield_');
        }

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
