<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * Review controller.
 *
 * @Route("review")
 */
class ReviewController extends Controller
{
    public function indexAction()
    {
        /**
         * Lists all reviews.
         *
         * @Route("/review", name="review_index")
         * @Method("GET")
         */
        return $this->render('review/index.html.twig');
    }
}
