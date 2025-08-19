<?php

namespace App\Http\Livewire;
use App\RProduct;
use App\PCategory;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
        use WithPagination;
        private $category;
        
    public function render($slug)
    {
        $subcats = PCategory::where('slug', $slug)->first();
        if(!$subcats){
            abort(404);
        }
        //$products = RProduct::where('category_id', $slug->id)->paginate(9);
        //$pcategories = $this->category->allcategory();
        return view('livewire.category-component', [ 'category'=>$subcats]);
    }
           function stores($product_id, $product_name, $product_price){
                Cart::add($product_id, $product_name, 1, $product_price)->associate('App\RProduct');
                session()->flash('success_msg', 'Item added in the Cart');
                return redirect()->route('product.cart');
            }
}
