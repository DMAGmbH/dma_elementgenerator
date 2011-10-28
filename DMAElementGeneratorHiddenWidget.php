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

/**
 * Class DMAElementGeneratorHiddenWidget
 * 
 * Just a dummy Widget to store the element data  
 *
 * @copyright  Dialog- und Medienagentur der ACS mbH 2010
 * @author     Carsten Kollmeier <kollmeier@dialog-medien.com>
 * @package    DMAElementGenerator
 */

class DMAElementGeneratorHiddenWidget extends Widget
{

	protected $blnSubmitInput = true;

	protected $strTemplate = 'be_dma_eg_hidden';


	public function __construct($arrAttributes=false)
	{	
		parent::__construct($arrAttributes);
		$this->decodeEntities = false;	
	}
	
	public function generate()
	{
		return '<!-- DATA -->';
	}
}

?>
