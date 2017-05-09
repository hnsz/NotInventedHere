<?php

interface IAccessControlServer
{
	/**
	 * 
	 * @param PDO $dbhandle
	 */
	function __construct(PDO $dbhandle);
	/**
	 * hasAccess
	 * does a user have access to a specific route
	 * @param IUser $user
	 * @param Route $route
	 */
	public function hasAccess ($userId, $uri);
	/**
	 * getAccessRules
	 * a list of access rules for a user
	 * @param IUser $user
	 */
	public function getAccessRules($userId);	
}
