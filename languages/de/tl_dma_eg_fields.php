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
    $GLOBALS['TL_LANG']['tl_dma_eg_fields']['subpalette_legend'] = 'Anzeige in Sub-Palette';
 
  
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type'] = array('Feldtyp','Feldtyp auswählen');
    $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_disabled'] = array('Feldtyp','Feldtyp können nachträglich leider nicht mehr geändert werden. Um den Feldtypen zu ändern löschen Sie bitte dieses Feld und fügen ein neues hinzu.');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['type_select'] = array(
                                                              'legend' => 'Legende',
                                                              'text' => 'Textfeld',
                                                              'textarea' => 'Textarea',
                                                              'select' => 'Auswahlliste',
                                                              'checkbox' => 'Checkboxen',
                                                              'radio' => 'Radiobuttons',
                                                              'pageTree' => 'Seitenauswahl',
                                                              'fileTree' => 'Dateiauswahl',
                                                              'pagePicker' => 'Seitenpicker',
                                                              'listWizard' => 'Liste',
                                                              'tableWizard' => 'Tabelle',
                                                              'hyperlink' => 'Hyperlink',
                                                              'image' => 'Bild'
                                                            );
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['label'] = array('Beschriftung','Beschriftung des Feldes, erscheint im Formular');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['hidden'] = array('Den nachfolgenden Block initial ausblenden','Soll der nachfolgende Block zunächst ausgeblendet werden?');
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
$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_blank_option'] = array('leere Option integrieren','Soll für dieses Selectmenü eine leere Option angeboten werden?');
$GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_chosen'] = array('Select durchsuchbar machen','Das Selectmenü kann mit Hilfe von Chosen durchsuchbar gemacht werden.');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['exclude'] = array('Ausgabe unterdrücken','Feld nur Administratoren anzeigen');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_allow_html'] = array('HTML erlauben','HTML-Ausdrücke nicht aus der Eingabe filtern');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_unique'] = array('Einmaliger Wert','Der Wert dieses Feldes darf nur einmal vergeben werden');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['eval_do_not_copy'] = array('Nicht kopieren','Werte dieses Feldes werden beim Kopieren des Elements ignoriert');
  $GLOBALS['TL_LANG']['tl_dma_eg_fields']['class'] = array('CSS-Klasse','Geben Sie eine oder mehrere durch Leerzeichen getrennte Klassen an');
$GLOBALS['TL_LANG']['tl_dma_eg_fields']['useCheckboxCondition'] = array('Checkbox-abhängig einblenden','Die Anzeige dieses Elements kann von einer Checkbox abhängig gemacht werden.');
$GLOBALS['TL_LANG']['tl_dma_eg_fields']['subpaletteSelector'] = array('Abhängige Checkbox','Checkbox, von der die Anzeige dieses Elements abhängt.');
$GLOBALS['TL_LANG']['tl_dma_eg_fields']['renderHiddenData'] = array('Inhalte immer rendern','Sollen die Inhalte dieses Feldes im Template zur Verfügung stehen, auch wenn das Feld im Backend ausgeblendet ist?');

  $GLOBALS['TL_LANG']['tl_dma_eg_fiels']['hyperlink_data'] = array('Hyperlink-Daten','Welche Daten sollen für den Hyperlink abgefragt werden?');
	$GLOBALS['TL_LANG']['tl_dma_eg_fields']['hyperlink_data_options'] = array(
		'url' => 'Link-Adresse',
		'target' => 'In neuem Fenster öffnen',
		'linkTitle' => 'Link-Text',
		'rel' => 'Lightbox',
		'embed' => 'Den Link einbetten'
	);

  $GLOBALS['TL_LANG']['tl_dma_eg_fiels']['image_data'] = array('Bild-Daten','Welche Daten sollen für das Bild abgefragt werden?');
	$GLOBALS['TL_LANG']['tl_dma_eg_fields']['image_data_options'] = array(
		'singleSRC' => 'Quelldatei',
		'alt' => 'Alternativer Text',
		'title' => 'Titel',
		'size' => 'Bildbreite und Bildhöhe',
		'imagemargin' => 'Bildabstand',
		'imageUrl' => 'Bildlink-Adresse',
		'fullsize' => 'Großansicht/Neues Fenster',
		'caption' => 'Bildunterschrift',
		'floating' => 'Bildausrichtung' 
	);

$GLOBALS['TL_LANG']['tl_dma_eg']['optionsType'] = array('Optionen-Art','Optionen können manuell eingegeben werden, oder aus Datanbank generiert werden.');
$GLOBALS['TL_LANG']['tl_dma_eg']['optDbTable'] = array('Datenbank-Tabelle','Welche Tabelle innerhalb der Datenbank soll für die Generierung der Optionen genutzt werden?');
$GLOBALS['TL_LANG']['tl_dma_eg']['optDbQuery'] = array('Optionale WHERE-Query','Mit einer optionalen WHERE-Query kann das Select-Menü eingeschränkt werden.');
$GLOBALS['TL_LANG']['tl_dma_eg']['optDbTitle'] = array('Anzuzeigender Name','Welches Feld soll dem Benutzer in der Auswahl angezeigt werden? Standardmäßig wird das ID-Feld verwendet.');

  

?>
