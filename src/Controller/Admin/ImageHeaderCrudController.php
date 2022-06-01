<?php

namespace App\Controller\Admin;

use App\Entity\ImageHeader;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;

class ImageHeaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImageHeader::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('new', 'New image header')
            ->setPageTitle('edit', 'Edit the image header')
            ->setPageTitle('index', 'See all image header');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(DateTimeFilter::new('created_at'));
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled()->hideOnForm(),
            ImageField::new('path')
                ->setUploadDir('public/upload/imageHeader')
                ->setBasePath('upload/imageHeader')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/*'
                    ]
                ])
                ->setSortable(false),
            DateTimeField::new('created_at')->setDisabled()->hideOnForm()
        ];
    }

}
