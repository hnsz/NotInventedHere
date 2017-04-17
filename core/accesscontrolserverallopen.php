<?php
class AccessControlServerAllOpen implements IAccessControlServer
{
	public function hasAccess(IUser $user, Route $route)
	{
		return true;
	}
}