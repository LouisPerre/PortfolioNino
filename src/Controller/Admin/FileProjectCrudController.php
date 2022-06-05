<?php

namespace App\Controller\Admin;

use App\Entity\FileProject;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FileProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return FileProject::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->setDisabled(),
            TextField::new('name'),
            ImageField::new('path', 'Document')
                ->setUploadDir('public/upload/projectFile')
                ->setBasePath('upload/projectFile')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'application/pdf'
                    ]
                ])
                ->setSortable(false),
            AssociationField::new('project')
        ];
    }
}
