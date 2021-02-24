<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles\CategoryArticlesModel;
use App\Models\Articles\ArticlesModel;
use App\Http\Traits\GeneralServices;
use Image;

class ArticlesController extends Controller
{
    use GeneralServices;

    public function index(Request $request){
        $data['data'] = ArticlesModel::select('*')->with('category')->get();
        $data['data'] = $data['data']->map(function($raw){
            $raw['banner_small_url']  = url('/')."/images/Articles/".$raw['banner'];
            $raw['banner_url']  = url('/')."/images/Articles/".$raw['banner'];
            return $raw;
        });
        $data['title'] = 'Articles';
        return view('admin.article.view',$data);
    }
    public function add(Request $request){
        $data['category'] = CategoryArticlesModel::select('*')->get();
        $data['title'] = 'Articles';
        return view('admin.article.add',$data);
    }
    public function store(Request $request){
        $rules = [
            'category_id' => 'Required|integer',
            'title' => 'Required|string',
            'slug' => 'Required|string|unique:articles',
            'content' => 'Required|string',
            'images' => "required|max:5120",
        ];
        $validateData = $this->ValidateRequest($request->all(), $rules);

        if (!empty($validateData)) {
            return redirect()->back()->withErrors($validateData);
        }
        
        if($request->hasFile('images')){
            $folder = public_path().'/images/Articles/';
            $image = $request->file('images');
            $imagename = 'banner_'.time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path().'/images/Articles/thumbnail';
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imagename);
    
            $image->move($folder, $imagename);
        }
        $request['banner'] = $imagename;
        $save = ArticlesModel::create($request->except(['_token','images']));
        if(!$save){
            return redirect()->back()->withErrors(['Failed! Server Error!']);  
        }  
        return redirect('/admin/articles')->with('success', "Article succesfully created");
    }
    public function show($id){
        $data['category'] = CategoryArticlesModel::select('*')->get();
        $data['data'] = ArticlesModel::where('id',$id)->first();
        
        $data['data']['banner_url']  = url('/')."/images/Articles/".$data['data']['banner'];
        $data['title'] = 'Articles Edit';
        return view('admin.article.edit',$data);
    }
    public function update(Request $request,$id){
        $rules = [
            'category_id' => 'Required|integer',
            'slug' => 'Required|string',
            'title' => 'Required|string',
            'content' => 'Required|string',
            'banner' => "nullable|mimes:jpg,png,jpeg|max:5120",
        ];
        $validateData = $this->ValidateRequest($request->all(), $rules);

        if (!empty($validateData)) {
            return redirect()->back()->withErrors($validateData);
        }
        
        if($request->hasFile('images')){
            $folder = public_path().'/images/Articles/';
            $image = $request->file('images');
            $imagename = 'banner_'.time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = public_path().'/images/Articles/thumbnail';
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imagename);
    
            $image->move($folder, $imagename);
            $request['banner'] = $imagename;
        }
        $validateSlug = ArticlesModel::where('id','!=',$id)->where('slug','=',$request->slug)->get();
        if (!$validateSlug->isEmpty()) {
            return redirect()->back()->withErrors("Article with this name already exist!");
        }
        $save = ArticlesModel::where('id','=',$id)->update($request->except(['_token','images']));
        if(!$save){
            return redirect()->back()->withErrors(['Failed! Server Error!']);  
        }  
        return redirect('/admin/articles')->with('success', "Article succesfully updated");
    }
    public function destroy(Request $request,$id){
        $save = ArticlesModel::where('id','=',$id)->delete();
        if(!$save){
            return redirect()->back()->withErrors(['Failed! Server Error!']);  
        }  
        return redirect('/admin/articles')->with('success', "Article succesfully deleted");
    }
    
}
