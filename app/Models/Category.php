<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\Sluggable;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\SluggableScopeHelpers;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Source;

class Category extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use HasTranslations;
    use Sluggable, SluggableScopeHelpers;
//    protected $table = 'categories';
    protected $fillable = [
        'name','parent_id'
    ];
    protected $translatable = ['name', 'slug'];
    protected $guarded = ['id'];
    public function category(){
        return $this->belongsTo(Category::class,'parent_id','id');
    }
    public function sluggable()
    {
        return[
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }
}
