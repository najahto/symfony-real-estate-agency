<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;

class ContactNotification
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param Contact $contact
     * @throws TransportExceptionInterface
     */
    public function notify(Contact $contact){
        $email = (new TemplatedEmail())
            ->from(new Address('noreply@agency.com'))
            ->to(new Address('contact@agency.com'))
            ->subject('agency : '.$contact->getProperty()->getTitle())
            ->replyTo($contact->getEmail())
            ->htmlTemplate('emails/contact.html.twig')
            ->context([
                'contact' => $contact,
            ]);

        $this->mailer->send($email);
    }
}