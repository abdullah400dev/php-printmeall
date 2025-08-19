<?php

namespace App\Http\Livewire;

use App\Category;
use App\RSubCategories;
use App\Product;
use App\RProduct;
use App\PCategory;
use App\RProducts;
use App\Variations;
use App\ProductAttribute;
use App\AttributeValues;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class EditCustomProduct extends Component
{
       use WithFileUploads;
    public $attr;
    public $inputs =[];
    public $attribute_arr = [];
    public $attribute_values=[];
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
    public $quantity;
    public $weight;
    public $Imgphotos = [];
    public $fphotos;
    public $fphotoss;
    public $fimages;
    public $pid;
    public $pkr_sale;
    public $usd_sale;
    public $uae_sale;
    public $OldImages;
    public $OldImageArray = [];
    public $variations=[];
    public $variation_value=[];
    public $variation_array=[];
    public $formids = 1;
    public $formfields = [];
    public $feilds_values = [];
    
     public function addvariation($values){
        if(!in_array($values, $this->variations)){
            array_push($this->variations, $values);
           // array_push($this->attribute_arr, $this->attr);
        }
    }
      public function addformfeilds(){
        $formfeild = 'F'.$this->formids;
        if(!in_array($formfeild, $this->feilds_values)){
         array_push($this->feilds_values, $this->formids);
           $this->formids++;
        }
    }
    
    public function removeformfeild($key){
         unset($this->feilds_values[$key]);
    }
     public function add_variation($i, $value){
     //    $this->variations['ab'][$i] = $value;
       //  $this->variations['ab']['price'] = $this->variation_value[$i];
    }
    
    public function removevar($value){
         unset($this->variation_array[$this->variations[$value]]);
            unset($this->variations[$value]);
    }
    
    function mount($pid){
        $this->pid = $pid;
        $product = RProduct::where('id', $this->pid)->first();
        $this->productname = $product->name;
        $this->metadesc = $product->metades;
        $this->category = $product->category;
        $this->subcategory = $product->subcategory;
        $this->slug = $product->slug;
        $this->desc = $product->description;
        $this->stock = $product->stock_status;
        $this->SKU = $product->SKU;
        $this->quantity = $product->quantity;
        $this->weight  = $product->weight;
        $this->fphotos = $product->image;
        $this->feilds_values = json_decode($product->formfields, true);
        $this->OldImages = $product->images;
        $this->OldImageArray = json_decode($this->OldImages);
        $this->inputs = $product->attributeValues->where('rproduct_id', $this->pid)->unique('product_attribute_id')->pluck('product_attribute_id');
        $this->attribute_arr = $product->attributeValues->where('rproduct_id', $this->pid)->unique('product_attribute_id')->pluck('product_attribute_id');
        foreach($this->attribute_arr as $a_arr){
            $allAttributes = AttributeValues::where('rproduct_id', $this->pid)->where('product_attribute_id', $a_arr)->get()->pluck('value');
            $valuesSting = '';
            foreach($allAttributes as $value){
                $valuesSting = $valuesSting . $value . ',';
            }
            $this->attribute_values[$a_arr] = rtrim($valuesSting, ",");
        }
        $variations = Variations::where('productId', $this->pid)->get();
                    $i=1;
        foreach($variations as $variations){
            $j = 'A'.$i;
            foreach(json_decode($variations->vairations, true) as $key=>$value){
        $this->variation_array[$j][$key] = $value;
            }
            array_push($this->variations,  $j);
            $this->variation_array[$j]['price'] = $variations->pkr_price;
            $this->variation_array[$j]['sale_price'] = $variations->sale_pkr_price;
            $this->variation_array[$j]['usd_price'] = $variations->usd_price;
            $this->variation_array[$j]['usd_sale_price'] = $variations->usd_sale_price;
            $this->variation_array[$j]['uae_price'] = $variations->uae_price;
            $this->variation_array[$j]['uae_sale_price'] = $variations->uae_sale_price;
            $i++;
        }
    }
    
    public function removeImg($index){
        array_splice($this->Imgphotos, $index);
    }
    
    public function removeOldImg($index){
    unset($this->OldImageArray[$index]);
    }
    
    public function add(){
        if(!$this->attribute_arr->contains($this->attr)){
            $this->inputs->push($this->attr);
            $this->attribute_arr->push($this->attr);
        }
         
    }
    public function remove($attr){
       unset($this->inputs[$attr]);
       unset($this->attribute_arr[$attr]);
      // unset($this->attribute_values[$attr]);
      // dd($this->attribute_values);
    }
    
      public function updaterproductquery(){
          $this->validate([
     'productname' => 'required|max:250',
     'metadesc' => 'required|max:250',
     'slug'=> 'required',
     'stock'=> 'required',
     'SKU' => 'required|max:210',
     'quantity' => 'required',
     'desc' => 'required'
            ]);
        $add = RProduct::find($this->pid);
        $pname =$this->slug;
        $slug = Str::slug($pname, '-');
        $oldproducts = RProduct::where('slug', $slug)->count();
        if($oldproducts > 1){
         $numericalPrefix = 1;
        while($numericalPrefix){
         $pname = $pname.'-'.$numericalPrefix;
        $slug = Str::slug($pname, '-');
           $oldproducts = RProduct::where('slug', $slug)->count();
           if($oldproducts > 0){
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
        $add->weight = $this->weight;
        if($this->category){
        $add->category_id =  $this->category;
        }
        if($this->subcategory){
        $add->subcategory_id =  $this->subcategory;
        }
       // $fimages='';
        if($this->fimages)
        {
            $ffile = $this->fimages;
            $extension = $ffile->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $ffile->storeAs('images', $filename);
            $url = $filename;
                $add->image = $url;
                     
        }
                $images;
        foreach($this->OldImageArray as $oldig){
            $images[] = $oldig;
        }
        if($this->Imgphotos)
        {
            $i=1;
            foreach( $this->Imgphotos as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time() .$i.'.' . $extension;
            $file->storeAs('images', $filename);
            $url = $filename;
            $images[] = $url;
            $i++;
        }
        }
        $add->images = json_encode($images);

        $add->short_description = $this->desc;
        $add->description = $this->desc;
        $add->featured = 0;
        if($this->feilds_values){
            $add->formfields = json_encode($this->feilds_values);
        }
        $add->stock_status = $this->stock;
        $add->SKU = $this->SKU;
        $add->quantity = $this->quantity;
        $add->save();

           return redirect('addrproduct')->with('success', 'You have Successfully Updated Product');
    }
    
    public function showImage(){
        if($this->OldImages){
            dd($this->OldImages);
        }else{
            dd('not');
        }
        
    }
    public function render()
    {
         $products = RProduct::where(['id'=>$this->pid])->first();
         $cat =  PCategory::all();
         $subcat = RSubCategories::all();
         $product_attributes = ProductAttribute::all();
        return view('livewire.edit-custom-product', ['cat'=>$cat , 'product'=>$products, 'subcat'=>$subcat, 'product_attributes'=>$product_attributes]);
    }
}