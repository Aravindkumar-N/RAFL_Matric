<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatricCategoryController extends Controller
{

    public function index()
    {
        try {
            $categories = Category::orderBy('id','desc')->get();
            return view('category.index',compact('categories'));
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'category_name' => 'required'
        ]);

        // $validator = Validator::make($request->all(), [
        //     'category_name' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->errors()]);
        // }

        Category::create($validator);
        return response()->json(['status' => true, 'success' => 'Category Created Successfully!'], 200);
    }


    public function edit($id)
    {
        try {

            if (!empty($id)) {
                $category = Category::where('id', $id)->first();
                if ($category != null) {
                    return response()->json(['status' => true, 'data' => $category], 200);
                } else {
                    return response()->json(['data' => 'Category Not Found']);
                }
            } else {
                return response()->json(['data' => 'Category Not Found']);
            }
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // try{
        $request->validate([
            'edit_category_name' => 'required'
        ]);
        if (!empty($id)) {
            $category = Category::where('id', $id)->first();
            if ($category != null) {
                $update_category =Category::where('id',$id)->update(['category_name' => $request->edit_category_name,]);
                return response()->json(['status' => true, 'success' => 'Category Updated successfully!','data'=>$update_category], 200);
            } else {
                return response()->json(['data' => 'Category Not Found']);
            }
        } else {
            return response()->json(['data' => 'Category Not Found']);
        }
        // }
        // catch(\Exception $e){
        //     return back()->with(['error'=>$e->getMessage()])->withInput();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!empty($id)) {
            $category = Category::where('id', $id)->first();
            $category->delete();
            return response()->json(['status' => 200, 'success' => 'Category Deleted Success!'], 200);
        }
    }
}
