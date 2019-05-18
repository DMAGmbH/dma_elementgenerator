<?php
// namespace Dma\Model;
/**
 * Created By Conversoft Generator
 * https://conversoft.rocks
 * https://github.com/conversoft
 * @author Thomas Lonnemann <thomas@conversoft.rocks>
**/
class Dmadma_elementgeneratorModel extends \Model
{
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_dmadma_elementgenerator';

	/**
	 * Magic Method for Attribute Mutators
	 * 
	 */
	public function __call($function, $arguments){

		// Laravel Analog MethodNaming
		if (method_exists($this, 'get'.($function)."Attribute")){
			$function = 'get'.($function)."Attribute";
   			return $this->$function($arguments);
   		}

   		return $this->$function;
    }

    public function getData()
    {
    	return $this->arrData;
    }
}
