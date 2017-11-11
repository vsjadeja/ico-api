<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "models/Entity/Member.php");

/**
 * Description of Member
 *
 * @author Virendra Jadeja <virendrajadeja84@gmail.com>
 */
class Member extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->init("Entity\Member", $this->doctrine->em);
    }

}

?>