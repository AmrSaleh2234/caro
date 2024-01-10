<thead>
    <tr>
        <th>{{ __('Model') }}</th>
        <th>{{ __('View') }}</th>
        <th>{{ __('Create') }}</th>
        <th>{{ __('Edit') }}</th>
        <th>{{ __('Show') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Delete') }}</th>
    </tr>
</thead>
<tr>
    <td>
        <input type="checkbox" onClick="toggleV2(this , 'permissions', 'all')">
        <label for="">{{ __('Select All') }}</label>
    </td>
    <td>
        <input class="permission-view-all" type="checkbox" onClick="toggleV2(this , 'permission-view', 'permission-view')">
        <label for="">{{ __('Select All') }}</label>
    </td>
    <td>
        <input class="permission-create-all" type="checkbox" onClick="toggleV2(this , 'permission-create', 'permission-create')">
        <label for="">{{ __('Select All') }}</label>
    </td>
    <td>
        <input class="permission-edit-all" type="checkbox" onClick="toggleV2(this , 'permission-edit', 'permission-edit')">
        <label for="">{{ __('Select All') }}</label>
    </td>
    <td>
        <input class="permission-show-all" type="checkbox" onClick="toggleV2(this , 'permission-show', 'permission-show')">
        <label for="">{{ __('Select All') }}</label>
    </td>
    <td>
        <input class="permission-status-all" type="checkbox" onClick="toggleV2(this , 'permission-status', 'permission-status')">
        <label for="">{{ __('Select All') }}</label>
    </td>
    <td>
        <input class="permission-delete-all" type="checkbox" onClick="toggleV2(this , 'permission-delete', 'permission-delete')">
        <label for="">{{ __('Select All') }}</label>
    </td>
</tr>
@foreach ($data as $key => $model)
<tr>
    <td>
        {{ $model['category_name'] }}
    </td>
    @php
    @endphp
    @foreach ($model['permissions'] as $id => $permission)
        <td>
            <div class="checkbox">
                <input type="checkbox" name="permissions[]" value="{{ $id }}" class="permission-{{ $permission }}"
                    {{ in_array($id, $rolePermissions) ? 'checked' : '' }}>
            </div>
        </td>
    @endforeach
    @php
    $count = count($model['permissions']);
    if($count != 6){
        for($i=$count;$i<6;$i++){
            echo '<td></td>';
        }
    }
    @endphp
</tr>
@endforeach
