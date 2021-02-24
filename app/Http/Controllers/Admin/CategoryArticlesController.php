<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles\CategoryArticlesModel;
use App\Http\Traits\GeneralServices;

class CategoryArticlesController extends Controller
{
    use GeneralServices;

    public function index(Request $request){
        $data['data'] = CategoryArticlesModel::select('*')->get();
        $data['title'] = 'Articles Category';
        return view('admin.category.view',$data);
    }
    public function add(Request $request){
        $data['title'] = 'Articles Category';
        return view('admin.category.add',$data);
    }
    public function store(Request $request){
        $rules = [
            'category_name' => 'Required|string',
            'slug' => 'Required|string|unique:category_articles',
        ];
        $validateData = $this->ValidateRequest($request->all(), $rules);

        if (!empty($validateData)) {
            return redirect()->back()->withErrors($validateData);
        }
        
        $save = CategoryArticlesModel::create($request->except(['_token']));
        if(!$save){
            return redirect()->back()->withErrors(['Failed! Server Error!']);  
        }  
        return redirect('/admin/category')->with('success', "Category succesfully created");
    }
    public function show($id){
        $data['data'] = CategoryArticlesModel::where('category_id',$id)->first();
        $data['title'] = 'Articles Category Edit';
        return view('admin.category.edit',$data);
    }
    public function update(Request $request,$id){
        $rules = [
            'category_name' => 'Required|string',
            'slug' => 'Required|string',
        ];
        $validateData = $this->ValidateRequest($request->all(), $rules);

        if (!empty($validateData)) {
            return redirect()->back()->withErrors($validateData);
        }
        
        $validateSlug = CategoryArticlesModel::where('category_id','!=',$id)->where('slug','=',$request->slug)->get();
        if (!$validateSlug->isEmpty()) {
            return redirect()->back()->withErrors("Category with this name already exist!");
        }
        $save = CategoryArticlesModel::where('category_id','=',$id)->update($request->except(['_token']));
        if(!$save){
            return redirect()->back()->withErrors(['Failed! Server Error!']);  
        }  
        return redirect('/admin/category')->with('success', "Category succesfully updated");
    }
    public function destroy(Request $request,$id){
        $save = CategoryArticlesModel::where('category_id','=',$id)->delete();
        if(!$save){
            return redirect()->back()->withErrors(['Failed! Server Error!']);  
        }  
        return redirect('/admin/category')->with('success', "Category succesfully deleted");
    }
}
