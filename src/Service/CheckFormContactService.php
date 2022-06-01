<?php

namespace App\Service;

use App\Entity\ContactForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;

class CheckFormContactService
{

    public function __construct(
        private EntityManagerInterface $manager,
    )
    {
    }

    public function checkFormValidity(FormInterface $form): void
    {
        if (!filter_var($form->get('email')->getData(), FILTER_VALIDATE_EMAIL))
        {
            return;
        }
        if (strlen($form->get('subject')->getData()) < 2)
        {
            return;
        }
        if (strlen($form->get('message')->getData()) < 10)
        {
            return;
        }
        if (!str_contains($form->get('message')->getData(), ' '))
        {
            return;
        }

        $contact = new ContactForm();
        $contact->setEmail($form->get('email')->getData());
        $contact->setSubject(addslashes($form->get('subject')->getData()));
        $contact->setMessage(addslashes($form->get('message')->getData()));
        $contact->setAlreadyRead(false);
        $this->manager->persist($contact);
        $this->manager->flush();
    }


}