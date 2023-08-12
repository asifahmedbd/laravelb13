<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use App\Models\Common;
use Image;
Use Alert;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $admin_info = User::find($id);
        //$data = array();
        $data = Category::all();
        dd($data);
        return view('admin.category.index', compact('data', 'admin_info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $common_model = new Common();      
        $all_categories = $common_model->allCategories();
        //dd($all_records);
        return view('admin.category.create', compact('all_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $category_model = new Category();
        $category_model->category_name = $request->category_name;  
        $category_model->parent_id = $request->parent_id;
        $category_model->level = 0;
        if(isset($category_model->parent_id) && ($category_model->parent_id > 0)) {
            $parent_cat_info =   DB::table('categories')->where('category_row_id', $category_model->parent_id)->first(); 
            $category_model->level = $parent_cat_info->level + 1;
        }
        $category_model->category_description = $request->category_description;
        $category_model->is_featured = ($request->is_featured) ? 1 : 0;

        if(isset($request->category_image)){
            $category_image   = $request->file('category_image');
            $filename         = time().'_'.$category_image->getClientOriginalName();

            $category_image->move(public_path('uploads/category').'/original/',$filename);
            $image_resize = Image::make(public_path('uploads/category').'/original/'.$filename);
            $image_resize->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('uploads/category').'/thumbnail/'.$filename);
            $category_model->category_image = $filename;
        } else {
            $category_model->category_image = null;
        }

        $category_model->save();

        if($category_model->parent_id) {
            if($parent_cat_info->has_child != 1) { 
                 DB::table('categories')
                  ->where('category_row_id', $request->parent_id)
                  ->update([
                    'has_child'=> 1
                  ]);
            }
        }

        Alert::success('Category Created Successfully!', 'success');    
        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
