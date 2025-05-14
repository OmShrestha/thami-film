<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\GalleryService;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public const VIEW_PATH = 'frontend.';

    public function __construct(private readonly GalleryService $site)
    {
        $this->middleware('increment.views:blog,' . request()->route('blog') . ', slug')
            ->only('show');
    }

    public function index(Request $request)
    {
        $data = [];
        $data['galleries'] = $this->site->getGallery();
        return view(self::VIEW_PATH . 'gallery.index', $data);
    }

    public function show($category, $blog)
    {
    }
}
