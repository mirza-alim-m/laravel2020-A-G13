<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{

	protected $table="category";

	protected $fillable=['category_name','category_image','category_pdf'];

    use Sortable;

    public $sortable = ['category_name'];

    public function products(){
        return $this->hasMany(Product::class);
    }

}
