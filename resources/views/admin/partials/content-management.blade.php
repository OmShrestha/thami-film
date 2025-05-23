<li class="nav-item
        @if(request()->path() == 'admin/features') active
        @elseif(request()->path() == 'admin/introsection') active
        @elseif(request()->path() == 'admin/servicesection') active
        @elseif(request()->path() == 'admin/herosection/static') active
        @elseif(request()->path() == 'admin/herosection/video') active
        @elseif(request()->path() == 'admin/herosection/sliders') active
        @elseif(request()->is('admin/herosection/slider/*/edit')) active
        @elseif(request()->path() == 'admin/approach') active
        @elseif(request()->is('admin/approach/*/pointedit')) active
        @elseif(request()->path() == 'admin/statistics') active
        @elseif(request()->is('admin/statistics/*/edit')) active
        @elseif(request()->path() == 'admin/teams') active
        @elseif(request()->is('admin/team/*/edit')) active
        @elseif(request()->is('admin/approach/*/pointedit')) active
        @elseif(request()->path() == 'admin/cta') active
        @elseif(request()->is('admin/feature/*/edit')) active
        @elseif(request()->path() == 'admin/testimonials') active
        @elseif(request()->is('admin/testimonial/*/edit')) active
        @elseif(request()->path() == 'admin/invitation') active
        @elseif(request()->path() == 'admin/partners') active
        @elseif(request()->is('admin/partner/*/edit')) active
        @elseif(request()->path() == 'admin/awards') active
        @elseif(request()->is('admin/award/*/edit')) active
        @elseif(request()->path() == 'admin/portfoliosection') active
        @elseif(request()->path() == 'admin/blogsection') active
        @elseif(request()->path() == 'admin/team/create') active
        @elseif(request()->path() == 'admin/package/background') active
        @elseif(request()->path() == 'admin/sections') active

        @elseif(request()->path() == 'admin/scategorys') active
        @elseif(request()->is('admin/service/settings')) active
        @elseif(request()->is('admin/scategory/*/edit')) active
        @elseif(request()->path() == 'admin/services') active
        @elseif(request()->is('admin/service/*/edit')) active

        @elseif(request()->path() == 'admin/portfolios') active
        @elseif(request()->path() == 'admin/portfolio/create') active
        @elseif(request()->is('admin/portfolio/*/edit')) active

        @elseif(request()->path() == 'admin/news-category') active
        @elseif(request()->path() == 'admin/news') active
        @elseif(request()->is('admin/news/*/edit')) active

        @elseif(request()->path() == 'admin/footers') active
        @elseif(request()->path() == 'admin/ulinks') active

        @elseif(request()->path() == 'admin/gallery/settings') active
        @elseif(request()->path() == 'admin/gallery/categories') active
        @elseif(request()->path() == 'admin/gallery') active
        @elseif(request()->path() == 'admin/gallery/create') active
        @elseif(request()->is('admin/gallery/*/edit')) active

        @elseif(request()->path() == 'admin/jcategorys') active
        @elseif(request()->path() == 'admin/job/create') active
        @elseif(request()->is('admin/jcategory/*/edit')) active
        @elseif(request()->path() == 'admin/jobs') active
        @elseif(request()->is('admin/job/*/edit')) active

        @elseif(request()->path() == 'admin/contact') active
        @endif">
    <a data-toggle="collapse" href="#webContents">
        <i class="la flaticon-imac"></i>
        <p>Content Management</p>
        <span class="caret"></span>
    </a>
    <div class="collapse
        @if(request()->path() == 'admin/features') show
        @elseif(request()->path() == 'admin/introsection') show
        @elseif(request()->path() == 'admin/servicesection') show
        @elseif(request()->path() == 'admin/herosection/static') show
        @elseif(request()->path() == 'admin/herosection/video') show
        @elseif(request()->path() == 'admin/herosection/sliders') show
        @elseif(request()->is('admin/herosection/slider/*/edit')) show
        @elseif(request()->path() == 'admin/approach') show
        @elseif(request()->is('admin/approach/*/pointedit')) show
        @elseif(request()->path() == 'admin/statistics') show
        @elseif(request()->is('admin/statistics/*/edit')) show
        @elseif(request()->path() == 'admin/teams') show
        @elseif(request()->is('admin/team/*/edit')) show
        @elseif(request()->is('admin/approach/*/pointedit')) show
        @elseif(request()->path() == 'admin/cta') show
        @elseif(request()->is('admin/feature/*/edit')) show
        @elseif(request()->path() == 'admin/testimonials') show
        @elseif(request()->is('admin/testimonial/*/edit')) show
        @elseif(request()->path() == 'admin/invitation') show
        @elseif(request()->path() == 'admin/partners') show
        @elseif(request()->is('admin/partner/*/edit')) show
        @elseif(request()->path() == 'admin/awards') show
        @elseif(request()->is('admin/award/*/edit')) show
        @elseif(request()->path() == 'admin/portfoliosection') show
        @elseif(request()->path() == 'admin/blogsection') show
        @elseif(request()->path() == 'admin/team/create') show
        @elseif(request()->path() == 'admin/package/background') show
        @elseif(request()->path() == 'admin/sections') show

        @elseif(request()->path() == 'admin/scategorys') show
        @elseif(request()->is('admin/service/settings')) show
        @elseif(request()->is('admin/scategory/*/edit')) show
        @elseif(request()->path() == 'admin/services') show
        @elseif(request()->is('admin/service/*/edit')) show

        @elseif(request()->path() == 'admin/portfolios') show
        @elseif(request()->path() == 'admin/portfolio/create') show
        @elseif(request()->is('admin/portfolio/*/edit')) show

        @elseif(request()->path() == 'admin/news-category') show
        @elseif(request()->path() == 'admin/news') show
        @elseif(request()->is('admin/news/*/edit')) show

        @elseif(request()->path() == 'admin/footers') show
        @elseif(request()->path() == 'admin/ulinks') show

        @elseif(request()->path() == 'admin/gallery/settings') show
        @elseif(request()->path() == 'admin/gallery/categories') show
        @elseif(request()->path() == 'admin/gallery') show
        @elseif(request()->path() == 'admin/gallery/create') show
        @elseif(request()->is('admin/gallery/*/edit')) show

        @elseif(request()->path() == 'admin/jcategorys') show
        @elseif(request()->path() == 'admin/job/create') show
        @elseif(request()->is('admin/jcategory/*/edit')) show
        @elseif(request()->path() == 'admin/jobs') show
        @elseif(request()->is('admin/job/*/edit')) show

        @elseif(request()->path() == 'admin/contact') show
        @endif" id="webContents">
        <ul class="nav nav-collapse">

            @if (empty($admin->role) || (!empty($permissions) && in_array('Basic Settings', $permissions)))
            {{-- Home Page Sections --}}
            <li class="
            @if(request()->path() == 'admin/features') selected
            @elseif(request()->path() == 'admin/introsection') selected
            @elseif(request()->path() == 'admin/servicesection') selected
            @elseif(request()->path() == 'admin/herosection/static') selected
            @elseif(request()->path() == 'admin/herosection/video') selected
            @elseif(request()->path() == 'admin/herosection/sliders') selected
            @elseif(request()->is('admin/herosection/slider/*/edit')) selected
            @elseif(request()->path() == 'admin/approach') selected
            @elseif(request()->is('admin/approach/*/pointedit')) selected
            @elseif(request()->path() == 'admin/statistics') selected
            @elseif(request()->is('admin/statistics/*/edit')) selected
            @elseif(request()->path() == 'admin/teams') selected
            @elseif(request()->is('admin/team/*/edit')) selected
            @elseif(request()->is('admin/approach/*/pointedit')) selected
            @elseif(request()->path() == 'admin/cta') selected
            @elseif(request()->is('admin/feature/*/edit')) selected
            @elseif(request()->path() == 'admin/testimonials') selected
            @elseif(request()->is('admin/testimonial/*/edit')) selected
            @elseif(request()->path() == 'admin/invitation') selected
            @elseif(request()->path() == 'admin/partners') selected
            @elseif(request()->is('admin/partner/*/edit')) selected
            @elseif(request()->path() == 'admin/portfoliosection') selected
            @elseif(request()->path() == 'admin/blogsection') selected
            @elseif(request()->path() == 'admin/team/create') selected
            @elseif(request()->path() == 'admin/package/background') selected
            @endif">
                <a data-toggle="collapse" href="#home">
                    <span class="sub-item">Home Page Sections</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse
                @if(request()->path() == 'admin/features') show
                @elseif(request()->path() == 'admin/introsection') show
                @elseif(request()->path() == 'admin/servicesection') show
                @elseif(request()->path() == 'admin/herosection/static') show
                @elseif(request()->path() == 'admin/herosection/video') show
                @elseif(request()->path() == 'admin/herosection/sliders') show
                @elseif(request()->is('admin/herosection/slider/*/edit')) show
                @elseif(request()->path() == 'admin/approach') show
                @elseif(request()->is('admin/approach/*/pointedit')) show
                @elseif(request()->path() == 'admin/statistics') show
                @elseif(request()->is('admin/statistics/*/edit')) show
                @elseif(request()->path() == 'admin/teams') show
                @elseif(request()->is('admin/team/*/edit')) show
                @elseif(request()->is('admin/approach/*/pointedit')) show
                @elseif(request()->path() == 'admin/cta') show
                @elseif(request()->is('admin/feature/*/edit')) show
                @elseif(request()->path() == 'admin/testimonials') show
                @elseif(request()->is('admin/testimonial/*/edit')) show
                @elseif(request()->path() == 'admin/invitation') show
                @elseif(request()->path() == 'admin/partners') show
                @elseif(request()->is('admin/partner/*/edit')) show
                @elseif(request()->path() == 'admin/portfoliosection') show
                @elseif(request()->path() == 'admin/blogsection') show
                @elseif(request()->path() == 'admin/team/create') show
                @elseif(request()->path() == 'admin/package/background') show
                @endif
                " id="home">
                    <ul class="nav nav-collapse subnav">
                        <li class="
                        @if(request()->path() == 'admin/herosection/static') selected
                        @elseif(request()->path() == 'admin/herosection/video') selected
                        @elseif(request()->path() == 'admin/herosection/sliders') selected
                        @elseif(request()->is('admin/herosection/slider/*/edit')) selected
                        @endif
                        ">
                            <a data-toggle="collapse" href="#herosection">
                                <span class="sub-item">Hero Section</span>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse @if(request()->path() == 'admin/herosection/static') show
                                @elseif(request()->path() == 'admin/herosection/video') show
                                @elseif(request()->path() == 'admin/herosection/sliders') show
                                @elseif(request()->is('admin/herosection/slider/*/edit')) show
                                @endif" id="herosection">
                                <ul class="nav nav-collapse subnav">
                                    <li class="@if (request()->path() == 'admin/herosection/static') active @endif">
                                        <a
                                            href="{{ route('admin.herosection.static') . '?language=' . $default->code }}">
                                            <span class="sub-item">Static Version</span>
                                        </a>
                                    </li>
                                    <li class="@if(request()->path() == 'admin/herosection/sliders') active
                                        @elseif(request()->is('admin/herosection/slider/*/edit')) active
                                        @endif">
                                        <a href="{{ route('admin.slider.index') . '?language=' . $default->code }}">
                                            <span class="sub-item">Slider Version</span>
                                        </a>
                                    </li>
                                    <li class="@if(request()->path() == 'admin/herosection/video') active @endif">
                                        <a href="{{route('admin.herosection.video') . '?language=' . $default->code}}">
                                            <span class="sub-item">Video Version</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li
                            class="
                    @if (request()->path() == 'admin/features') active
                    @elseif(request()->is('admin/feature/*/edit')) active @endif">
                            <a href="{{ route('admin.feature.index') . '?language=' . $default->code }}">
                                <span class="sub-item">Features</span>
                            </a>
                        </li>

                        @if ($bs->home_page_pagebuilder == 0)
                            <li class="@if (request()->path() == 'admin/introsection') active @endif">
                                <a href="{{ route('admin.introsection.index') . '?language=' . $default->code }}">
                                    <span class="sub-item">Intro Section</span>
                                </a>
                            </li>
                        @endif

{{--                        @if ($bs->home_page_pagebuilder == 0)--}}
{{--                            <li class="@if (request()->path() == 'admin/servicesection') active @endif">--}}
{{--                                <a href="{{ route('admin.servicesection.index') . '?language=' . $default->code }}">--}}
{{--                                    <span class="sub-item">Service Section</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}

                        <li
                            class="
                    @if (request()->path() == 'admin/statistics') active
                    @elseif(request()->is('admin/statistics/*/edit')) active @endif">
                            <a href="{{ route('admin.statistics.index') . '?language=' . $default->code }}">
                                <span class="sub-item">Statistics Section</span>
                            </a>
                        </li>

                        @if ($bs->home_page_pagebuilder == 0)
                            <li class="@if (request()->path() == 'admin/cta') active @endif">
                                <a href="{{ route('admin.cta.index') . '?language=' . $default->code }}">
                                    <span class="sub-item">Call to Action Section</span>
                                </a>
                            </li>
                        @endif

                        @if ($bs->home_page_pagebuilder == 0)
                            <li class="@if (request()->path() == 'admin/portfoliosection') active @endif">
                                <a href="{{ route('admin.portfoliosection.index') . '?language=' . $default->code }}">
                                    <span class="sub-item">Portfolio Section</span>
                                </a>
                            </li>
                        @endif
                        <li
                            class="
                    @if (request()->path() == 'admin/testimonials') active
                    @elseif(request()->is('admin/testimonial/*/edit')) active @endif">
                            <a href="{{ route('admin.testimonial.index') . '?language=' . $default->code }}">
                                <span class="sub-item">Testimonials</span>
                            </a>
                        </li>
                        <li
                            class="
                    @if (request()->path() == 'admin/teams') active
                    @elseif(request()->is('admin/team/*/edit')) active
                    @elseif(request()->path() == 'admin/team/create') active @endif">
                            <a href="{{ route('admin.team.index') . '?language=' . $default->code }}">
                                <span class="sub-item">Team Section</span>
                            </a>
                        </li>

                        @if ($bs->home_page_pagebuilder == 0)
                            <li class="@if (request()->path() == 'admin/blogsection') active @endif">
                                <a href="{{ route('admin.blogsection.index') . '?language=' . $default->code }}">
                                    <span class="sub-item">Blog Section</span>
                                </a>
                            </li>
                        @endif

                        <li
                            class="
                    @if (request()->path() == 'admin/partners') active
                    @elseif(request()->is('admin/partner/*/edit')) active @endif">
                            <a href="{{ route('admin.partner.index') . '?language=' . $default->code }}">
                                <span class="sub-item">Partners</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            @endif

            {{-- Footer --}}
            <li
                class="
            @if (request()->path() == 'admin/footers') selected
            @elseif(request()->path() == 'admin/ulinks') selected @endif">
                <a data-toggle="collapse" href="#footer">
                    <span class="sub-item">Footer</span>
                    <span class="caret"></span>
                </a>
                <div class="collapse
                @if (request()->path() == 'admin/footers') show
                @elseif(request()->path() == 'admin/ulinks') show @endif"
                     id="footer">
                    <ul class="nav nav-collapse subnav">
                        <li class="@if (request()->path() == 'admin/footers') active @endif">
                            <a href="{{ route('admin.footer.index') . '?language=' . $default->code }}">
                                <span class="sub-item">Logo & Text</span>
                            </a>
                        </li>
                        <li class="@if (request()->path() == 'admin/ulinks') active @endif">
                            <a href="{{ route('admin.ulink.index') . '?language=' . $default->code }}">
                                <span class="sub-item">Useful Links</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Service Management --}}
{{--            <li--}}
{{--                class="--}}
{{--            @if (request()->path() == 'admin/scategorys') selected--}}
{{--            @elseif(request()->is('admin/service/settings')) selected--}}
{{--            @elseif(request()->is('admin/scategory/*/edit')) selected--}}
{{--            @elseif(request()->path() == 'admin/services') selected--}}
{{--            @elseif(request()->is('admin/service/*/edit')) selected @endif">--}}
{{--                <a data-toggle="collapse" href="#service">--}}
{{--                    <span class="sub-item">Services</span>--}}
{{--                    <span class="caret"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse--}}
{{--                @if (request()->path() == 'admin/scategorys') show--}}
{{--                @elseif(request()->is('admin/service/settings')) show--}}
{{--                @elseif(request()->is('admin/scategory/*/edit')) show--}}
{{--                @elseif(request()->path() == 'admin/services') show--}}
{{--                @elseif(request()->is('admin/service/*/edit')) show @endif"--}}
{{--                     id="service">--}}
{{--                    <ul class="nav nav-collapse subnav">--}}
{{--                        <li class="--}}
{{--                            @if (request()->path() == 'admin/service/settings') active @endif">--}}
{{--                            <a href="{{ route('admin.service.settings') }}">--}}
{{--                                <span class="sub-item">Settings</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @if (serviceCategory())--}}
{{--                            <li--}}
{{--                                class="--}}
{{--                        @if (request()->path() == 'admin/scategorys') active--}}
{{--                        @elseif(request()->is('admin/scategory/*/edit')) active @endif">--}}
{{--                                <a href="{{ route('admin.scategory.index') . '?language=' . $default->code }}">--}}
{{--                                    <span class="sub-item">Category</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        <li--}}
{{--                            class="--}}
{{--                        @if (request()->path() == 'admin/services') active--}}
{{--                        @elseif(request()->is('admin/service/*/edit')) active @endif">--}}
{{--                            <a href="{{ route('admin.service.index') . '?language=' . $default->code }}">--}}
{{--                                <span class="sub-item">Services</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}


            {{-- Portfolio Management --}}
{{--            <li--}}
{{--                class="--}}
{{--            @if (request()->path() == 'admin/portfolios') selected--}}
{{--            @elseif(request()->path() == 'admin/portfolio/create') selected--}}
{{--            @elseif(request()->is('admin/portfolio/*/edit')) selected @endif">--}}
{{--                <a data-toggle="collapse" href="#portfolio">--}}
{{--                    <span class="sub-item">Portfolio</span>--}}
{{--                    <span class="caret"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse--}}
{{--                @if (request()->path() == 'admin/portfolios') show--}}
{{--                @elseif(request()->path() == 'admin/portfolio/create') show--}}
{{--                @elseif(request()->is('admin/portfolio/*/edit')) show @endif"--}}
{{--                     id="portfolio">--}}
{{--                    <ul class="nav nav-collapse subnav">--}}
{{--                        <li class="--}}
{{--                        @if (request()->path() == 'admin/portfolio/create') active @endif">--}}
{{--                            <a href="{{ route('admin.portfolio.create') }}">--}}
{{--                                <span class="sub-item">Add Portfolio</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li--}}
{{--                            class="--}}
{{--                        @if (request()->path() == 'admin/portfolios') active--}}
{{--                        @elseif(request()->is('admin/portfolio/*/edit')) active @endif">--}}
{{--                            <a href="{{ route('admin.portfolio.index') . '?language=' . $default->code }}">--}}
{{--                                <span class="sub-item">Portfolio</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

            {{-- Career Page --}}
{{--            <li class="--}}
{{--            @if(request()->path() == 'admin/jcategorys') selected--}}
{{--            @elseif(request()->path() == 'admin/job/create') selected--}}
{{--            @elseif(request()->is('admin/jcategory/*/edit')) selected--}}
{{--            @elseif(request()->path() == 'admin/jobs') selected--}}
{{--            @elseif(request()->is('admin/job/*/edit')) selected--}}
{{--            @endif">--}}
{{--                <a data-toggle="collapse" href="#career">--}}
{{--                    <span class="sub-item">Career</span>--}}
{{--                    <span class="caret"></span>--}}
{{--                </a>--}}
{{--                <div class="collapse--}}
{{--                @if(request()->path() == 'admin/jcategorys') show--}}
{{--                @elseif(request()->path() == 'admin/job/create') show--}}
{{--                @elseif(request()->is('admin/jcategory/*/edit')) show--}}
{{--                @elseif(request()->path() == 'admin/jobs') show--}}
{{--                @elseif(request()->is('admin/job/*/edit')) show--}}
{{--                @endif" id="career">--}}
{{--                    <ul class="nav nav-collapse subnav">--}}
{{--                        <li class="--}}
{{--                            @if(request()->path() == 'admin/jcategorys') active--}}
{{--                            @elseif(request()->is('admin/jcategory/*/edit')) active--}}
{{--                            @endif">--}}
{{--                            <a href="{{route('admin.jcategory.index') . '?language=' . $default->code}}">--}}
{{--                                <span class="sub-item">Category</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="--}}
{{--                        @if(request()->is('admin/job/create')) active--}}
{{--                        @endif">--}}
{{--                            <a href="{{route('admin.job.create')}}">--}}
{{--                                <span class="sub-item">Post Job</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="--}}
{{--                        @if(request()->path() == 'admin/jobs') active--}}
{{--                        @elseif(request()->is('admin/job/*/edit')) active--}}
{{--                        @endif">--}}
{{--                            <a href="{{route('admin.job.index') . '?language=' . $default->code}}">--}}
{{--                                <span class="sub-item">Job Management</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--            <li--}}
{{--                class="--}}
{{--            @if (request()->path() == 'admin/teams') active--}}
{{--            @elseif(request()->is('admin/team/*/edit')) active--}}
{{--            @elseif(request()->path() == 'admin/team/create') active @endif">--}}
{{--                <a href="{{ route('admin.team.index') . '?language=' . $default->code }}">--}}
{{--                    <span class="sub-item">Team Section</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li
                class="
            @if (request()->path() == 'admin/testimonials') active
            @elseif(request()->is('admin/testimonial/*/edit')) active @endif">
                <a href="{{ route('admin.testimonial.index') . '?language=' . $default->code }}">
                    <span class="sub-item">Testimonials</span>
                </a>
            </li>

            <li
                class="
            @if (request()->path() == 'admin/partners') active
            @elseif(request()->is('admin/partner/*/edit')) active @endif">
                <a href="{{ route('admin.partner.index') . '?language=' . $default->code }}">
                    <span class="sub-item">Partners</span>
                </a>
            </li>

            <li
                class="
            @if (request()->path() == 'admin/awards') active
            @elseif(request()->is('admin/award/*/edit')) active @endif">
                <a href="{{ route('admin.award.index') . '?language=' . $default->code }}">
                    <span class="sub-item">Awards</span>
                </a>
            </li>

            @if (empty($admin->role) || (!empty($permissions) && in_array('Basic Settings', $permissions)))
                @if ($bs->home_page_pagebuilder == 0)
                    <li class=" @if (request()->path() == 'admin/sections') active @endif">
                        <a href="{{ route('admin.sections.index') . '?language=' . $default->code }}">
                            <span class="sub-item">Display Blocks</span>
                        </a>
                    </li>
                @endif
            @endif

            {{-- Contact Page --}}
            <li class="
            @if (request()->path() == 'admin/contact') active @endif">
                <a href="{{ route('admin.contact.index') . '?language=' . $default->code }}">
                    <span class="sub-item">Contact Page</span>
                </a>
            </li>

        </ul>
    </div>

</li>
