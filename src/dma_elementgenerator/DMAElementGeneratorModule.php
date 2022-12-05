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
 * Class DMAElementGeneratorModule
 * 
 * The dynamic frontend module 
 *
 * @copyright  Dialog- und Medienagentur der ACS mbH 2010-2011
 * @author     Carsten Kollmeier <kollmeier@dialog-medien.com>
 * @author 	   Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 */

class DMAElementGeneratorModule extends \Module
{
	protected $strTemplate = 'mod_dma_eg';

	protected function compile()
	{
		$this->Import('DMA\\DMAElementGenerator','DMAElementGenerator');
		$this->Template->content = $this->DMAElementGenerator->generate($this);
	}
}

?>
