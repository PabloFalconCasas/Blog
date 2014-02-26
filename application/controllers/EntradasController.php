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
class ListarController extends My_Controller_Action {
   public function init()
    {


    }

    public function indexAction()
    {
        $model_entrada = new Application_Model_Entrada();

        $paginador = Zend_Paginator::factory($model_entrada->fetchAll());
        $paginador->setItemCountPerPage(2);
        $paginador->setCurrentPageNumber($this->_request->getParam('page', 1));

        $this->view->paginador = $paginador;


    }


    public function usuariosAction()
    {

        $model_usuario = new Application_Model_Usuario();
        $paginador = Zend_Paginator::factory($model_usuario->fetchAll());
        $paginador->setItemCountPerPage(4);
        $paginador->setCurrentPageNumber($this->_request->getParam('page', 1));

        $this->view->paginador = $paginador;


    }

    public function testAction()
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
}
