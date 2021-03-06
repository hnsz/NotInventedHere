<?php
/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-04-27 at 17:56:56.
 */
class AccessControlServerTest extends AbstractDatabaseTestCase
{
	/**
	 * @var AccessControlServer
	 */
	protected $object;


	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp () {
		parent::setUp();
		$this->object = new AccessControlServer(parent::$pdo);
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown () {
		
	}
	/**
	 * @dataProvider getWhitelistDataProvider
	 * @covers AccessControlServer::getWhitelist
	 */
	public function testGetWhitelist($userId, $expected) {
		$actual = $this->object->getWhitelist($userId);
		$this->assertEquals($expected, $actual);
	}
	public function getWhitelistDataProvider() {
		return include __DIR__.'/providerdata_whitelist.php';
	}
	/**
	 * @dataProvider hasAccessDataProvider
	 * @covers AccessControlServer::hasAccess
	 */
	public function testHasAccess ($gouser_id, $uri, $expected) {
		$this->assertEquals($expected, $this->object->hasAccess($gouser_id, $uri));
	}
	public function hasAccessDataProvider() {
		return include __DIR__.'/providerdata_hasaccess.php';
	}
	public function getDataSet () {
		return new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
			__DIR__."/dataset_accesscontrolserver.yml"
			);
	}
		
		

}
