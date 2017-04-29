<?php

class UserFactory
{


	/**
	 * 
	 * @param Session $s
	 * @return \Guest|\Member|\Admin
	 */
	public function makeUser (Session $s) {

		$uId = $s->get ('uId');

		if ($uId == "Guest") {
			return new Guest ($s);
		}
		else if ($uId == "Member") {
			return new Member ($s);
		}
		else if ($uId == "Admin") {
			return new Admin ($s);
		}
	}


}
