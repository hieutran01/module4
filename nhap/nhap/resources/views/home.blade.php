<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($result as $row )
    <tr>
      <th scope="row">{{ $row->id }}</th>
      <td>{{ $row->name }}</td>
      <td>{{ $row->email }}</td>
    </tr>
    @endforeach
    <tbody>
</table>
</body>
</html>