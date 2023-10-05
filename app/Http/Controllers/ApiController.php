<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Common;

class ApiController extends Controller
{
    //

    public function getCategories(){

    	$common_model = new Common();      
        $all_categories = $common_model->allCategories();

        //sort sub-category wise data
        $category_array = array();
        foreach ($all_categories as $category_data) {
            $cid = $category_data->category_row_id;
            if($category_data->parent_id == 0){
                $category_array[$cid]['category_name'] = $category_data->category_name;
                $category_array[$cid]['category_image'] = $category_data->category_image;
            } else {
                $category_array[$category_data->parent_id]['subcategory'][$cid]['category_name'] = $category_data->category_name;
                $category_array[$category_data->parent_id]['subcategory'][$cid]['category_image'] = $category_data->category_image;
            }
        }

        //dd($category_array);

        if(isset($category_array)){
			return response()->json($category_array);	
		} else {
			return response()->json(['error' => 'No Categories Found'], 500);
		}
    }

    public function getProductsById($pid){

    	if(is_numeric($pid) && $pid > 0){
    		$product_details = Product::with('product_images', 'product_inventory', 'product_attribute', 'getCategory')->where('product_id', $pid)->first();
    		if(isset($product_details)){
    			return response()->json($product_details);	
    		} else {
    			return response()->json(['error' => 'Wrong Product ID provided'], 500);
    		}
    		
    	} else {
    		return response()->json(['error' => 'Product ID is not valid, ID should be numeric'], 500);
    	}

    }
}
