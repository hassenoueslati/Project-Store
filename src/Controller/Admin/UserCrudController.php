<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('username'),
            TextField::new('password'),
            ArrayField::new('Roles'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
                ->add(Crud::PAGE_INDEX, Action::DETAIL)
                ->update(Crud::PAGE_INDEX,Action::NEW,function (Action $action){
                    return $action->setIcon('fa fa-plus')->addCssClass('btn btn-success');
                })
                ->update(Crud::PAGE_INDEX,Action::EDIT,function (Action $action){
                    return $action->setIcon('fa fa-edit')->addCssClass('btn btn-warning');
                })
                ->update(Crud::PAGE_INDEX,Action::DETAIL,function (Action $action){
                    return $action->setIcon('fa fa-eye')->addCssClass('btn btn-info');
                })
                ->update(Crud::PAGE_INDEX,Action::DELETE,function (Action $action){
                    return $action->setIcon('fa fa-trash')->addCssClass('btn btn-danger');
                })
            ;
    }


}
