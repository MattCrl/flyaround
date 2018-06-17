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

    public function sendMail($pilot, $user)
    {
        $mail = new \Swift_Message('Flyaround, reservation validation');
        $mail
            ->setFrom('reservations@flyaround.com')
            ->setTo($pilot)
            ->setSubject('Notification de réservation d\'un vol')
            ->setBody($this->templating->render('mail/pilot-notif-mail.html.twig'),'text/html');

        $this->mailer->send($mail);

        $mail
            ->setFrom('reservations@flyaround.com')
            ->setTo($user)
            ->setSubject('Confirmation de réservation d\'un vol')
            ->setBody($this->templating->render('mail/user-confirm-mail.html.twig'),'text/html');

        $this->mailer->send($mail);
    }


}