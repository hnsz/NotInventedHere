<?php
/**
 * Represents a abstract user .
*/
abstract class AUser implements IUser
{
	 /**
	 * @var string 
	 * @var int
	 * @var Session
	 */
	private $nick;
	private $uId;
	private $session;

	/**
	 * 
	 * @param Session $session
	 */
	function __construct (Session $session) {
		$this->session = $session;
	}

	/**
	 * 
	 * @return string
	 */
	public function nick () {
		return $this->session->get ('nick');
	}

	/**
	 * 
	 * @return int
	 */
	public function uId () {
		return $this->session->get ('uId');
	}
}
