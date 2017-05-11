<?php
/**
 * Adapter for $_SESSION
 * 
 * 
 */

class Session implements ISession
{
	private $data = [];
	private $expirationDate;
	
	function start () {
		session_start ();

		$this->data = array_replace_recursive($_SESSION, $this->data);
		$_SESSION=null;
	}
	/**
	 * 
	 * @param string $key
	 * @return mixed
	 */
	public function get ($key) {
		return $this->$data[$key];
	}
	/**
	 * 
	 * @param string $key
	 * @param mixed $value
	 */
	public function set ($key, $value) {
		$this->data[$key] = $value;
	}
	/**
	 * 
	 * @param array $keys default=null 
	 * @return array if $keys is null the whole array is return
	 */
	public function getData ($keys=null) {
		if ($keys !== null) {
			$data = array_intersect_key($this->data, array_flip($keys));
		}
		else {
			$data = $this->data;
		}
		return $data;
	}
	public function swapData ($newData) {
		$handle = $this->data;
		$this->data = $newData;
		return $handle;
	}
	function writeClose () {
		$_SESSION=$this->data;
		session_write_close ();
	}
	/**
	 * 
	 * @param DateTime $expiration When should it expire
	 */
	public function refresh (DateTime $expiration) {
		$this->expirationDate = $expiration;
	}


}
