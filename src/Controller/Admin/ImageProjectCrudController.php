<?php

namespace App\Controller\Admin;

use App\Entity\ImageProject;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ImageProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImageProject::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            ImageField::new('path')
                ->setUploadDir('public/upload/projectSlider')
                ->setBasePath('upload/projectSlider')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/*'
                    ]
                ])
                ->setSortable(false),
            AssociationField::new('project')
        ];
    }

}
