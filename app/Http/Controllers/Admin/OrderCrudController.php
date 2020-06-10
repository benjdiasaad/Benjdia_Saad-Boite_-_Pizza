<?php

namespace App\Http\Controllers\Admin;
//use Datetime;
use App\Http\Requests\OrderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('order', 'orders');
    }

    public function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $f1 = [
            'name' => 'payment_intent_id',
            'type' => 'text',
            'label' => "Payment Id"
        ];

        $f2 = [
            'name' => 'amount',
            'type' => 'text',
            'label' => 'Amount'
        ];

        $f3 = [
            'name' => 'payment_created_at',
            'type' => 'text',
            'label' => 'la date de commande',
        ];
        
        $f4 = [
            'name' => 'products',
            'type' => 'text',
            'label' => 'Produits comandés',
        ];

        $f5 = [
            'name' => 'user.name',
            'type' => 'text',
            'label' => 'Client'
        ];

        $this->crud->addColumns([$f4, $f3, $f5,$f1,$f2]);


    }

    public function setupCreateOperation()
    {
        $this->crud->setValidation(OrderRequest::class);

        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
       $this->crud->addField([  // Select
        'label' => "Client",
        'type' => 'select',
        'name' => 'user_id', 
        'entity' => 'user', 
        'attribute' => 'name', 
    ]);
    
    $this->crud->addField([
        'label' => "Date de Commande",
        'name' => 'payment_created_at',
        'type' => 'datetime',
        'default' => '2020/06/11'
    ]);

    $this->crud->addField([  // Select
        'label' => "Amount",
        'type' => 'number',
        'name' => 'amount' 
    ]);
    
    $this->crud->addField([
        'label' => "Id payment",
        'name' => 'payment_intent_id',
        'type' => 'text'
    ]);

    $this->crud->addField([
        'label' => "Les produits",
        'name' => 'products',
        'type' => 'text'
    ]);

    }

    public function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
