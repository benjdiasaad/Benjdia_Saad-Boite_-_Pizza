<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;
/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
    }

    protected function setupListOperation()
    {
        $f1 = [
            
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'height' => '120px',
             'width' => '120px',
        ];
        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];
        $f3 = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prénom',
        ];
        $f4 = [
            'name' => 'email',
            'type' => 'text',
            'label' => 'Email',
        ];
       
        $f7 = [
            'name' => 'admin',
            'type' => 'boolean',
            'label' => 'Admin'
        ];
        $this->crud->addColumns([$f1, $f2, $f3, $f4,$f7]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);
        $this->crud->addField('nom');
        $this->crud->addField('prenom');
        $this->crud->addField([
            'label' => "Email",'name' => 'email','type' => 'email'
            ]);
        $this->crud->addField([
            'label' => "Adresse",
            'name' => 'adresse','type' => 'address_algolia']);
        $this->crud->addField([
            'label' => "Login",
            'name' => 'login','type' => 'text']);
        $this->crud->addField( [
            'label' => "Mot de Passe",
            'name' => 'password','type' => 'password']);
        $this->crud->addField( [
            'label' => "Chiffre d'affaire",
            'name' => 'ca','type' => 'number']);
        $this->crud->addField( [
            'label' => "Date d'inscription",                           
            'name' => 'date_inscr','type' => 'datetime']);
        $this->crud->addField( [ 
            'name' => 'imgPath', 'type' => 'image', 
            'label' => 'Image','prefix' => 'uploads/images/clients/',
            'height' => '300px','crop' => true, 'aspect_ratio' => 1, 
            'upload' => true, 'tab' => 'Client Image']);
        $this->crud->addField('admin');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'height' => '200px',
            'label' => 'Image'
        ];
        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom'
        ];
        $f3 = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prénom',
        ];
        $f4 = [
            'name' => 'email',
            'type' => 'text',
            'label' => 'Email',
        ];
        $f5 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'Login',
        ];
        $f6 = [
            'name' => 'password',
            'type' => 'text',
            'label' => 'Mot de passe',
        ];
        $f7 = [
            'name' => 'admin',
            'type' => 'boolean',
            'label' => 'Admin',
        ];
        $f8 = [
            'name' => 'date_inscr',
            'type' => 'datetime',
            'label' => 'Date inscription',
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }


    public function store()
    {
        $this->crud->request = $this->crud->validateRequest();
        $this->crud->request = $this->handlePasswordInput($this->crud->request);
        $this->crud->unsetValidation(); // validation has already been run
        return $this->traitStore();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->crud->request = $this->crud->validateRequest();
        $this->crud->request = $this->handlePasswordInput($this->crud->request);
        $this->crud->unsetValidation(); // validation has already been run

        return $this->traitUpdate();
    }
    protected function handlePasswordInput($request)
    {
        if ($request->input('passowrd')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        return $request;
    }

    
}
