<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    <h1>Thông tin khách hàng</h1>
    <label for="">Tên</label>
    <p>{{ $customer['name'] }}</p>
    <label for="">Số điện thoại</label>
    <p>{{ $customer['phone'] }}</p>
    <label for="">Email</label>
    <p>{{ $customer['email'] }}</p>
    <a href="{{ route('customers.index') }}"><button>Quay lại</button></a>
</body>
</html>