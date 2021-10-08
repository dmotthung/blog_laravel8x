<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $perPage = 9;

    public function home()
    {
        return view('blog.home', [
            'posts' => Post::publish()->latest()->simplePaginate($this->perPage),
            'categories' => Category::onlyParent()->get()
        ]);
    }

    public function showCategories()
    {
        return view('blog.categories', [
            'categories' => Category::onlyParent()->simplePaginate($this->perPage)
        ]);
    }

    public function showTags()
    {
        return view('blog.tags', [
            'tags' => Tag::simplePaginate($this->perPage)
        ]);
    }

    public function search_post(Request $request)
    {
        if (!$request->get('keyword')) {
            return redirect()->route('blog.home');
        }
        return view('blog.search_post', [
            'posts' => Post::publish()->search($request->keyword)->simplePaginate($this->perPage)->appends(['keyword' => $request->keyword])
        ]);
    }

    public function showPostsByTag($slug)
    {
        $posts = Post::publish()->whereHas('tags', function ($query) use ($slug) {
            return $query->where('slug', $slug);
        })->simplePaginate($this->perPage);

        $tag = Tag::where('slug', $slug)->firstOrFail();
        $tags = Tag::search($tag->title)->get();

        return view('blog.posts-tag', [
            'posts' => $posts,
            'tag' => $tag,
            'tags' => $tags
        ]);
    }

    public function showPostDetail($slug = '')
    {
        $pos = strpos($slug, 'html');

        $e_slug = explode('.', $slug);
        $f_slug = $e_slug[0];

        $data=[];
        $view='detail';

        if ($pos !== false){

            if (end($e_slug) != 'html') {
                return abort(404);
            }

            $post = Post::publish()->with('categories', 'tags')->where('slug', $f_slug)->firstOrFail();

            $data['related'] = Post::publish()->whereHas('categories', function ($q) use ($post) {
                $q->whereIn('title', $post->categories->pluck('title'));
            })->where('id', '!=', $post->id)->get();

        } else {

            $post = Post::publish()->whereHas('categories', function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })->simplePaginate($this->perPage);

            $category = Category::where('slug', $slug)->first();

            if($category){
                $data['categoryRoot'] = $category->root();
                $data['category'] = $category;

                $view = 'category';
            }else {
                return abort(404);
            }
        }

        $data['post'] = $post;

        return view('blog.posts-'.$view, $data);
    }
}
