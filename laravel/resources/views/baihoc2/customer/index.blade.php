<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Danh sách khách hàng</h1>
<a href="{{ route("customer.create") }}">
    <button>Thêm</button>
</a>
<table border="1">
    <thead>
    <tr>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    @forelse($customers as $key => $customer)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$customer['name']}}</td>
            <td>{{$customer['phone']}}</td>
            <td>{{$customer['email']}}</td>
            <td>
                <a href="/customer/{{$key + 1}}/{{$customer['name']}}/{{$customer['phone']}}/{{$customer['email']}}/show">Xem</a> |
                <a href="/customer/{{$key + 1}}/edit">Sửa</a> |
                <!-- <a href="#">Xóa</a> -->
                <a class="btn btn-danger" onclick="return confirm('bạn có muốn xóa này không ?');" href="">Xóa</a>
                <!-- <a href="{{ route('customer.edit', ($key + 1))}}">abc</a> -->
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