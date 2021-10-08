<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// HomePage
Breadcrumbs::for('blog', function ($trail) {
    $trail->push(trans('blog.menu.home'), route('blog.home'));
});

Breadcrumbs::for('blog_home', function ($trail) {
    $trail->parent('blog');
    $trail->push(trans('blog.title.home'), route('blog.home'));
});

// Homepage > Home > Post > [title]
Breadcrumbs::for('blog_post', function ($trail, $title) {
    $trail->parent('blog');
    $trail->push($title, '#');
});

// Homepage > Home > Categories
Breadcrumbs::for('blog_categories', function ($trail) {
    $trail->parent('blog');
    $trail->push(trans('blog.title.categories'), route('blog.categories'));
});

// Homepage > Home > Categories > [title]
Breadcrumbs::for('blog_posts_category', function ($trail, $title) {
    $trail->parent('blog');
    //$trail->push(trans('blog.title.categories'), route('blog.categories'));
    $trail->push($title, '#');
});

// Homepage > Home > Tags
Breadcrumbs::for('blog_tags', function ($trail) {
    $trail->parent('blog');
    $trail->push(trans('blog.title.tags'), route('blog.tags'));
});

// Homepage > Home > Tags > [title]
Breadcrumbs::for('blog_posts_tag', function ($trail, $title) {
    $trail->parent('blog');
    $trail->push(trans('blog.title.tags'), route('blog.tags'));
    $trail->push($title, '#');
});

// Homepage > Home > Search
Breadcrumbs::for('blog_search', function ($trail, $keyword) {
    $trail->parent('blog');
    $trail->push(trans('blog.title.search'), route('blog.search_post'));
    $trail->push($keyword, route('blog.search_post'));
});

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push(trans('dashboard.link.dashboard'), route('dashboard.index'));
});
// Dashboard > Home
Breadcrumbs::for('dashboard_home', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('dashboard.label.home_admin'), route('dashboard.index'));
});

// Dashboard > Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('categories.title.index'), route('categories.index'));
});

// Dashboard > Categories > Add
Breadcrumbs::for('add_category', function ($trail) {
    $trail->parent('categories');
    $trail->push(trans('categories.title.create'), route('categories.create'));
});

// Dashboard > Categories > Edit
Breadcrumbs::for('edit_category', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push(trans('categories.title.edit'), route('categories.edit', ['category' => $category]));
});

// Dashboard > Categories > Edit > [title]
Breadcrumbs::for('edit_category_title', function ($trail, $category) {
    $trail->parent('edit_category', $category);
    $trail->push($category->title, route('categories.edit', ['category' => $category]));
});

// Dashboard > Categories > Detial
Breadcrumbs::for('detial_category', function ($trail, $category) {
    $trail->parent('categories');
    $trail->push(trans('categories.title.detail'), route('categories.show', ['category' => $category]));
});

// Dashboard > Categories > Detial > [title]
Breadcrumbs::for('detial_category_title', function ($trail, $category) {
    $trail->parent('detial_category', $category);
    $trail->push($category->title, route('categories.show', ['category' => $category]));
});

// Dashboard > Tags
Breadcrumbs::for('tags', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('tags.title.index'), route('tags.index'));
});

// Dashboard > Tags > Add
Breadcrumbs::for('add_tags', function ($trail) {
    $trail->parent('tags');
    $trail->push(trans('tags.title.create'), route('tags.create'));
});

// Dashboard > Tags > Edit
Breadcrumbs::for('edit_tags', function ($trail, $tag) {
    $trail->parent('tags');
    $trail->push(trans('tags.title.edit'), route('tags.edit', ['tag' => $tag]));
});

// Dashboard > Tags > Edit > [title]
Breadcrumbs::for('edit_tags_title', function ($trail, $tag) {
    $trail->parent('edit_tags', $tag);
    $trail->push($tag->title, route('tags.edit', ['tag' => $tag]));
});

// Dashboard > Posts
Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('posts.title.index'), route('posts.index'));
});

// Dashboard > Post > Add
Breadcrumbs::for('add_post', function ($trail) {
    $trail->parent('posts');
    $trail->push(trans('posts.title.create'), route('posts.create'));
});

// Dashboard > Posts > Detial
Breadcrumbs::for('detial_post', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push(trans('posts.title.detail'), route('posts.show', ['post' => $post]));
});

// Dashboard > Posts > Detial > [title]
Breadcrumbs::for('detial_post_title', function ($trail, $post) {
    $trail->parent('detial_post', $post);
    $trail->push($post->title, route('posts.show', ['post' => $post]));
});

// Dashboard > Posts > Edit > [title]
Breadcrumbs::for('edit_post', function ($trail, $post) {
    $trail->parent('posts');
    $trail->push(trans('posts.title.edit'), route('posts.edit', ['post' => $post]));
    $trail->push($post->title, route('posts.edit', ['post' => $post]));
});

// Dashboard > File Manager
Breadcrumbs::for('file_manager', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('filemanager.title.index'), route('filemanager.index'));
});

// Dashboard > Roles
Breadcrumbs::for('roles', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('roles.title.index'), route('roles.index'));
});

// Dashboard > Roles > Detail > [title]
Breadcrumbs::for('detail_roles', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push(trans('roles.title.detail'), route('roles.show', ['role' => $role]));
    $trail->push($role->name, route('roles.show', ['role' => $role]));
});

// Dashboard > Role > Add
Breadcrumbs::for('create_role', function ($trail) {
    $trail->parent('roles');
    $trail->push(trans('roles.title.create'), route('posts.create'));
});

// Dashboard > Roles > Edit > [title]
Breadcrumbs::for('edit_roles', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push(trans('roles.title.create'), route('roles.edit', ['role' => $role]));
    $trail->push($role->name, route('roles.edit', ['role' => $role]));
});

// Dashboard > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push(trans('users.title.index'), route('users.index'));
});

// Dashboard > Users > Add
Breadcrumbs::for('create_users', function ($trail) {
    $trail->parent('users');
    $trail->push(trans('users.title.create'), route('users.create'));
});

// Dashboard > Users > Edit > [title]
Breadcrumbs::for('edit_users', function ($trail, $user) {
    $trail->parent('users');
    $trail->push(trans('users.title.create'), route('users.edit', ['user' => $user]));
    $trail->push($user->name, route('users.edit', ['user' => $user]));
});
