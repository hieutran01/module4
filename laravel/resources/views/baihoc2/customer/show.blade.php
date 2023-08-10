<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
<label for="">Ten</label>
<p>{{$data['name']}}</p>
<label for="">phone</label>
<p>{{$data['phone']}}</p>
<label for="">email</label>
<p>{{$data['email']}}</p>
<a href="{{route('customer.index')}}"><button>Back</button></a>
</body>
</html>