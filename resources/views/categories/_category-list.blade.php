@foreach($categories as $category)
    <tr>
        <td>{{ str_repeat('|——', $count).' '. $category->title }}</td>
        <td style="width: 9%;" class="text-right">
            <span style="display: inline-flex;">
                @can('category_detail')
                    <a href="{{ route('categories.show', ['category'=>$category]) }}" data-toggle="tooltip"
                       data-placement="top" title="{{ trans('categories.table_list.view') }}">
                    <i class="fa fa-eye color-muted m-r-5"></i>
                </a>
                @endcan

                @can('category_update')
                    <a href="{{ route('categories.edit', ['category'=>$category]) }}" data-toggle="tooltip"
                       data-placement="top" title="{{ trans('categories.table_list.edit') }}">
                    <i class="fa fa-pencil color-muted m-r-5"></i>
                </a>
                @endcan

                @can('category_delete')
                    <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="post"
                          role="alert"
                          class="d-inline"
                          alert-title="{{ trans('categories.alert.delete.title') }}"
                          alert-text="{{ trans('categories.alert.delete.message.confirm',['title' => $category->title]) }}"
                          alert-btn-cancel="{{ trans('categories.button.cancel.value') }}"
                          alert-btn-yes="{{ trans('categories.button.delete.value') }}">
                    @csrf
                        @method('DELETE')
                    <button type="submit" href="#" data-toggle="tooltip" data-placement="top"
                            title="{{ trans('categories.table_list.delete') }}">
                        <i class="fa fa-trash color-danger"></i>
                    </button>
                </form>
                @endcan
            </span>
        </td>

        @if($category->descendants && !trim(request()->get('keyword')))
            @include('categories._category-list', [
                'categories'    =>  $category->descendants,
                'count'  =>  $count + 1
            ])
        @endif
    </tr>
@endforeach
