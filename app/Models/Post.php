<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\Sluggable;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use HasTranslations;
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'posts';
//    protected $fillable = [
//        'title',
//        'content',
//        'categoryid' => Category::class,
//    ];
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $translatable = ['name', 'slug'];

    public function sluggable()
    {
//        return [
//            'slug' => [
//                'source' => 'title'
//            ]
//        ];
//        $post = new Post([
//            'title' => 'My Awesome Blog Post',
//        ]);
//
//        $post->save();
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }


}
