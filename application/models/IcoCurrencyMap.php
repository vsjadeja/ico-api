<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "models/Entity/IcoCurrencyMap.php");

/**
 * Description of IcoCurrencyMap
 *
 * @author Virendra Jadeja <virendrajadeja84@gmail.com>
 */
class IcoCurrencyMap extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->init("Entity\IcoCurrencyMap", $this->doctrine->em);
    }

}

?>