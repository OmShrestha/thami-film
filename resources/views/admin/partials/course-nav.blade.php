{{-- Courses --}}
<li
    class="nav-item
                    @if (request()->path() == 'admin/course_categories') active
                    @elseif(request()->path() == 'admin/course/settings') active
                    @elseif(request()->path() == 'admin/courses') active
                    @elseif(request()->path() == 'admin/course/create') active
                    @elseif(request()->path() == 'admin/instructors') active
                    @elseif(request()->path() == 'admin/instructor/create') active
                    @elseif(request()->is('admin/course/*/edit')) active
                    @elseif(request()->is('admin/course/*/modules')) active
                    @elseif(request()->is('admin/module/*/lessons')) active @endif">
    <a data-toggle="collapse" href="#course">
        <i class='fas fa-book-open'></i>
        <p>Course Management</p>
        <span class="caret"></span>
    </a>
    <div class="collapse
                    @if (request()->path() == 'admin/course_categories') show
                    @elseif(request()->path() == 'admin/course/settings') show
                    @elseif(request()->path() == 'admin/courses') show
                    @elseif(request()->path() == 'admin/course/create') show
                    @elseif(request()->path() == 'admin/instructors') show
                    @elseif(request()->path() == 'admin/instructor/create') show
                    @elseif(request()->is('admin/course/*/edit')) show
                    @elseif(request()->is('admin/course/*/modules')) show
                    @elseif(request()->is('admin/module/*/lessons')) show @endif"
         id="course">
        <ul class="nav nav-collapse">
            <li
                class="@if (request()->path() == 'admin/courses') active
                            @elseif(request()->is('admin/course/*/edit')) active
                            @elseif(request()->is('admin/course/*/modules')) active
                            @elseif(request()->is('admin/module/*/lessons')) active @endif">
                <a href="{{ route('admin.course.index') . '?language=' . $default->code }}">
                    <span class="sub-item">Courses List</span>
                </a>
            </li>
            <li class="@if (request()->path() == 'admin/course/create') active @endif">
                <a href="{{ route('admin.course.create') . '?language=' . $default->code }}">
                    <span class="sub-item">Add Course</span>
                </a>
            </li>
            <li class="@if (request()->path() == 'admin/course_categories') active @endif">
                <a
                    href="{{ route('admin.course_category.index') . '?language=' . $default->code }}">
                    <span class="sub-item">Category</span>
                </a>
            </li>
            <li
                class="@if (request()->path() == 'admin/instructors') active
                            @elseif(request()->is('admin/instructor/*/edit')) active @endif">
                <a href="{{ route('admin.instructor.index') . '?language=' . $default->code }}">
                    <span class="sub-item">Instructors</span>
                </a>
            </li>
            <li class="@if (request()->path() == 'admin/course/settings') active @endif">
                <a href="{{ route('admin.course.settings') }}">
                    <span class="sub-item">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</li>

{{-- Enrolment Management --}}
<li
    class="nav-item
                @if (request()->is('admin/course/purchase-log*')) active
                @elseif(request()->is('admin/course/batch*')) active
                @elseif(request()->is('admin/course/enrolls/report*')) active @endif">
    <a data-toggle="collapse" href="#enrolments">
        <i class="la flaticon-add-user"></i>
        <p>Enrolments</p>
        <span class="caret"></span>
    </a>
    <div class="collapse @if (request()->is('admin/course/purchase-log*')) show
                            @elseif(request()->is('admin/course/batch*')) show
                            @elseif(request()->is('admin/course/enrolls/report*')) show @endif"
         id="enrolments">
        <ul class="nav nav-collapse">

            <li class="@if (request()->is('admin/course/purchase-log*')) active  @endif">
                <a href="{{ route('admin.course.purchaseLog') }}">
                    <span class="sub-item">Student Enrolls</span>
                </a>
            </li>
            <li class="@if (request()->is('admin/course/batch*')) active @endif">
                <a href="{{ route('admin.batch.index') }}">
                    <span class="sub-item"> Batches</span>
                </a>
            </li>
            <li class="@if (request()->is('admin/course/enrolls/report*')) active @endif">
                <a href="{{ route('admin.enrolls.report') }}">
                    <span class="sub-item"> Export Report</span>
                </a>
            </li>

        </ul>
    </div>
</li>
