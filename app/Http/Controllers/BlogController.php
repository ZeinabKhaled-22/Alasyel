<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $all = Blog::getAllBlogs();

        // get blogs
        $blogs = Blog::all();
        // send response
        return response()->json([
            "success" => true,
            "data" => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     */
    public function store(Request $request)
    {
        // check existence
        $blogExist = Blog::where('title', $request->title)->first();
        if ($blogExist) {
            return response()->json([
                "message" => "blog already exist",
                "success" => false
            ], status: 409);
        }
        // validation
        $validated = $request->validate([
            "title" => "required|string",
            "description" => 'required|string',
            "image" => "image"
        ]);
        // upload image
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $image->storeAs('images/blogs', $image->getClientOriginalName(), 'public');
            $image_name = $image->getClientOriginalName();
        }
        // save in db
        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name
        ]);
        // send response
        return response()->json([
            "message" => "blog create successfully",
            "success" => true,
            "data" => $blog
        ], status: 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //get specific blog
        $specificBlog = Blog::where("id", $id)->first();
        // send response
        return response()->json([
            "status" => 200,
            "success" => true,
            "data" => $specificBlog
        ]);
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
    public function update(Request $request, $id)
    {
        // check existence
        $blogExist = Blog::find($id);
        if (!$blogExist) {
            return response()->json([
                "message" => "blog not found",
                "status" => 404,
                "success" => false
            ]);
        };
        // update blog
        $blogExist->title = $request->title ?? $blogExist->title;
        $blogExist->description = $request->description ?? $blogExist->description;
        // update image
        if ($request->hasFile("image")) {
            if ($blogExist->image && Storage::disk('public')->exists('images/blogs/' . $blogExist->image)) {
                Storage::disk('public')->delete('images/blogs/' . $blogExist->image);
            }

            $image = request()->file('image');
            $image->storeAs('images/blogs', $image->getClientOriginalName(), 'public');
            $blogExist->image = $image->getClientOriginalName();
        }
        // validate
        $validated = $request->validate([
            "title"=> "required|string",
            "description"=> 'required|string',
            "image" => "image"
         ]);
        // save in db
        $blogExist->save();
        // send response
        return response()->json([
            "message" => "blog update successfully",
            "status" => 200,
            "success" => true,
            "data" => $blogExist
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete
        Blog::findOrFail($id)->delete();
        // send response
        return response()->json([
            "message" => "blog delete successfully",
            "status" => 200,
            "success" => true
        ]);
    }
}
