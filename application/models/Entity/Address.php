<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Address {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="smallint", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="person", type="string", length=50, nullable=true)
     */
    private $person;

    /**
     * @var string
     *
     * @ORM\Column(name="line_one", type="string", length=100, nullable=false)
     */
    private $lineOne;

    /**
     * @var string
     *
     * @ORM\Column(name="line_two", type="string", length=100, nullable=false)
     */
    private $lineTwo;

    /**
     * @var integer
     *
     * @ORM\Column(name="zip", type="integer", nullable=false)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=100, nullable=false)
     */
    private $phone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_residence", type="boolean", nullable=true)
     */
    private $isResidence;

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
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
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
     * @ORM\Column(name="updated_date", type="datetime", nullable=true)
     */
    private $updatedDate;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

    /**
     * @var \City
     *
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;

    /**
     * @var \State
     *
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     * })
     */
    private $state;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Address
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set person
     *
     * @param string $person
     * @return Address
     */
    public function setPerson($person) {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return string 
     */
    public function getPerson() {
        return $this->person;
    }

    /**
     * Set lineOne
     *
     * @param string $lineOne
     * @return Address
     */
    public function setLineOne($lineOne) {
        $this->lineOne = $lineOne;

        return $this;
    }

    /**
     * Get lineOne
     *
     * @return string 
     */
    public function getLineOne() {
        return $this->lineOne;
    }

    /**
     * Set lineTwo
     *
     * @param string $lineTwo
     * @return Address
     */
    public function setLineTwo($lineTwo) {
        $this->lineTwo = $lineTwo;

        return $this;
    }

    /**
     * Get lineTwo
     *
     * @return string 
     */
    public function getLineTwo() {
        return $this->lineTwo;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     * @return Address
     */
    public function setZip($zip) {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer 
     */
    public function getZip() {
        return $this->zip;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     * @return Address
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer 
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set isResidence
     *
     * @param boolean $isResidence
     * @return Address
     */
    public function setIsResidence($isResidence) {
        $this->isResidence = $isResidence;

        return $this;
    }

    /**
     * Get isResidence
     *
     * @return boolean 
     */
    public function getIsResidence() {
        return $this->isResidence;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Address
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
     * @return Address
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
     * @return Address
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
     * @return Address
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
     * @return Address
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
     * Set country
     *
     * @param \Country $country
     * @return Address
     */
    public function setCountry(\Entity\Country $country = null) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Country 
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param \City $city
     * @return Address
     */
    public function setCity(\Entity\City $city = null) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \City 
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param \State $state
     * @return Address
     */
    public function setState(\Entity\State $state = null) {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \State 
     */
    public function getState() {
        return $this->state;
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
