<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;

/**
 * Review controller.
 *
 * @Route("review")
 */
class ReviewController extends Controller
{
    /**
     * Lists all reviews.
     *
     * @Route("/", name="review_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reviews = $em->getRepository('AppBundle:Review')->findAll();

        return $this->render('review/index.html.twig', ['reviews' => $reviews]);
    }

    /**
     * Add a new review.
     *
     * @Route("/new", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {
        // J'ai ajouté la méthode POST pour le futur formulaire de la prochaine quête
        return $this->render('review/new.html.twig');
    }
}
