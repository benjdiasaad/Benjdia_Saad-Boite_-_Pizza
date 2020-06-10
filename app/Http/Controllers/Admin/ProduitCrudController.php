<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use App\Models\Produit;

/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('produit', 'produits');
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
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f4 = [
            'name' => 'remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f5 = [
            'name' => 'category.nomCat',
            'type' => 'text',
            'label' => 'Categorie'
        ];
        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5]);
    }

    protected function setupCreateOperation()
    {
        
        $this->crud->setValidation(ProduitRequest::class);

        $this->crud->addField('nom');
        $this->crud->addField([
            'label' => "Prix",
            'name' => 'prix',
            'type' => 'number']);
        $this->crud->addField('remise');
        $this->crud->addField([  // Select
            'label' => "Categorie",
            'type' => 'select',
            'name' => 'category_id', 
            'entity' => 'category', 
            'attribute' => 'nomCat', 
        ]);
        $this->crud->addField([
            'label' => "Date début",
            'name' => 'date_debut',
            'type' => 'datetime']);
        $this->crud->addField( [
            'label' => "Date fin",
            'name' => 'date_fin',
            'type' => 'datetime']);
        $this->crud->addField('isPromo');
        
        
        $this->crud->addField( [ 
            'name' => 'imgPath', 
            'type' => 'image', 
            'label' => 'Image', //'prefix' => 'storage/',
            'prefix' => 'uploads/images/produits/',
            'height' => '300px', 
            'crop' => true, 'aspect_ratio' => 1, 
            'upload' => true, 'tab' => 'Produit Image']);
        // TODO: remove setFromDb() and manually define Fields
       // $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
   //show = preview
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
            'name' => 'prix',
            'type' => 'text',
            'label' => 'Prix',
        ];
        $f4 = [
            'name' => 'remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f5 = [
            'name' => 'category.nomCat',
            'type' => 'text',
            'label' => 'Catégorie',
        ];
        $f6 = [
            'name' => 'date_fin',
            'type' => 'date',
            'label' => 'Date fin',
        ];
        $f7 = [
            'name' => 'date_debut',
            'type' => 'date',
            'label' => 'Date début',
        ];
        $f8 = [
            'name' => 'isPromo',
            'type' => 'text',
            'label' => 'isPromo',
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }

   
}







