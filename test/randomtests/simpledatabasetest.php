<?php

/*
 * Copyright (C) 2017 hans-rudolf.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */

/**
 * Summary.
 * Description of SimpleDatabaseTest
 *
 * @author HNSZ
 * @param type $name Description
 * @return type Description
 * 
 */
class SimpleDatabaseTest extends PHPUnit_Extensions_Database_TestCase
{
	protected static $pdo = null;
	private $dbhandle = null;
	
	public function getConnection () {
		
		if ($this->dbhandle === null) {
			
			if( self::$pdo === null) {
				self::$pdo = new PDO('mysql:host=localhost;dbname=go_testdb',"tester","test123");
			}
			$this->dbhandle = $this->createDefaultDBConnection(self::$pdo);
		}
		return $this->dbhandle;
	}
 	public function testSimpleUpdate() {
		$pdo = new PDO("mysql:host=localhost;dbname=go_testdb","tester","test123");
		$stmt = $pdo->prepare('update gouser set email = "" where usertype="G"');
		$stmt->execute();

		$actual = $this->getConnection()->createQueryTable("gouser", "select * from gouser;");
		$expected = new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
			__DIR__."/../static_files/accesscontrol_update_expected.yml"
			);
		$this->assertTablesEqual($expected->getTable ("gouser"), $actual);
	}
 	public function testReplacement() {
		$actual = $this->getConnection()->createQueryTable("gouser", "select * from gouser;");
		
		$qdt = new PHPUnit_Extensions_Database_DataSet_QueryTable("gouser", "select *  from gouser;", $this->getConnection());
		$expected = new PHPUnit_Extensions_Database_DataSet_ReplacementTable($qdt);
		$expected->addFullReplacement("", "w");
		
		$pdo = new PDO("mysql:host=localhost;dbname=go_testdb","tester","test123");
		$stmt = $pdo->prepare('update gouser set email = "" where usertype="G"');
		$stmt->execute();

		$this->assertTablesEqual($expected, $actual);
		var_dump($expected);
	}
	public function testSimpleSelect() {
		$sql = 'select * from gouser';
		$qTable = $this->getConnection()->createQueryTable('gouser', $sql);
		$qDataSet = new PHPUnit_Extensions_Database_DataSet_QueryDataSet($this->getConnection());
		$qDataSet->addTable('gouser', 'select id, email, salt, hash,usertype, nick from gouser');
		$expected = $qDataSet->getTable("gouser");
		$this->assertTablesEqual($expected, $qTable);
	}
	public function getDataSet () {
		return new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
			__DIR__."/../static_files/accesscontrol_dataset.yml"
			);
	}

	//put your code here
}
