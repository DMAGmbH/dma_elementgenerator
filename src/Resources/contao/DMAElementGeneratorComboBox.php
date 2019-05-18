<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace DMA;

/**
 * Class DMAElementGeneratorComboBox
 *
 * Combobox Widget
 *
 * @copyright  DMA GmbH
 * @author     Carsten Kollmeier
 * @author     Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 */

class DMAElementGeneratorComboBox extends \SelectMenu
{
	/**
	* Overide method isValidOption
	**/
	protected function isValidOption($varValue) {
		return true;
	}


	/**
	 * Generate the widget and return it as string
	 * @return string
	 */
	public function generate()
	{
		$this->chosen = true;
		return parent::generate();
	}
}
