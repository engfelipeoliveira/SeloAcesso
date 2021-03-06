<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('Sanitize', 'Utility');
App::uses('String', 'Utility');
App::uses('CakeNumber', 'Utility');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
/**
 * An array containing the names of helpers this controller uses.
 *
 * @var mixed
 */
	public $helpers = array('Session', 'Html', 'Form', 'Number');

/**
 * Array containing the names of components this controller uses.
 *
 * @var array
 */
	public $components = array('Session');

/**
 * Models used by the controller.
 *
 * @var array
 */
	public $uses = array();

/**
 * Controller actions for which authorization is not required.
 *
 * @var array
 */
	public $allowedActions = array('display', 'sendMailSmtp');
	
	
	
	// SEND EMAIL	
	public function sendMailSmtp($to, $subject, $template, $vars){
			
			$email = new CakeEmail('smtp');
			$email->helpers(array('Html'));
			$email->to($to);
			$email->subject($subject);				
			$email->viewVars($vars);
			$email->template($template, 'default');
			$email->emailFormat('both');
			if($email->send()){ return "1"; } else{ return "0"; }		
	}
	
	
	
	
}
