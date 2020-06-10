<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ElementbaseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ElementbaseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ElementbaseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Elementbase');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/elementbase');
        $this->crud->setEntityNameStrings('elementbase', 'elementbases');
    }

    public function setupListOperation()
    {
        $f1 = [
            'name' => 'nomElem',
            'type' => 'text',
            'label' => "Nom de l'élément"
        ];
        $this->crud->addColumns([$f1]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(ElementbaseRequest::class);

        $this->crud->addField([
            'label' => "Nom d'élément",
            'name' => 'nomElem',
            'type' => 'text'
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
            'label' => "Nom d'élément",
            'name' => 'nomElem',
            'type' => 'text'
        ];

        $this->crud->addColumns([$f1]);
    }
}
