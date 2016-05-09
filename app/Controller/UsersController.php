<?php

App::uses('ConnectionManager', 'Model'); 

class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('login','add','logout'); 
    }
	


	public function login() {
		
		//if already logged-in, redirect
		//if($this->Session->check('Auth.User')){
                $this->redirect(array('action' => 'dashboard'));		
		//}
		
		// if we get the post information, try to authenticate
		/*if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		}*/ 
	}
        
        public function dashboard() {
            if(!empty($this->data['User'])){
                $segments = explode('/', $this->data['User']['dob']);
                if (count($segments) !== 3) {
                    $this->Session->setFlash('Date of Birth is not in correct format.');
                    return false;
                }
                list($dd,$mm,$yyyy) = $segments;
                if (!checkdate((int)$mm,(int)$dd,(int)$yyyy)) {
                    $this->Session->setFlash('Date of Birth is not in correct format.');
                    return false;
                }
                if(!filter_var($this->data['User']['email'], FILTER_VALIDATE_EMAIL)) {
                    $this->Session->setFlash('Email Id is not in correct format.');
                    return false;
                }
                $db = ConnectionManager::getDataSource('default');
                $sql = "SELECT * FROM `registeredusers` WHERE email = '" . 
                            $this->data['User']['email'] . "' and dob = '" . 
                            $this->data['User']['dob'] . "'"; //"' and applicant_id = '" .
                            //trim($this->data['User']['applicant_id']) . "'";
                $result = $db->rawQuery($sql);
                $count = 0;
                while ($row = $db->fetchRow()) { 
                    $this->Session->write('registration_id', $row['registeredusers']['id']);
                    $this->Session->write('applicant_id', $row['registeredusers']['applicant_id']);
                    $count++;
                }

                /*$sql = "SELECT * FROM `applicants` WHERE id = '" . 
                        trim($this->data['User']['applicant_id']) . "'";
                $result = $db->rawQuery($sql);
                $fee_paid = array();
                while ($row = $db->fetchRow()) {
                    $fee_paid[$row['applicants']['id']] = $row['applicants']['response_code'];
                }
                reset($fee_paid);
                $first_key = key($fee_paid);
                if(!(count($fee_paid) === 1 && $fee_paid[$first_key] == "0")) {
                    $this->Session->setFlash(__('Pay fees before login.'));
                    return false;
                }*/
                //print_r($result);
                /*$result = $this->Registereduser->find('all', array(
                        'conditions' => array('Registereduser.email' => $this->data['User']['email'],
                                              'Registereduser.email' => $this->data['User']['dob'])));
                */
                if($count == 1) {
                    $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
                }
                else {
                    $this->Session->setFlash('Please check the credentials entererd below.');
                }
            }
        }

    public function logout() {
         $this->Session->destroy();
         $this->redirect(array('action' => 'dashboard'));
         //$this->redirect($this->Auth->logout());
    }

    public function index() {
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }


    public function add() {
        if ($this->request->is('post')) {
				
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been created'));
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}	
        }
    }

    public function edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
    }

    public function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }

}

?>