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
 * @author     Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 * @license    LGPL
 * @filesource
 */

// Define callbacks	
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('DMAElementGeneratorCallbacks', 'content_onload');


// Fields


$GLOBALS['TL_DCA']['tl_content']['fields']['dmaElementTpl'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['dmaElementTpl'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_dma_elementgenerator_content', 'getDmaElementTemplates'),
    'eval'                    => array('includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'),
    'sql'                     => "varchar(64) NOT NULL default ''"
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
