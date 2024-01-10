<thead>
    <tr>
        <th>{{ __('User') }}</th>
        <th>{{ __('Phone') }}</th>
        <th>{{ __('Model') }}</th>
        <th>{{ __('Title') }}</th>
        <th>{{ __('Message') }}</th>
        <th>{{ __('Date') }}</th>
        <th>{{ __('Read At') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $notification)
<tr>
    <td>{{ $notification->notifiable->name }}</td>
    <td>{{ $notification->notifiable->phone }}</td>
    <td>{{   getModuleTableModelName($notification->data['type']) }}</td>
    <td>{{   str_limit($notification->data['title'][$admin_language], 50)  }}</td>
    <td>{{   str_limit($notification->data['body'][$admin_language], 200)  }}</td>
    <td>{{   date('Y-m-d',strtotime($notification->created_at)) }} </td>
    <td>{{   $notification->read_at }} </td>
</tr>

@endforeach
