<?php

namespace FuelTech\SupportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Site
 */
class Site
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postcode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var \DateTime
     */
    private $installdate;

    /**
     * @var string
     */
    private $remark;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Site
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Site
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Site
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Site
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set installdate
     *
     * @param \DateTime $installdate
     * @return Site
     */
    public function setInstalldate($installdate)
    {
        $this->installdate = $installdate;

        return $this;
    }

    /**
     * Get installdate
     *
     * @return \DateTime 
     */
    public function getInstalldate()
    {
        return $this->installdate;
    }

    /**
     * Set remark
     *
     * @param string $remark
     * @return Site
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->remark;
    }
    /**
     * @var \FuelTech\SupportBundle\Entity\Client
     */
    private $client;


    /**
     * Set client
     *
     * @param \FuelTech\SupportBundle\Entity\Client $client
     * @return Site
     */
    public function setClient(\FuelTech\SupportBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \FuelTech\SupportBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}
