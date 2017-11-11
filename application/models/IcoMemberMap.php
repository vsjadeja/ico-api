<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "models/Entity/IcoMemberMap.php");

/**
 * Description of IcoMemberMap
 *
 * @author Virendra Jadeja <virendrajadeja84@gmail.com>
 */
class IcoMemberMap extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->init("Entity\IcoMemberMap", $this->doctrine->em);
    }

}

?>