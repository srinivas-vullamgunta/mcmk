<?php

namespace AppBundle\Entity;

/**
 * Nearearthobjects
 */
class Nearearthobjects
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $speed;

    /**
     * @var string
     */
    private $ishazardous;
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Nearearthobjects
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Nearearthobjects
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Nearearthobjects
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
     * Set speed
     *
     * @param string $speed
     *
     * @return Nearearthobjects
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get speed
     *
     * @return string
     */
    public function getSpeed()
    {
        return $this->speed;
    }


    /**
     * Set speed
     *
     * @param string $ishazardous
     *
     * @return Nearearthobjects
     */
    public function setIshazardous($ishazardous)
    {
        $this->ishazardous = $ishazardous;

        return $this;
    }

    /**
     * Get ishazardous
     *
     * @return string
     */
    public function getIshazardous()
    {
        return $this->ishazardous;
    }







}

