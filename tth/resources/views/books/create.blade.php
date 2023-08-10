<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<form action="{{route('books.store')}}" method='post'>
    @csrf
    <h2>Thêm Sách</h2>
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên Sách</label>
      <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">ISBN</label>
      <input type="text" class="form-control" name="isbn" id="exampleInputPassword1">
      @error('isbn')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Tác giả</label>
        @error('tacgia')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <select name="tacgia" class="form-control">
            <option name="tacgia">Dương Quốc Khang</option>
            <option name="tacgia">Nguyễn Như Ngọc</option>
            <option name="tacgia">Nguyễn Đình Phong</option>
            <option name="tacgia">Nguyễn Huỳnh Bảo Châu</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Thể loại</label>
        @error('theloai')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <select name="theloai" class="form-control">
            <option name="theloai">Viễn Tưởng</option>
            <option name="theloai">Kinh Dị</option>
            <option name="theloai">Truyền Thuyết</option>
            <option name="theloai">Tình Cảm</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Số Trang</label>
        <input type="text" class="form-control" name="sotrang" id="exampleInputPassword1">
        @error('sotrang')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Năm Sản Xuất</label>
        <input type="text" class="form-control" name="namsanxuat" id="exampleInputPassword1">
        @error('namsanxuat')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
    <a href="{{ route('books.index') }}">Quay lại</a>
  </form>