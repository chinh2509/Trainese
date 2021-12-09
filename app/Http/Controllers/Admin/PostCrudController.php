<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PostCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PostCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
   use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation{show as traitbShow;}

    public function show($id)
    {
        //custom logic beforeow
        $content = $this->traitbShow($id);
        //cutom logic after
        return $content;
    }
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */

    public function setup()
    {
        CRUD::setModel(\App\Models\Post::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/post');
        CRUD::setEntityNameStrings('post', 'posts');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title');
        CRUD::column('content');
        CRUD::column('description');
        CRUD::column('category_id');
        CRUD::column('slug');
//        CRUD::column('thumnail');
            $this->crud->addField([
                'name'      => 'thumbnail', // The db column name
                'label'     => 'Thumbnail    ', // Table column heading
                'type'      => 'image',
                'height' => '30px',
                 'width'  => '30px',
            ]);


//        $this->crud->addColumn([
//            'name' => 'name',
//            'lable'=> 'Name',
//            'type' =>  'Category_id'
//        ]);


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PostRequest::class);

        CRUD::field('title');
        CRUD::field('category_id')->size(6);
        $this->crud->addField([
            // Select
            'label'     => "Category",
            'type'      => 'select',
            'name'      => 'category_id' , // the db column for the foreign key

            // optional
            // 'entity' should point to the method that defines the relationship in your Model
            // defining entity will make Backpack guess 'model' and 'attribute'
            'entity'    => 'category',

            // optional - manually specify the related model and attribute
            'model'     => "App\Models\Category", // related model
            'attribute' => 'name', // foreign key attribute that is shown to user

            // optional - force the related options to be a custom query, instead of all();
        ]);
        CRUD::field('content')->type('ckeditor');
        $this->crud->addField([
            'name'=> 'content',
            'type'=> 'ckeditor',
        ]);
        CRUD::field('description')->type('ckeditor');
        $this->crud->addcolumn([
//            'name' =>'name',
            'lable'=>'Name',
//            'type' =>'type'
              'name' => 'description',
               'type' => 'ckeditor'

        ]);
        $this->crud->addField([
            'name'      => 'thumbnail', // The db column name
            'label'     => 'Thumbnail    ', // Table column heading
            'type'      => 'image',
            'crop'      => true,
            'aspect_ratio' => 1
            // 'prefix' => 'folder/subfolder/',
            // image from a different disk (like s3 bucket)
            // 'disk'   => 'disk-name',
            // optional width/height if 25px is not ok with you
            // 'height' => '30px',
            // 'width'  => '30px',
        ]);






        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

