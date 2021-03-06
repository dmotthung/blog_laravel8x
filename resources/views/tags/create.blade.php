@extends('layouts.dashboard')

@section('title')
    {{ trans('tags.title.create') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('add_tags') }}
@endsection

@section('content')
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <!-- title -->
        <div class="form-group">
            <label for="input_tag_title" class="font-weight-bold">
                {{ trans('tags.form_control.input.title.label') }}
            </label>
            <input id="input_tag_title" value="{{ old('title') }}" name="title" type="text"
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
            <input id="input_tag_slug" value="{{ old('slug') }}" name="slug" type="text"
                   class="form-control @error('slug') is-invalid @enderror"
                   placeholder="{{ trans('tags.form_control.input.slug.placeholder') }}" readonly />

            @error('slug')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="float-right">
            <a class="btn btn-warning px-4" href="{{ route('tags.index') }}">{{ trans('tags.button.back.value') }}</a>
            <button type="submit" class="btn btn-primary px-4">{{ trans('tags.button.create.value') }}</button>
        </div>
    </form>
@endsection

@push('javascript-internal')
    <script>
        $(function () {
            const generateSlug = (value) => {
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

            // event: input Title
            $('#input_tag_title').change(function (event) {
                $('#input_tag_slug').val(generateSlug(event.target.value));
            });
        });
    </script>
@endpush

