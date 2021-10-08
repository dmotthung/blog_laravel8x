@extends('layouts.dashboard')

@section('title')
    {{ trans('categories.title.edit') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('edit_category_title', $category) }}
@endsection

@section('content')
    <form action="{{ route('categories.update',['category'=>$category]) }}" method="POST" class="form-create-category">
    @method('PUT')
    @csrf
    <!-- title -->
        <div class="form-group">
            <label for="input_category_title" class="font-weight-bold">
                {{ trans('categories.form_control.input.title.label') }}
            </label>
            <input id="input_category_title" value="{{ old('title', $category->title) }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="{{ trans('categories.form_control.input.title.placeholder') }}"/>

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <!-- slug -->
        <div class="form-group">
            <label for="input_category_slug" class="font-weight-bold">
                {{ trans('categories.form_control.input.slug.label') }}
            </label>
            <input id="input_category_slug" value="{{ old('slug', $category->slug) }}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="{{ trans('categories.form_control.input.slug.placeholder') }}" />

            @error('slug')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <!-- thumbnail -->
        <div class="form-group">
            <label for="input_category_thumbnail" class="font-weight-bold">
                {{ trans('categories.form_control.input.thumbnail.label') }}
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button id="button_category_thumbnail" data-input="input_category_thumbnail" data-preview="holder" class="btn btn-primary" type="button">
                        {{ trans('categories.button.browse.value') }}
                    </button>
                </div>
                <input id="input_category_thumbnail" name="thumbnail" value="{{ old('thumbnail', asset($category->thumbnail)) }}" type="text" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="{{ trans('categories.form_control.input.thumbnail.placeholder') }}"
                       readonly />

                @error('thumbnail')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            {{-- preview thumbnail--}}
            <div id="holder"> </div>

        </div>
        <!-- parent_category -->
        <div class="form-group">
            <label for="select_category_parent" class="font-weight-bold">{{ trans('categories.form_control.select.parent_category.label') }}</label>
            <select id="select_category_parent" name="parent_category" data-placeholder="{{ trans('categories.form_control.select.parent_category.placeholder') }}" class="custom-select w-100 form-control">
                @if(old('parent_category', $category->parent))
                    <option value="{{ old('parent_category', $category->parent)->id }}" selected>{{ old('parent_category', $category->parent)->title }}</option>
                @endif
            </select>
        </div>
        <!-- description -->
        <div class="form-group">
            <label for="input_category_description" class="font-weight-bold">
                {{ trans('categories.form_control.textarea.description.label') }}
            </label>
            <textarea id="input_category_description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="{{ trans('categories.form_control.textarea.description.placeholder') }}">{{ old('description', $category->description) }}</textarea>

            @error('description')
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="float-right">
            <a class="btn btn-warning px-4" href="{{ route('categories.index') }}">{{ trans('categories.button.back.value') }}</a>
            <button type="submit" class="btn btn-primary px-4">{{ trans('categories.button.edit.value') }}</button>
        </div>
    </form>
@endsection

@push('css-external')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/dist/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
    <script src="{{ asset('admin/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/dist/js/i18n/'. app()->getLocale() .'.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>

        $(function () {
            //parent category
            $('#select_category_parent').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('categories.select') }}",
                    dataType: 'json',
                    delay: 220,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
            // generateSlug use event title to slug after
            function generateSlug(value){
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
            let slug = $('#input_category_slug').val();
            $('#input_category_slug').val(generateSlug(slug));

            //event Thumbnail in form create
            $('#button_category_thumbnail').filemanager('image');
        });
    </script>
@endpush
