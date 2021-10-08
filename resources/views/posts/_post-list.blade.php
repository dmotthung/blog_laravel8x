@foreach($posts as $post)
    <tr>
        <td><h5>{{ $post->title }}</h5></td>
        <td style="text-transform: capitalize;">
            @if($post->status == 'publish')
                <span class="label label-primary">{{ trans('posts.table_list.publish') }}</span>
            @else
                <span class="label label-light">{{ trans('posts.table_list.draft') }}</span>
            @endif
        </td>
        <td>
            <span style="display: inline-flex;">
                @can('post_detail')
                    <a href="{{ route('posts.show', ['post' => $post]) }}" data-toggle="tooltip" data-placement="top"
                       title="{{ trans('posts.table_list.view') }}">
                    <i class="fa fa-eye color-muted m-r-5"></i>
                </a>
                @endcan

                @can('post_update')
                    <a href="{{ route('posts.edit', ['post' => $post]) }}" data-toggle="tooltip" data-placement="top"
                       title="{{ trans('posts.table_list.edit') }}">
                        <i class="fa fa-pencil color-muted m-r-5"></i>
                    </a>
                @endcan

                @can('post_delete')
                    <form action="{{ route('posts.destroy',['post'=>$post]) }}" method="post" role="alert"
                          class="d-inline"
                          alert-title="{{ trans('posts.alert.delete.title') }}"
                          alert-text="{{ trans('posts.alert.delete.message.confirm',['title' => $post->title]) }}"
                          alert-btn-cancel="{{ trans('posts.button.cancel.value') }}"
                          alert-btn-yes="{{ trans('posts.button.delete.value') }}">
                      @csrf
                        @method('DELETE')
                        <button type="submit" href="#" data-toggle="tooltip" data-placement="top"
                                title="{{ trans('posts.table_list.delete') }}">
                            <i class="fa fa-trash color-danger"></i>
                        </button>
                    </form>
                @endcan

            </span>
        </td>
        <td class="text-right"><em>{{ date('d-m-Y H:i:s', strtotime($post->created_at)) }} / {{ date('d-m-Y H:i:s', strtotime($post->updated_at)) }}</em></td>
    </tr>
@endforeach
