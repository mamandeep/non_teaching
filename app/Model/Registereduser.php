<?php

App::uses('CakeSession', 'Model/Datasource');

class Registereduser extends AppModel {

    //public $belongsTo = 'User';
    
    public $useTable = 'registeredusers';
    
    var $validate = array(
        'email' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'dob' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'category' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        ),
        'physically_disabled' => array(
            'rule' => 'notEmpty',
            'message' => 'required field'
        )
    );

}

?>
