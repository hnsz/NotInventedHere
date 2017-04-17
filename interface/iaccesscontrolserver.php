<?php
interface IAccessControlServer 
{	
	public function hasAccess(IUser $user, IRoute $route);
}