@extends('layouts.dashboard')

@section('title')
    {{ trans('posts.title.edit') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('edit_post', $post) }}
@endsection

@section('content')
    <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row d-flex align-items-stretch">
            <div class="col-md-9">
                <!-- title -->
                <div class="form-group">
                    <label for="input_post_title" class="font-weight-bold">
                        {{ trans('posts.form_control.input.title.label') }}
                    </label>
                    <input id="input_post_title" value="{{ old('title', $post->title) }}" name="title" type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           placeholder="{{ trans('posts.form_control.input.title.placeholder') }}"/>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
                <!-- slug -->
                <div class="form-group">
                    <label for="input_post_slug" class="font-weight-bold">
                        {{ trans('posts.form_control.input.slug.label') }}
                    </label>
                    <input id="input_post_slug" value="{{ old('slug', $post->slug) }}" name="slug" type="text"
                           class="form-control @error('slug') is-invalid @enderror"
                           placeholder="{{ trans('posts.form_control.input.slug.placeholder') }}"/>
                    @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!-- thumbnail -->
                <div class="form-group">
                    <label for="input_post_thumbnail" class="font-weight-bold">
                        {{ trans('posts.form_control.input.thumbnail.label') }}
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button id="button_post_thumbnail" data-input="input_post_thumbnail" data-preview="holder"
                                    class="btn btn-primary" type="button">
                                {{ trans('posts.button.browse.value') }}
                            </button>
                        </div>
                        <input id="input_post_thumbnail" name="thumbnail" value="{{ old('thumbnail', asset($post->thumbnail)) }}" type="text"
                               class="form-control @error('thumbnail') is-invalid @enderror"
                               placeholder="{{ trans('posts.form_control.input.thumbnail.placeholder') }}" readonly/>

                        @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    {{-- preview thumbnail--}}
                    <div id="holder"></div>
                </div>
                <!-- description -->
                <div class="form-group">
                    <label for="input_post_description" class="font-weight-bold">
                        {{ trans('posts.form_control.textarea.description.label') }}
                    </label>
                    <textarea id="input_post_description" name="description"
                              placeholder="{{ trans('posts.form_control.textarea.description.placeholder') }}"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3">{{ old('description', $post->description) }}</textarea>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <!-- content -->
                <div class="form-group">
                    <label for="input_post_content" class="font-weight-bold">
                        {{ trans('posts.form_control.textarea.content.label') }}
                    </label>
                    <textarea id="input_post_content" name="content"
                              placeholder="{{ trans('posts.form_control.textarea.content.placeholder') }}"
                              class="form-control @error('content') is-invalid @enderror"
                              rows="20">{{ old('content', $post->content) }}</textarea>

                    @error('content')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>
            <div class="col-md-3">
                <!-- catgeory -->
                <div class="form-group">
                    <label for="input_post_description" class="font-weight-bold">
                        {{ trans('posts.form_control.input.category.label') }}
                    </label>
                    <div class="form-control overflow-auto @error('category') is-invalid @enderror"
                         style="height: 878px">
                        <!-- List category -->
                    @include('posts._category-list', [
                        'categories'        =>  $categories,
                        'categoryChecked'   =>  old('category', $post->categories->pluck('id')->toArray())
                    ])
                    <!-- List category -->
                    </div>

                    @error('category')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- tag -->
                <div class="form-group">
                    <label for="select_post_tag" class="font-weight-bold">
                        {{ trans('posts.form_control.select.tag.label') }}
                    </label>
                    <select id="select_post_tag" name="tag[]" data-placeholder=""
                            class="custom-select w-100 @error('tag') is-invalid @enderror" multiple>
                        @if(old('tag', $post->tags))
                            @foreach(old('tag', $post->tags) as $tag)
                                <option value="{{ $tag->id }}" selected>{{ $tag->title }}</option>
                            @endforeach
                        @endif
                    </select>

                    @error('tag')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <!-- status -->
                <div class="form-group">
                    <label for="select_post_status" class="font-weight-bold">
                        {{ trans('posts.form_control.select.status.label') }}
                    </label>
                    <select id="select_post_status" name="status"
                            class="custom-select @error('status') is-invalid @enderror">
                        @foreach($statuses as $key => $value)
                            <option value="{{ $key }}" {{ old('status', $post->status) == $key ? 'selected' : NULL }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <a class="btn btn-warning px-4"
                       href="{{ route('posts.index') }}">{{ trans('posts.button.back.value') }}</a>
                    <button type="submit" class="btn btn-primary px-4">
                        {{ trans('posts.button.update.value') }}
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('css-external')
    {{--Select2--}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/dist/css/select2-bootstrap4.min.css') }}">
@endpush

@push('css-internal')
    <style>
        .select2-container--bootstrap4 .select2-search {
            display: none;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__clear {
            right: 10px;
            top: -8px;
            bottom: 10px;
            font-size: 23px;
            background-color: #007307;
            border-color: transparent;
        }

        .select2-container--bootstrap4 .select2-selection__clear span {
            color: #fff;
            right: 2px;
            position: absolute;
            bottom: -1px;
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #007307;
            background-color: transparent;
            border-color: transparent;
        }
    </style>
@endpush

@push('javascript-external')
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    {{--TinyMCE5--}}
    <script src="{{ asset('admin/plugins/tinymce5/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tinymce5/tinymce.min.js') }}"></script>
    {{--Select2--}}
    <script src="{{ asset('admin/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/dist/js/i18n/'. app()->getLocale() .'.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(function () {
            const generateSlug = (value) => {
                return value.trim()
                    .toLowerCase()
                    .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a')
                    .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e')
                    .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i')
                    .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o')
                    .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u')
                    .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y')
                    .replace(/đ/gi, 'd')
                    //Xóa các ký tự đặt biệt
                    .replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
                    //Đổi khoảng trắng thành ký tự gạch ngang
                    .replace(/ /gi, "-")
                    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                    .replace(/\-\-\-\-\-/gi, '-')
                    .replace(/\-\-\-\-/gi, '-')
                    .replace(/\-\-\-/gi, '-')
                    .replace(/\-\-/gi, '-')
                    //Xóa các ký tự gạch ngang ở đầu và cuối
                    .replace(/^-+/, '') //trim starting dash
                    .replace(/-+$/, '');
            }

            // event: input slug
            let slug = $('#input_post_slug').val();
            $('#input_post_slug').val(generateSlug(slug));

            //event Thumbnail in form create
            $('#button_post_thumbnail').filemanager('image');

            // Texteditor Content (TinyMCE)
            $('#input_post_content').tinymce({
                entity_encoding : "raw",
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern toc",
                ],
                toolbar1: "fullscreen preview toc",
                toolbar2: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                toc_header: 'h4',
                file_picker_callback: function (callback, value, meta) {
                    let x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth;
                    let y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    let cmsURL = "{{ route('unisharp.lfm.show') }}" + '?editor=' + meta.fieldname;
                    if (meta.filetype == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.openUrl({
                        url: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no",
                        onMessage: (api, message) => {
                            callback(message.content);
                        }
                    });
                }
            });

            // Select: Tags post
            $('#select_post_tag').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{route('tags.select')}}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        });
    </script>
@endpush

