<?php

interface IUser
{
	const USERTYPE_ADMIN = 'A';
	const USERTYPE_MEMBER = 'M';
	const USERTYPE_GUEST = 'G';

	function __construct (Session $session);

	public function nick ();

	public function uId ();
}
