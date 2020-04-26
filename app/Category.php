<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use Sortable;
    protected $guarded = [];

    public $sortable = ['category_name'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
