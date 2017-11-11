<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of CacheTime
 *
 * @author Virendra Jadeja
 */
class CacheTime {
    /**
     * Duration in Seconds
     */
    const ATO = 30;//30 seconds
    const FEMTO = 60;//60 seconds
    const PICO = 120; //2 minutes
    const NANO = 900;//15 minutes
    const VERY_SHORT = 3600;// 1 hour
    const SHORT = 86400; //1 day
    const MEDIUM = 604800;//7 days
    const LONG  = 2592000;//30 days
    const VERY_LONG = 31536000;//365 days
}

?>
