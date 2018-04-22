<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Flight;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Flight controller.
 *
 * @Route("flight")
 */
class FlightController extends Controller
{
    /**
     * Lists all flight entities.
     *
     * @Route("/", name="flight_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $flights = $em->getRepository('AppBundle:Flight')->findAll();

        return $this->render('flight/index.html.twig', array(
            'flights' => $flights,
        ));
    }

    /**
     * Finds and displays a flight entity.
     *
     * @Route("/{id}", name="flight_show")
     * @Method("GET")
     */
    public function showAction(Flight $flight)
    {

        return $this->render('flight/show.html.twig', array(
            'flight' => $flight,
        ));
    }
}
