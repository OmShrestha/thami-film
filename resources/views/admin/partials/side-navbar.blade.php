@php
    $default = getLang();
    $admin = auth('admin')->user();
    if (!empty($admin->role)) {
        $permissions = $admin->role->permissions;
        $permissions = json_decode($permissions, true);
    }
@endphp

<div class="sidebar sidebar-style-2"
     @if ($bs->is_admin_dark == 1) data-background-color="dark" @else data-background-color="white" @endif>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if (!empty(Auth::guard('admin')->user()->image))
                        <img src="{{ asset('assets/admin/img/propics/' . Auth::guard('admin')->user()->image) }}"
                             alt="..." class="avatar-img rounded">
                    @else
                        <img src="{{ asset('assets/admin/img/propics/blank_user.jpg') }}" alt="..."
                             class="avatar-img rounded">
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::guard('admin')->user()->first_name }}
                            @if (empty(Auth::guard('admin')->user()->role))
                                <span class="user-level">Owner</span>
                            @else
                                <span class="user-level">{{ Auth::guard('admin')->user()->role->name }}</span>
                            @endif
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.editProfile') }}">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.changePass') }}">
                                    <span class="link-collapse">Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.logout') }}">
                                    <span class="link-collapse">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary mt-0">
                <div class="row mb-2 w-100">
                    <div class="col-12 pr-0">
                        <form action="">
                            <div class="form-group py-0 pr-0">
                                <input name="term" type="text" class="form-control sidebar-search" value=""
                                       placeholder="Search Menu Here...">
                            </div>
                        </form>
                    </div>
                </div>

                @if (empty($admin->role) || (!empty($permissions) && in_array('Dashboard', $permissions)))
                    {{-- Dashboard --}}
                    <li class="nav-item @if (request()->path() == 'admin/dashboard') active @endif">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('Course Management', $permissions)))
                    <li class="nav-item @if(request()->is('admin/mail*')) active
                            @elseif(request()->is('admin/subscribers*')) active @endif">
                        <a data-toggle="collapse" href="#emailMarketing">
                            <i class="la flaticon-envelope"></i>
                            <p>Email & Marketing</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                            @if (request()->is('admin/mail*')) show
                            @elseif(request()->is('admin/subscribers*')) show @endif"
                             id="emailMarketing">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/subscribers') active @endif">
                                    <a href="{{ route('admin.subscriber.index') }}">
                                        <span class="sub-item">Newsletter Subscribers</span>
                                    </a>
                                </li>
                                <li class="@if (request()->is('admin/mail/subscriber*')) active @endif">
                                    <a href="{{ route('admin.mail.subscriber') }}">
                                        <span class="sub-item">Mail to Subscribers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (!empty($permissions) && in_array('Theme & Home', $permissions))

                    <li class="nav-item border-top mt-3">
                        <div class="menu-divider text-dark pb-2 pt-3 text-uppercase fw-bold">
                            Frontend Content
                        </div>
                    </li>

                    {{-- Dynamic Pages --}}
                    <li class="nav-item
                            @if (request()->path() == 'admin/home-settings') active
                            @elseif(request()->path() == 'admin/home-page') active @elseif (request()->path() == 'admin/domains') active @endif">
                        <a data-toggle="collapse" href="#themeHome">
                            <i class="la flaticon-file"></i>
                            <p>Domains & Home
                                @if ($bs->home_page_pagebuilder == 1)
                                    <span class="badge badge-danger p-1 sidenav-badge">Page Builder</span>
                                @endif
                            </p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                                    @if (request()->path() == 'admin/home-settings') show
                                     @elseif (request()->path() == 'admin/domains') show
                                    @elseif(request()->path() == 'admin/home-page') show @endif"
                             id="themeHome">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/home-settings') active active @endif">
                                    <a href="{{ route('admin.homeSettings') }}">
                                        <span class="sub-item">Settings</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/domains') active @endif">
                                    <a href="{{ route('admin.domains') }}">
                                        <span class="sub-item">Domains</span>
                                    </a>
                                </li>
                                @if ($bs->home_page_pagebuilder == 1)
                                    <li class="@if (request()->path() == 'admin/home-page') active @endif">
                                        <a href="#" data-toggle="modal" data-target="#pbLangModal">
                                            <span class="sub-item">Home Page Content</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Menu Builder', $permissions)))
                    {{-- Menu Builder --}}
                    <li class="nav-item {{ request()->path() == 'admin/menu-builder' ? 'active' : '' }}">
                        <a data-toggle="collapse" href="#websiteMenu">
                            <i class="fas fa-ellipsis-v"></i>
                            <p>Website Menu Builder</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse {{ request()->path() == 'admin/menu-builder' ? 'show' : '' }}" id="websiteMenu">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/menu-builder') active @endif">
                                    <a href="{{ route('admin.menu_builder.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Main Menu</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                {{-- Content Management --}}
                @if (empty($admin->role) || (!empty($permissions) && in_array('Basic Settings', $permissions)))
                    @include('admin.partials.content-management')
                @endif

                {{-- Knowledgebase --}}
                {{--                @if (empty($admin->role) || (!empty($permissions) && in_array('Content Management', $permissions)))--}}
                {{--                    <li--}}
                {{--                        class="nav-item--}}
                {{--                                @if (request()->path() == 'admin/article_categories') active--}}
                {{--                                @elseif(request()->path() == 'admin/articles') active--}}
                {{--                                @elseif(request()->path() == 'admin/article/archives') active--}}
                {{--                                @elseif(request()->is('admin/article/*/edit')) active @endif">--}}
                {{--                        <a data-toggle="collapse" href="#article">--}}
                {{--                            <i class='fas fa-pencil-alt'></i>--}}
                {{--                            <p>Knowledge base</p>--}}
                {{--                            <span class="caret"></span>--}}
                {{--                        </a>--}}
                {{--                        <div class="collapse--}}
                {{--                                @if (request()->path() == 'admin/article_categories') show--}}
                {{--                                @elseif(request()->path() == 'admin/articles') show--}}
                {{--                                @elseif(request()->path() == 'admin/article/archives') show--}}
                {{--                                @elseif(request()->is('admin/article/*/edit')) show @endif"--}}
                {{--                             id="article">--}}
                {{--                            <ul class="nav nav-collapse">--}}
                {{--                                <li class="@if (request()->path() == 'admin/article_categories') active @endif">--}}
                {{--                                    <a--}}
                {{--                                        href="{{ route('admin.article_category.index') . '?language=' . $default->code }}">--}}
                {{--                                        <span class="sub-item">Category</span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li--}}
                {{--                                    class="@if (request()->path() == 'admin/articles') active--}}
                {{--                                    @elseif(request()->is('admin/articles/*/edit')) active @endif">--}}
                {{--                                    <a href="{{ route('admin.article.index') . '?language=' . $default->code }}">--}}
                {{--                                        <span class="sub-item">Articles</span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                    </li>--}}
                {{--                @endif--}}

                <li class="nav-item border-top mt-3">
                    <div class="menu-divider text-dark pb-2 pt-3 text-uppercase fw-bold">
                        Blogs & FAQ
                    </div>
                </li>

                {{-- Blogs Posts --}}
                @includeIf('admin.partials.blogs-nav')

                <li class="nav-item border-top mt-3">
                    <div class="menu-divider text-dark pb-2 pt-3 text-uppercase fw-bold">
                        Gallery
                    </div>
                </li>

                @includeIf('admin.partials.galleries-nav')

                @if (empty($admin->role) || (!empty($permissions) && in_array('Content Management', $permissions)))
                    {{-- FAQ Management --}}
                    <li class="nav-item
                            @if(request()->path() == 'admin/faq/settings') active
                            @elseif(request()->path() == 'admin/faq/categories') active
                            @elseif(request()->path() == 'admin/faqs') active
                            @endif">
                        <a data-toggle="collapse" href="#faq">
                            <i class='fas fa-question-circle'></i>
                            <p>FAQs</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                            @if(request()->path() == 'admin/faq/settings') show
                            @elseif(request()->path() == 'admin/faq/categories') show
                            @elseif(request()->path() == 'admin/faqs') show
                            @endif" id="faq">
                            <ul class="nav nav-collapse">
                                <li class="@if(request()->path() == 'admin/faq/settings') active @endif">
                                    <a href="{{route('admin.faq.settings')}}">
                                        <span class="sub-item">Settings</span>
                                    </a>
                                </li>
                                @if ($bs->faq_category_status == 1)
                                    <li class="@if(request()->path() == 'admin/faq/categories') active @endif">
                                        <a href="{{route('admin.faq.categories') . '?language=' . $default->code}}">
                                            <span class="sub-item">Categories</span>
                                        </a>
                                    </li>
                                @endif
                                <li class="@if(request()->path() == 'admin/faqs') active @endif">
                                    <a href="{{route('admin.faq.index') . '?language=' . $default->code}}">
                                        <span class="sub-item">FAQs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item border-top mt-3">
                    <div class="menu-divider text-dark pb-2 pt-3 text-uppercase fw-bold">
                        Pages & Popups
                    </div>
                </li>

                @if (empty($admin->role) || (!empty($permissions) && in_array('Pages', $permissions)))
                    {{-- Dynamic Pages --}}
                    <li class="nav-item
                    @if (request()->path() == 'admin/page/create') active
                    @elseif(request()->path() == 'admin/page/settings') active
                    @elseif(request()->path() == 'admin/pages') active
                    @elseif(request()->is('admin/page/*/edit')) active @endif
                    ">
                        <a data-toggle="collapse" href="#pages">
                            <i class="la flaticon-file"></i>
                            <p>Dynamic Pages
                                @if($bs->custom_page_pagebuilder == 1)
                                    <span class="badge badge-danger p-1 sidenav-badge">Page builder</span>
                                @endif
                            </p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                        @if (request()->path() == 'admin/page/create') show
                        @elseif(request()->path() == 'admin/page/settings') show
                        @elseif(request()->path() == 'admin/pages') show
                        @elseif(request()->is('admin/page/*/edit')) show @endif
                        " id="pages">
                            <ul class="nav nav-collapse">
                                @if (empty($admin->role) || (!empty($permissions) && in_array('Basic Settings', $permissions)))
                                    {{--                                    <li class="@if (request()->path() == 'admin/page/settings') active @endif">--}}
                                    {{--                                        <a href="{{ route('admin.page.settings') }}">--}}
                                    {{--                                            <span class="sub-item">Settings</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                @endif
                                <li class="@if (request()->path() == 'admin/page/create') active @endif">
                                    <a href="{{ route('admin.page.create') . '?language=' . $default->code }}">
                                        <span class="sub-item">Create Page</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/pages') active @endif">
                                    <a href="{{ route('admin.page.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Pages</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                {{--                @if (empty($admin->role) || (!empty($permissions) && in_array('RSS Feeds', $permissions)))--}}
                {{--                    --}}{{-- RSS --}}
                {{--                    <li--}}
                {{--                        class="nav-item--}}
                {{--                            @if (request()->path() == 'admin/rss/create') active--}}
                {{--                            @elseif(request()->path() == 'admin/rss/feeds') active--}}
                {{--                            @elseif(request()->path() == 'admin/rss') active--}}
                {{--                            @elseif(request()->is('admin/rss/edit/*')) active @endif">--}}
                {{--                        <a data-toggle="collapse" href="#rss">--}}
                {{--                            <i class="fa fa-rss"></i>--}}
                {{--                            <p>RSS Feeds</p>--}}
                {{--                            <span class="caret"></span>--}}
                {{--                        </a>--}}
                {{--                        <div class="collapse--}}
                {{--                            @if (request()->path() == 'admin/rss/create') show--}}
                {{--                            @elseif(request()->path() == 'admin/rss/feeds') show--}}
                {{--                            @elseif(request()->path() == 'admin/rss') show--}}
                {{--                            @elseif(request()->is('admin/rss/edit/*')) show @endif"--}}
                {{--                             id="rss">--}}
                {{--                            <ul class="nav nav-collapse">--}}
                {{--                                <li class="@if (request()->path() == 'admin/rss/create') active @endif">--}}
                {{--                                    <a href="{{ route('admin.rss.create') }}">--}}
                {{--                                        <span class="sub-item">Import RSS Feeds</span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="@if (request()->path() == 'admin/rss/feeds') active @endif">--}}
                {{--                                    <a href="{{ route('admin.rss.feed') . '?language=' . $default->code }}">--}}
                {{--                                        <span class="sub-item">RSS Feeds</span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="@if (request()->path() == 'admin/rss') active @endif">--}}
                {{--                                    <a href="{{ route('admin.rss.index') . '?language=' . $default->code }}">--}}
                {{--                                        <span class="sub-item">RSS Posts</span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                    </li>--}}
                {{--                @endif--}}

                {{-- Announcement Popup --}}
                @if (empty($admin->role) || (!empty($permissions) && in_array('Announcement Popup', $permissions)))
                    <li
                        class="nav-item
                        @if (request()->path() == 'admin/popup/create') active
                        @elseif(request()->path() == 'admin/popup/types') active
                        @elseif(request()->is('admin/popup/*/edit')) active
                        @elseif(request()->path() == 'admin/popups') active @endif">
                        <a data-toggle="collapse" href="#announcementPopup">
                            <i class="fas fa-bullhorn"></i>
                            <p>Announcement Popup</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                        @if (request()->path() == 'admin/popup/create') show
                        @elseif(request()->path() == 'admin/popup/types') show
                        @elseif(request()->path() == 'admin/popups') show
                        @elseif(request()->is('admin/popup/*/edit')) show @endif"
                             id="announcementPopup">
                            <ul class="nav nav-collapse">
                                <li
                                    class="@if (request()->path() == 'admin/popup/types') active
        @elseif(request()->path() == 'admin/popup/create') active @endif">
                                    <a href="{{ route('admin.popup.types') }}">
                                        <span class="sub-item">Add Popup</span>
                                    </a>
                                </li>
                                <li
                                    class="@if (request()->path() == 'admin/popups') active
        @elseif(request()->is('admin/popup/*/edit')) active @endif">
                                    <a href="{{ route('admin.popup.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Popups</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item border-top mt-3">
                    <div class="menu-divider text-dark pb-2 pt-3 text-uppercase fw-bold">
                        Settings
                    </div>
                </li>

                @if (empty($admin->role) || (!empty($permissions) && in_array('Basic Settings', $permissions)))
                    {{-- Basic Settings --}}
                    <li class="nav-item @if (request()->path() == 'admin/logo') active
                    @elseif(request()->path() == 'admin/file-manager') active
                    @elseif(request()->path() == 'admin/preloader') active
                    @elseif(request()->path() == 'admin/basicinfo') active
                    @elseif(request()->path() == 'admin/update-settings') active
                    @elseif(request()->path() == 'admin/support') active
                    @elseif(request()->path() == 'admin/social') active
                    @elseif(request()->is('admin/social/*')) active
                    @elseif(request()->path() == 'admin/heading') active
                    @elseif(request()->path() == 'admin/script') active
                    @elseif(request()->path() == 'admin/seo') active
                    @elseif(request()->path() == 'admin/maintainance') active
                    @elseif(request()->path() == 'admin/cookie-alert') active
                    @elseif(request()->path() == 'admin/mail-from-admin') active
                    @elseif(request()->path() == 'admin/mail-to-admin') active
                    @elseif(request()->routeIs('admin.featuresettings')) active
                    @elseif(request()->path() == 'admin/email-templates') active
                    @elseif(request()->routeIs('admin.email.editTemplate')) active
                    @elseif(request()->path() == 'admin/languages') active
                    @elseif(request()->is('admin/language/*/edit')) active
                    @elseif(request()->is('admin/language/*/edit/keyword')) active
                    @elseif(request()->path() == 'admin/gateways') active
                    @elseif(request()->path() == 'admin/offline/gateways') active
                    @elseif(request()->path() == 'admin/backup') active
                    @elseif(request()->path() == 'admin/sitemap') active @endif">
                        <a data-toggle="collapse" href="#basic">
                            <i class="la flaticon-settings"></i>
                            <p>Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse @if (request()->path() == 'admin/logo') show
                        @elseif(request()->path() == 'admin/file-manager') show
                        @elseif(request()->path() == 'admin/preloader') show
                        @elseif(request()->path() == 'admin/basicinfo') show
                        @elseif(request()->path() == 'admin/update-settings') show
                        @elseif(request()->path() == 'admin/support') show
                        @elseif(request()->path() == 'admin/social') show
                        @elseif(request()->is('admin/social/*')) show
                        @elseif(request()->path() == 'admin/heading') show
                        @elseif(request()->path() == 'admin/script') show
                        @elseif(request()->path() == 'admin/seo') show
                        @elseif(request()->path() == 'admin/maintainance') show
                        @elseif(request()->path() == 'admin/cookie-alert') show
                        @elseif(request()->path() == 'admin/mail-from-admin') show
                        @elseif(request()->path() == 'admin/mail-to-admin') show
                        @elseif(request()->routeIs('admin.featuresettings')) show
                        @elseif(request()->path() == 'admin/email-templates') show
                        @elseif(request()->routeIs('admin.email.editTemplate')) show
                        @elseif(request()->path() == 'admin/languages') show
                        @elseif(request()->is('admin/language/*/edit')) show
                        @elseif(request()->is('admin/language/*/edit/keyword')) show
                        @elseif(request()->path() == 'admin/gateways') show
                        @elseif(request()->path() == 'admin/offline/gateways') show
                        @elseif(request()->path() == 'admin/backup') show
                        @elseif(request()->path() == 'admin/sitemap') show @endif" id="basic">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/basicinfo') active @endif">
                                    <a href="{{ route('admin.basicinfo') }}">
                                        <span class="sub-item">General Information</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/update-settings') active @endif">
                                    <a href="{{ route('admin.update-settings') }}">
                                        <span class="sub-item">Site Settings</span>
                                    </a>
                                </li>
                                <li
                                    class="
                                            @if (request()->path() == 'admin/gateways') selected
                                            @elseif(request()->path() == 'admin/offline/gateways') selected @endif">
                                    <a data-toggle="collapse" href="#gateways">
                                        <span class="sub-item">Payment Gateways</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse
                                            @if (request()->path() == 'admin/gateways') show
                                            @elseif(request()->path() == 'admin/offline/gateways') show @endif"
                                         id="gateways">
                                        <ul class="nav nav-collapse subnav">
                                            {{--                                            <li class="@if (request()->path() == 'admin/gateways') active @endif">--}}
                                            {{--                                                <a href="{{ route('admin.gateway.index') }}">--}}
                                            {{--                                                    <span class="sub-item">Online Gateways</span>--}}
                                            {{--                                                </a>--}}
                                            {{--                                            </li>--}}
                                            <li class="@if (request()->path() == 'admin/offline/gateways') active @endif">
                                                <a
                                                    href="{{ route('admin.gateway.offline') . '?language=' . $default->code }}">
                                                    <span class="sub-item">Offline Gateways</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="submenu">
                                    <a data-toggle="collapse" href="#emailset"
                                       aria-expanded="{{ request()->path() == 'admin/mail-from-admin' || request()->path() == 'admin/mail-to-admin' || request()->path() == 'admin/email-templates' || request()->routeIs('admin.email.editTemplate') ? 'true' : 'false' }}">
                                        <span class="sub-item">Email Settings</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div
                                        class="collapse {{ request()->path() == 'admin/mail-from-admin' || request()->path() == 'admin/mail-to-admin' || request()->path() == 'admin/email-templates' || request()->routeIs('admin.email.editTemplate') ? 'show' : '' }}"
                                        id="emailset" style="">
                                        <ul class="nav nav-collapse subnav">
                                            <li class="@if (request()->path() == 'admin/mail-from-admin') active @endif">
                                                <a href="{{ route('admin.mailFromAdmin') }}">
                                                    <span class="sub-item">Mail from Admin</span>
                                                </a>
                                            </li>
                                            <li class="@if (request()->path() == 'admin/mail-to-admin') active @endif">
                                                <a href="{{ route('admin.mailToAdmin') }}">
                                                    <span class="sub-item">Mail to Admin</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="@if (request()->path() == 'admin/file-manager') active @endif">
                                    <a href="{{ route('admin.file-manager') }}">
                                        <span class="sub-item">File Manager</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/logo') active @endif">
                                    <a href="{{ route('admin.logo') }}">
                                        <span class="sub-item">Logo & Images</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/preloader') active @endif">
                                    <a href="{{ route('admin.preloader') }}">
                                        <span class="sub-item">Preloader</span>
                                    </a>
                                </li>
                                <li class="@if (request()->routeIs('admin.featuresettings')) active @endif">
                                    <a href="{{ route('admin.featuresettings') . '?language=' . $default->code }}">
                                        <span class="sub-item">Preferences</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/support') active @endif">
                                    <a href="{{ route('admin.support') . '?language=' . $default->code }}">
                                        <span class="sub-item">Support Information</span>
                                    </a>
                                </li>
                                <li
                                    class="@if (request()->path() == 'admin/social') active
                                    @elseif(request()->is('admin/social/*')) active @endif">
                                    <a href="{{ route('admin.social.index') }}">
                                        <span class="sub-item">Social Links</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/heading') active @endif">
                                    <a href="{{ route('admin.heading') . '?language=' . $default->code }}">
                                        <span class="sub-item">Page Headings</span>
                                    </a>
                                </li>
                                <li class="
                                        @if (request()->path() == 'admin/languages') active
                                        @elseif(request()->is('admin/language/*/edit')) active
                                        @elseif(request()->is('admin/language/*/edit/keyword')) active @endif">
                                    <a href="{{ route('admin.language.index') }}">
                                        <span class="sub-item">Language</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/script') active @endif">
                                    <a href="{{ route('admin.script') }}">
                                        <span class="sub-item">Plugins</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/seo') active @endif">
                                    <a href="{{ route('admin.seo') . '?language=' . $default->code }}">
                                        <span class="sub-item">SEO Information</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/maintainance') active @endif">
                                    <a href="{{ route('admin.maintainance') }}">
                                        <span class="sub-item">Maintenance Mode</span>
                                    </a>
                                </li>

                                <li class="
                                        @if (request()->path() == 'admin/backup') selected
                                        @elseif(request()->path() == 'admin/sitemap') selected @endif">
                                    <a data-toggle="collapse" href="#misc">
                                        <span class="sub-item">MISC</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse
                                            @if (request()->path() == 'admin/backup') show
                                            @elseif(request()->path() == 'admin/sitemap') show @endif"
                                         id="misc">
                                        <ul class="nav nav-collapse subnav">
                                            <li>
                                                <a href="{{ route('admin.cache.clear') }}">
                                                    <span class="sub-item">Clear Cache</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Admins Management', $permissions)))
                    {{-- Admins Management --}}
                    <li class="nav-item
                                @if (request()->path() == 'admin/roles') active
                                @elseif(request()->is('admin/role/*/permissions/manage')) active
                                @elseif(request()->path() == 'admin/users') active
                                @elseif(request()->is('admin/user/*/edit')) active @endif">
                        <a data-toggle="collapse" href="#adminsManagement">
                            <i class="fas fa-users-cog"></i>
                            <p>Admins Management</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                                @if (request()->path() == 'admin/roles') show
                                @elseif(request()->is('admin/role/*/permissions/manage')) show
                                @elseif(request()->path() == 'admin/users') show
                                @elseif(request()->is('admin/user/*/edit')) show @endif"
                             id="adminsManagement">
                            <ul class="nav nav-collapse">
                                <li class="
                                    @if (request()->path() == 'admin/roles') active
                                    @elseif(request()->is('admin/role/*/permissions/manage')) active @endif">
                                    <a href="{{ route('admin.role.index') }}">
                                        <span class="sub-item">Role Management</span>
                                    </a>
                                </li>
                                <li class="
                                        @if (request()->path() == 'admin/users') active
                                        @elseif(request()->is('admin/user/*/edit')) active @endif">
                                    <a href="{{ route('admin.user.index') }}">
                                        <span class="sub-item">Admins</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item border-top mt-3">
                    <div class="menu-divider text-dark pb-2 pt-3 text-uppercase fw-bold">
                        Messages & Feedbacks
                    </div>
                </li>

                @if (empty($admin->role) || (!empty($permissions) && in_array('Contacts', $permissions)))
                    {{-- Contact Form Messages --}}
                    <li class="nav-item @if (request()->path() == 'admin/contacts') active @endif">
                        <a href="{{ route('admin.contacts.index') }}">
                            <i class="fas fa-envelope"></i>
                            <p>Contact Messages</p>
                        </a>
                    </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('Client Feedbacks', $permissions)))
                    {{-- Client Feedbacks --}}
                    <li class="nav-item @if (request()->path() == 'admin/feedbacks') active @endif">
                        <a href="{{ route('admin.client_feedbacks') }}">
                            <i class="fas fa-pen-fancy"></i>
                            <p>Feedbacks</p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
