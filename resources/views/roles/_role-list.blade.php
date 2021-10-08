@foreach($roles as $role)
    <tr>
        <td>{{ $role->name }}</td>
        <td style="width: 9%;" class="text-right">
            <span style="display: inline-flex;">
                @can('role_detail')
                    <a href="{{ route('roles.show', ['role'=>$role]) }}" data-toggle="tooltip" data-placement="top"
                       title="{{ trans('roles.title.detail') }}">
                    <i class="fa fa-eye color-muted m-r-5"></i>
                </a>
                @endcan

                @can('role_update')
                    <a href="{{ route('roles.edit',['role' => $role]) }}" data-toggle="tooltip" data-placement="top"
                       title="{{ trans('roles.title.edit') }}">
                    <i class="fa fa-pencil color-muted m-r-5"></i>
                </a>
                @endcan

                @can('role_delete')
                    <form action="{{ route('roles.destroy', ['role'=> $role]) }}" method="post" role="alert"
                          class="d-inline"
                          alert-title="{{ trans('roles.alert.delete.title') }}"
                          alert-text="{{ trans('roles.alert.delete.message.confirm',['name' => $role->name]) }}"
                          alert-btn-cancel="{{ trans('roles.button.cancel.value') }}"
                          alert-btn-yes="{{ trans('roles.button.delete.value') }}">
                        @csrf
                        @method('DELETE')
                    <button type="submit" href="#" data-toggle="tooltip" data-placement="top"
                            title="{{ trans('roles.button.delete.value') }}">
                        <i class="fa fa-trash color-danger"></i>
                    </button>
                </form>
                @endcan
            </span>
        </td>
    </tr>
@endforeach
