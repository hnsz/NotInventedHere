<?php

/**
 * @description MemoryStream is no a class
 * Just testing writing to and reading from php://memory and php://temp
 */
class PhpStreamTest extends PHPUnit_Framework_TestCase
{


	public function testMemory () {
		$fhandle = fopen ("php://memory", "w+");
		fprintf ($fhandle, "This is just a %s test that I'm running %d time to see if it works", "simple", 1);
		rewind ($fhandle);
		$string = stream_get_contents ($fhandle);
		$this->assertStringStartsWith ("This", $string);
		fclose ($fhandle);
	}


	public function testTemp () {
		// First use memory, create a temp file if the contents become larger than 100 bytes
		$fhandle = fopen ("php://temp/maxmemory:100", "w+");
		fprintf ($fhandle, "This string is %d characters long if you discount the nullbyte", 98 - 36);
		fprintf ($fhandle, "This string is %d characters long if you discount the nullbyte", 98 - 36);
		rewind ($fhandle);
		$string = stream_get_contents ($fhandle);
		$this->assertStringStartsWith ("This", $string);

		print PHP_EOL . $string;
		print var_dump (scandir (sys_get_temp_dir ()));
		fclose ($fhandle);
	}


}
