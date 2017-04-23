<?php
class User implements IUser
{
    private $nick;
    private $uId;
    private $session;

    function __construct(Session $s)  {
        $this->session = $s;
    }
    public function getNick() {
        return $this->session->get('nick');
    }
    public function getUId() {
        return $this->session->get('uId');
    }
}