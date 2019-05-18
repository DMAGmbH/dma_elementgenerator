<?php
/*
// TODO DESC
 */
namespace Dma\Dma_elementgenerator\Hooks;




class CsModifyTemplate
{

    
    public function csModifyTemplate ($objTemplate, $data)
    {
        $objTemplate->body = "HIER STEHT DER TEXT";
        return $objTemplate;
    }
}
