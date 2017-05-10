<?php

interface IAccessControlServer
{
	/**
	 * 
	 * @param PDO $pdo
	 */
	function __construct(PDO $pdo);
	/**
	 * hasAccess
	 * does a user have access to a resource identified by a uri
	 * @param $userId
	 * @param $uri
	 */
	public function hasAccess ($userId, $uri);
	/**
	 * getWhitelist
	 * a list of access rules for a user
	 * @param $userId
	 */
	public function getWhitelist($userId);	
}
