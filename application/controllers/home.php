<?php
/**
 * Codeigniter Bootstrap
 * -------------------------------------------------------------------
 * 
 * -------------------------------------------------------------------
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index() {
        $this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'home');
    }


    /**
     * undocumented function
     *
     * @return void
     **/
    public function account_recovery ()
    {

    	$this->template->set('title', 'My website');
        $this->template->load('layouts/main', 'recovery');
    }
}

/* End of file home.php */
/* Location: ./application/controllers/admin/home.php */
