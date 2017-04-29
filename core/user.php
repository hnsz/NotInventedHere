<?php

class User implements IUser
{


	private $nick;
	private $uId;
	private $session;


	function __construct (Session $session) {
		$this->session = $session;
	}


	public function nick () {
		return $this->session->get ('nick');
	}


	public function uId () {
		return $this->session->get ('uId');
	}


}
