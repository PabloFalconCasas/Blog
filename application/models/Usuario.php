<?php

class Application_Model_Usuario extends Zend_Db_Table_Abstract
{

    protected $_primary = 'usuario_id';
    protected $_name = 'usuarios';

    protected $_dependentTables = array('Application_Model_Entrada');

} 