<?php

namespace App\Controller\Admin;

use App\Entity\Manhwa;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ManhwaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manhwa::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
