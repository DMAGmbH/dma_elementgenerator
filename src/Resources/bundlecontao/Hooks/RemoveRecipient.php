<?php
/*
Der "removeRecipient"-Hook wird bei der Kündigung eines Newsletter-Abonnements (Unsubscribe) ausgeführt.
Er übergibt die E-Mail-Adresse und die IDs der Verteiler als Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class RemoveRecipient extends \Widget
{
    public function removeRecipient($strEmail, $arrChannels)
    {
    }
}
