<?php

/*
 * Copyright (C) 2017 hans-rudolf.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */

/**
 * Summary.
 * Description of SecurityAgent
 *
 * @author HNSZ
 * @param type $name Description
 * @return type Description
 * 
 */
class SecurityAgent
{
	private $accessControlServer;
	
	function __construct(IAccessControlServer $acs) {
		$this->accessControlServer = $acs;
	}
	public function hasAccess(IUser $user, $uri) {
		
	}
	public function authenticate($email, $password) {
	}
	public function switchToUser($userData, IUser $currentUser) {
		// makeuserfrom authenticationdata
		//  let factory do the elsifs
		//  
		// copy  session and (filtered) sessiondata or just reset sessiondata\
		//  refresh session
		// destroy old user, maybe store stuff that needs storing
		//
		
		// This must be the hub/gateway where usertypes switch
		// but only one session 
		// userfactory already inserts a session
		// empty user, two user objects holding the same session object
		// Session vs $_SESSION
		// make new user here i dont even
	}
}
