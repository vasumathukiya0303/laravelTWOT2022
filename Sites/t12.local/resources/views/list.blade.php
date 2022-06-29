<table border="1">
    @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->email_verified_at}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->remember_token}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td>{{$item->is_admin}}</td>
        </tr>
    @endforeach
</table>
