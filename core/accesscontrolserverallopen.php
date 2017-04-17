<?php
class AccessControlServerAllOpen implements IAccessControlServer
{
	function __construct()
	{
		
		
	}
	public function hasAccess(IUser $user, Route $route)
	{
		return true;
	}
}