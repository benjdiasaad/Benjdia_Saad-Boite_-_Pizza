<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
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
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Nom de Formule',
        ];
        $f3 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f4 = [
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description',
        ];
        
        $this->crud->addColumns([$f2, $f1, $f3, $f4]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FormuleRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField([
            'name' => 'nomFormule', 
            'type' => 'text', 
            'label' => 'Nom de formule'
        ]);
        $this->crud->addField([
            'name' => 'prix', 
            'type' => 'number', 
            'label' => 'Prix'
        ]);
        $this->crud->addField('description');
        $this->crud->addField( [ 
            'name' => 'imgPath', 
            'type' => 'image', 
            'label' => 'Image', //'prefix' => 'storage/',
            'prefix' => 'uploads/images/produits/',
            'height' => '300px', 
            'crop' => true, 'aspect_ratio' => 1, 
            'upload' => true, 'tab' => 'Formule Image']);
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
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Nom de formule'
        ];
        $f3 = [
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f4 = [
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description',
        ];
        

        $this->crud->addColumns([$f1, $f2, $f3, $f4]);
        // $this->crud->removeColumn('date');
    }
}
