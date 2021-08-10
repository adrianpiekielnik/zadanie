<?php

class User
{
    private static $aUsers = [
        0 => 'Serwisant',
        1 => 'Klient'
    ];

    private $iCurrentUser;

    public function setCurrentUser(int $iId)
    {
        $this->iCurrentUser = $iId;
    }

    public function getCurrentUser()
    {
        return self::$aUsers[$this->iCurrentUser];
    }

    public function getCurrentUserId()
    {
        return $this->iCurrentUser;
    }

    public function getUsers()
    {
        return self::$aUsers;
    }
}
