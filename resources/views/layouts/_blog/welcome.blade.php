<section class="cta-section theme-bg-light py-5">
    <div class="container text-center single-col-max-width">
        <div class="row">
            <h2 class="heading">Chia Sẻ Ý Tưởng & Đam Mê Web Marketing Online</h2>
            <div class="intro">Hãy điền từ khóa vào ô tìm kiếm bên dưới để tìm bài viết bạn cần tham khảo!</div>
            <div class="single-form-max-width pt-3 mx-auto">
                <form action="{{ route('blog.search_post') }}" method="GET" class="signup-form row g-2 g-lg-2 align-items-center">
                    <div class="col-12 col-md-9">
                        <label class="sr-only" for="keyword"></label>
                        <input type="search" id="keyword" name="keyword" value="{{ request()->get('keyword') }}" class="form-control me-md-1 semail" placeholder="{{ trans('blog.form_control.input.search.placeholder') }}">
                    </div>
                    <div class="col-12 col-md-3">
                        <button type="submit" class="btn btn-primary">{{ trans('blog.form_control.input.search.label') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
