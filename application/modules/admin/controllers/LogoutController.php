<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogoutController
 *
 * @author adminj
 */
class Admin_LogoutController extends My_Controller_Action {
    
    public function init(){
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector->gotoRoute(array('action'=>'index', 'controller'=>'index'),'default', true);
    }
    
}