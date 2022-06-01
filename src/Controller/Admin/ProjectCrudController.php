<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;
use EasyCorp\Bundle\EasyAdminBundle\Filter\NumericFilter;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'See Project')
            ->setPageTitle('edit', 'Edit Project')
            ->setPageTitle('new', 'Add New Project');
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(DateTimeFilter::new('startDate'))
            ->add(NumericFilter::new('people'))
            ->add(BooleanFilter::new('isFavorite'));
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled()->hideOnForm(),
            TextField::new('title')->setSortable(false),
            ImageField::new('imageHighlight')
                ->setUploadDir('public/upload/projectHighlight')
                ->setBasePath('upload/projectHighlight')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/*'
                    ]
                ])
                ->setSortable(false),
            DateTimeField::new('startDate'),
            TextField::new('duration')->setSortable(false),
            IntegerField::new('people'),
            TextEditorField::new('description')->setSortable(false),
            TextField::new('youtubeVideo')->setSortable(false),
            TextField::new('technologie')->setSortable(false),
            TextEditorField::new('context')->setSortable(false),
            TextField::new('linkItch')->setSortable(false),
            BooleanField::new('isFavorite'),
            TextField::new('roles')->setSortable(false),
            TextField::new('event')->setSortable(false),
            TextField::new('theme')->setSortable(false),
            ArrayField::new('files')->setSortable(false)
        ];
    }

}
