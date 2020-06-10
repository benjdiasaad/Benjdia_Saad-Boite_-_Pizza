<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentaireRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use App\Models\Commentaire;

/**
 * Class CommentaireCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentaireCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commentaire');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commentaire');
        $this->crud->setEntityNameStrings('commentaire', 'commentaires');
    }

    protected function setupListOperation()
    {
        $f1 = [
            
            'name' => 'texte',
            'type' => 'text',
            'label' => 'Texte'
        ];
        $f2 = [
            'name' => 'date_pub',
            'type' => 'text',
            'label' => 'Date de Publication',
        ];
        
        $f3 = [
            'name' => 'produit.nom',
            'type' => 'text',
            'label' => 'Produit',
        ];
        $f4 = [
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Client'
        ];
        $this->crud->addColumns([$f4, $f3, $f2,$f1]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommentaireRequest::class);
        
        $this->crud->addField([
            'label' => "Date de publication",
            'name' => 'date_pub',
            'type' => 'datetime',
            'default' => '2020/05/07'
            ]);


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
        
        $this->crud->addField([
            'label' => "texte",
            'name' => 'texte',
            'type' => 'simplemde']);
        
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'texte',
            'type' => 'text',
            'label' => 'Texte'
        ];
        $f2 = [
            'name' => 'date_pub',
            'type' => 'text',
            'label' => 'Date de Publication',
        ];
        
        $f3 = [
            'name' => 'produit.nom',
            'type' => 'text',
            'label' => 'Produit',
        ];
        $f4 = [
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Client'
        ];
        $this->crud->addColumns([$f4, $f3, $f2,$f1]);
    }
   


}
