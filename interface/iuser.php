<?php
interface IUser {
    function __construct(Session $s);
    public function getUId();
    public function getNick();  
}