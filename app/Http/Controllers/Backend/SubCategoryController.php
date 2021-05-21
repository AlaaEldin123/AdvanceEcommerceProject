<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
    $categories = Category::orderBy('category_name_en','ASC')->get();

	$subcategory = SubCategory::latest()->get();
	return view('backend.category.subcategory_view',compact('subcategory','categories'));
    }

     public function SubCategoryStore(Request $request){
    	$request->validate([
    		'category_id' => 'required',
    		'subcategory_name_en' => 'required',
    		'subcategory_name_ar' => 'required',
    	],[
    		'category_id.required' => 'Please Select Any Option',
    		'category_name_en.required' => 'Input Category English Name',
    	]);

    	

	SubCategory::insert([
		'category_id' => $request->category_id,
		'subcategory_name_en' => $request->subcategory_name_en,
		'subcategory_name_ar' => $request->subcategory_name_ar,
		'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_slug_en)),
		'subcategory_slug_ar' => str_replace(' ', '-',$request->subcategory_slug_ar),

    	]);

	    $notification = array(
			'message' => 'SubCategory Inserted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function SubCategoryEdit($id){
		$categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.category.subcategory_edit',compact('subcategory','categories'));
	}

	public function SubCategoryUpdate(Request $request){

    	$subcat_id = $request->id;

    	 SubCategory::findOrFail($subcat_id)->update([
		'category_id' => $request->category_id,
		'subcategory_name_en' => $request->subcategory_name_en,
		'subcategory_name_hin' => $request->subcategory_name_ar,
		'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
		'subcategory_slug_hin' => str_replace(' ', '-',$request->subcategory_name_ar),
		 

    	]);

	    $notification = array(
			'message' => 'SubCategory Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.subcategory')->with($notification);

    }  // end method
	public function SubCategoryDelete($id){
		SubCategory::findOrFail($id)->delete();
		$notification = array(
			'message' => 'Category Delete Successfully',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}
///////////////////////////////////  Sub Sub Category   //////////////////////////////////////////




  	public function SubSubCategoryView(){

	 $categories = Category::orderBy('category_name_en','ASC')->get();
    	$subsubcategory = SubSubCategory::latest()->get();
    	return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
     }
     
 public function GetSubCategory($category_id){

     	$subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
     	return json_encode($subcat);
     }















}
