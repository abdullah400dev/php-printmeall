<?php

namespace App\Http\Livewire;
use App\RProduct;
use App\Product;
use App\RSubCategories;
use App\PCategory;
use Livewire\Component;
use Livewire\WithPagination;


class RSubCategoryComponent extends Component
{
    use WithPagination;
    public function render($slug)
    {
        $subcats = RSubCategories::where('slug', $slug)->first();
        if(!$subcats){
            abort(404);
        }
        $products = RProduct::where('subcategory_id', $subcats->id)->where(['type'=>null])->paginate(9);
        $cproducts = RProduct::where('subcategory_id', $subcats->id)->where(['type'=>'1'])->paginate(9);
      //  $pcategories = PCategory::all();
        return view('livewire.r-sub-category-component', ['products'=>$products, 'category'=>$subcats, 'cproducts'=>$cproducts]);
    }
           function stores($product_id, $product_name, $product_price){
                Cart::add($product_id, $product_name, 1, $product_price)->associate('App\RProduct');
                session()->flash('success_msg', 'Item added in the Cart');
                return redirect()->route('product.cart');
    }
}
