<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace DMA;


class DmaEgFieldsModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_dma_eg_fields';

	/**
	 * Find published fields by their parent ID filtered by type=legend
	 *
	 * @param mixed $intPid      The numeric PID
	 * @param array $arrOptions An optional options array
	 *
	 * @return static The DmaEgFieldsModel or null if there are no fields
	 */

	public static function findAllNotLegendsByPid($intPid, array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.pid=? AND $t.type!=?");

		$arrValues = array
		(
			$intPid,
			'lengend'
		);

		$arrOptions['order'] = "sorting";

		if (!BE_USER_LOGGED_IN)
		{

		}

		return static::findBy($arrColumns, $arrValues, $arrOptions);
	}

}
