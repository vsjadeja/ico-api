<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Member {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb", type="string", length=255, nullable=true)
     */
    private $thumb;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=50, nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin_url", type="string", length=255, nullable=true)
     */
    private $linkedinUrl;

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
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Member
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set thumb
     *
     * @param string $thumb
     * @return Member
     */
    public function setThumb($thumb) {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * Get thumb
     *
     * @return string 
     */
    public function getThumb() {
        return $this->thumb;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Member
     */
    public function setPosition($position) {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Set linkedinUrl
     *
     * @param string $linkedinUrl
     * @return Member
     */
    public function setLinkedinUrl($linkedinUrl) {
        $this->linkedinUrl = $linkedinUrl;

        return $this;
    }

    /**
     * Get linkedinUrl
     *
     * @return string 
     */
    public function getLinkedinUrl() {
        return $this->linkedinUrl;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Member
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
     * @return Member
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
     * @return Member
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
     * @return Member
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
     * @return Member
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
