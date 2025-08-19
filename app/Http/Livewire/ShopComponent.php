<?php

namespace App\Http\Livewire;
use App\RProduct;
use App\PCategory;
use App\RSubCategories;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
   use WithPagination;
    public function render()
    {
        $products = RProduct::paginate(16)->except([21, 23, 22, 24]);
        $pcategories = PCategory::skip(1)->take(6)->get();
        $pcategories2 = PCategory::skip(6)->take(15)->orderBy('id', 'ASC')->get();
        $fcategory = RSubCategories::where(['MainId'=>12])->get();
        $bcategory = RSubCategories::where(['MainId'=>4])->get();
        $pcategory = RSubCategories::where(['MainId'=>5])->orWhere(['MainId'=>9])->get();
        $picategory = RSubCategories::where(['MainId'=>9])->get();
        return view('livewire.shop-component', ['products'=>$products, 'pcategories'=>$pcategories, 'pcategories2'=>$pcategories2, 'bcategory'=>$bcategory, 'fcategory'=>$fcategory, 'pcategory'=>$pcategory, 'picategory'=>$picategory]);
    }
           function stores($product_id, $product_name, $product_price){
                Cart::add($product_id, $product_name, 1, $product_price)->associate('App\RProduct');
                session()->flash('success_msg', 'Item added in the Cart');
                return redirect()->route('product.cart');
            }
}