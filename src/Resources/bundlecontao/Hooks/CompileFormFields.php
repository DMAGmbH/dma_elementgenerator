<?php
/*
Der "compileFormFields"-Hook wird vor der Ausgabe eines Formulars ausgeführt.
Er übergibt ein Array mit FormFieldModel-Objekten, die Form-Id und das
Formular-Objekt als Argument und erwartet das Array mit FormFieldModel-Objekten
als Rückgabewert. Hier können Formularfelder dynamisch angepasst werden,
bevor sie ausgegeben werden.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class CompileFormFields extends \Widget
{
    public function compileFormFields($arrFields, $formId, $this)
    {
        if ($formId == 'my_form_id')
        {
            foreach ($arrFields AS $objFields)
            {
                if ($objFields->name == 'my_form_field_1')
                {
                }
            }
        }

        return $arrFields;
    }
}
