<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use Sortable;
    protected $guarded = [];

public $sortable = ['name', 'price'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
