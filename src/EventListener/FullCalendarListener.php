<?php

namespace App\EventListener;

use App\Entity\Booking;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Toiba\FullCalendarBundle\Entity\Event;
use Toiba\FullCalendarBundle\Event\CalendarEvent;

class FullCalendarListener
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    public function __construct(EntityManagerInterface $em, UrlGeneratorInterface $router)
    {
        $this->em = $em;
        $this->router = $router;
    }

    public function loadEvents(CalendarEvent $calendar)
    {
        $startDate = $calendar->getStart();
        $endDate = $calendar->getEnd();
        $filters = $calendar->getFilters();
        $userRole=$filters["userRole"];

        // Modify the query to fit to your entity and needs
        // Change b.beginAt by your start date in your custom entity

        if($userRole=="ROLE_USER" || $userRole=="ROLE_ADMIN"){
            $praticien=$filters["praticien"];
            $userId=$filters["userId"];

            $bookings = $this->em->getRepository(Booking::class)
                ->createQueryBuilder('b')
                ->andWhere('b.beginAt BETWEEN :startDate and :endDate')
                ->andWhere('b.praticien=:pid')
                ->setParameter('pid',$praticien)
                ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
                ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'))
                ->getQuery()->getResult();

            foreach($bookings as $booking) {

                // this create the events with your own entity (here booking entity) to populate calendar
                $bookingEvent = new Event(
                    $booking->getTitle(),
                    $booking->getBeginAt(),
                    $booking->getEndAt(), // If the end date is null or not defined, it creates a all day event
                    $booking->getPraticien(),
                    $booking->getUser()
                );

                /*
                 * Optional calendar event settings
                 *
                 * For more information see : Toiba\FullCalendarBundle\Entity\Event
                 * and : https://fullcalendar.io/docs/event-object
                 */
                // $bookingEvent->setUrl('http://www.google.com');
                // $bookingEvent->setBackgroundColor($booking->getColor());
                // $bookingEvent->setCustomField('borderColor', $booking->getColor());


                //les event appartement a l'user sont affiché en rose et en cliquant dessus on les supprime
                if ($userId == $booking->getUser()->getId()) {
                    $bookingEvent->setUrl(
                        $this->router->generate('app_espacepatientloggedin_deleteappointment', array(
                            'id' => $booking->getId(),
                        ))
                    );
                    $bookingEvent->setBackgroundColor('pink');
                    $bookingEvent->setTextColor('red');
                    $bookingEvent->setTitle('Votre Rendez Vous -   Lieu: '.$booking->getPraticien()->getAddressPro());
                }
                else{
                    $bookingEvent->setBackgroundColor('blue');
                }

                $calendar->addEvent($bookingEvent);
            }
        }



        if($userRole=="ROLE_MEDIC"){
            $praticien=$filters["praticien"];

            $bookings = $this->em->getRepository(Booking::class)
                ->createQueryBuilder('b')
                ->andWhere('b.beginAt BETWEEN :startDate and :endDate')
                ->andWhere('b.praticien=:pid')
                ->setParameter('pid',$praticien)
                ->setParameter('startDate', $startDate->format('Y-m-d H:i:s'))
                ->setParameter('endDate', $endDate->format('Y-m-d H:i:s'))
                ->getQuery()->getResult();

            foreach($bookings as $booking) {

                // this create the events with your own entity (here booking entity) to populate calendar
                $bookingEvent = new Event(
                    $booking->getTitle(),
                    $booking->getBeginAt(),
                    $booking->getEndAt(), // If the end date is null or not defined, it creates a all day event
                    $booking->getPraticien(),
                    $booking->getUser()
                );

                /*
                 * Optional calendar event settings
                 *
                 * For more information see : Toiba\FullCalendarBundle\Entity\Event
                 * and : https://fullcalendar.io/docs/event-object
                 */
                // $bookingEvent->setUrl('http://www.google.com');
                // $bookingEvent->setBackgroundColor($booking->getColor());
                // $bookingEvent->setCustomField('borderColor', $booking->getColor());


                //les event appartement a l'user sont affiché en rose et en cliquant dessus on les supprime

                $bookingEvent->setUrl(
                    $this->router->generate('app_espacepraticienloggedin_sendmailpatient', array(
                        'id' => $booking->getUser()->getId(),
                    )));

                $bookingEvent->setBackgroundColor('blue');
                $bookingEvent->setTextColor('white');
                $bookingEvent->setTitle(''.$booking->getUser().'  TEL:'.$booking->getUser()->getMobilePhoneNumber());

                $calendar->addEvent($bookingEvent);
            }
        }
    }
}