<?php

namespace App\Controller\Admin;

use App\Entity\SliderGames;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SliderGamesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SliderGames::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
