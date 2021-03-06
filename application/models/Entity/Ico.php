<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ico
 *
 * @ORM\Table(name="ico")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Ico {

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
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=false)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="short_decription", type="text", nullable=false)
     */
    private $shortDecription;

    /**
     * @var string
     *
     * @ORM\Column(name="long_description", type="text", nullable=true)
     */
    private $longDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="open_date", type="datetime", nullable=false)
     */
    private $openDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="close_date", type="datetime", nullable=false)
     */
    private $closeDate;

    /**
     * @var float
     *
     * @ORM\Column(name="rating", type="float", nullable=true)
     */
    private $rating;

    /**
     * @var string
     *
     * @ORM\Column(name="youtube_url", type="string", length=255, nullable=true)
     */
    private $youtubeUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_url", type="string", length=255, nullable=true)
     */
    private $facebookUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_url", type="string", length=255, nullable=true)
     */
    private $twitterUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="bitcointalk_url", type="string", length=255, nullable=true)
     */
    private $bitcointalkUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="subreddit_url", type="string", length=255, nullable=true)
     */
    private $subredditUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="token_symbol", type="string", length=5, nullable=true)
     */
    private $tokenSymbol;

    /**
     * @var string
     *
     * @ORM\Column(name="platform", type="string", length=25, nullable=true)
     */
    private $platform;

    /**
     * @var integer
     *
     * @ORM\Column(name="token_type_id", type="integer", nullable=true)
     */
    private $tokenTypeId;

    /**
     * @var float
     *
     * @ORM\Column(name="token_price", type="float", nullable=true)
     */
    private $tokenPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="bonus", type="float", nullable=true)
     */
    private $bonus;

    /**
     * @var float
     *
     * @ORM\Column(name="distributed_in_ico", type="float", nullable=true)
     */
    private $distributedInIco;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_token", type="bigint", nullable=true)
     */
    private $maxToken;

    /**
     * @var integer
     *
     * @ORM\Column(name="hard_cap", type="integer", nullable=true)
     */
    private $hardCap;

    /**
     * @var integer
     *
     * @ORM\Column(name="soft_cap", type="integer", nullable=true)
     */
    private $softCap;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=25, nullable=true)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="fund_raised", type="integer", nullable=true)
     */
    private $fundRaised;

    /**
     * @var string
     *
     * @ORM\Column(name="ico_status", type="string", nullable=true)
     */
    private $icoStatus;

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
     * @return Ico
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
     * Set icon
     *
     * @param string $icon
     * @return Ico
     */
    public function setIcon($icon) {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * Set shortDecription
     *
     * @param string $shortDecription
     * @return Ico
     */
    public function setShortDecription($shortDecription) {
        $this->shortDecription = $shortDecription;

        return $this;
    }

    /**
     * Get shortDecription
     *
     * @return string 
     */
    public function getShortDecription() {
        return $this->shortDecription;
    }

    /**
     * Set longDescription
     *
     * @param string $longDescription
     * @return Ico
     */
    public function setLongDescription($longDescription) {
        $this->longDescription = $longDescription;

        return $this;
    }

    /**
     * Get longDescription
     *
     * @return string 
     */
    public function getLongDescription() {
        return $this->longDescription;
    }

    /**
     * Set openDate
     *
     * @param \DateTime $openDate
     * @return Ico
     */
    public function setOpenDate($openDate) {
        $this->openDate = $openDate;

        return $this;
    }

    /**
     * Get openDate
     *
     * @return \DateTime 
     */
    public function getOpenDate() {
        return $this->openDate;
    }

    /**
     * Set closeDate
     *
     * @param \DateTime $closeDate
     * @return Ico
     */
    public function setCloseDate($closeDate) {
        $this->closeDate = $closeDate;

        return $this;
    }

    /**
     * Get closeDate
     *
     * @return \DateTime 
     */
    public function getCloseDate() {
        return $this->closeDate;
    }

    /**
     * Set rating
     *
     * @param float $rating
     * @return Ico
     */
    public function setRating($rating) {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return float 
     */
    public function getRating() {
        return $this->rating;
    }

    /**
     * Set youtubeUrl
     *
     * @param string $youtubeUrl
     * @return Ico
     */
    public function setYoutubeUrl($youtubeUrl) {
        $this->youtubeUrl = $youtubeUrl;

        return $this;
    }

    /**
     * Get youtubeUrl
     *
     * @return string 
     */
    public function getYoutubeUrl() {
        return $this->youtubeUrl;
    }

    /**
     * Set facebookUrl
     *
     * @param string $facebookUrl
     * @return Ico
     */
    public function setFacebookUrl($facebookUrl) {
        $this->facebookUrl = $facebookUrl;

        return $this;
    }

    /**
     * Get facebookUrl
     *
     * @return string 
     */
    public function getFacebookUrl() {
        return $this->facebookUrl;
    }

    /**
     * Set twitterUrl
     *
     * @param string $twitterUrl
     * @return Ico
     */
    public function setTwitterUrl($twitterUrl) {
        $this->twitterUrl = $twitterUrl;

        return $this;
    }

    /**
     * Get twitterUrl
     *
     * @return string 
     */
    public function getTwitterUrl() {
        return $this->twitterUrl;
    }

    /**
     * Set bitcointalkUrl
     *
     * @param string $bitcointalkUrl
     * @return Ico
     */
    public function setBitcointalkUrl($bitcointalkUrl) {
        $this->bitcointalkUrl = $bitcointalkUrl;

        return $this;
    }

    /**
     * Get bitcointalkUrl
     *
     * @return string 
     */
    public function getBitcointalkUrl() {
        return $this->bitcointalkUrl;
    }

    /**
     * Set subredditUrl
     *
     * @param string $subredditUrl
     * @return Ico
     */
    public function setSubredditUrl($subredditUrl) {
        $this->subredditUrl = $subredditUrl;

        return $this;
    }

    /**
     * Get subredditUrl
     *
     * @return string 
     */
    public function getSubredditUrl() {
        return $this->subredditUrl;
    }

    /**
     * Set tokenSymbol
     *
     * @param string $tokenSymbol
     * @return Ico
     */
    public function setTokenSymbol($tokenSymbol) {
        $this->tokenSymbol = $tokenSymbol;

        return $this;
    }

    /**
     * Get tokenSymbol
     *
     * @return string 
     */
    public function getTokenSymbol() {
        return $this->tokenSymbol;
    }

    /**
     * Set platform
     *
     * @param string $platform
     * @return Ico
     */
    public function setPlatform($platform) {
        $this->platform = $platform;

        return $this;
    }

    /**
     * Get platform
     *
     * @return string 
     */
    public function getPlatform() {
        return $this->platform;
    }

    /**
     * Set tokenTypeId
     *
     * @param integer $tokenTypeId
     * @return Ico
     */
    public function setTokenTypeId($tokenTypeId) {
        $this->tokenTypeId = $tokenTypeId;

        return $this;
    }

    /**
     * Get tokenTypeId
     *
     * @return integer 
     */
    public function getTokenTypeId() {
        return $this->tokenTypeId;
    }

    /**
     * Set tokenPrice
     *
     * @param float $tokenPrice
     * @return Ico
     */
    public function setTokenPrice($tokenPrice) {
        $this->tokenPrice = $tokenPrice;

        return $this;
    }

    /**
     * Get tokenPrice
     *
     * @return float 
     */
    public function getTokenPrice() {
        return $this->tokenPrice;
    }

    /**
     * Set bonus
     *
     * @param float $bonus
     * @return Ico
     */
    public function setBonus($bonus) {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get bonus
     *
     * @return float 
     */
    public function getBonus() {
        return $this->bonus;
    }

    /**
     * Set distributedInIco
     *
     * @param float $distributedInIco
     * @return Ico
     */
    public function setDistributedInIco($distributedInIco) {
        $this->distributedInIco = $distributedInIco;

        return $this;
    }

    /**
     * Get distributedInIco
     *
     * @return float 
     */
    public function getDistributedInIco() {
        return $this->distributedInIco;
    }

    /**
     * Set maxToken
     *
     * @param integer $maxToken
     * @return Ico
     */
    public function setMaxToken($maxToken) {
        $this->maxToken = $maxToken;

        return $this;
    }

    /**
     * Get maxToken
     *
     * @return integer 
     */
    public function getMaxToken() {
        return $this->maxToken;
    }

    /**
     * Set hardCap
     *
     * @param integer $hardCap
     * @return Ico
     */
    public function setHardCap($hardCap) {
        $this->hardCap = $hardCap;

        return $this;
    }

    /**
     * Get hardCap
     *
     * @return integer 
     */
    public function getHardCap() {
        return $this->hardCap;
    }

    /**
     * Set softCap
     *
     * @param integer $softCap
     * @return Ico
     */
    public function setSoftCap($softCap) {
        $this->softCap = $softCap;

        return $this;
    }

    /**
     * Get softCap
     *
     * @return integer 
     */
    public function getSoftCap() {
        return $this->softCap;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Ico
     */
    public function setCountry($country) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * Set fundRaised
     *
     * @param integer $fundRaised
     * @return Ico
     */
    public function setFundRaised($fundRaised) {
        $this->fundRaised = $fundRaised;

        return $this;
    }

    /**
     * Get fundRaised
     *
     * @return integer 
     */
    public function getFundRaised() {
        return $this->fundRaised;
    }

    /**
     * Set icoStatus
     *
     * @param string $icoStatus
     * @return Ico
     */
    public function setIcoStatus($icoStatus) {
        $this->icoStatus = $icoStatus;

        return $this;
    }

    /**
     * Get icoStatus
     *
     * @return string 
     */
    public function getIcoStatus() {
        return $this->icoStatus;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Ico
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
     * @return Ico
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
     * @return Ico
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
     * @return Ico
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
     * @return Ico
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
