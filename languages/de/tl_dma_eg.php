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

  
  $GLOBALS['TL_LANG']['tl_dma_eg']['title'] = array('Bezeichnung','Bezeichnung des Elementes');
  $GLOBALS['TL_LANG']['tl_dma_eg']['category'] = array('Kategorie','Unter welcher Überschrift/Kategorie soll das Element in der Modul-/Inhaltselementliste geführt werden? (Inhaltselemente: texts, links, media, files, includes; Module: navigationMenu, user, application, miscellaneous');
  $GLOBALS['TL_LANG']['tl_dma_eg']['template'] = array('Template','Ausgabetemplate');
$GLOBALS['TL_LANG']['tl_dma_eg']['be_template'] = array('Backend-Template','Manchmal kann es sinnvoll sein im Backend ein anderes Template zu verwenden. Dieses muss im html5-Format vorliegen und muss im Templates-Ordner liegen.');
  $GLOBALS['TL_LANG']['tl_dma_eg']['module'] = array('Als Modul bereitstellen','Soll das Element als Modul zur Verfügung stehen?');
  $GLOBALS['TL_LANG']['tl_dma_eg']['content'] = array('Als Inhaltselement bereitstellen','Soll das Element als Inhaltselement zur Verfügung stehen?');
  $GLOBALS['TL_LANG']['tl_dma_eg']['class'] = array('zusätzliche Klasse für dieses Element','mit dieser Klasse kann die standardmäßig gesetetzte überschrieben werden');

  $GLOBALS['TL_LANG']['tl_dma_eg']['without_label'] = array('Feldausgabe ohne Label','Sollen die Felder ohne Label ausgegeben werden?');
  $GLOBALS['TL_LANG']['tl_dma_eg']['display_in_divs'] = array('Felder in divs ausgeben','Standardmäßig werden die Inhalte als ul ausgegeben. Alternativ ist auch eine Ausgabe in divs möglich.');
  
  
  $GLOBALS['TL_LANG']['tl_dma_eg']['new'] = array('Neues Element','Ein neues Element anlegen');
    
  $GLOBALS['TL_LANG']['tl_dma_eg']['edit'] = array('Element bearbeiten','Element ID %s bearbeiten');
  $GLOBALS['TL_LANG']['tl_dma_eg']['editheader'] = array('Elementeinstellungen bearbeiten','Elementeinstellungen ID %s bearbeiten');
  $GLOBALS['TL_LANG']['tl_dma_eg']['copy'] = array('Element duplizieren','Element ID %s duplizieren');
  $GLOBALS['TL_LANG']['tl_dma_eg']['delete'] = array('Element löschen','Element ID %s löschen');
  $GLOBALS['TL_LANG']['tl_dma_eg']['deleteConfirm'] = 'Soll das Element ID %s wirklich gelöscht werden? Vorsicht: Es werden auch alle darauf basierenden Inhaltselemente und Module gelöscht!';
  $GLOBALS['TL_LANG']['tl_dma_eg']['show'] = array('Details anzeigen','Details des Elementes ID %s anzeigen');
  
  $GLOBALS['TL_LANG']['tl_dma_eg']['tstamp'] = array('Letzte Änderung','');
  
  // LEGENDS
  $GLOBALS['TL_LANG']['tl_dma_eg']['expert_legend'] = 'Experteneinstellungen';
  $GLOBALS['TL_LANG']['tl_dma_eg']['title_legend'] = 'Name und Kategorie';
  $GLOBALS['TL_LANG']['tl_dma_eg']['settings_legend'] = 'Einstellungen';

  // LABEL
  $GLOBALS['TL_LANG']['tl_dma_eg']['labelCategories']['labelContentelement'] = 'Inhaltselement';
  $GLOBALS['TL_LANG']['tl_dma_eg']['labelCategories']['labelFrontendmodule'] = 'Frontendmodul';
  
?>
