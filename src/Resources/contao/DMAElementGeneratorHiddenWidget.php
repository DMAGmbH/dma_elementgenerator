<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace DMA;

/*
 * Class DMAElementGeneratorHiddenWidget
 * 
 * Just a dummy Widget to store the element data  
 *
 * @copyright  Dialog- und Medienagentur der ACS mbH 2010
 * @author     Carsten Kollmeier <kollmeier@dialog-medien.com>
 * @package    DMAElementGenerator
 */

class DMAElementGeneratorHiddenWidget extends \Widget
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