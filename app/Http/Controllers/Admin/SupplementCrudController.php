<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SupplementRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SupplementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SupplementCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Supplement');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/supplement');
        $this->crud->setEntityNameStrings('supplement', 'supplements');
    }

    public function setupListOperation()
    {
        $f1 = [
            'name' => 'nomingred',
            'type' => 'text',
            'label' => "Nom de l'ingrédient",
        ];
        $f2 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix'
        ];
        $this->crud->addColumns([$f1,$f2]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(SupplementRequest::class);
        $this->crud->addField([  // Select
            'label' => "Nom de l'ingrédient",
            'type' => 'text',
            'name' => 'nomingred', 
        ]);
        $this->crud->addField([
            'name' => 'prix',
            'type' => 'number',
            'label' => 'Prix'
        ]);
        
    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'nomingred',
            'type' => 'text',
            'label' => "Nom de l'ingrédient"
        ];

        $f2 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix'
        ];

        $this->crud->addColumns([$f1,$f2]);

    } 
}
