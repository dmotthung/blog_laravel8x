@extends('layouts.blog')

@section('title')
    {{ request()->get('keyword') }}
@endsection

@section('content')
    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container single-col-max-width">
            <div class="row categories_hd">
                <h2 class="heading">{{ trans('blog.title.search', ['keyword' => request()->get('keyword')]) }}</h2>
                <div class="intro">{{ Breadcrumbs::render('blog_search', request()->get('keyword')) }}</div>
            </div>

            @forelse($posts as $post)
                <div class="item mb-5">
                    <div class="row g-3 g-xl-0">
                        <div class="col-2 col-xl-3">
                            @if(file_exists(public_path($post->thumbnail)))
                                <img class="img-fluid post-thumb " src="{{ asset($post->thumbnail) }}"
                                     alt="{{ $post->title }}" title="{{ $post->title }}">
                            @else
                                <img class="img-fluid post-thumb "
                                     src="{{ asset('blog/assets/images/blog/blog-post-thumb-8.jpg') }}"
                                     alt="{{ $post->title }}" title="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="col">
                            <h3 class="title mb-1"><a class="text-link" href="{{ route('blog.posts.detail', ['slug' => $post->slug.'.html']) }}">{{ $post->title }}</a>
                            </h3>
{{--                            <div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span--}}
{{--                                    class="comment"><a class="text-link" href="#">8 comments</a></span></div>--}}
                            <div class="intro">{{ $post->description }}</div>
                            <a class="text-link"
                               href="{{ route('blog.posts.detail', ['slug' => $post->slug.'.html']) }}">{{ trans('blog.button.read_more.value') }} &rarr;</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="row">
                    <div class="col-lg-12">
                        <h4>{{ trans('blog.no_data.search_posts') }}</h4>
                    </div>
                </div>
            @endforelse

            @if($posts->hasPages())
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="blog-nav nav nav-justified my-5">
                            <a class="nav-link-prev nav-item nav-link rounded-left"
                               href="{{ $posts->previousPageUrl() }}">Previous<i
                                    class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                            <a class="nav-link-next nav-item nav-link rounded" href="{{ $posts->nextPageUrl() }}">Next<i
                                    class="arrow-next fas fa-long-arrow-alt-right"></i></a>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@push('css-external')
    <style>
        /*crop an image*/
        .item img {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
@endpush
