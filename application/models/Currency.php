<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "models/Entity/Currency.php");

/**
 * Description of Currency
 *
 * @author Virendra Jadeja <virendrajadeja84@gmail.com>
 */
class Currency extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->init("Entity\Currency", $this->doctrine->em);
    }

}

?>