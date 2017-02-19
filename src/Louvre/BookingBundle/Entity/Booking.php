<?php

namespace Louvre\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="Louvre\BookingBundle\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfVisit", type="datetime")
     */
    private $dateOfVisit;

    /**
     * @var int
     *
     * @ORM\Column(name="durationOfVisit", type="integer")
     */
    private $durationOfVisit;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfTickets", type="integer")
     */
    private $numberOfTickets;

    /**
     * @var string
     *
     * @ORM\Column(name="clientEmail", type="string", length=255)
     */
    private $clientEmail;


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
     * Set dateOfVisit
     *
     * @param \DateTime $dateOfVisit
     *
     * @return Booking
     */
    public function setDateOfVisit($dateOfVisit)
    {
        $this->dateOfVisit = $dateOfVisit;

        return $this;
    }

    /**
     * Get dateOfVisit
     *
     * @return \DateTime
     */
    public function getDateOfVisit()
    {
        return $this->dateOfVisit;
    }

    /**
     * Set durationOfVisit
     *
     * @param integer $durationOfVisit
     *
     * @return Booking
     */
    public function setDurationOfVisit($durationOfVisit)
    {
        $this->durationOfVisit = $durationOfVisit;

        return $this;
    }

    /**
     * Get durationOfVisit
     *
     * @return int
     */
    public function getDurationOfVisit()
    {
        return $this->durationOfVisit;
    }

    /**
     * Set numberOfTickets
     *
     * @param integer $numberOfTickets
     *
     * @return Booking
     */
    public function setNumberOfTickets($numberOfTickets)
    {
        $this->numberOfTickets = $numberOfTickets;

        return $this;
    }

    /**
     * Get numberOfTickets
     *
     * @return int
     */
    public function getNumberOfTickets()
    {
        return $this->numberOfTickets;
    }

    /**
     * Set clientEmail
     *
     * @param string $clientEmail
     *
     * @return Booking
     */
    public function setClientEmail($clientEmail)
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    /**
     * Get clientEmail
     *
     * @return string
     */
    public function getClientEmail()
    {
        return $this->clientEmail;
    }
}

