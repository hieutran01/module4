<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<div class="container">
    
    {{-- @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif --}}
    <table border="1" class="table" style="text-align:center">
        <h1>Danh mục sách</h1>
        <div class="col-lg-6 col-md-5 col-sm-4 hidden-xs">
            <!-- Search -->
            <div class="search_box">
                <div class="search_wrapper">
                
    
                    <form  class="form-inline my-2 my-lg-0" action="{{ route('books.index') }}" method="GET">
                        @csrf
                        <button  style="float:right" class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                          <input style="width: 300px; margin-right: 10px; float:right"  class="form-control" method="GET" name="book" type="text" placeholder="Tìm kiếm theo tên sản phẩm">
          
                          </form>
                </div>
            </div>
            <!-- End Search -->
        </div>
        <a href="{{route('books.create')}}" class="btn btn-info">Thêm mới</a>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên Sách</th>
                <th>ISBN</th>
                <th>Tác Giả</th>
                <th>Thể Loại</th>
                <th>Số Trang</th>
                <th>Năm Sản Xuất</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $key => $book)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->isbn}}</td>
                <td>{{$book->tacgia}}</td>
                <td>{{$book->theloai}}</td>
                <td>{{$book->sotrang}}</td>
                <td>{{$book->namsanxuat}}</td>
        
                <td>
                    <form action="{{route('books.destroy',[$book->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <a href="{{route('books.edit',[$book->id])}}" class="btn btn-warning">Sửa</a>
                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"
                            class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                    @endforeach
                </tr>
            </tbody>

        </table>
      
        {{ $books->links() }}
        <a class="btn btn-primary" href="{{route('books.index')}}">Trang chủ</a>
    </div>
   