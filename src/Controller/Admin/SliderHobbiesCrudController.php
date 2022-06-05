<?php

namespace App\Controller\Admin;

use App\Entity\SliderHobbies;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class SliderHobbiesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SliderHobbies::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'New image for the slider hobbies')
            ->setPageTitle('edit', 'Edit the image')
            ->setPageTitle('index', 'See all the image');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled()->hideOnForm(),
            ImageField::new('path')
                ->setUploadDir('public/upload/sliderHobbies')
                ->setBasePath('upload/sliderHobbies')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/*'
                    ]
                ])
                ->setSortable(false),
        ];
    }
}
