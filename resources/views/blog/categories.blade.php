@extends('layouts.blog')

@section('title')
    {{ trans('blog.title.categories') }}
@endsection

@section('content')

    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container single-col-max-width">
            <div class="row categories_hd">
                <h2 class="heading">{{ trans('blog.title.categories') }}</h2>
                <div class="intro">{{ Breadcrumbs::render('blog_categories') }}</div>
            </div>

            <div class="item mb-5">
                <div class="row g-3">
                    @forelse($categories as $category)
                        <div class="col-6 col-lg-4">
                            @if(file_exists(public_path($category->thumbnail)))
                                <img class="img-fluid" src="{{ asset($category->thumbnail) }}"
                                     alt="{{ $category->title }}" title="{{ $category->title }}">
                            @else
                                <img class="img-fluid"
                                     src="{{ asset('blog/assets/images/blog/blog-post-thumb-8.jpg') }}"
                                     alt="{{ $category->title }}" title="{{ $category->title }}">
                            @endif
                            <h3 class="title mb-4 my-2">
                                <a class="text-link" href="{{ route('blog.posts.detail', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                            </h3>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-lg-12 my-3">
                                <h4>{{ trans('blog.no_data.categories') }}</h4>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            @if($categories->hasPages())
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="blog-nav nav nav-justified my-5">

                            <a class="nav-link-prev nav-item nav-link rounded-left"
                               href="{{ $categories->previousPageUrl() }}">Previous<i
                                    class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                            <a class="nav-link-next nav-item nav-link rounded" href="{{ $categories->nextPageUrl() }}">Next<i
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
            width: 254px;
            height: 170px;
            object-fit: cover;
        }
    </style>
@endpush
