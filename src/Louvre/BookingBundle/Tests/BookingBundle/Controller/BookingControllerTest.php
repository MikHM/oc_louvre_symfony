<?php

namespace tests\BookingBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;


class BookingControllerTest extends WebTestCase
{
    public function testNewBooking()
    {
        $client = static::createClient();

        /*$crawler = $client->request("GET", "/newbooking");

        $this->assertGreaterThan(0, $crawler->filter("html:contains('Date de votre visite:')")->count());*/


        $crawler = $client->request("GET", "/newbooking");

        $form = $crawler->selectButton("submit")->form();
        $form["name"] = "louvre_bookingbundle_booking";
        $form["form_name[subject]"] = "Testitestos";

        $crawler = $client->submit($form);
    }

}