<?php

/**
 * Contains common functionality for CRUD Operation using Doctrine v2
 *
 * @author Virendra Jadeja
 * @email <virendrajadeja84@gmail.com>
 */
class MY_Model extends CI_Model {

    /**
     * @var \Doctrine\ORM\EntityManager $em
     */
    var $em;

    /**
     *
     * @var string $entity 
     */
    var $entity;

    /**
     * Constructor for DataModel
     */
    function __construct() {
        parent::__construct();
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }

    /**
     * Initialize with entity name and entity manager
     * @param string $entity
     * @param \Doctrine\ORM\EntityManager $em 
     */
    function init($entity, $em) {
        $this->entity = $entity;
        $this->em = $em;
    }

    /**
     * Retrieve a single record according to given identifer
     * @param int $id identifier of the record
     * @return object 
     */
    function get($id) {
        try {
            $city = $this->em->find($this->entity, $id);
            return $city;
        } catch (Exception $err) {
            log_message("error", $err->getMessage(), false);
            return NULL;
        }
    }

    /**
     * Return list of recors according to given start index and length
     * @param int $start the start index number for the city list
     * @param int $length Determines how many records to fetch
     * @return array 
     */
    function getByRange($start = 1, $length = 10, $criteria = array(), $orderBy = NULL) {
        return $this->getBy($criteria, $orderBy, $length, $start);
    }

    function getBy($criteria = array(), $orderBy = NULL, $limit = null, $offset = null) {
        try {
            return $this->em->getRepository($this->entity)->findBy($criteria, $orderBy, $limit, $offset);
        } catch (Exception $err) {
            log_message("error", $err->getMessage(), false);
            return NULL;
        }
    }

    function getOneBy($criteria = array(), $orderBy = NULL) {
        try {
            return $this->em->getRepository($this->entity)->findOneBy($criteria, $orderBy);
        } catch (Exception $err) {
            log_message("error", $err->getMessage(), false);
            return NULL;
        }
    }

    function getAll() {
        try {
            return $this->em->getRepository($this->entity)->findAll();
        } catch (Exception $err) {
            log_message("error", $err->getMessage(), false);
            return NULL;
        }
    }

    /**
     * Return the number of records
     * @return integer 
     */
    function getCount() {
        try {
            $query = $this->em->createQueryBuilder()
                    ->select("count(c)")
                    ->from($this->entity, "c")
                    ->getQuery();
            return $query->getSingleScalarResult();
        } catch (Exception $err) {
            log_message("error", $err->getMessage(), false);
            return 0;
        }
    }

    /**
     * Save an enitity
     * @param object $entity Docrine Entity object
     * @return boolean 
     */
    function save($entity) {
        try {
            $this->em->persist($entity);
            $this->em->flush();
            return TRUE;
        } catch (Exception $err) {
            log_message("error", $err->getMessage(), false);
            return FALSE;
        }
    }

    /**
     * Delete an Entity according to given (list of) id(s)
     * @param mix $ids array/single
     * @return boolean
     */
    function delete($ids) {
        try {
            if (!is_array($ids)) {
                $ids = array($ids);
            }
            foreach ($ids as $id) {
                $entity = $this->em->getPartialReference($this->entity, $id);
                $this->em->remove($entity);
            }
            $this->em->flush();
            return TRUE;
        } catch (Exception $err) {
            log_message("error", $err->getMessage(), false);
            return FALSE;
        }
    }

    function getCacheVar($method, $key = NULL) {
        $cacheKey = $method;
        if ($key):
            if (is_array($key)):
                foreach ($key as $k => $v):
                    $cacheKey = $cacheKey . '_' . $k . '_' . $v;
                endforeach;
            else:
                $cacheKey = $cacheKey . '_' . $key;
            endif;
        endif;

        return $cacheKey;
    }

}
