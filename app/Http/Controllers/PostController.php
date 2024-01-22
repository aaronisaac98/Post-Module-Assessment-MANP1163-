<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\User;



class PostController extends Controller
{
    public function index()
    {
        return view('posts', [

            'posts' => Post::latest()->filter(request(['search']))->get(),

            'categories' => Category::all()
        ]);
    }

    public function show(Post $post)
    {
        Return view('post',[
            'post'=>$post
        ]);
    }

    public function create()
    {
        return view ('posts.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required',/*Rule::unique('posts','slug')*/],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')],
            'img_src' => 'required',
        ]);

        $attributes['user_id'] = auth() ->id();



        if (request()->hasFile('img_src')) {
            $image = request()->file('img_src');
            $img_src = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/upload'), $img_src);

            // Update the 'img_src' attribute in the Post model
            $attributes['img_src'] = $img_src;
        }

            Post::create($attributes);

        return redirect('/')->with('success', 'Post Created!');
        //return redirect('/');

    }

    public function manage(User $author)
    {
        return view('posts.manage',[
            'posts' => $author->posts,

            'categories' => Category::all()

        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post'=>$post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', /*Rule::unique('posts', 'slug')->ignore($post->id)*/],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'img_src' => 'required',
        ]);

        // Handle image upload
        if (request()->hasFile('img_src')) {
            $image = request()->file('img_src');
            $old_image = $post->img_src;
            $img_src = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/upload'), $img_src);

            If($post->img_src !='illustration-1.png')
            {
                //Delete old image from file
                File::delete(public_path('/upload/' . $old_image));
            }


            // Update the 'img_src' attribute in the Post model
            $attributes['img_src'] = $img_src;
        }

        // Update the Post model with the validated attributes using update()
        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {

        If($post->img_src !='illustration-1.png')
        {
            //Delete old image from file
            $old_image = $post->img_src;
            File::delete(public_path('/image 2/' . $old_image));
        }
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }


}
