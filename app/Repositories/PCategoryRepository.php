<?php


namespace App\Repositories;
use App\Repositories\Interfaces\PCategoryRepositoryInterface;
use App\PCategory;

class PCategoryRepository implements PCategoryRepositoryInterface
{
    
    public function allcategory(){
        return PCategory::all();
    }
    
}
