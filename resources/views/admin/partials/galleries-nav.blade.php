@if (empty($admin->role) || (!empty($permissions) && in_array('Content Management', $permissions)))
    <li class="nav-item
            @if (request()->path() == 'admin/gcategorys') active
            @elseif(request()->path() == 'admin/gallery') active
            @elseif(request()->is('admin/gallery/*/edit')) active @endif">
        <a data-toggle="collapse" href="#gallery">
            <i class='fas fa-pencil-alt'></i>
            <p>Gallery Posts</p>
            <span class="caret"></span>
        </a>
        <div class="collapse
            @if (request()->path() == 'admin/bcategorys') show
            @elseif(request()->path() == 'admin/gallery') show
            @elseif(request()->is('admin/gallery/*/edit')) show @endif" id="gallery">
            <ul class="nav nav-collapse">
                <li class="
                    @if (request()->path() == 'admin/gallery') active
                    @elseif(request()->is('admin/gallery/*/edit')) active @endif">
                    <a href="{{ route('admin.gallery.index') . '?language=' . $default->code }}">
                        <span class="sub-item">Galleries</span>
                    </a>
                </li>
                <li class="@if (request()->path() == 'admin/bcategorys') active @endif">
                    <a href="{{ route('admin.gcategory.index') . '?language=' . $default->code }}">
                        <span class="sub-item">Gallery Category</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
@endif
