<?php
/*
Der "activateRecipient"-Hook wird bei der Aktivierung eines neuen
Newsletter-Abonnenten ausgeführt. Er übergibt die E-Mail-Adresse,
die IDs der Empfänger und die IDs der Verteiler als Argument und erwartet
keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class ActivateRecipient extends \Widget
{
    public function activateRecipient($strEmail, $arrRecipients, $arrChannels)
    {
    }
}
