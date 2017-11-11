<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "models/Entity/Address.php");
/**
 * Description of Address
 *
 * @author Shyam Shingadiya
 */
class Address extends My_Model {
    public function __construct() {
        parent::__construct(); 
        $this->init("Entity\Address",$this->doctrine->em);
    }
}
?>