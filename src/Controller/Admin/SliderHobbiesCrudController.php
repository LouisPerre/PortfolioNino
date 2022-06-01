<?php

namespace App\Controller\Admin;

use App\Entity\SliderHobbies;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SliderHobbiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SliderHobbies::class;
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
