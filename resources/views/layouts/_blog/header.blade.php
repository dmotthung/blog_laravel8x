<header class="header text-center">
    <h1 class="blog-name pt-lg-4 mb-0"><a class="no-text-decoration" href="{{ route('blog.home') }}">Trương Thanh Hưng</a></h1>

    <nav class="navbar navbar-expand-lg navbar-dark" >

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navigation" class="collapse navbar-collapse flex-column" >
            <div class="profile-section pt-3 pt-lg-0">
                <img class="profile-image mb-3 rounded-circle mx-auto" src="{{ asset('blog/assets/images/profile.png') }}" alt="image" >

                <div class="bio mb-3">Xin chào người bạn của tôi, Rất tuyệt vời khi bạn đọc được những dòng này! Đây là nơi chia sẻ về Marketing Online & Các kiến thức thiết kế và lập trình web.<br><a href="about.html">Tìm hiểu thêm về tôi</a></div><!--//bio-->
                <ul class="social-list list-inline py-3 mx-auto">
                    <li class="list-inline-item"><a href="https://www.facebook.com/dmothanhhungtruong" target="_blank" rel="nofollow"><i class="fab fa-facebook-f fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCYmltHHIB2r0NDnjRDp-Glw" target="_blank" rel="nofollow"><i class="fab fa-youtube fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="https://github.com/dmotthung" target="_blank" rel="nofollow"><i class="fab fa-github-alt fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="mailto:dmotthung@gmail.com" target="_blank" rel="nofollow"><i class="fas fa-envelope fa-fw"></i></a></li>
                    <li class="list-inline-item"><a href="tel:0948435058" target="_blank" rel="nofollow"><i class="fas fa-mobile-alt fa-fw"></i></a></li>
                </ul><!--//social-list-->
                <hr>
            </div><!--//profile-section-->

            <ul class="navbar-nav flex-column text-start">
                <li class="nav-item">
                    <a class="nav-link {{ set_active(['blog.home']) }}" href="{{ route('blog.home') }}"><i class="fas fa-home fa-fw me-2"></i>{{ trans('blog.menu.home') }} <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ set_active(['blog.categories', 'blog.posts.detail']) }}" href="{{ route('blog.categories') }}"><i class="fas fa-bookmark fa-fw me-2"></i>{{ trans('blog.menu.categories') }}</a>
                </li>
            </ul>

            <div class="my-2 my-md-3">
                <a class="btn btn-primary" href="#" target="_blank">{{ trans('blog.menu.contact') }}</a>
            </div>
        </div>
    </nav>
</header>
