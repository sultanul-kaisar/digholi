<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            @if(auth()->user()->hasrole('developer'))
                <div class="pcoded-navigation-label">Page Kits</div>
                <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu  pcoded-trigger">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-grid"></i></span>
                        <span class="pcoded-mtext">Basic</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="{{ route('form') }}" class="nav-link {{ (request()->is('admin/form')) ? 'active' : ''}} waves-effect waves-dark">
                                <span class="pcoded-mtext">Basic Form</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('table') }}" class="nav-link {{ (request()->is('admin/table')) ? 'active' : ''}} waves-effect waves-dark">
                                <span class="pcoded-mtext">Basic Data Table</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('report-table') }}" class="nav-link {{ (request()->is('admin/report-table')) ? 'active' : ''}} waves-effect waves-dark">
                                <span class="pcoded-mtext">Report Table</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                        <span class="pcoded-mtext">Level One</span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="dt-ext-autofill.html" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Level Two</span>
                            </a>
                        </li>
                        <li class=" pcoded-hasmenu">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Level Two</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="#" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Level Three</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Level Three</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
                <div class="pcoded-navigation-label">Main</div>
            @endif

            <ul class="pcoded-item pcoded-left-item">
                <li class=" ">
                    <a href="{{route('admin.dashboard')}}" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="feather icon-home"></i>
        									</span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('contacts view') || auth()->user()->can('contacts delete'))
                    <li class=" ">
                        <a href="{{route('contacts.index')}}" class="nav-link {{ (request()->is('admin/contacts*')) ? 'active' : ''}}" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="fa fa-envelope-o"></i>
        									</span>
                            <span class="pcoded-mtext">Mails</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog category view') || auth()->user()->can('blog category create') || auth()->user()->can('blog category edit') || auth()->user()->can('blog category delete'))
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-globe"></i>
                                                </span>
                            <span class="pcoded-mtext">Blog</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="{{route('blog.index')}}" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Blogs</span>
                                </a>
                            </li>
                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('blog category view') || auth()->user()->can('blog category create') || auth()->user()->can('blog category edit') || auth()->user()->can('blog category delete'))
                                <li class="">
                                    <a href="{{ route('blog-category.index') }}" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Categories</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->hasrole('developer'))
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-package"></i>
                                                </span>
                            <span class="pcoded-mtext">Item</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="#" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Items</span>
                                </a>
                            </li>
                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('item category view') || auth()->user()->can('item category create') || auth()->user()->can('item category edit') || auth()->user()->can('item category delete'))
                            <li class=" ">
                                <a href="{{ route('item-category.index') }}"  class="waves-effect waves-dark {{ (request()->is('admin/item-category*')) ? 'active' : ''}}">
                                    <span class="pcoded-mtext">Categories</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('project category view') || auth()->user()->can('project category create') || auth()->user()->can('project category edit') || auth()->user()->can('project category delete'))
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-folder"></i>
                                                </span>
                            <span class="pcoded-mtext">Project</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="{{ route('project.index') }}" class="waves-effect waves-dark nav-link {{ (request()->is('admin/project*')) ? 'active' : ''}}">
                                    <span class="pcoded-mtext">Project</span>
                                </a>
                            </li>
                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('project category view') || auth()->user()->can('project category create') || auth()->user()->can('project category edit') || auth()->user()->can('project category delete'))
                                <li class=" ">
                                    <a href="{{ route('project-category.index') }}" class="waves-effect waves-dark nav-link {{ (request()->is('admin/project-category*')) ? 'active' : ''}}">
                                        <span class="pcoded-mtext">Categories</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('gallery view') || auth()->user()->can('gallery create') || auth()->user()->can('gallery edit') || auth()->user()->can('gallery delete') || auth()->user()->can('gallery category view') || auth()->user()->can('gallery category create') || auth()->user()->can('gallery category edit') || auth()->user()->can('gallery category delete'))
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="fa fa-file-image-o"></i>
                                                </span>
                            <span class="pcoded-mtext">Gallery</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="{{route('gallery.index')}}" class="waves-effect waves-dark nav-link {{ (request()->is('admin/gallery*')) ? 'active' : ''}}">
                                    <span class="pcoded-mtext">Gallery</span>
                                </a>
                            </li>
                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('gallery category view') || auth()->user()->can('gallery category create') || auth()->user()->can('gallery category edit') || auth()->user()->can('gallery category delete'))
                                <li class=" ">
                                    <a href="{{ route('gallery-category.index') }}" class="waves-effect waves-dark nav-link {{ (request()->is('admin/gallery-category*')) ? 'active' : ''}}">
                                        <span class="pcoded-mtext">Categories</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team view') || auth()->user()->can('team create') || auth()->user()->can('team edit') || auth()->user()->can('team delete') || auth()->user()->can('team department view') || auth()->user()->can('team department create') || auth()->user()->can('team department edit') || auth()->user()->can('team department delete'))
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="fa fa-users"></i>
                                                </span>
                            <span class="pcoded-mtext">Team</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="{{ route('team.index') }}" class="waves-effect waves-dark  {{ (request()->is('admin/team') || request()->is('admin/team/*')) ? 'active' : ''}}">
                                    <span class="pcoded-mtext">Team Members</span>
                                </a>
                            </li>
                            @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('team department view') || auth()->user()->can('team department create') || auth()->user()->can('team department edit') || auth()->user()->can('team department delete'))
                                <li class=" ">
                                    <a href="{{ route('team-department.index') }}" class="waves-effect waves-dark">
                                        <span class="pcoded-mtext">Team Department</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('slider view') || auth()->user()->can('slider create') || auth()->user()->can('slider edit') || auth()->user()->can('slider delete'))
                    <li class=" ">
                        <a href="{{route('slider.index')}}" class="nav-link {{ (request()->is('admin/slider*')) ? 'active' : ''}}" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="fa fa-slideshare"></i>
        									</span>
                            <span class="pcoded-mtext">Slider</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('comment view') || auth()->user()->can('comment create') || auth()->user()->can('comment edit') || auth()->user()->can('comment delete'))
                    <li class=" ">
                        <a href="{{route('comment.index')}}" class="nav-link {{ (request()->is('admin/comment*')) ? 'active' : ''}}" class="waves-effect waves-dark">
        									<span class="pcoded-micon">
        										<i class="fa fa-comments-o"></i>
        									</span>
                            <span class="pcoded-mtext">Comment</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('client view') || auth()->user()->can('client create') || auth()->user()->can('client edit') || auth()->user()->can('client delete'))
                    <li class=" ">
                        <a href="{{ route('client.index') }}" class="nav-link {{ (request()->is('admin/client*')) ? 'active' : ''}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-user"></i>
                                                </span>
                            <span class="pcoded-mtext">Clints</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global') || auth()->user()->can('testimonial view') || auth()->user()->can('testimonial create') || auth()->user()->can('testimonial edit') || auth()->user()->can('testimonial delete'))
                    <li class=" ">
                        <a href="{{route('testimonial.index')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-micon">
                                                    <i class="feather icon-edit-1"></i>
                                                </span>
                            <span class="pcoded-mtext">Testimonials</span>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->can('master') || auth()->user()->can('global'))
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                            <span class="pcoded-mtext">System</span>
                        </a>

                        <ul class="pcoded-submenu">
                            <li class=" pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Settings</span>
                                </a>
                                <ul class="pcoded-submenu" >
                                    <li class="">
                                        <a href="{{ route('admin.system.settings') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">General Settings</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="{{ route('admin.system.seo') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">SEO Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class=" pcoded-hasmenu">
                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Users</span>
                                </a>
                                <ul class="pcoded-submenu">
                                    <li class="">
                                        <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active' : ''}}" style="padding: .625rem 1.25rem 0.625rem 2.5rem!important;">
                                            <span class="pcoded-mtext">Users</span>
                                        </a>
                                    </li>
                                        <li class="">
                                            <a href="{{ route('role.index') }}" class="waves-effect waves-dark nav-link {{ (request()->is('admin/role*')) ? 'active' : ''}}" style="padding: .625rem 1.25rem 0.625rem 2.5rem!important;">
                                                <span class="pcoded-mtext">Roles</span>
                                            </a>
                                        </li>
                                    @if(auth()->user()->hasrole('developer'))
                                        <li class="">
                                            <a href="{{ route('permission.index') }}" class="waves-effect waves-dark nav-link {{ (request()->is('admin/permission*')) ? 'active' : ''}}" style="padding: .625rem 1.25rem 0.625rem 2.5rem!important;">
                                                <span class="pcoded-mtext">Permissions</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>
