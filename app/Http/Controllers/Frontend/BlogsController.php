<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public const VIEW_PATH = 'frontend.';

    public function __construct(private readonly BlogService $site)
    {
        $this->middleware('increment.views:blog,' . request()->route('blog') . ', slug')
            ->only('show');
    }

    public function index(Request $request)
    {
        $data = [];
        if ($request->has('search')) {
            $data['blogs'] = $this->site->getBlogsBySearch(search: $request->search);
        }

        $posts = [
            'blogs' => $this->site->getLatestBlogs(),
            'popularPosts' => $this->site->getPopularBlogs(),
            'breakingNews' => $this->site->getBreakingNews(),
        ];

        $data = array_merge(
            $posts, $data
        );

        return view(self::VIEW_PATH . 'blogs.index', $data);
    }

    public function show($blog)
    {   
        $data['blog'] = $this->site->getBlog(blog: $blog);
        return view('frontend.blogs.show',
            ['blog' => $data['blog']]
        );
    }

    public function category($category)
    {
        $data['blogs']    = $this->site->getBlogsBySearch(category: $category);
        $data['category'] = $this->site->getCategory($category);

        return view(self::VIEW_PATH . 'blogs.category', $data);
    }

    public function tag($tag)
    {
        $data['blogs'] = $this->site->getBlogsBySearch(tag: $tag);
        $data['tag']   = $this->site->getTag($tag);

        return view(self::VIEW_PATH . 'blogs.tag', $data);
    }
}
