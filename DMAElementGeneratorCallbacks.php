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
 * @author   Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 * @license    LGPL
 * @filesource
 */

/**
 * Class DMAElementGeneratorCallbacks
 *
 *
 * @copyright  Dialog- und Medienagentur der ACS mbH 2010
 * @author     Carsten Kollmeier <kollmeier@dialog-medien.com>
 * @author   Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 */
class DMAElementGeneratorCallbacks extends Backend
{

	/**
	 * * The field values
	 * @var array
	 */
	static $_dma_fields;
	protected $paletteReplace;
	protected $strTable;

	/**
	 * The palettes to generate according to the type of element
	 * @var array
	 */
	protected $dma_palettes = array
	(
		'content' => '{type_legend},type;dma_eg_data;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space',
		'module' => '{type_legend},name,type;dma_eg_data;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space'
	);

	/**
	 *  The name of the language array according to the type of element
	 *  @var array
	 */
	protected $dma_lang = array
	(
		'content' => 'CTE',
		'module' => 'FMD'
	);


	protected function prepareOptions($objField)
	{
		$arrOptions = deserialize($objField->options, true);

		if (empty($arrOptions))
		{
			return null;
		}

		if ($objField->type == 'checkbox' && count($arrOptions) == 1)
		{
			return null;
		}

		$arrReturn = array();
		foreach ($arrOptions as $i=>$option)
		{
			if (is_array($option))
			{
				$arrReturn[$option['value']] = $option['label'];
			} else
			{
				$arrReturn[$i] = $option[1];
			}
		}

		return $arrReturn;
	}

	/**
	 * Generate the DCA dynamically
	 */
	protected function generateDCA($strTableName, &$dc)
	{
		if ($strTableName!='module' && $strTableName!='content')
		{
			return;
		}

		$this->import("Database");
		$create = false;

		// Get field values
		$fields = &self::$_dma_fields;

		// Database table is prefixed
		$strTable = 'tl_'.$strTableName;
		$this->strTable = $strTable;

		// If field values are empty get them from Database
		if (!is_array($fields))
		{
			$objData = $this->Database->prepare("SELECT dma_eg_data FROM $strTable WHERE id=?")
			->limit(1)
			->execute($dc->id);
			// No results cause an empty array
			if ($objData->numRows == 0)
			{
				$fields = array();
				$create = true;
			}
			else
			{
				$fields = deserialize($objData->dma_eg_data);
			}
			// This should not happen, but when it happens force empty array
			if (!is_array($fields) || count($fields) == 0)
			{
				$fields = array();
				$create = true;
			}
		}

		// Get the dymamic Elements
		$objElement = $this->Database->prepare("SELECT id,title FROM tl_dma_eg WHERE `$strTableName` = '1'")
		->execute();

		// Get the palette for the table
		$palette = $this->dma_palettes[$strTableName];

		while ($objElement->next())
		{
			// get the Fields for this Element
			$objField = $this->Database->prepare("SELECT * FROM tl_dma_eg_fields WHERE pid=? ORDER BY sorting")
			->execute($objElement->id);

			// Empty the palette snippet
			$replace = '';
			$this->paletteReplace = '';

			// Fill the options for the field
			while ($objField->next())
			{
				// A legend just needs an entry in the palette
				if ($objField->type == 'legend')
				{
					$title = DMA_EG_PREFIX . $objField->id . '_legend_' . $objField->id;
					$this->paletteReplace .= ';{' . $title . ($objField->hidden ? ':hide' : '') . '}';
					$GLOBALS['TL_LANG'][$strTable][$title]  = $objField->label;
					// Otherwise fill all options
				}
				else
				{
					//multiple checkbox-menue
					if ($objField->type=='checkbox' && sizeof($this->prepareOptions($objField))>1)
					{
						$objField->type='checkboxWizard';
					}

					$objField->eval_tl_class = $objField->eval_tl_class ? implode(' ',deserialize($objField->eval_tl_class)) : '';

					// USE PagePicker
					if ($objField->type == 'pagePicker')
					{
						$objField->type = 'text';
						$objField->wizard = array(array('tl_content','pagePicker'));
						$objField->eval_rgxp = 'url';
						$objField->eval_tl_class .= ' wizard';

						$objField->eval_decodeEntities = true;
					}

					// don't add an integer at the end of a field name as Contao javascript (e.g. the file tree reload)
					// will strip integers at the end as they are used in multi edit mode!
					// this will kill ajax reload functionality
					$title = DMA_EG_PREFIX . $objField->id . '_' . $objField->title;

					if ($objField->type == 'hyperlink')
					{
						$this->addHyperlinkToPalette($objField);
					}
					if ($objField->type == 'image')
					{
						$this->addImageToPalette($objField);
					}

					if ($GLOBALS['BE_FFL'][$objField->type])
					{
						$this->paletteReplace .= ',' . $title;
						$GLOBALS['TL_DCA'][$strTable]['fields'][$title] = array
						(
							'label' => array($objField->label,$objField->explanation),
							'inputType' => $objField->type,
							'options' => $this->prepareOptions($objField),
							'exclude' => $objField->exclude,
							'eval' => array
							(
								'mandatory' => $objField->eval_mandatory,
								'tl_class' => $objField->eval_tl_class,
								'rgxp' => $objField->eval_rgxp,
								'allowHtml' => $objField->eval_allow_html || $objField->eval_rte,
								'rte' => $objField->eval_rte ? ($strTableName=='content' ? $GLOBALS['TL_DCA']['tl_content']['fields']['text']['eval']['rte'] : 'tinyMCE') : '',
								'unique' => $objField->eval_unique,
								'doNotCopy' => $objField->eval_do_not_copy,
								'files' => true,
								'filesOnly' => true,
								'extensions' => $objField->eval_extensions,
								'fieldType' => substr($objField->eval_field_type,3),
								'alwaysSave' => true,
								'doNotSaveEmpty' => true,
								'multiple' => $objField->type=='checkboxWizard' ? true : false,
								'decodeEntities' => $objField->eval_decodeEntities ? true : false
							),
							'wizard' => $objField->wizard ? $objField->wizard : '',
							'load_callback' => array(array('DMAElementGeneratorCallbacks','load_'.$objField->title)),
							'save_callback' => array(array('DMAElementGeneratorCallbacks','save_'.$objField->title))
						);
						if ($objField->eval_path)
						{
							// path is array for Contao 3
							if (is_array(deserialize($objField->eval_path)))
							{
								$objField->eval_path = deserialize($objField->eval_path);
							}
							$GLOBALS['TL_DCA'][$strTable]['fields'][$title]['eval']['path'] = $objField->eval_path;
						}
						if ($objField->eval_minlength)
						{
							$GLOBALS['TL_DCA'][$strTable]['fields'][$title]['eval']['minlength'] = $objField->eval_minlength;
						}
						if ($objField->eval_maxlength)
						{
							$GLOBALS['TL_DCA'][$strTable]['fields'][$title]['eval']['maxlength'] = $objField->eval_maxlength;
						}
						if ($objField->eval_rows)
						{
							$GLOBALS['TL_DCA'][$strTable]['fields'][$title]['eval']['rows'] = $objField->eval_rows;
						}
						if ($objField->eval_cols)
						{
							$GLOBALS['TL_DCA'][$strTable]['fields'][$title]['eval']['cols'] = $objField->eval_cols;
						}
						if ($create)
						{
							$fields[$objField->title] = $objField->default_value;
						}
					}
				}

			}


			// Include invisible widget for the field data
			$GLOBALS['TL_DCA'][$strTable]['fields']['dma_eg_data'] = array
			(
				'label' => array('DATA',''),
				'inputType' => 'dma_eg_hidden',
				'default' => array(),
				'exclude' => false,
				'eval' => array
				(
					'alwaysSave' => true,
					'mandatory' => false
				),
				'save_callback' => array(array('DMAElementGeneratorCallbacks','save_data'))
			);

			// Include palette snippet
			$GLOBALS['TL_DCA'][$strTable]['palettes'][DMA_EG_PREFIX.$objElement->id]=str_replace(';dma_eg_data',$this->paletteReplace.',dma_eg_data',$palette);
			// Include language definitions
			$GLOBALS['TL_LANG'][$this->dma_lang[$strTableName]][DMA_EG_PREFIX.$objElement->id]  = array($objElement->title,'');
		}
	}

	//protected function addFieldToPalette

	protected function addFieldToPalette($objField)
	{
		
	}

	protected function addHyperlinkToPalette($objField)
	{
		$arrHyperlinkData = deserialize($objField->hyperlink_data);
		foreach ($arrHyperlinkData as $hyperlinkData)
		{
			$title = DMA_EG_PREFIX . $objField->title . '_' . $objField->id . '--' . $hyperlinkData;
			$this->paletteReplace .= ',' . $title;
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title] = $GLOBALS['TL_DCA']['tl_content']['fields'][$hyperlinkData];
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title]['load_callback'] = array(array('DMAElementGeneratorCallbacks','load_'.$objField->title . '--' . $hyperlinkData));
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title]['save_callback'] = array(array('DMAElementGeneratorCallbacks','save_'.$objField->title . '--' . $hyperlinkData));
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title]['eval']['alwaysSave'] = true;
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title]['eval']['doNotSaveEmpty'] = true;
		}
	}

	protected function addImageToPalette($objField)
	{
		$arrImageData = deserialize($objField->image_data);
		foreach ($arrImageData as $imageData)
		{
			$title = DMA_EG_PREFIX . $objField->title . '_' . $objField->id . '--' . $imageData;
			$this->paletteReplace .= ',' . $title;
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title] = $GLOBALS['TL_DCA']['tl_content']['fields'][$imageData];
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title]['load_callback'] = array(array('DMAElementGeneratorCallbacks','load_'.$objField->title . '--' . $imageData));
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title]['save_callback'] = array(array('DMAElementGeneratorCallbacks','save_'.$objField->title . '--' . $imageData));
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title]['eval']['alwaysSave'] = true;
			$GLOBALS['TL_DCA'][$this->strTable]['fields'][$title]['eval']['doNotSaveEmpty'] = true;
		}
	}

	/**
	 * Generate DCA for module table
	 */
	public function module_onload($dc)
	{
		$this->generateDCA('module',$dc);
	}


	/**
	 * Generate DCA for content table
	 */
	public function content_onload($dc)
	{
		$this->generateDCA('content',$dc);
	}

	/**
	 * Automatic callback functions for every field
	 * loads or saves the values
	 */
	public function __call($name,$args)
	{
		list($type,$param) = explode('_',$name,2);
		switch($type)
		{
		case 'load':
			return $this->load_field($param,$args[0]);
			break;
		case 'save':
			return $this->save_field($param,$args[0]);
		}
	}

	/**
	 * these are called dynamically bei __call
	 */
	public function load_field($strName,$varValue)
	{
		return self::$_dma_fields[$strName];
	}

	public function save_field($strName,$varValue)
	{
		self::$_dma_fields[$strName] = $varValue;
		return('');
	}

	/**
	 * Saves the field values
	 */
	public function save_data($varValue)
	{
		return serialize(self::$_dma_fields);
	}

	/**
	 * Stores the configuration array without the given element
	 * @param int
	 */
	protected function store_configuration_without($without)
	{
		$objElement = $this->Database->prepare("SELECT id,category,module,content FROM tl_dma_eg")
		->execute();
		$arrModuleConfig = array();
		$arrContentConfig = array();
		while ($objElement->next())
		{
			if ($objElement->id != $without)
			{
				if ($objElement->module)
				{
					$arrModuleConfig[$objElement->category][] = $objElement->id;
				}
				if ($objElement->content)
				{
					$arrContentConfig[$objElement->category][] = $objElement->id;
				}
			}
		}
		$this->Config->update("\$GLOBALS['TL_CONFIG']['dma_eg_content']", serialize($arrContentConfig));
		$this->Config->update("\$GLOBALS['TL_CONFIG']['dma_eg_modules']", serialize($arrModuleConfig));
	}

	/**
	 * Stores the configuration array
	 */
	protected function store_configuration()
	{
		$this->store_configuration_without(-1);
	}


	/**
	 * Stores the generated Elements in Configuration
	 */
	public function element_onsubmit(DataContainer $dc)
	{
		$this->import("Database");
		$this->store_configuration();
	}

	/**
	 * Deletes Elements from Configuration, Contentelements and Modules
	 */

	public function element_ondelete(DataContainer $dc)
	{
		$this->import("Database");

		// Delete from Contentelements
		$this->Database->prepare("DELETE FROM tl_content WHERE type=?")
		->execute(DMA_EG_PREFIX.$dc->id);
		// Delete from Modules
		$this->Database->prepare("DELETE FROM tl_module WHERE type=?")
		->execute(DMA_EG_PREFIX.$dc->id);

		// Delete from Configuration
		$this->store_configuration_without($dc->id);
	}

}


?>