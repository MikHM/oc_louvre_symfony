<?php

namespace Louvre\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Louvre\BookingBundle\Validator\Constraints as BookingAssert;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="Louvre\BookingBundle\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @ORM\OneToMany(targetEntity="Louvre\BookingBundle\Entity\Visitors", mappedBy="booking", cascade={"persist"})
     * @Assert\Valid()
     */
    private $visitors;

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
     * @ORM\Column(name="dateOfVisit", type="date")
     *
     * @Assert\NotBlank(message="Veuillez indiquer la date de votre visite.")
     * @BookingAssert\ClosedOnTuesdays()
     * @BookingAssert\NoBookingOnSundays()
     * @BookingAssert\ClosedForBankHolidays()
     *
     */
    private $dateOfVisit;

    /**
     * @var int
     *
     * @ORM\Column(name="durationOfVisit", type="integer")
     *
     * @BookingAssert\After2PM()
     *
     */
    private $durationOfVisit;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfTickets", type="integer")
     *
     * @Assert\NotBlank(message="Veuillez indiquer le nombre de billets.")
     * @Assert\GreaterThan(value=0, message="Le nombre de billets doit être supérieur à zéro.")
     * @BookingAssert\Check1000TicketsLimit()
     *
     */
    private $numberOfTickets;

    /**
     * @var string
     *
     * @ORM\Column(name="clientEmail", type="string", length=255)
     *
     * @Assert\NotBlank(message="Veuillez fournir un email pour la réservation.")
     *
     * @Assert\Email(message="L'adresse mail fourni '{{ value }}' n'est pas valide.")
     */
    private $clientEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate",  type="datetime")
     */
    private $creationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="bookingCodeNumber", type="string", length=255, nullable=true)
     */
    private $bookingCodeNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="totalBookingPrice", type="integer", nullable=true)
     */
    private $totalBookingPrice;



    public function __construct()
    {
        $this->creationDate = new \DateTime();
        $this->Visitors = new ArrayCollection();
    }



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

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Booking
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Add visitor
     *
     * @param \Louvre\BookingBundle\Entity\Visitors $visitor
     *
     * @return Booking
     */
    public function addVisitor(\Louvre\BookingBundle\Entity\Visitors $visitor)
    {
        $this->visitors[] = $visitor;

        $visitor->setBooking($this);

        return $this;
    }

    /**
     * Remove visitor
     *
     * @param \Louvre\BookingBundle\Entity\Visitors $visitor
     */
    public function removeVisitor(\Louvre\BookingBundle\Entity\Visitors $visitor)
    {
        $this->visitors->removeElement($visitor);
    }

    /**
     * Get visitor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisitor()
    {
        return $this->visitors;
    }

    /**
     * Set bookingCodeNumber
     *
     * @param string $bookingCodeNumber
     *
     * @return Booking
     */
    public function setBookingCodeNumber($bookingCodeNumber)
    {
        $this->bookingCodeNumber = $bookingCodeNumber;

        return $this;
    }

    /**
     * Get bookingCodeNumber
     *
     * @return string
     */
    public function getBookingCodeNumber()
    {
        return $this->bookingCodeNumber;
    }

    /**
     * Set totalBookingPrice
     *
     * @param integer $totalBookingPrice
     *
     * @return Booking
     */
    public function setTotalBookingPrice($totalBookingPrice)
    {
        $this->totalBookingPrice = $totalBookingPrice;

        return $this;
    }

    /**
     * Get totalBookingPrice
     *
     * @return integer
     */
    public function getTotalBookingPrice()
    {
        return $this->totalBookingPrice;
    }

    /**
     * Get visitors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVisitors()
    {
        return $this->visitors;
    }
}
