<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . "models/Entity/Ico.php");

/**
 * Description of Ico
 *
 * @author Virendra Jadeja <virendrajadeja84@gmail.com>
 */
class Ico extends MY_Model {

    public function __construct() {
        parent::__construct();
        $this->init("Entity\Ico", $this->doctrine->em);
    }

    public function upComing() {
        $qb = $this->em->createQueryBuilder();
        $qb->select('ico');
        $qb->from($this->entity, 'ico');
        $qb->where("ico.openDate > :Today")->setParameter(":Today", new DateTime());
        return $qb->getQuery()->getResult();
    }

    public function onGoing() {
        $qb = $this->em->createQueryBuilder();
        $qb->select('ico');
        $qb->from($this->entity, 'ico');
        $qb->where(":Today BETWEEN ico.openDate AND ico.closeDate")->setParameter(":Today", new DateTime());
        return $qb->getQuery()->getResult();
    }
    
    public function closed() {
        $qb = $this->em->createQueryBuilder();
        $qb->select('ico');
        $qb->from($this->entity, 'ico');
        $qb->where("ico.closeDate < :Today")->setParameter(":Today", new DateTime());
        return $qb->getQuery()->getResult();
    }

}

?>