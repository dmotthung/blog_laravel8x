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
                    .replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a')
                    .replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e')
                    .replace(/i|??|??|???|??|???/gi, 'i')
                    .replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o')
                    .replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u')
                    .replace(/??|???|???|???|???/gi, 'y')
                    .replace(/??/gi, 'd')
                    //X??a c??c k?? t??? ?????t bi???t
                    .replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
                    //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
                    .replace(/ /gi, "-")
                    //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
                    //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
                    .replace(/\-\-\-\-\-/gi, '-')
                    .replace(/\-\-\-\-/gi, '-')
                    .replace(/\-\-\-/gi, '-')
                    .replace(/\-\-/gi, '-')
                    //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
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
