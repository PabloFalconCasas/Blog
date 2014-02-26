<?php

class Application_Model_EntradasTags extends Zend_Db_Table_Abstract
{

    protected $_primary = array('tag_id', 'entrada_id');
    protected $_name = 'entradas_tags';

    protected $_referenceMap    = array(
        'Entradas' => array(
            'columns'           => array('entrada_id'),
            'refTableClass'     => 'Application_Model_Entrada',
            'refColumns'        => array('entrada_id')
        ),
        'Tags' => array(
            'columns'           => array('tag_id'),
            'refTableClass'     => 'Application_Model_Tag',
            'refColumns'        => array('tag_id')
        )
    );
} 