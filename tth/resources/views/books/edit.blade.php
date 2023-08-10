<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<main class="page-content" id="main">
    <div class="container">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card border shadow-none w-100">
                <div class="card-body">
                    <form action="{{route('books.update',[$books->id])}}" method='post'>
                        @method('PUT')
                        @csrf
                            <h1>Sửa thông tin sách</h1>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                            <input type="text" class="form-control" name="name" value="{{ $books->name }}">
            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input type="text" class="form-control" name="isbn" value="{{ $books->isbn }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tác giả</label>
                        <select name="tacgia" class="form-control">
                            <option value="{{ $books->tacgia }}">
                                {{ $books->tacgia }}</option>
                            <option value="Nguyễn Đình Phong">Nguyễn Đình Phong</option>
                            <option value="Nguyễn Như Ngọc">Nguyễn Như Ngọc</option>
                            <option value="Nguyễn Huỳnh Bảo Châu">Nguyễn Huỳnh Bảo Châu</option>
                        </select>
                    </div>
            
                        <div class="mb-3">
                            <label class="form-label">Thể loại</label>
                            <select name="theloai" class="form-control">
                                <option value="{{ $books->theloai }}">
                                    {{ $books->theloai }}</option>
                                <option value="Kinh Dị">Kinh Dị</option>
                                <option value="Truyền Thuyết">Truyền Thuyết</option>
                                <option value="Tình Cảm">Tình Cảm</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số trang</label>
                            <input type="text" class="form-control" name="sotrang" value="{{ $books->sotrang }}">
            
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Năm sản xuất</label>
                            <input type="text" class="form-control" name="namsanxuat" value="{{ $books->namsanxuat }}">
            
                        </div>
            
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-danger btn-xs" href="{{ route('books.index') }}">Quay lại</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</main>