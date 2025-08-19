<?php

namespace App\Http\Livewire;
use App\Category;
use App\RSubCategories;
use App\RProduct;
use App\PCategory;
use App\Variations;
use App\RProducts;
use App\ProductAttribute;
use App\AttributeValues;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddProductComponent extends Component
{
    use WithFileUploads;
    public $attr;
    public $inputs =[];
    public $attribute_arr = [];
    public $attribute_values;
    public $productname;
    public $metadesc;
    public $toprice;
    public $fromprice;
    public $UaeCurrency;
    public $category;
    public $subcategory;
    public $desc;
    public $stock;
    public $SKU;
    public $pkr_sale;
    public $usd_sale;
    public $uae_sale;
    public $quantity;
    public $photos = [];
    public $fphotos;
    public $variations=[];
    public $variation_value=[];
    public $variation_array=[];
    public function add(){
        if(!in_array($this->attr, $this->attribute_arr)){
            array_push($this->inputs, $this->attr);
            array_push($this->attribute_arr, $this->attr);
        }
    }
       public function addvariation($values){
        if(!in_array($values, $this->variations)){
            array_push($this->variations, $values);
           // array_push($this->attribute_arr, $this->attr);
        }
    }
     public function add_variation($i, $value){
     //    $this->variations['ab'][$i] = $value;
       //  $this->variations['ab']['price'] = $this->variation_value[$i];
    }
    public function remove($attr){
       unset($this->inputs[$attr]);
       unset($this->attribute_arr[$attr]);
    }
        public function removevar($value){
      //  dd($this->variations[$value]);
        if(in_array($value, $this->variations)){
         unset($this->variation_array[$this->variations[$value]]);
            unset($this->variations[$value]);
           // array_push($this->attribute_arr, $this->attr);
        }
    }
      public function addrproductquery(){
         // dd($this->variation_value);
          $this->validate([
     'productname' => 'required|max:250',
     'metadesc' => 'required|max:250',
     'toprice' => 'required|numeric',
     'fromprice' => 'required|numeric',
     'UaeCurrency' => 'required|numeric',
     'category' => 'required',
     'subcategory' => 'required',
     'fphotos' => 'required',
     'photos' => 'required',
     'stock'=> 'required',
     'SKU' => 'required|max:210',
     'quantity' => 'required',
     'desc' => 'required'
            ]);
        $add = new RProduct;
        $pname =$this->productname;
        $slug = Str::slug($pname, '-');
        $oldproducts = RProduct::where('slug', $slug)->count();
        if($oldproducts > 1){
         $numericalPrefix = 1;
        while($numericalPrefix){
         $pname = $pname.'-'.$numericalPrefix;
        $slug = Str::slug($pname, '-');
           $oldproducts = RProduct::where('slug', $slug)->count();
           if($oldproducts > 1){
               $numericalPrefix++;
           }else{
        $add->slug = $slug;
           break;
               
           }
         }
        }else{
            $add->slug = $slug;
        }
        $add->name = $this->productname;
        $add->metades = $this->metadesc;
        $add->regular_price = $this->toprice;
        $add->sale_price = $this->fromprice;
        $add->UaeCurrency = $this->UaeCurrency;
        $add->pkr_sale =  $this->pkr_sale;
        $add->usd_sale =  $this->usd_sale;
        $add->uae_sale =  $this->uae_sale;
        $add->category_id =  $this->category;
        $add->subcategory_id =  $this->subcategory;
        $fimages='';
        if($this->fphotos)
        {
            $ffile = $this->fphotos;
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->storeAs('images', $filename);
            $url = $filename;
                $add->image = $url;
                     
        }
                $images;
        if($this->photos)
        {
            $i=1;
            foreach( $this->photos as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->storeAs('images', $filename);
            $url = $filename;
            $images[] = $url;
            $i++;
        }
                $add->images = json_encode($images);
                     
        }

        $add->short_description = $this->desc;
        $add->description = $this->desc;
        $add->featured = 0;
        $add->stock_status = $this->stock;
        $add->SKU = $this->SKU;
        $add->quantity = $this->quantity;
        $add->save();
        if($this->attribute_values){
        foreach($this->attribute_values as $key => $attribute_value){
            $avalues = explode(",", $attribute_value);
            foreach($avalues as $avalue){
                $attr_value = new AttributeValues();
                $attr_value->product_attribute_id = $key;
                 $attr_value->value = $avalue;
                  $attr_value->rproduct_id = $add->id;
                  $attr_value->save();
            }
        }
        }
          if($this->variation_array){
         foreach($this->variation_array as $key=>$value){
                         $variation = new Variations();
               foreach($this->variation_array[$key] as $keys=>$values){
                   if(array_key_exists('price', $this->variation_array[$key])){
                      $variation->pkr_price = $this->variation_array[$key]['price'];
                      $variation->sale_pkr_price = $this->variation_array[$key]['sale_price'];
                      
                      $variation->usd_price = $this->variation_array[$key]['usd_price'];
                      $variation->usd_sale_price = $this->variation_array[$key]['usd_sale_price'];
                      
                      $variation->uae_price = $this->variation_array[$key]['uae_price'];
                      $variation->uae_sale_price = $this->variation_array[$key]['uae_sale_price'];
                       unset($this->variation_array[$key]['price']);
                       unset($this->variation_array[$key]['sale_price']);
                       unset($this->variation_array[$key]['usd_price']);
                       unset($this->variation_array[$key]['usd_sale_price']);
                       unset($this->variation_array[$key]['uae_price']);
                       unset($this->variation_array[$key]['uae_sale_price']);
                   }
                   $variation->productId =  $add->id;
                  $variation->vairations = json_encode(array_filter($this->variation_array[$key], 'strlen'));
                  $variation->save();
               }
          }
      }
        return redirect('addrproduct')->with('success', 'You have Successfully Added Product');
    }
    public function showImage(){
        if($this->fphotos){
            dd($this->fphotos);
        }else{
            dd('not');
        }
        
    }
    public function render()
    {
         $cat =  PCategory::all();
        $subcat = RSubCategories::all();
        $product_attributes = ProductAttribute::all();
        return view('livewire.add-product-component', ['cat'=>$cat, 'subcat'=>$subcat, 'product_attributes'=>$product_attributes]);
    }
}
