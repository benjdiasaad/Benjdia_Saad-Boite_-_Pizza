<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RatingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RatingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class RatingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Rating');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/rating');
        $this->crud->setEntityNameStrings('rating', 'ratings');
    }

    public function setupListOperation()
    {

        $f1 = [
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Client'
        ];

        $f2 = [
            'name' => 'rating',
            'type' => 'text',
            'label' => "Rating"
        ];

        $this->crud->addColumns([$f1, $f2]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(RatingRequest::class);
        $this->crud->addField([  // Select
            'label' => "Client",
            'type' => 'select',
            'name' => 'client_id', 
            'entity' => 'client', 
            'attribute' => 'nom', 
        ]);
        $this->crud->addField([ 
            'label' => "Rating",
            'type' => 'number',
            'name' => 'rating', 
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
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Client'
        ];

        $f2 = [
            'name' => 'rating',
            'type' => 'text',
            'label' => 'Rating'
        ];

        $this->crud->addColumns([$f1,$f2]);

    } 
}
