<?php

namespace App\Controller\Admin;

use App\Entity\Accomodation;
use App\Entity\Type;
use ContainerB97OT2j\getTypeCrudControllerService;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

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
            AssociationField::new('type'),
            AssociationField::new('category'),
            AssociationField::new('amenities'),
            TextField::new('photo'),
            IntegerField::new('beds'),
            IntegerField::new('persons'),
            IntegerField::new('size'),
            IntegerField::new('price'),
            TextEditorField::new('description')

        ];
    }
}
