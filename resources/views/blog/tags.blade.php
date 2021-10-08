@extends('layouts.blog')

@section('title')
    {{ trans('blog.title.tags') }}
@endsection

@section('content')
    <section class="blog-list px-3 py-5 p-md-5">
        <div class="container single-col-max-width">
            <div class="row categories_hd">
                <h2 class="heading">{{ trans('blog.title.tags') }}</h2>
                <div class="intro">{{ Breadcrumbs::render('blog_tags') }}</div>
            </div>

            <div class="item mb-5">
                <div class="row g-1">
                    <div class="col">
                        @forelse($tags as $tag)
                            <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}" class="text-link badge rounded-pill bg-success py-2 px-2 my-2">#{{ $tag->title }}</a>
                        @empty
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>{{ trans('blog.no_data.categories') }}</h4>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @if($tags->hasPages())
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="blog-nav nav nav-justified my-5">

                            <a class="nav-link-prev nav-item nav-link rounded-left"
                               href="{{ $tags->previousPageUrl() }}">Previous<i
                                    class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                            <a class="nav-link-next nav-item nav-link rounded" href="{{ $tags->nextPageUrl() }}">Next<i
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
        footer {
            position: absolute;
        }
    </style>
@endpush
