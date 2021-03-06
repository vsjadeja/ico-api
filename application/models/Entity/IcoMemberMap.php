<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IcoMemberMap
 *
 * @ORM\Table(name="ico_member_map")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class IcoMemberMap {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=true)
     */
    private $createdBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=false)
     */
    private $createdDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="updated_by", type="integer", nullable=true)
     */
    private $updatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_date", type="datetime", nullable=false)
     */
    private $updatedDate;

    /**
     * @var \Member
     *
     * @ORM\ManyToOne(targetEntity="Member", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="member_id", referencedColumnName="id")
     * })
     */
    private $member;

    /**
     * @var \Ico
     *
     * @ORM\ManyToOne(targetEntity="Ico", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ico_id", referencedColumnName="id")
     * })
     */
    private $ico;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return IcoMemberMap
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return IcoMemberMap
     */
    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return IcoMemberMap
     */
    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate() {
        return $this->createdDate;
    }

    /**
     * Set updatedBy
     *
     * @param integer $updatedBy
     * @return IcoMemberMap
     */
    public function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return integer 
     */
    public function getUpdatedBy() {
        return $this->updatedBy;
    }

    /**
     * Set updatedDate
     *
     * @param \DateTime $updatedDate
     * @return IcoMemberMap
     */
    public function setUpdatedDate($updatedDate) {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    /**
     * Get updatedDate
     *
     * @return \DateTime 
     */
    public function getUpdatedDate() {
        return $this->updatedDate;
    }

    /**
     * Set member
     *
     * @param \Member $member
     * @return IcoMemberMap
     */
    public function setMember(\Entity\Member $member = null) {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \Member 
     */
    public function getMember() {
        return $this->member;
    }

    /**
     * Set ico
     *
     * @param \Ico $ico
     * @return IcoMemberMap
     */
    public function setIco(\Entity\Ico $ico = null) {
        $this->ico = $ico;

        return $this;
    }

    /**
     * Get ico
     *
     * @return \Ico 
     */
    public function getIco() {
        return $this->ico;
    }

    /**
     * @ORM\PrePersist
     */
    public function doStuffOnPrePersist() {
        if ($this->id > 0):
            $this->updatedDate = new \DateTime();
        else:
            $this->createdDate = new \DateTime();
            $this->updatedDate = new \DateTime();
        endif;
    }

}
