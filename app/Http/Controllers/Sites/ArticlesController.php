<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles\CategoryArticlesModel;
use App\Models\Articles\ArticlesModel;
use App\Http\Traits\GeneralServices;
use Session;

class ArticlesController extends Controller
{
    use GeneralServices;

    public function index(Request $request){
        $data['data'] = ArticlesModel::select('*')->with('category')->limit(5)->orderBy('id','Desc')->get();
        $data['data'] = $data['data']->map(function($raw){
            $raw['banner_small_url']  = url('/')."/images/Articles/".$raw['banner'];
            $raw['banner_url']  = url('/')."/images/Articles/".$raw['banner'];
            return $raw;
        });
        $data['title'] = 'Articles';

        return view('sites.view',$data);
    }
    public function list(Request $request){
        $data['data'] = ArticlesModel::select('*')->with('category')->get();
        $data['data'] = $data['data']->map(function($raw){
            $raw['banner_small_url']  = url('/')."/images/Articles/".$raw['banner'];
            $raw['banner_url']  = url('/')."/images/Articles/".$raw['banner'];
            return $raw;
        });
        $data['title'] = 'Articles';

        return view('sites.list',$data);
    }
    public function show($slug){
        $data['data'] = ArticlesModel::select('*')->where('slug',$slug)->with('category')->first();
        $data['data']['banner_small_url']  = url('/')."/images/Articles/".$data['data']['banner'];
        $data['data']['banner_url']  = url('/')."/images/Articles/".$data['data']['banner'];
        $data['title'] = 'Articles';

        return view('sites.detail',$data);
    }
    public function getArticlebyCategory($slug){
        $data['data'] = ArticlesModel::select('*')->with('category')
        ->leftJoin('category_articles','category_articles.category_id', '=', 'articles.category_id')
        ->where('category_articles.slug',$slug)->get();
        $data['data'] = $data['data']->map(function($raw){
            $raw['banner_small_url']  = url('/')."/images/Articles/".$raw['banner'];
            $raw['banner_url']  = url('/')."/images/Articles/".$raw['banner'];
            return $raw;
        });
        $data['title'] = 'Articles this Category ';

        return view('sites.list',$data);
    }
}
