<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author hans-rudolf
 */
class Admin extends User implements IUser
{


	function __construct (Session $session) {
		parent::__construct ($session);
	}


	function getNick () {
		return "Admin";
	}


}
