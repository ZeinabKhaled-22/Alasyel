<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use function Laravel\Prompts\error;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::getAllBlog();
        // send response
        // return response()->json([
        //     "success" => true,
        //     "data" => $blogs
        // ]);
        return view('blog.index', compact('blogs'));
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
        // validation
        $validated = Validator::make($request->all(), [
            "title" => "required|string",
            "description" => "required|string",
            "image" => "image"
        ]);
        if($validated->fails()){
            return response()->json([
                "message"=> $validated->errors(),
                "success" => false,
                "status" => 400
            ]);
        }
        $blog = Blog::createBlog($request);
        // send response
        return redirect('blog/insert')->with('success','create Blog successfully');
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
        $specificBlog = Blog::specificBlog($id);
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
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.update', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // validation
        $validated = Validator::make($request->all(), [
            "title" => "required|string",
            "description" => "required|string",
            "image" => "image"
        ]);
    //    dd(request('description'), request()->all());
        if($validated->fails()){
            return response()->json([
                "message"=> $validated->errors(),
                "success" => false,
                "status" => 400
            ]);
        }
        
        $blog = Blog::updateBlog($request->all(), $id);
        // send response
        // return redirect('blog/edit'.$id)->with('success','update blog successfully');
        // return redirect()->route('blog.update',['id' => $id])->with('success','update blog successfully');
        return response()->json([
            "message" => "update blog successfully",
            "status" => 200,
            "success" => true,
            "data" => $blog
        ]);
    
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Blog::deleteBlog($id);
        // send response
        // return response()->json([
        //     "message" => "delete blog successfully",
        //     "status" => 200,
        //     "success" => true
        // ]);
        return redirect()->route('blog.index');
    }
}
