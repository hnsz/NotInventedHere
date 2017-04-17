<?php
interface IAccessControlServer 
{	
	public function hasAccess(IUser $user, Route $route);
}