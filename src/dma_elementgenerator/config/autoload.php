<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package Dma_elementgenerator
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    'DMAElementGenerator' => 'system/modules/dma_elementgenerator/DMAElementGenerator.php',
    'DMAElementGeneratorCallbacks' => 'system/modules/dma_elementgenerator/DMAElementGeneratorCallbacks.php',
    'DMAElementGeneratorContent' => 'system/modules/dma_elementgenerator/DMAElementGeneratorContent.php',
    'DMAElementGeneratorHiddenWidget' => 'system/modules/dma_elementgenerator/DMAElementGeneratorHiddenWidget.php',
    'DMAElementGeneratorComboBox' => 'system/modules/dma_elementgenerator/DMAElementGeneratorComboBox.php',
    'DMAElementGeneratorModule' => 'system/modules/dma_elementgenerator/DMAElementGeneratorModule.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'be_dma_eg_hidden' => 'system/modules/dma_elementgenerator/templates',
    'ce_dma_eg' => 'system/modules/dma_elementgenerator/templates',
    'dma_eg_default' => 'system/modules/dma_elementgenerator/templates',
    'dma_eg_debug' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_default' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_h1' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_h2' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_h3' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_downloads' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_gallery' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_table' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_sortedlist' => 'system/modules/dma_elementgenerator/templates',
    'dma_egfield_unsortedlist' => 'system/modules/dma_elementgenerator/templates',
    'mod_dma_eg' => 'system/modules/dma_elementgenerator/templates',
));
