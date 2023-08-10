<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Danh sách khách hàng</h1>
<a href="{{ route("customers.create") }}">
    <button>Them</button>
</a>
<table border="1">
    <thead>
    <tr>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Địa Chỉ</th>
        <th>Số điện thoại</th>
     
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @forelse($items as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['address']}}</td>
            <td>{{$item['phone_number']}}</td>
            <td>
            <a href="{{ route('customers.show', $key + 1) }}">Xem</a> |
<a href="{{ route('customers.edit', $key + 1) }}">Sửa</a> |

                <a href="#">Xóa</a>
                <a href="{{ route('customers.edit', ($key + 1))}}">abc</a>
            </td>
        </tr>
    @empty
        <tr>
            <td>No data</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>