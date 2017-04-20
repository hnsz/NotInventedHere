<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ViewDefaultTest
 *
 * @author hans-rudolf
 */
class ViewDefaultTest extends PHPUnit_Framework_TestCase
{
    public function testPageLoad()
    {

        $viewDef = new ViewDefault();
        $viewDef->pageLoad();
        
    }
}
