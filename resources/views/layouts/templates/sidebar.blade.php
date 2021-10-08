<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">

            <li>
                <a href="{{ route('dashboard.index') }}" aria-expanded="false"
                   class="{{ set_active('dashboard.index') }}">
                    <i class="icon-speedometer menu-icon"></i><span
                        class="nav-text">{{ trans('dashboard.link.dashboard') }}</span>
                </a>
            </li>
            <li class="nav-label">{{ trans('dashboard.menu.master') }}</li>
            @can('manage_posts')
                <li>
                    <a href=" {{ route('posts.index') }}" aria-expanded="false"
                       class="{{ set_active(['posts.index', 'posts.create', 'posts.show']) }}">
                        <i class="icon-docs menu-icon"></i> <span
                            class="nav-text">{{ trans('dashboard.link.posts') }}</span>
                    </a>
                </li>
            @endcan

            @can('manage_categories')
                <li>
                    <a href="{{ route('categories.index') }}" aria-expanded="false"
                       class="{{ set_active(['categories.index', 'categories.create','categories.edit','categories.show']) }}">
                        <i class="icon-folder-alt menu-icon"></i><span
                            class="nav-text">{{ trans('dashboard.link.categories') }}</span>
                    </a>
                </li>
            @endcan

            @can('manage_tags')
                <li>
                    <a href="{{ route('tags.index') }}" aria-expanded="false"
                       class="{{ set_active(['tags.index', 'tags.create', 'tags.edit']) }}">
                        <i class="icon-list menu-icon"></i> <span
                            class="nav-text">{{ trans('dashboard.link.tags') }}</span>
                    </a>
                </li>
            @endcan
            <li class="nav-label">{{ trans('dashboard.menu.user_permission') }}</li>
            @can('manage_users')
                <li>
                    <a href="{{ route('users.index') }}" aria-expanded="false"
                       class="{{ set_active(['users.index', 'users.create', 'users.edit']) }}">
                        <i class="icon-people menu-icon"></i><span
                            class="nav-text">{{ trans('dashboard.link.users') }}</span>
                    </a>
                </li>
            @endcan

            @can('manage_roles')
                <li>
                    <a href="{{ route('roles.index') }}" aria-expanded="false"
                       class="{{ set_active(['roles.index', 'roles.show', 'roles.create', 'roles.edit']) }}">
                        <i class="icon-badge menu-icon"></i><span
                            class="nav-text">{{ trans('dashboard.link.roles') }}</span>
                    </a>
                </li>
            @endcan
            <li class="nav-label">{{ trans('dashboard.menu.setting') }}</li>
            <li>
                <a href="{{ route('filemanager.index') }}" aria-expanded="false"
                   class="{{ set_active(['filemanager.index']) }}">
                    <i class="icon-folder menu-icon"></i><span
                        class="nav-text">{{ trans('dashboard.link.file_manager') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
