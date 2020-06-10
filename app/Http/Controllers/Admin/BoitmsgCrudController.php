<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BoitmsgRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BoitmsgCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BoitmsgCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Boitmsg');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/boitmsg');
        $this->crud->setEntityNameStrings('boitmsg', 'boitmsgs');
    }

    public function setupListOperation()
    {
        $f5 = [
            'name' => 'date',
            'type' => 'datetime',
            'label' => "Date d'envoi de message"
        ];

        $f1 = [
            'name' => 'vu',
            'type' => 'boolean',
            'label' => 'Vu'
        ];

        $f2 = [
            'name' => 'message',
            'type' => 'text',
            'label' => 'Message',
        ];
        
        $f3 = [
            'name' => 'objet',
            'type' => 'text',
            'label' => 'Objet',
        ];

        $f4 = [
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Client'
        ];

        $this->crud->addColumns([$f4, $f3, $f2,$f1,$f5]);
    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(BoitmsgRequest::class);
        
        $this->crud->addField([  // Select
            'label' => "Client",
            'type' => 'select',
            'name' => 'client_id', 
            'entity' => 'client', 
            'attribute' => 'nom', 
        ]);
        
        $this->crud->addField([
            'label' => "Date de d'envoi de Message",
            'name' => 'date',
            'type' => 'datetime',
            'default' => '2020/05/21'
        ]);

        $this->crud->addField([  // Select
            'label' => "Objet",
            'type' => 'text',
            'name' => 'objet' 
        ]);
        
        $this->crud->addField([
            'label' => "Message",
            'name' => 'message',
            'type' => 'simplemde'
        ]);

        $this->crud->addField([
            'label' => "Vu",
            'name' => 'vu',
            'type' => 'boolean'
        ]);

    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f5 = [
            'name' => 'vu',
            'type' => 'boolean',
            'label' => 'Vu'
        ];

        $f1 = [
            'name' => 'message',
            'type' => 'text',
            'label' => 'Message'
        ];
        $f2 = [
            'name' => 'date',
            'type' => 'datetime',
            'label' => "Date d'envoi de message",
        ];
        
        $f3 = [
            'name' => 'objet',
            'type' => 'text',
            'label' => 'Objet de message',
        ];
        $f4 = [
            'name' => 'client.nom',
            'type' => 'text',
            'label' => 'Client'
        ];
        $this->crud->addColumns([$f4, $f3, $f2,$f1,$f5]);
    }


}
