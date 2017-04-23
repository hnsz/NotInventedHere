<?php
class Session 
{
    function __construct() {
        session_start();
    }
    public function get($key)
    {
        return $_SESSION[$key];
    }
    public function getData() {
        return $_SESSION;
    }
}