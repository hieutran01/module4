<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<div class="container">

    {{-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
</div>
@endif --}}
<table border="1" class="table" style="text-align:center">
    <h1>Danh sách chi tiêu</h1>
    <div class="col-lg-6 col-md-5 col-sm-4 hidden-xs">
        <!-- Search -->
        <div class="search_box">
            <div class="search_wrapper">


            <form class="form-inline my-2 my-lg-0" action="{{ route('spending.index') }}" method="GET">
    <div class="input-group">
        <input class="form-control" name="search" type="text" placeholder="Tìm kiếm">
        <button class="btn btn-success" type="submit">Tìm kiếm</button>
    </div>
</form>



            </div>
        </div>
        <!-- End Search -->
    </div>
    <a href="{{route('spending.create')}}" class="btn btn-info">Thêm chi tiêu</a>
    <thead>
        <tr>
            <th>STT</th>
            <th>Danh mục</th>
            <th>Ngày</th>
            <th>Số Tiền(VNĐ)</th>
            <th>Hành Động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($spendings as $key => $spending)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$spending->danhmuc}}</td>
            <td>{{$spending->ngay}}</td>
            <td>{{$spending->sotien}}</td>

            <td>
                <form action="{{route('spending.destroy',[$spending->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <a href="{{route('spending.edit',[$spending->id])}}" class="btn btn-warning">Sửa</a>
                    <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"
                        class="btn btn-danger">Xóa</button>
                </form>
            </td>
            @endforeach
        </tr>
    </tbody>

</table>
<div class="text-end">
        <h5>Tổng tiền chi tiêu: <span class="text-dark">{{ $totalAmount }} VND</span></h5>
    </div>

<a class="btn btn-primary" href="{{route('spending.index')}}">Trang chủ</a>
<div class="d-flex justify-content-end">
        {{ $spendings->appends(request()->query()) }}
    </div>

</div>