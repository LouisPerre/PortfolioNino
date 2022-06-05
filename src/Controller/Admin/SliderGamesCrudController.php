<?php

namespace App\Controller\Admin;

use App\Entity\SliderGames;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class SliderGamesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SliderGames::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'New image for the games slider')
            ->setPageTitle('edit', 'Edit the image')
            ->setPageTitle('index', 'See all the images');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled()->hideOnForm(),
            ImageField::new('path')
                ->setUploadDir('public/upload/sliderGames')
                ->setBasePath('upload/sliderGames')
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
