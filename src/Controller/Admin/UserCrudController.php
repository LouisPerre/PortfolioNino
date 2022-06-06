<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
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
            ->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->setDisabled(),
            EmailField::new('email'),
            ChoiceField::new('roles')->allowMultipleChoices()->setChoices([
                    'Administrator' => 'ROLE_ADMIN',
                    'User' => 'ROLE_USER',
                ]
            )->hideOnForm(),
            TextField::new('password')->setDisabled()->hideOnIndex(),
            TextField::new('name', 'Prenom'),
            TextField::new('last_name', 'Nom de famille'),
            ImageField::new('resume', 'CV')
                ->setUploadDir('public/upload/userResume')
                ->setBasePath('upload/userResume')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'application/pdf'
                    ]
                ])
                ->setSortable(false),
        ];
    }
}
