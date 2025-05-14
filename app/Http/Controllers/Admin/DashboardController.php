<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Page;
use App\Models\Site;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['default'] = getLang();
        $data['tags'] = Tag::count();
        $data['topics'] = Topic::count();
        $data['pages'] = Page::count();
        $data['subscribers'] = Subscriber::count();
        return view('admin.dashboard', $data);
    }

    public function setSiteSession(Request $request)
    {
        $selectedSite = $request->siteName;
        if ($selectedSite) {
            session()->put('siteName', $request->siteName);
            session()->put('siteId', Site::where('name', $request->siteName)->first('id')->id);
            $this->updateUsersCurrentSite(session('siteId'));
            return redirect()->back()->with('success', 'Site changed successfully');
        } else {
            return redirect()->back()->with('error', 'Please select a site');
        }
    }

    private function updateUsersCurrentSite($siteId)
    {
        Admin::where('id', auth()->guard('admin')->user()->id)
            ->update(['current_site_id' => $siteId]);
    }
}
