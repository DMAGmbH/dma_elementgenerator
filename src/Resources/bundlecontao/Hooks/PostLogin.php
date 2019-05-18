<?php
/*
Der "postLogin"-Hook wird nach der Anmeldung eines Frontend-Mitglieds oder Backend-Benutzers
ausgeführt. Er übergibt das Benutzerobjekt als Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class PostLogin extends \Widget
{
    public function postLogin(\User $objUser)
    {
    }
}
