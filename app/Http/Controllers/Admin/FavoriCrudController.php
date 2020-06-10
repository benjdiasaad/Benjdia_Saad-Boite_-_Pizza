<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FavoriRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FavoriCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class FavoriCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Favori');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/favori');
        $this->crud->setEntityNameStrings('favori', 'favoris');
    }

    public function setupListOperation()
    {
        $f1 = [
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Client'
        ];
        $f2 = [
            'name' => 'produit.nom',
            'type' => 'text',
            'label' => 'Produit',
        ];
        $this->crud->addColumns([$f1,$f2]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(FavoriRequest::class);


        $this->crud->addField([  // Select
            'label' => "Client",
            'type' => 'select',
            'name' => 'client_id', 
            'entity' => 'client', 
            'attribute' => 'nom', 
        ]);

        $this->crud->addField([  // Select
            'label' => "Produit",
            'type' => 'select',
            'name' => 'produit_id', 
            'entity' => 'produit', 
            'attribute' => 'nom', 
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
            'name' => 'produit.nom',
            'type' => 'text',
            'label' => 'Produit',
        ];
      
        $this->crud->addColumns([$f1, $f2]);
    }


}
