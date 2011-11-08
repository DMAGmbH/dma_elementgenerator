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
 * @author 	   Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 * @license    LGPL
 * @filesource
 */

/**
 * Class DMAElementGeneratorContent
 * 
 * the dynamic contentelement  
 *
 * @copyright  Dialog- und Medienagentur der ACS mbH 2010
 * @author     Carsten Kollmeier <kollmeier@dialog-medien.com>
 * @package    DMAElementGenerator
 */

class DMAElementGenerator extends Frontend
{
	protected $strTemplate = 'dma_eg_default';
	
	public function generate($data)
	{
		return $this->compile($data);
	}
	

	
	protected function compile($data)
	{		
	

	
		$elementID = str_replace(DMA_EG_PREFIX,'',$data->type);		
		
		$objElement = $this->Database->prepare("SELECT template,class FROM tl_dma_eg WHERE id=?")
										 ->limit(1)
										 ->execute($elementID);
		
		if (TL_MODE == 'BE')
		{
			$objElement->template = $this->strTemplate;
		}		
		
		//eigene Klasse für ce, Überschreibt die Standardmäßige dma_eg_?
		if ($objElement->class)
		{
			$data->type = $objElement->class;
		}
		
		$arrElements = array();
		$arrLabels = array();
		$arrClasses = array();
		$arrTemplateData = array();
		
		$arrData = deserialize($data->dma_eg_data);
		
		$objField = $this->Database->prepare("SELECT * FROM tl_dma_eg_fields WHERE pid=? AND type!=? ORDER BY sorting")
		                ->execute($elementID,'legend');
		                
		                
		$strFields = '';
		$objFieldTemplate = new FrontendTemplate('dma_egfield_default');

		while ($objField->next())
		{
			//echo $objField->title;
			$objFieldTemplate->addImage = false;
			$objFieldTemplate->title = $objField->title;
			$objFieldTemplate->value = $arrElements[$objField->title] = $arrData[$objField->title];
			$objFieldTemplate->label = $arrLabels[$objField->title] = $objField->label;
			$objFieldTemplate->class = $arrClasses[$objField->title] = ($objField->class == '' ? '' : $objField->class.' ').$objField->type;
			
			//intelligente Ausgabe ;-)
			$arrTemplateData[$objField->title] = array();
			
			$arrTemplateData[$objField->title]['raw'] = $arrData[$objField->title];
			$arrTemplateData[$objField->title]['type'] = $objField->type;

			//formatierte Ausgabe von bekannten Fällen
			if ($objField->eval_rgxp)
			{
				switch ($objField->eval_rgxp)
				{
					case 'date':
						$objFieldTemplate->value = $arrTemplateData[$objField->title]['value'] = $this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'], $arrData[$objField->title]);
						break;
					case 'datim':
						$objFieldTemplate->value = $arrTemplateData[$objField->title]['value'] = $this->parseDate($GLOBALS['TL_CONFIG']['datimFormat'], $arrData[$objField->title]);
						break;
					case 'time':
						$objFieldTemplate->value = $arrTemplateData[$objField->title]['value'] = $this->parseDate($GLOBALS['TL_CONFIG']['timeFormat'], $arrData[$objField->title]);
						break;	
					case 'email':
						$objFieldTemplate->value = $arrTemplateData[$objField->title]['value'] = '{{email::'.$arrData[$objField->title].'}}';
						break;
						
				}
			}
			
			//Handling von Textareas ohne RTE 
			
			if ($objField->type=='textarea' && !$objField->eval_rte && !$objField->eval_allow_html)
			{
				//Einfügen von Zeilenumbrüchen
				$objFieldTemplate->value = $arrTemplateData[$objField->title]['value'] = nl2br($arrData[$objField->title]);
			}
			
			//Handling von checkboxen
			if ($objField->type=='checkbox' && is_array(deserialize($arrData[$objField->title])))
			{
				$tempArrCbx = deserialize($arrData[$objField->title]);
				foreach ($tempArrCbx as $checkbox)
				{
					$objFieldTemplate->value = $arrTemplateData[$objField->title]['value'][] = $checkbox;
				}
			}
			
			//Handling von Seiten
			if ($objField->type=='pageTree')
			{
				if (is_array(deserialize($arrData[$objField->title])))
				{
					//mehrere Seiten
					$tempArrPages = deserialize($arrData[$objField->title]);
					foreach ($tempArrPages as $page)
					{
						$objLinkedPage = $this->Database->prepare("SELECT * FROM tl_page WHERE id=?")
												  ->limit(1)
												  ->execute($page);
						if ($objLinkedPage->numRows)
						{
							$arrTemplateData[$objField->title]['value'][] = array(
								'raw' => $page,
								'alias' => $objLinkedPage->alias,
								'href'  => $this->generateFrontendUrl($objLinkedPage->fetchAssoc())
							);
						}
					
					}
				}
				else 
				{
					$objLinkedPage = $this->Database->prepare("SELECT * FROM tl_page WHERE id=?")
												  ->limit(1)
												  ->execute($arrData[$objField->title]);
					if ($objLinkedPage->numRows)
					{
						$arrTemplateData[$objField->title]['value'] = array(
							'alias' => $objLinkedPage->alias,
							'href'  => $this->generateFrontendUrl($objLinkedPage->fetchAssoc())
						);
						$objFieldTemplate->value = $this->generateFrontendUrl($objLinkedPage->fetchAssoc());
					}
				}

			}
			
			//Dateihandling - zusätzliche Informationen
			if ($objField->type=='fileTree')
			{
				if (is_array(deserialize($arrData[$objField->title])))
				{
					//mehrere Dateien
					$tempArrFiles = deserialize($arrData[$objField->title]);
					foreach ($tempArrFiles as $file)
					{
						if (is_file(TL_ROOT . '/' . $file))
						{
							$objFile = new File($file);


							$arrTemplateData[$objField->title]['value'][] = array(
								'raw' => $file,
								'attributes' => array(
									'width' 		=> $objFile->width,
									'height' 	=> $objFile->height,
									'extension' => $objFile->extension,
									'icon' 		=> $objFile->icon,
									'size'		=> $objFile->size
								)
							);
						}
					}
				}
				else
				{
					//eine Datei
					if (is_file(TL_ROOT . '/' . $arrData[$objField->title]))
					{
						$objFile = new File($arrData[$objField->title]);

						$arrTemplateData[$objField->title]['value'] = array(
							'raw' => $arrData[$objField->title],
							'attributes' => array(
								'width' 		=> $objFile->width,
								'height' 	=> $objFile->height,
								'extension' => $objFile->extension,
								'icon' 		=> $objFile->icon,
								'size'		=> $objFile->size
							)
						);
						$arrImage = array(
							'singleSRC' => $arrData[$objField->title]
						);
						$this->addImageToTemplate($objFieldTemplate, $arrImage, $intMaxWidth, $strLightboxId);
						$objFieldTemplate->value = '';
					}
				}
			}
			
			$strFields .= $objFieldTemplate->parse();
		}
										 
	
		$objTemplate = new FrontendTemplate(($objElement->template ? $objElement->template : $strTemplate));
		
										 
		$objArticle = $this->Database->prepare("SELECT title,alias FROM tl_article WHERE id=?")
								->limit(1)
								->execute($data->pid);
		

		$objTemplate->contentElement = true;
		$objTemplate->articleID = $data->pid;
		$objTemplate->articleTitle = $objArticle->title;
		$objTemplate->articleAlias = $objArticle->alias;
		$objTemplate->elements = $arrElements;
		$objTemplate->labels = $arrLabels;
		$objTemplate->classes = $arrClasses;
		$objTemplate->fields = $strFields;
		$objTemplate->data = $arrTemplateData;	
		
		$arrStyle = array();

		if ($data->space[0] != '')
		{
			$arrStyle[] = 'margin-top:'.$data->space[0].'px;';
		}

		if ($data->space[1] != '')
		{
			$arrStyle[] = 'margin-bottom:'.$data->space[1].'px;';
		}

		$objTemplate->style = count($arrStyle) ? implode(' ', $arrStyle) : '';
		$objTemplate->cssID = ($data->cssID[0] != '') ? ' id="' . $data->cssID[0] . '"' : '';
		$objTemplate->class = trim(($data->type=='content' ? 'ce_' : 'mod_') . $data->type . ' ' . $data->cssID[1]);		

		return $objTemplate->parse();
		
	}
}

?>
