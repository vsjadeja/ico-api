<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Home_controller
 *
 * @author Virendra Jadeja
 */
class Home_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function welcome() {
        $this->load->view('home');
    }

    public function index(){
		echo 'Its working!';
    }
}

?>
