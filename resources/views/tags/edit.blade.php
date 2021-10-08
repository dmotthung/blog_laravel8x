@extends('layouts.dashboard')

@section('title')
    {{ trans('tags.title.edit') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('edit_tags_title', $tag) }}
@endsection

@section('content')
    <form action="{{ route('tags.update', ['tag'=>$tag]) }}" method="POST">
    @csrf
        @method('PUT')
    <!-- title -->
        <div class="form-group">
            <label for="input_tag_title" class="font-weight-bold">
                {{ trans('tags.form_control.input.title.label') }}
            </label>
            <input id="input_tag_title" value="{{ old('title', $tag->title) }}" name="title" type="text"
                   class="form-control @error('title') is-invalid @enderror"
                   placeholder="{{ trans('tags.form_control.input.title.placeholder') }}" />

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <!-- slug -->
        <div class="form-group">
            <label for="input_tag_slug" class="font-weight-bold">
                {{ trans('tags.form_control.input.slug.label') }}
            </label>
            <input id="input_tag_slug" value="{{ old('slug', $tag->slug) }}" name="slug" type="text"
                   class="form-control @error('slug') is-invalid @enderror"
                   placeholder="{{ trans('tags.form_control.input.slug.placeholder') }}" />

            @error('slug')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="float-right">
            <a class="btn btn-warning px-4" href="{{ route('tags.index') }}">{{ trans('tags.button.back.value') }}</a>
            <button type="submit" class="btn btn-primary px-4">{{ trans('tags.button.save.value') }}</button>
        </div>
    </form>
@endsection

@push('javascript-internal')
    <script>
        $(function () {
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
            let slug = $('#input_tag_slug').val();
            $('#input_tag_slug').val(generateSlug(slug));
        });
    </script>
@endpush
