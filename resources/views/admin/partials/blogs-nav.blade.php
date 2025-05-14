@if (empty($admin->role) || (!empty($permissions) && in_array('Content Management', $permissions)))
    <li class="nav-item
            @if (request()->path() == 'admin/bcategorys') active
            @elseif (request()->path() == 'admin/subcategories') active
            @elseif (request()->path() == 'admin/topics') active
            @elseif (request()->path() == 'admin/tags') active
            @elseif(request()->path() == 'admin/blogs') active
            @elseif(request()->path() == 'admin/archives') active
            @elseif(request()->is('admin/blog/*/edit')) active @endif">
        <a data-toggle="collapse" href="#blogs">
            <i class='fas fa-pencil-alt'></i>
            <p>Blog Posts</p>
            <span class="caret"></span>
        </a>
        <div class="collapse
            @if (request()->path() == 'admin/bcategorys') show
            @elseif (request()->path() == 'admin/subcategories') show
            @elseif (request()->path() == 'admin/topics') show
            @elseif (request()->path() == 'admin/tags') show
            @elseif(request()->path() == 'admin/blogs') show
            @elseif(request()->path() == 'admin/archives') show
            @elseif(request()->is('admin/blog/*/edit')) show @endif" id="blogs">
            <ul class="nav nav-collapse">
                <li class="
                    @if (request()->path() == 'admin/blogs') active
                    @elseif(request()->is('admin/blog/*/edit')) active @endif">
                    <a href="{{ route('admin.blog.index') . '?language=' . $default->code }}">
                        <span class="sub-item">Blogs</span>
                    </a>
                </li>
                <li class="@if (request()->path() == 'admin/bcategorys') active @endif">
                    <a href="{{ route('admin.bcategory.index') . '?language=' . $default->code }}">
                        <span class="sub-item">Category</span>
                    </a>
                </li>
                <li class="@if (request()->path() == 'admin/subcategories') active @endif">
                    <a href="{{ route('admin.subcategory.index') . '?language=' . $default->code }}">
                        <span class="sub-item">Sub Category</span>
                    </a>
                </li>
                <li class="@if (request()->path() == 'admin/topics') active @endif">
                    <a href="{{ route('admin.topic.index') . '?language=' . $default->code }}">
                        <span class="sub-item">Topics</span>
                    </a>
                </li>
                <li class="@if (request()->path() == 'admin/tags') active @endif">
                    <a href="{{ route('admin.tag.index') . '?language=' . $default->code }}">
                        <span class="sub-item">Tags</span>
                    </a>
                </li>
                <li class="@if (request()->path() == 'admin/archives') active @endif">
                    <a href="{{ route('admin.archive.index') }}">
                        <span class="sub-item">Archives</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
@endif
