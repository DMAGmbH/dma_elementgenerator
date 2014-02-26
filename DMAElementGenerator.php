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

/**
 * Class DMAElementGeneratorContent
 *
 * the dynamic contentelement
 *
 * @copyright  DMA GmbH
 * @author     Carsten Kollmeier
 * @author     Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 */

class DMAElementGenerator extends Frontend
{
	protected $strTemplate = 'dma_eg_default';
	private $displayInDivs = false;

	public function generate($data)
	{
		return $this->compile($data);
	}



	protected function compile($data)
	{


		$elementID = str_replace(DMA_EG_PREFIX,'',$data->type);

		$objElement = $this->Database->prepare("SELECT * FROM tl_dma_eg WHERE id=?")
		->limit(1)
		->execute($elementID);



		//Im Backend in jedem Fall ein html5-Template verwenden
		if (TL_MODE == 'BE' && version_compare(VERSION.'.'.BUILD, '2.10.0', '>='))
		{
			try
			{
				$this->getTemplate($objElement->template);
			}
			catch (Exception $e)
			{
				$objElement->template = $this->strTemplate;
			}
		}

        if (TL_MODE == 'BE' && $objElement->be_template)
        {
            $objElement->template = $objElement->be_template;
        }


		//Ausgabe in divs statt ul-li-Kontruktion ermöglichen
		if ($objElement->display_in_divs)
		{
			$this->displayInDivs = true;
			//$objTemplate->divs = true;
		}

		//eigene Klasse für ce_ oder mod_ Überschreibt die standardmäßige dma_eg_?
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

		//print_r($objField->row());

		$strFields = '';


		while ($objField->next())
		{

            if ($objField->useCheckboxCondition && !$objField->renderHiddenData)
            {
                if ($objField->subpaletteSelector)
                {
                    $objSubSelector = $this->Database->prepare("SELECT * FROM tl_dma_eg_fields WHERE id=?")
                	    ->limit(1)
                		->execute($objField->subpaletteSelector);
                    if ($arrData[$objSubSelector->title] == "")
                    {
                        continue;
                    }
                }
            }

            $strFieldTemplate = "dma_egfield_default";
            if (TL_MODE == "FE")
            {
                $strFieldTemplate = $objField->template ? $objField->template : 'dma_egfield_default';
            }
            $objFieldTemplate = new FrontendTemplate($strFieldTemplate);

			//Ausgabe in divs statt ul-li-Konstruktion ermöglichen
			if ($this->displayInDivs)
			{
				$objFieldTemplate->divs = true;
			}

			//Ausgabe ohne label ermöglichen
			if ($objElement->without_label)
			{
				$objFieldTemplate->nolabels = true;
			}

			//echo $objField->title;
			$objFieldTemplate->addImage = false;
			$objFieldTemplate->title = $objField->title;
			$objFieldTemplate->value = $arrElements[$objField->title] = $arrData[$objField->title];
			$objFieldTemplate->label = $arrLabels[$objField->title] = $objField->label;
			$objFieldTemplate->class = $arrClasses[$objField->title] = ($objField->class == '' ? '' : $objField->class.' ').$objField->type;

			//intelligente Ausgabe ;-)
			$arrTemplateData[$objField->title] = array();

			$arrTemplateData[$objField->title]['raw'] = $arrData[$objField->title];
			$arrTemplateData[$objField->title]['value'] = $arrData[$objField->title];
			$arrTemplateData[$objField->title]['type'] = $objField->type;
			$arrTemplateData[$objField->title]['label'] = $objField->label;

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
			if ($objField->type=='checkbox' && is_array(trimsplit(',',$arrData[$objField->title])))
			{
				$tempArrCbx = trimsplit(',',$arrData[$objField->title]);
				$objFieldTemplate->value = '';
				$arrTemplateData[$objField->title]['value'] = array();
				foreach ($tempArrCbx as $checkbox)
				{
					$objFieldTemplate->value .= '<span class="cbx_entry">' . $checkbox . '</span>';
					$arrTemplateData[$objField->title]['value'][] = $checkbox;
				}
			}

            // Handling von Listen
            if ($objField->type=='listWizard' && is_array(trimsplit(',',$arrData[$objField->title])))
            {
                $arrTemplateData[$objField->title]['value'] = deserialize($arrData[$objField->title]);

            }

            // Handling von Tabellen
            if ($objField->type=='tableWizard' && is_array(trimsplit(',',$arrData[$objField->title])))
            {
                $arrTemplateData[$objField->title]['value'] = deserialize($arrData[$objField->title]);

                $arrTemplateData[$objField->title]['data'] = array();
                $limit = count($arrTemplateData[$objField->title]['value']);
                for ($j=0; $j<$limit; $j++)
                {

                    $class_tr = '';

                 	if ($j == 0)
                 	{
                 		$class_tr .= ' row_first';
                 	}

                 	if ($j == ($limit - 1))
                 	{
                 		$class_tr .= ' row_last';
                 	}

                 	$class_eo = (($j % 2) == 0) ? ' even' : ' odd';

                 	foreach ($arrTemplateData[$objField->title]['value'][$j] as $i=>$v)
                 	{
                 		$class_td = '';

                 		if ($i == 0)
                 		{
                 			$class_td .= ' col_first';
                 		}

                 		if ($i == (count($arrTemplateData[$objField->title]['value'][$j]) - 1))
                 		{
                 			$class_td .= ' col_last';
                 		}

                        $arrTemplateData[$objField->title]['data']['row_' . $j . $class_tr . $class_eo][] = array
                 		(
                 			'class' => 'col_'.$i . $class_td,
                 			'content' => (($v != '') ? ($v) : '&nbsp;')
                 		);
                 	}
                }


            }

            // Handling von Selectmenüs mit Datenbankstruktur
            if ($objField->type == 'select' && $objField->optionsType == 'database')
            {
                $objDatabaseData = $this->Database->prepare("SELECT * FROM " . $objField->optDbTable . " WHERE id=?")
                                                  ->limit(1)
                                                  ->execute($arrData[$objField->title]);
                if ($objDatabaseData->numRows == 1)
                {
                    $arrTemplateData[$objField->title]['value'] = $objDatabaseData->row();
                }

            }

			//Handling von Seiten
			if ($objField->type=='pageTree')
			{
			
				if (substr($objField->eval_field_type,3)=='checkbox')
				{
					$tempArray = trimsplit(',',$arrData[$objField->title]);
					$arrData[$objField->title] = serialize($tempArray);
				}

				if (is_array(deserialize($arrData[$objField->title])))
				{
					//mehrere Seiten
					$tempArrPages = deserialize($arrData[$objField->title]);
					$arrTemplateData[$objField->title]['value'] = array();
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
								'href'  => $this->generateFrontendUrl($objLinkedPage->row()),
								'title' => $objLinkedPage->title
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
							'href'  => $this->generateFrontendUrl($objLinkedPage->row()),
							'title' => $objLinkedPage->title
						);
						$objFieldTemplate->value = $this->generateFrontendUrl($objLinkedPage->row());
					}
				}

			}

			//Dateihandling - zusätzliche Informationen
			if ($objField->type=='fileTree')
			{
				if (substr($objField->eval_field_type,3)=='checkbox')
				{
					$tempArray = trimsplit(',',$arrData[$objField->title]);
					$arrData[$objField->title] = serialize($tempArray);
				}
				if (is_array(deserialize($arrData[$objField->title])))
				{
					//mehrere Dateien
					$tempArrFiles = deserialize($arrData[$objField->title]);
					$arrTemplateData[$objField->title]['value'] = array();
					foreach ($tempArrFiles as $file)
					{

						if (is_numeric($file))
						{
							$objFiles = \FilesModel::findByPk($file);

                            if ($objFiles)
                            {
								$arrImage = array
                                (
                                    'singleSRC' => $objFiles->path
                                );
                                $objFile = new \File($objFiles->path, true);
                            }


						}

                        elseif (strlen($file)==36)
                        {
                            $objFiles = \FilesModel::findByUuid($file);
                            if ($objFiles)
                            {
                                $arrImage = array(
                                    'singleSRC' => $objFiles->path
                                );
                                $objFile = new \File($objFiles->path, true);
                            }
                        }

						elseif (is_file(TL_ROOT . '/' . $file))
						{
							$objFile = new File($file);
						}
						
						// Send the file to the browser
						if ($this->Input->get('file', true) && $this->Input->get('file', true) != '')
						{
							$file = $this->Input->get('file', true);
	
							if ($file == $objFile->value)
							{
								$this->sendFileToBrowser($file);
							}
						}
						
						if ($objFile) 
						{

							$arrTemplateData[$objField->title]['value'][] = array(
								'raw' => $file,
								'src' => $objFile->value,
                                'meta' => $objFiles ? deserialize($objFiles->meta) : '',
								'value' => $objFile->value,
								'dl' => $this->Environment->request . (($GLOBALS['TL_CONFIG']['disableAlias'] || strpos($this->Environment->request, '?') !== false) ? '&amp;' : '?') . 'file=' . $this->urlEncode($objFile->value),
								'attributes' => array(
									'width'   => $objFile->width,
									'height'  => $objFile->height,
									'extension' => $objFile->extension,
									'icon'   => $objFile->icon,
									'size'  => $this->getReadableSize($objFile->filesize, 1),
									'filename' => $objFile->filename
								)
							);
                            //$arrElementData[] = $objFile->path;
						}
					}
                    //$arrElements[$objField->title] = implode(",",$arrElementData);
					//print_r($arrData);
					if ($arrData['orderSRC'] != '')
					{
						//echo "order";
					}
					//echo "<pre>";
					//print_r($arrTemplateData[$objField->title]);
					//echo "</pre>";
					
				}
				else
				{
					//eine Datei
					// file-handling for Contao 3
					if (is_numeric($arrData[$objField->title]))
					{
						$objFiles = \FilesModel::findByPk($arrData[$objField->title]);

                        if ($objFiles)
                        {
						    $arrImage = array(
								'singleSRC' => $objFiles->path
						    );
						    $objFile = new \File($objFiles->path, true);
                        }
					}

                    elseif (strlen($arrData[$objField->title])==36)
                    {
                        $objFiles = \FilesModel::findByUuid($arrData[$objField->title]);
                        if ($objFiles)
                        {
                            $arrImage = array(
                                'singleSRC' => $objFiles->path
                            );
                            $objFile = new \File($objFiles->path, true);
                        }
                    }

					else
					{
						if (is_file(TL_ROOT . '/' . $arrData[$objField->title]))
						{
							$objFile = new File($arrData[$objField->title]);
							$arrImage = array(
								'singleSRC' => $arrData[$objField->title]
							);
						}
					}
					//var_dump($objFile);
					//$objFile = new file($arrData['singleSRC']);
					
					// Send the file to the browser
					if ($this->Input->get('file', true) && $this->Input->get('file', true) != '')
					{
						$file = $this->Input->get('file', true);

						if ($file == $objFile->value)
						{
							$this->sendFileToBrowser($file);
						}
					}
					
					if ($objFile) {


						$arrTemplateData[$objField->title]['value'] = array(
							'raw' => $arrData[$objField->title],
                            'meta' => $objFiles ? deserialize($objFiles->meta) : '',
							'src' => $objFile->value,
							'value' => $objFile->value,
							'dl' => $this->Environment->request . (($GLOBALS['TL_CONFIG']['disableAlias'] || strpos($this->Environment->request, '?') !== false) ? '&amp;' : '?') . 'file=' . $this->urlEncode($objFile->value),
							'attributes' => array(
								'width'   => $objFile->width,
								'height'  => $objFile->height,
								'extension' => $objFile->extension,
								'icon'   => $objFile->icon,
                                'size'  => $this->getReadableSize($objFile->filesize, 1),
                                'filename' => $objFile->filename
							)
						);
						if ($objFile->width && $objFile->height)
						{
							$this->addImageToTemplate($objFieldTemplate, $arrImage, null, null);
						}
						$objFieldTemplate->value = '';
                        $arrElements[$objField->title] = $objFile->path;
					}
				}
			}

			// Handling von kompletten Links
			if ($objField->type=='hyperlink')
			{
				$linkData = array();
				$arrHyperlinkData = deserialize($objField->hyperlink_data);
				foreach ($arrHyperlinkData as $hyperlinkData)
				{
					$linkData[$hyperlinkData] =  $arrData[$objField->title . '--' . $hyperlinkData];
				}

				if ($linkData['url'])
				{
					$objHyperlink = new dmaHyperlinkHelper($linkData);
					$objFieldTemplate->value = $objHyperlink->generate();
					$arrElements[$objField->title] = $objHyperlink->generate();
					$arrTemplateData[$objField->title]['raw'] = $linkData;//deserialize($objField->hyperlink_data);
					$arrTemplateData[$objField->title]['value'] = $linkData['url'];
				}
			}

			// Handling von kompletten Bildern
			if ($objField->type=='image' && $objField->image_data)
			{
				$arrImage = array();
				$arrImageData = deserialize($objField->image_data);

				foreach ($arrImageData as $imageData)
				{
					$arrImage[$imageData] =  $arrData[$objField->title . '--' . $imageData];
				}

				$arrImagePrecompiled = $arrImage;
				// file-handling for Contao 3
				
				if (is_numeric($arrImage['singleSRC']))
				{
					$objFile = \FilesModel::findByPk($arrImage['singleSRC']);
					/*if ($objFile === null || !is_file(TL_ROOT . '/' . $objFile->path))
					{
						$arrImage['singleSRC'] = '';
					}*/
					$arrTemplateData[$objField->title]['raw'] = $arrImage;//['singleSRC'];
                    if ($objFile->meta)
                    {
                        $arrTemplateData[$objField->title]['meta'] = deserialize($objFile->meta);
                    }
					$arrTemplateData[$objField->title]['value'] = $objFile->path;
					$arrImagePrecompiled['singleSRC'] = $objFile->path;
				}

                elseif (\Validator::isUuid($arrImage['singleSRC']))
                {
                    $objFile = \FilesModel::findByUuid($arrImage['singleSRC']);
                    if ($objFile)
                    {
                        $arrTemplateData[$objField->title]['raw'] = $arrImage;//['singleSRC'];
                        if ($objFile->meta)
                        {
                            $arrTemplateData[$objField->title]['meta'] = deserialize($objFile->meta);
                        }
                        $arrTemplateData[$objField->title]['value'] = $objFile->path;
                        $arrImagePrecompiled['singleSRC'] = $objFile->path;
                    }
                }

                //$objFieldTemplate->class = $objFieldTemplate->class ? ($objFieldTemplate->class . " " . $arrImage['floating']) : $arrImage['floating'];

				$this->addImageToTemplate($objFieldTemplate, $arrImagePrecompiled);//7$objHyperlink = new dmaHyperlinkHelper($linkData);
				//$objFieldTemplate->value = $objHyperlink->generate();
				$arrImage['type'] = 'image';
				$objImage = new dmaContentImageHelper($arrImage);

				$arrElements[$objField->title] = $objImage->generate();


			}

			if ($arrTemplateData[$objField->title]['value'])
			{

                $objFieldTemplate->addData = $arrTemplateData[$objField->title];

				$strFields .= $objFieldTemplate->parse();
				$arrTemplateData[$objField->title]['parsed'] = $objFieldTemplate->parse();
				//$arrElements[$objField->title] = $objFieldTemplate->parse();
			}
		}

		$objTemplate = new FrontendTemplate(($objElement->template ? $objElement->template : $this->strTemplate));

		//Ausgabe in divs statt ul-li-Konstruktion ermöglichen
		if ($this->displayInDivs)
		{
			$objTemplate->divs = true;
		}

		$objArticle = $this->Database->prepare("SELECT title,alias FROM tl_article WHERE id=?")
		->limit(1)
		->execute($data->pid);


		$objTemplate->contentElement = true;
		$objTemplate->id = $data->id;
		$objTemplate->articleID = $data->pid;
		$objTemplate->articleTitle = $objArticle->title;
		$objTemplate->articleAlias = $objArticle->alias;
		$objTemplate->elements = $arrElements;
		$objTemplate->labels = $arrLabels;
		$objTemplate->classes = $arrClasses;
		$objTemplate->fields = $strFields;
		$objTemplate->data = $arrTemplateData;

		// Counter for Elements and Global
		if (!isset($GLOBALS['DMA_EG']['EL_COUNT']['all']))
		{
			$GLOBALS['DMA_EG']['EL_COUNT']['all'] = 0;
		}
		else {
			$GLOBALS['DMA_EG']['EL_COUNT']['all']++;
		}

		if (!isset($GLOBALS['DMA_EG']['EL_COUNT'][standardize($objElement->title)]))
		{
			$GLOBALS['DMA_EG']['EL_COUNT'][standardize($objElement->title)] = 0;
		}
		else {
			$GLOBALS['DMA_EG']['EL_COUNT'][standardize($objElement->title)]++;
		}
		$objTemplate->gobalCounter = $GLOBALS['DMA_EG']['EL_COUNT']['all'];
		$objTemplate->singleCounter = $GLOBALS['DMA_EG']['EL_COUNT'][standardize($objElement->title)];


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
		$objTemplate->class = trim(($objElement->content ? 'ce_' : 'mod_') . $data->type . ' ' . $data->cssID[1]);

		return $objTemplate->parse();

	}
	
	// we need to use an own method for the executePostActions-function
	// the table-fields are no real fields
	public function fixedAjaxRequest($strAction, \DataContainer $dc) {
		if ($strAction=='reloadPagetreeDMA' || $strAction=='reloadFiletreeDMA')
		{
			$intId = \Input::get('id');
			$strField = $strFieldName = \Input::post('name');
	
			// Handle the keys in "edit multiple" mode
			if (\Input::get('act') == 'editAll')
			{
				$intId = preg_replace('/.*_([0-9a-zA-Z]+)$/', '$1', $strField);
				$strField = preg_replace('/(.*)_[0-9a-zA-Z]+$/', '$1', $strField);
			}
	
			// Validate the request data
			if ($GLOBALS['TL_DCA'][$dc->table]['config']['dataContainer'] == 'File')
			{
				// The field does not exist
				if (!array_key_exists($strField, $GLOBALS['TL_CONFIG']))
				{
					$this->log('Field "' . $strField . '" does not exist in the global configuration', 'Ajax executePostActions()', TL_ERROR);
					header('HTTP/1.1 400 Bad Request');
					die('Bad Request');
				}
			}
			elseif ($this->Database->tableExists($dc->table))
			{
				// The field does not exist
				if (!$this->Database->fieldExists($strField, $dc->table))
				{
					$this->log('Field "' . $strField . '" does not exist in table "' . $dc->table . '"', 'Ajax executePostActions()', TL_ERROR);
					//header('HTTP/1.1 400 Bad Request');
					//die('Bad Request');
				}
	
				$objRow = $this->Database->prepare("SELECT * FROM " . $dc->table . " WHERE id=?")
										 ->execute($intId);
	
				// The record does not exist
				if ($objRow->numRows < 1)
				{
					$this->log('A record with the ID "' . $intId . '" does not exist in table "' . $dc->table . '"', 'Ajax executePostActions()', TL_ERROR);
					//header('HTTP/1.1 400 Bad Request');
					//die('Bad Request');
				}
			}
	
			$varValue = \Input::post('value');
			$strKey = ($strAction == 'reloadPagetreeDMA') ? 'pageTree' : 'fileTree';

			// Convert the selected values
			if ($varValue != '')
			{

                if (strstr($varValue, "\t"))
                {
                    // Contao 3.1
				    $varValue = trimsplit("\t", $varValue);
                }
                else
                {
                    // Contao 3.0
                    $varValue = trimsplit(',', $varValue);
                }
				// Automatically add resources to the DBAFS
				if ($strKey == 'fileTree')
				{
					foreach ($varValue as $k=>$v)
					{
						$varValue[$k] = \Dbafs::addResource($v)->id;
					}
				}
	
				$varValue = serialize($varValue);
			}
	
			// Set the new value
			if ($GLOBALS['TL_DCA'][$dc->table]['config']['dataContainer'] == 'File')
			{
				$GLOBALS['TL_CONFIG'][$strField] = $varValue;
				$arrAttribs['activeRecord'] = null;
			}
			elseif ($this->Database->tableExists($dc->table))
			{
				$objRow->$strField = $varValue;
				$arrAttribs['activeRecord'] = $objRow;
			}
	
			$arrAttribs['id'] = $strFieldName;
			$arrAttribs['name'] = $strFieldName;
			$arrAttribs['value'] = $varValue;
			$arrAttribs['strTable'] = $dc->table;
			$arrAttribs['strField'] = $strField;
	
			$objWidget = new $GLOBALS['BE_FFL'][$strKey]($arrAttribs);
			echo $objWidget->generate();
		}
	}
}

class dmaHyperlinkHelper extends ContentHyperlink
{
	public function __construct($arrData)
	{
		$this->type = 'hyperlink';
		$this->url = $arrData['url'];
		$this->target = $arrData['target'];
		$this->linkTitle = $arrData['linkTitle'];
		$this->rel = $arrData['rel'];
		$this->embed = $arrData['embed'];
	}
}


class dmaContentImageHelper extends ContentImage
{
	public function __construct($arrData)
	{
		$this->type = 'image';
		$this->singleSRC = $arrData['singleSRC'];
		$this->arrData = $arrData;
	}
}

?>
