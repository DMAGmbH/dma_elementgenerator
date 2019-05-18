<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

// Define callbacks	
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('DMAElementGeneratorCallbacks', 'content_onload');

if (TL_MODE == 'BE' && version_compare(VERSION . BUILD, '3.10', '>=') && version_compare(VERSION . BUILD, '3.20', '<')) {
    $GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dma_elementgenerator/html/DMA-uncompressed.js';
}

// Fields


$GLOBALS['TL_DCA']['tl_content']['fields']['dmaElementTpl'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['dmaElementTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_dma_elementgenerator_content', 'getDmaElementTemplates'),
    'eval' => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'),
    'sql' => "varchar(64) NOT NULL default ''"
);

/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @author Janosch Oltmanns
 */
class tl_dma_elementgenerator_content extends Backend
{

    /**
     * Import the back end user object
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }

    /**
     * Return all dma element templates as array
     *
     * @return array
     */
    public function getDmaElementTemplates()
    {
        return $this->getTemplateGroup('dma_eg_');
    }
}
