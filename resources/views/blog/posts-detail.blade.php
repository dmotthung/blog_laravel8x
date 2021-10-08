@extends('layouts.blog')

@section('title')
    {{ $post->title }}
@endsection

@section('description')
    {{ $post->description }}
@endsection

@section('keyword')
    @foreach($post->tags as $tag){{ $tag->title }}@endforeach
@endsection

@section('content')
    <article class="blog-post px-3 py-5 p-md-5">
        <div class="container single-col-max-width">
            <header class="blog-post-header">
                <em>{{ Breadcrumbs::render('blog_post', $post->title) }}</em>
                <h1 class="title mb-2">{{ $post->title }}</h1>
                <div class="meta mb-3">
                    <p>
                        {{ trans('blog.title.categories') }}:
                        @foreach($post->categories as $category)
                            <a href="{{ route('blog.posts.detail',['slug' => $category->slug]) }}"
                               class="text-link badge rounded-pill bg-success py-2 px-2 my-2">{{ $category->title }}</a>
                        @endforeach
                    </p>
                </div>
            </header>

            <div class="blog-post-body">
                <figure class="blog-banner">
                    @if(file_exists(public_path($post->thumbnail)))
                        <img class="img-fluid post-thumb " src="{{ asset($post->thumbnail) }}"
                             alt="{{ $post->title }}" title="{{ $post->title }}">
                    @else
                        <img class="img-fluid post-thumb "
                             src="{{ asset('blog/assets/images/blog/blog-post-thumb-8.jpg') }}"
                             alt="{{ $post->title }}" title="{{ $post->title }}">
                    @endif
                    <figcaption class="mt-2 text-center image-caption">{{ $post->title }}</figcaption>
                </figure>
                <div class="content_post">
                    {!! $post->content !!}
                </div>
                <div class="meta my-3 meta-tag">
                    <p>
                        {{ trans('blog.title.tags') }}:
                        @foreach($post->tags as $tag)
                            <a href="{{ route('blog.posts.tag',['slug' => $tag->slug]) }}"
                               class="text-link badge rounded-pill bg-success py-2 px-2 my-2">#{{ $tag->title }}</a>
                        @endforeach
                    </p>
                </div>

            </div>

            <div class="row related blog-list">
                <div class="col-lg-12 single-col-max-width">
                    <hr>
                    <h4 class="pb-3">Bài viết cùng chủ đề</h4>
                    @forelse($related as $relate)
                        <div class="item mb-5">
                            <div class="row g-3 g-xl-0">
                                <div class="col-2 col-xl-3">
                                    @if(file_exists(public_path($relate->thumbnail)))
                                        <img class="img-fluid post-thumb " src="{{ asset($relate->thumbnail) }}"
                                             alt="{{ $relate->title }}" title="{{ $relate->title }}">
                                    @else
                                        <img class="img-fluid post-thumb "
                                             src="{{ asset('blog/assets/images/blog/blog-post-thumb-8.jpg') }}"
                                             alt="{{ $relate->title }}" title="{{ $relate->title }}">
                                    @endif
                                </div>
                                <div class="col">
                                    <h3 class="title mb-1"><a class="text-link"
                                                              href="{{ route('blog.posts.detail', ['slug' => $relate->slug.'.html']) }}">{{ $relate->title }}</a>
                                    </h3>
                                    <div class="intro">{{ $relate->description }}</div>
                                    <a class="text-link"
                                       href="{{ route('blog.posts.detail', ['slug' => $relate->slug.'.html']) }}">{{ trans('blog.button.read_more.value') }} &rarr;</a>
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
                </div>
            </div>
        </div>
    </article>

    <section class="promo-section theme-bg-light py-5 text-center">
        <div class="container">
            <h2 class="title">Exchange Advice Together</h2>
            <p>You can use this section to promote your side projects etc. Lorem ipsum dolor sit amet, consectetuer
                adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. </p>
            <figure class="promo-figure">
                <a href="{{ route('blog.home') }}"><img class="img-fluid"
                                                        src="{{ asset('blog/assets/images/promo-banner.png') }}"
                                                        alt="promo-banner-truongthanhhung"></a>
            </figure>
        </div>
    </section>
@endsection

@push('css-internal')
    <style>
        .promo-section {
            margin-bottom: 0px;
        }

        .blog-post h2, .blog-post h2 strong {
            font-weight: 600;
            color: #006411;
            font-size: 27px;
        }

        .blog-post h3, .blog-post h3 strong {
            font-weight: 600;
            font-size: 23px;
        }

        .blog-post .meta-tag p {
            font-size: 14px;
        }

        .blog-post .related h4 {
            color: #147b00;
        }

        .blog-post .item img {
            width: 150px;
            height: 123px;
            object-fit: cover;
        }

        footer {
            position: inherit;
        }

        /* Basic styles for Table of Contents plugin (toc) */
        .mce-toc {
            border: 3px solid #aaa;
            width: fit-content !important;
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 1em;
            width: 100%;
            display: table;
            font-size: inherit;
        }

        .mce-toc h4 {
            text-align: center;
            font-weight: 600;
            margin: 0;
            padding: 0;
        }

        .mce-toc ul {
            margin-top: 1em;
        }

        .mce-toc li {
            list-style: none;
            list-style-type: none;
        }

        .mce-toc li a {
            text-decoration: none;
            color: #198754;
            font-weight: 600;
            font-style: italic;
        }
    </style>
@endpush
