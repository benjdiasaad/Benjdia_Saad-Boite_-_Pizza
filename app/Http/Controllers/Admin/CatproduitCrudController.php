<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CatproduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CatproduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CatproduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Catproduit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/catproduit');
        $this->crud->setEntityNameStrings('catproduit', 'catproduits');
    }

    protected function setupListOperation()
    {
        $f1 = [
            'label' => "Nom de catégorie",
            'name' => 'nomCat',
            'type' => 'text'
        ];

        $this->crud->addColumns([$f1]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CatproduitRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField([
            'label' => "Nom de catégorie",
            'name' => 'nomCat',
            'type' => 'text'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'label' => "Nom de catégorie",
            'name' => 'nomCat',
            'type' => 'text'
        ];

        $this->crud->addColumns([$f1]);
    }
}
