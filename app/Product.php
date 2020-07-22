<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{

	protected $table="product";

	protected $fillable=['product_name','product_price','product_category','product_image','product_pdf'];

    use Sortable;
    
	public $sortable = ['product_name','product_price','product_category'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
