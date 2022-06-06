<?php

namespace App\Controller\Admin;

use App\Entity\TextHomePage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class TextHomePageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TextHomePage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'See users')
            ->setPageTitle('edit', 'Edit user ');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE)
            ->remove(Crud::PAGE_DETAIL, Action::DELETE);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled()->hideOnForm(),
            TextEditorField::new('textHobbies', 'Text Hobbies'),
            TextEditorField::new('textGames', 'Text Games'),
        ];
    }
}
