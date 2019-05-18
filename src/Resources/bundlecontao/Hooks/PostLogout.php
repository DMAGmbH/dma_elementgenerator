<?php
/*
Der "postLogout"-Hook wird nach der Abmeldung eines Frontend-Mitglieds oder Backend-Benutzers
ausgeführt. Er übergibt das Benutzerobjekt als Argument und erwartet keinen Rückgabewert.
*/
namespace Dma\Dma_elementgenerator\Hooks;

class PostLogout extends \Widget
{
    public function postLogout(User $objUser)
    {
    }
}
