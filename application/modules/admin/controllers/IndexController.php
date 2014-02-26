<?php

class Admin_IndexController extends Admin_Controller_Action {

    public function init() {
        parent::init();
    }

    public function indexAction() {

        if (!Zend_Auth::getInstance()->getIdentity()) {
            $this->_helper->redirector->gotoRoute(array('action' => 'index', 'controller' => 'login'), 'default', true);
        }

        /*
          // if the form is submitted
          if ($this->_request->isPost()) {
          $titulo = stripslashes($this->_request->getPost('titulo'));
          $entradilla = stripslashes($this->_request->getPost('entradilla'));
          $slug = stripslashes($this->_request->getPost('slug'));
          $contenido = stripslashes($this->_request->getPost('contenido'));
          $fila = Array(
          $titulo,
          $entradilla,
          $slug,
          $contenido
          );

         */
        $model_entrada = new Application_Model_Entrada();

        $paginador = Zend_Paginator::factory($model_entrada->fetchAll());
        $paginador->setItemCountPerPage(2);
        $paginador->setCurrentPageNumber($this->_request->getParam('page', 1));

        $this->view->paginador = $paginador;
    }

}

