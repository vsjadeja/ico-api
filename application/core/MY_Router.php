<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of MY_Router
 *
 * @author Virendra Jadeja
 */
class MY_Router extends CI_Router {

    var $suffix = '_controller';

    public function __construct($routing = NULL) {
        parent::__construct($routing);
    }

    public function set_class($class) {
        $this->class = $class . $this->suffix;
    }

    public function controller_name() {

        if (strstr($this->class, $this->suffix)) {
            return str_replace($this->suffix, '', $this->class);
        } else {
            return $this->class;
        }
    }

}

?>
