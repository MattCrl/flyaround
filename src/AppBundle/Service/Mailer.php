<?php
/**
 * Created by PhpStorm.
 * User: mattcrl
 * Date: 27/05/18
 * Time: 13:51
 */

namespace AppBundle\Service;


class Mailer
{
    protected $mailer;

    protected $templating;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendMail($to, $body)
    {

        $mail = new \Swift_Message('Flyaround, reservation validation');
        $mail
            ->setFrom('reservations@flyaround.com')
            ->setTo($to)
            ->setBody($body, 'text/html');

        $this->mailer->send($mail);
    }

}