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

  
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['edit'] = array('Edit field','Edit Field ID %s');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['editheader'] = array('Edit element','Change the element settings');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['copy'] = array('Duplicate field','Duplicate field ID %s');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['delete'] = array('Delete field','Delete Field ID %s');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['cut'] = array('Move field','Move field ID %s');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['show'] = array('Show details','Show details of field ID %s');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['new'] = array('Create field','Create field');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['pasteafter'] = array('Paste after','Paste after field ID %s');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['pastenew'] = array('Create field at top','Create field after field ID %s');
 
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_legend'] = 'Type';
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['input_legend'] = 'Input options';
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['style_legend'] = 'Output options';
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['expert_legend'] = 'Expert settings';
 
  
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type'] = array('Field type','Choose field type');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_select'] = array(
                                                              'legend' => 'Legend',
                                                              'text' => 'Textfield',
                                                              'textarea' => 'Textarea',
                                                              'select' => 'Selectmenu',
                                                              'checkbox' => 'Checkboxes',
                                                              'radio' => 'Radiobuttons',
                                                              'pageTree' => 'Page selection',
                                                              'fileTree' => 'File selection'
                                                            );
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['label'] = array('Label','Label of the field, shown in formular');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['title'] = array('Field name','Unique name for database');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['explanation'] = array('Description','Description as shown under the field');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['default_value'] = array('Default value','Default value of the field');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_mandatory'] = array('Mandatory','This field has to be filled');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rte'] = array('Richtexteditor','Make use of the Richtexteditor');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rgxp'] = array('Input validation','Validate the input against a regular expression.');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rgxp_select'] = array(
                                                                  'digit' => "Numeric characters",
                                                                  'alpha' => "Alphabetic characters",
                                                                  'alnum' => "Alphanumeric characters",
                                                                  'prcnt' => "Percent (Numbers from 0 to 100)",
                                                                  'extnd' => "Extented alphanumeric characters",
                                                                  'date' => "Date",
                                                                  'time' => "Time",
                                                                  'datim' => "Date and Time",
                                                                  'email' => "E-mail adress",
                                                                  'phone' => "Phone number",
                                                                  'url' => "URL format"
                                                                );
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_minlength'] = array('Minimum length','The input has to have at least these characters');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_maxlength'] = array('Maximum length','The input has to have maximal these characters');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_tl_class'] = array('Classes','Stylesheet classes');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_tl_class_options'] = array(
                                                                        'w50' => 'Two columns',
                                                                        'clr' => 'In new line',
                                                                        'long' => 'Field spans two columns',
                                                                        'm12' => 'Additional margin (for checkboxes)'
                                                                      );
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rows'] = array('Rows','Number of rows of the field');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_cols'] = array('Columns','Number of columns of the field');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['options'] = array('Options','Label and value');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_extensions'] = array('File extensions','Commaseperated list of allowed extensions');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_field_type'] = array('Selection type','Just on file or multiple files?');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_path'] = array('Path','Path of files');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['exclude'] = array('Exclude field','Field will oly be shown to administrators');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_allow_html'] = array('Allow HTML','Do not filter HTML Tags');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_unique'] = array('Unique value','The value must be unique');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_do_not_copy'] = array('Do not copy','Ignore value of this field while copying element');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['class'] = array('CSS class','Geben Sie eine oder mehrere durch Leerzeichen getrennte Klassen an');

$GLOBALS['TL_LANG']['tl_dma_eg_fields']['showLabelInFrontend'] = array('Show label in frontend', 'Show label instead of value in frontend');

?>
