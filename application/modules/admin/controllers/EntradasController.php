<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListarController
 *
 * @author adminj
 */
class Admin_EntradasController extends My_Controller_Action {
   public function init()
    {


    }


    public function crearAction()
    {

        $model_entrada = new Application_Model_Entrada();
        $entrada = $model_entrada->find(1)->current();

        $tags = $entrada->findManyToManyRowset('Application_Model_Tag', 'Application_Model_EntradasTags');

        Zend_Debug::dump(
            $tags->toArray()
        );

        foreach ($tags as $tag) {
            echo '<h1>' . $tag->tag . '</h1>';

            Zend_Debug::dump(
                $tag->findManyToManyRowset('Application_Model_Entrada', 'Application_Model_EntradasTags')->toArray()
            );

        }


        exit();
    }
    
        public function editarAction()
    {

        $model_usuario = new Application_Model_Usuario();
        $paginador = Zend_Paginator::factory($model_usuario->fetchAll());
        $paginador->setItemCountPerPage(4);
        $paginador->setCurrentPageNumber($this->_request->getParam('page', 1));

        $this->view->paginador = $paginador;


    }
        public function borrarAction()
    {

        $model_usuario = new Application_Model_Usuario();
        $paginador = Zend_Paginator::factory($model_usuario->fetchAll());
        $paginador->setItemCountPerPage(4);
        $paginador->setCurrentPageNumber($this->_request->getParam('page', 1));

        $this->view->paginador = $paginador;


    }
}
