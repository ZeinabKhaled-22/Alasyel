<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        'image'
    ];

    // create blog
    public static function createBlog($request)
    {
        // $validated = $request->validate([
        //     "title" => "required|string",
        //     "description" => 'required|string',
        //     "image" => "image"
        // ]);
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
        return $blog;
    }


    // update blog
    public static function updateBlog($request, $id)
    {
        // check existence
        $blogExist = Blog::find($id);
        if (!$blogExist) {
            return response()->json([
                "message" => "blog not found",
                "status" => 404,
                "success" => false
            ]);
        }
    
        // update blog
        $blogExist->title       = $request->title ?? $blogExist->title;
        $blogExist->description = $request->description ?? $blogExist->description;
        // update image
        if ($request['image']) {
            if ($blogExist->image && Storage::disk('public')->exists('images/blogs/' . $blogExist->image)) {
                Storage::disk('public')->delete('images/blogs/' . $blogExist->image);
            }
            $image = request()->file('image');
            $image->storeAs('images/blogs', $image->getClientOriginalName(), 'public');
            $blogExist->image = $image->getClientOriginalName();
        }
        // save in db
        $updatedBlog = $blogExist->save();
        // send response
        return $blogExist;
    }



    // get all blogs
    public static function getAllBlog()
    {
        // get blogs
        $blogs = Blog::all();
        // send response
        return $blogs;
    }



    // delete blog
    public static function deleteBlog($id)
    {
        // delete
        $deletedBlog = Blog::findOrFail($id)->delete();
        // send response
        return $deletedBlog;
    }


    // specific blog
    public static function specificBlog($id)
    {
        //get specific blog
        $specificBlog = Blog::where("id", $id)->first();
        // send response
        return $specificBlog;
    }

}
