<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author hans-rudolf
 */
interface IModel
{


	public function subscribe (IModelSubscriber $subscriber);
}
