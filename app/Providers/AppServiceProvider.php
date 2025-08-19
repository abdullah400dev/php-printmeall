<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\RSubCategories;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\View;
use App\Repositories\Interfaces\PCategoryRepositoryInterface;
use App\Repositories\PCategoryRepository;
//use App\View\Composers\CatgroriesComposer;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    $this->app->bind(
        PCategoryRepositoryInterface::class, PCategoryRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
      //  View::composer('*',CatgroriesComposer::class);
       $categories1 = DB::table('categories')->get();
        view()->share('globalcats', $categories1);
        $globalproducts = DB::table('products')->take(3)->get();
        view()->share('globalproducts', $globalproducts);
         $globquotes=DB::table('quotes')->where(['status'=>NULL])->take('5')->orderBy('created_at', 'DESC')->get();
        $quotescountunread = $globquotes->count();
     //   $boxesbyIndustry = Category::with('products')->where(['id'=>'17'])->get();
        $printedboxes = DB::table('categories')->where('id','!=','16')->where('id','!=','15')->where('id','!=','17')->get();
         $rprintedboxes = RSubCategories::where('MainId','4')->get();
         $rprintboxescount = RSubCategories::where('MainId','4')->count();
     //   $boxesbystyle = Category::with('products')->where(['id'=>'16'])->get();
     //   $retailboxes = Category::with('products')->where(['id'=>'15'])->get();
        view()->share('globquotes', $globquotes);
        view()->share('quotescountunread', $quotescountunread);
       // view()->share('boxesbyIndustry', $boxesbyIndustry);
        view()->share('printedboxes', $printedboxes);
      //  view()->share('boxesbystyle', $boxesbystyle);
      //  view()->share('retailboxes', $retailboxes);
        view()->share('rprintedboxes', $rprintedboxes);
        view()->share('rprintboxescount', $rprintboxescount);
        Schema::defaultStringLength(191);
    }
}
