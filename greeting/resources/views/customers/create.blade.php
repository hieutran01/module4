<!doctype html>
<html lang="en">
<head>
    <title>Create</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!--  -->

    <form action="{{ route('customers.store') }}">

   Họ Và Tên: <input type="text" name="name" id="" value=""><br>
  Địa Chỉ: <input type="text" name="address" id=""><br>
   Số Điện Thoại: <input type="text" name="phone-number" id=""><br>
 
   <a type="submit" class="btn btn-primary">Submit</a>
    </form>