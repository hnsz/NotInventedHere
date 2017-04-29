<?php

class Session implements ISession
{
	function start () {
		session_start ();
	}
	public function get ($key) {
		return $_SESSION[$key];
	}
	public function set ($key, $value) {
		$_SESSION[$key] = $value;
	}
	public function getAllData () {
		return $_SESSION;
	}
	function __destruct () {
		session_write_close ();
	}
}
