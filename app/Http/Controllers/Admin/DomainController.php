<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use App\Models\Site;

class DomainController extends Controller
{
    public function index()
    {
        $domains = Site::all();
        return view('admin.domains.index', compact('domains'));
    }

    public function store()
    {

    }

    public function delete($id)
    {

    }
}
