@extends('layouts.blog')

@section('title')
    {{ trans('blog.title.category', ['title' => $category->title]) }}
@endsection
@section('content')
    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container single-col-max-width">
            <div class="row categories_hd">
                <h2 class="heading">{{ trans('blog.title.category', ['title' => $category->title]) }}</h2>
                <div class="intro">{{ Breadcrumbs::render('blog_posts_category', $category->title) }}</div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @forelse($post as $key => $value)
                        <div class="item mb-5">
                            <div class="row g-3 g-xl-0">
                                <div class="col-2 col-xl-4">
                                    @if(file_exists(public_path($value->thumbnail)))
                                        <img class="img-fluid post-thumb " src="{{ asset($value->thumbnail) }}"
                                             alt="{{ $value->title }}" title="{{ $value->title }}">
                                    @else
                                        <img class="img-fluid post-thumb "
                                             src="{{ asset('blog/assets/images/blog/blog-post-thumb-8.jpg') }}"
                                             alt="{{ $value->title }}" title="{{ $value->title }}">
                                    @endif
                                </div>
                                <div class="col">
                                    <h3 class="title mb-1"><a class="text-link"
                                                              href="{{ route('blog.posts.detail', ['slug' => $value->slug.'.html']) }}">{{ $value->title }}</a>
                                    </h3>
                                    <div class="intro">{{ $value->description }}</div>
                                    <a class="text-link"
                                       href="{{ route('blog.posts.detail', ['slug' => $value->slug.'.html']) }}">{{ trans('blog.button.read_more.value') }} &rarr;</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>{{ trans('blog.no_data.posts') }}</h4>
                            </div>
                        </div>
                    @endforelse

                    @if($post->hasPages())
                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="blog-nav nav nav-justified my-5">
                                    <a class="nav-link-prev nav-item nav-link rounded-left"
                                       href="{{ $post->previousPageUrl() }}">Previous<i
                                            class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                                    <a class="nav-link-next nav-item nav-link rounded"
                                       href="{{ $post->nextPageUrl() }}">Next<i
                                            class="arrow-next fas fa-long-arrow-alt-right"></i></a>
                                </nav>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="card mb-1">
                        <h5 class="card-header">
                            {{ trans('blog.title.categories') }}
                        </h5>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    @if($category->slug == $categoryRoot->slug)
                                        {{ $categoryRoot->title }}
                                    @else
                                        <a href="{{ route('blog.posts.detail', ['slug' => $categoryRoot->slug]) }}">
                                            {{ $categoryRoot->title }}
                                        </a>
                                @endif
                                <!-- category descendants:start -->
                                @if($categoryRoot->descendants)
                                    @include('blog.sub-categories',[ 'categoryRoot'  =>  $categoryRoot->descendants, 'category' =>  $category ])
                                @endif
                                <!-- category descendants:end -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css-external')
    <style>
        /*crop an image*/
        .item img {
            width: 254px;
            height: 140px;
            object-fit: cover;
        }
    </style>
@endpush

