<?php

namespace App\Controller\Admin;

use App\Entity\Accomodation;
use App\Entity\Type;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AccomodationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Accomodation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('type'),
            TextField::new('category'),
            TextField::new('photo'),
            IntegerField::new('beds'),
            IntegerField::new('persons'),
            IntegerField::new('size'),
            IntegerField::new('price'),
            TextEditorField::new('description')

        ];
    }
}
