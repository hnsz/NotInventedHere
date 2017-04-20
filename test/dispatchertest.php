<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of DispatcherTest
 *
 * @author hans-rudolf
 */
class DispatcherTest extends PHPUnit_Framework_TestCase
{
    public function testRun() 
    {
        $dsp = new Dispatcher();
        $dsp->run();    
    }
}
