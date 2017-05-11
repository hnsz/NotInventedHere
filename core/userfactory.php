<?php

class UserFactory
{


	/**
	 * 
	 * @param Session $session
	 * @return \Guest|\Member|\Admin
	 */
	public function makeUserFromSession (Session $session) {

		$user =  $this->instantiateUser($session->get ('usertype'));
		

	}
	public function makeUserFromAuthenticationData () {
		
	}
	/**
	 * 
	 * @param type $usertype
	 * @return \Guest|\Member|\Admin
	 * @throws Exception
	 */
	private function instantiateUser($usertype, $session) {
		// figure out sessions first
		if ($usertype === IUser::USERTYPE_ADMIN) {
			return new Admin ($session);
		}
		else
		if ($usertype === IUser::USERTYPE_MEMBER) {
			return new Member ($s);
		}
		else
		if ($usertype === IUser::USERTYPE_GUEST) {
			return new Guest ($s);
		}
		else
		{
			throw new Exception("Usertype '{$usertype}' doesn't exist.");
		}
	}
	private function refreshSession (ISession $session, $sessionDataToCopy ) {
		
	}
	public function switchUser(IUser $currentUser, $dataForSwitchToUser) {
		
	}

}
