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

  
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['edit'] = array('Feld bearbeiten','Feld ID %s bearbeiten');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['editheader'] = array('Element bearbeiten','Die Elementeinstellungen bearbeiten');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['copy'] = array('Feld duplizieren','Feld ID %s duplizieren');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['delete'] = array('Feld löschen','Feld ID %s löschen');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['cut'] = array('Feld verschieben','Feld ID %s verschieben');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['show'] = array('Details anzeigen','Details des Feldes ID %s anzeigen');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['new'] = array('Neues Feld','Neues Feld anlegen');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['pasteafter'] = array('Einfügen nach','Nach Feld ID %s einfügen');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['pastenew'] = array('Neues Feld oben erstellen','Neues Feld nach dem Feld ID %s erstellen');
 
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_legend'] = 'Feldtyp';
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['input_legend'] = 'Eingabeparameter';
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['style_legend'] = 'Ausgabeparameter';
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['expert_legend'] = 'Experten-Einstellungen';
 
  
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type'] = array('Feldtyp','Feldtyp auswählen');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_select'] = array(
                                                              'legend' => 'Legende',
                                                              'text' => 'Textfeld',
                                                              'textarea' => 'Textarea',
                                                              'select' => 'Auswahlliste',
                                                              'checkbox' => 'Checkboxen',
                                                              'radio' => 'Radiobuttons',
                                                              'pageTree' => 'Seitenauswahl',
                                                              'fileTree' => 'Dateiauswahl'
                                                            );
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['label'] = array('Beschriftung','Beschriftung des Feldes, erscheint im Formular');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['title'] = array('Feldname','Eindeutige Benennung in der Datenbank');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['explanation'] = array('Beschreibung','Beschreibung, erscheint unter dem Feld');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['default_value'] = array('Vorgabe','Vorgabewert des Feldes');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_mandatory'] = array('Pflichtfeld','Das Feld muss ausgefüllt werden');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rte'] = array('Richtexteditor verwenden','Erlaubt die Nutzung des Richtexteditors');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rgxp'] = array('Eingabeprüfung','Die Eingaben anhand eines regulären Ausdrucks prüfen.');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rgxp_select'] = array(
                                                                  'digit' => "Numerische Zeichen",
                                                                  'alpha' => "Alphabetische Zeichen",
                                                                  'alnum' => "Alphanumerische Zeichen",
                                                                  'prcnt' => "Prozentwerte (Zahlen von 0-100)",
                                                                  'extnd' => "Erweiterte alphanumerische Zeichen",
                                                                  'date' => "Datum",
                                                                  'time' => "Zeit",
                                                                  'datim' => "Datum und Zeit",
                                                                  'email' => "E-Mail-Adresse",
                                                                  'phone' => "Telefonnummer",
                                                                  'url' => "URL Format"
                                                                );
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_minlength'] = array('Mindestlänge','Die Eingabe muss mindestens so viele Zeichen haben');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_maxlength'] = array('Höchstlänge','Die Eingabe darf maximal so viele Zeichen haben');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_tl_class'] = array('Darstellungsoptionen','Diese Zuweisungen beinflussen die Darstellung des Feldes im Formular');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_tl_class_options'] = array(
                                                                        'w50' => 'Zweispaltige Darstellung',
                                                                        'clr' => 'In neuer Zeile',
                                                                        'long' => 'Lange Darstellung',
                                                                        'm12' => 'Zusätzlicher Rand (für Checkboxen)'
                                                                      );
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_rows'] = array('Zeilen','Anzahl Zeilen des Eingabefeldes');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_cols'] = array('Spalten','Anzahl Spalten des Eingabefeldes');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['options'] = array('Auswahlmöglichkeiten','Bitte Bezeichnung und den Wert der Auswahl eingeben');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_extensions'] = array('Dateiendungen','Kommagetrennte Liste der auswählbaren Dateiendungen');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_field_type'] = array('Art der Auswahl','Soll nur eine Einzelne oder mehrere Dateien zur Auswahl stehen?');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_path'] = array('Pfad','Dateien aus diesem Ordner können ausgewählt werden');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['exclude'] = array('Ausgabe unterdrücken','Feld nur Administratoren anzeigen');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_allow_html'] = array('HTML erlauben','HTML-Ausdrücke nicht aus der Eingabe filtern');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_unique'] = array('Einmaliger Wert','Der Wert dieses Feldes darf nur einmal vergeben werden');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_do_not_copy'] = array('Nicht kopieren','Werte dieses Feldes werden beim Kopieren des Elements ignoriert');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['class'] = array('CSS-Klasse','Geben Sie eine oder mehrere durch Leerzeichen getrennte Klassen an');
  
  $GLOBALS['TL_LANG']['tl_dma_eg_fiels']['hyperlink_data'] = array('Hyperlink-Daten','Welche Daten sollen für den Hyperlink abgefragt werden?');
	$GLOBALS['TL_LANG']['tl_dma_eg_fields']['hyperlink_data_options'] = array(
		'url' => 'Link-Adresse',
		'target' => 'In neuem Fenster öffnen',
		'linkTitle' => 'Link-Text',
		'rel' => 'Lightbox',
		'embed' => 'Den Link einbetten'
	);

  

?>
