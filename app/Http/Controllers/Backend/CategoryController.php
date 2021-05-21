<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
   
    public function CategoryView(){
	$category = Category::latest()->get();
	return view('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){
    	$request->validate([
    		'category_name_en' => 'required',
    		'category_name_ar' => 'required',
    		'category_icon' => 'required',
    	],[
    		'category_name_en.required' => 'Input Category English Name',
    		'category_name_ar.required' => 'Input Category Arabic Name',
    	]);

    	

	Category::insert([
		'category_name_en' => $request->category_name_en,
		'category_name_ar' => $request->category_name_ar,
		'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
		'category_slug_ar' => str_replace(' ', '-',$request->category_name_ar),
		'category_icon' => $request->category_icon,

    	]);

	    $notification = array(
			'message' => 'Category Inserted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

	public function CategoryEdit($id){
	$category = Category::findOrFail($id);
	return view('backend.category.category_edit',compact('category'));
	}


	public function CategoryUpdate(Request $request){
		$cat_id = $request->id;

		Category::findOrFail($cat_id)->update([
		'category_name_en' => $request->category_name_en,
		'category_name_ar' => $request->category_name_ar,
		'category_slug_en' => strtolower(str_replace(' ', '-',$request->category_name_en)),
		'category_slug_ar' => str_replace(' ', '-',$request->category_name_ar),
		'category_icon' => $request->category_icon,

    	]);

	    $notification = array(
			'message' => 'Category Update Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('all.category')->with($notification);
	}//end category update method

	public function CategoryDelete($id){
		Category::findOrFail($id)->delete();
		$notification = array(
			'message' => 'Category Delete Successfully',
			'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
	}

}
