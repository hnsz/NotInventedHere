<?php

interface IUser
{


	function __construct (Session $session);

	public function nick ();

	public function uId ();
}
