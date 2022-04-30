<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('Title')
            ;

    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('Title'),
            TextEditorField::new('Description'),
            ImageField::new('Picture')->setUploadDir("public/assets/blog/images")
                                                ->setBasePath("/assets/blog/images")
                                                ->setRequired(false)
                                                #->setFormType()
                                                ->setLabel('Picture'),



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
