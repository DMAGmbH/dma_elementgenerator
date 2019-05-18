<?php
namespace Dma\Dma_elementgenerator\Hooks;

class ParseWidget extends \Widget
{
    public function parseWidget($varValue, $objFormField)
    {
        if ($objFormField->name == 'aaa') {
            return '<input type="hidden" name="'.$objFormField->name.'" value="'.'bbb'.'" >';
        }
        
        return $varValue;
    }
    
    public function generate()
    {
    }
}
