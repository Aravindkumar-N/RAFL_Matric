<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MatricGalleryController extends Controller
{

    public function index()
    {
       
            $galleries = Gallery::orderBy('created_at','desc')->get();
            return view('gallery.index',compact('galleries'));
        
    }


    public function create()
    {
        try {
            $categories = Category::orderBy('created_at', 'desc')->get();
           
            return view('gallery.add', compact('categories'));
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'category' => 'required',
            'gallery' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'description'=>'required'
        ]);

        $gallery_name = time() . rand(1, 999) . '.' . $request->gallery->extension();
        $request->gallery->move(public_path('galleries/'),$gallery_name);
         $image = 'galleries/' . $gallery_name;
        $gallery = Gallery::create(['category' => $request->category, 'gallery' => $image, 'description' => $request->description]);
        return response()->json(['status' => true, 'data' => $gallery], 200);
    }


    public function edit($id)
    {
        try {
            $gallery = Gallery::where('id', $id)->first();
            $categories = Category::orderBy('created_at', 'desc')->get();
            return view('gallery.edit', compact('gallery', 'categories'));
        } catch (\Exception $e) {
            return back()->with(['error' => $e->getMessage()])->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        // try {
        $validator = $request->validate([
            'category' => 'required',
            'gallery' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'description'=>'required'
        ]);
        if (!empty($id)) {
            $gallery = Gallery::where('id', $id)->first();
            if ($gallery != null) {
                if (!empty($request->hasFile('gallery'))) {

                    $gallery_name = time() . rand(1, 999) . '.' . $request->gallery->extension();
                    $request->gallery->move(public_path('galleries'), $gallery_name);
                    $validator['gallery'] = 'galleries/' . $gallery_name;
                    //unlink
                    $image = $gallery->gallery;
                    $remove = ltrim($image, 'galleries/');
                    if (File::exists(public_path('galleries/' . $remove))) {
                        File::delete(public_path('galleries/' . $remove));
                    }
                } else {
                    $validator['gallery'] = $gallery->gallery;
                }
                $update_gallery = $gallery->update($validator);
                return response()->json(['status' => true, 'success' => 'Gallery Updated Success!', 'data' => $update_gallery], 200);
            } else {
                return response()->json(['data' => 'Gallery Not Found']);
            }
        } else {
            return response()->json(['data' => 'Gallery Not Found']);
        }
        // } catch (\Exception $e) {
        //     return back()->with(['error' => $e->getMessage()])->withInput();
        // }
    }

    public function destroy($id)
    {

        if (!empty($id)) {
            $gallery = Gallery::where('id', $id)->first();
            if ($gallery != null) {
                $gallery->delete();
                return response()->json(['status' => 200, 'success' => 'Gallery Deleted Success!'], 200);
            }
            else {
                return response()->json(['data' => 'Gallery Not Found']);
            }
        }
    }
}
