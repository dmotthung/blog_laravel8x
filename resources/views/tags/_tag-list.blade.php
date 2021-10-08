@foreach($tags as $tag)
    <tr>
        <td>{{ $tag->title }}</td>
        <td style="width: 9%;" class="text-right">
            <span style="display: inline-flex;">
                @can('tag_update')
                    <a href="{{ route('tags.edit', ['tag'=>$tag]) }}" data-toggle="tooltip" data-placement="top"
                       title="{{ trans('tags.table_list.edit') }}">
                    <i class="fa fa-pencil color-muted m-r-5"></i>
                </a>
                @endcan

                @can('tag_delete')
                    <form action="{{ route('tags.destroy', ['tag'=>$tag]) }}" method="post" role="alert"
                          class="d-inline"
                          alert-title="{{ trans('tags.alert.delete.title') }}"
                          alert-text="{{ trans('tags.alert.delete.message.confirm',['title' => $tag->title]) }}"
                          alert-btn-cancel="{{ trans('tags.button.cancel.value') }}"
                          alert-btn-yes="{{ trans('tags.button.delete.value') }}">
                        @csrf
                        @method('DELETE')
                    <button type="submit" href="#" data-toggle="tooltip" data-placement="top"
                            title="{{ trans('tags.table_list.delete') }}">
                        <i class="fa fa-trash color-danger"></i>
                    </button>
                </form>
                @endcan
            </span>
        </td>
    </tr>
@endforeach
