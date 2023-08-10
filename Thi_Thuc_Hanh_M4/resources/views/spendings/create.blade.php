<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<form action="{{ route('spending.store') }}" method="post">
    @csrf
    <h2>Thêm </h2>

    



    <div class="form-group">
            <label for="danhmuc">Danh mục</label>
            <select class="form-control @error('danhmuc') is-invalid @enderror" name="danhmuc" id="danhmuc">
                <option value="" selected disabled>--Chọn danh mục--</option>
                <option value="Ăn" {{ old('danhmuc') == 'ga' ? 'selected' : '' }}>Ăn</option>
                <option value="Thuốc" {{ old('danhmuc') == 'điện' ? 'selected' : '' }}>Thuốc</option>
                <option value="Nước" {{ old('danhmuc') == 'nước' ? 'selected' : '' }}>Nước</option>
            </select>
            @error('danhmuc')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



    <div class="mb-3">
        <label for="ngay" class="form-label">Ngày</label>
        <input type="date" class="form-control" name="ngay" id="ngay" value="{{ old('ngay') }}">
        @error('ngay')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="sotien" class="form-label">Số tiền</label>
        <input type="text" class="form-control" name="sotien" id="sotien" value="{{ old('sotien') }}">
        @error('sotien')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="note" class="form-label">Ghi chú</label>
        <input type="text" class="form-control" name="note" id="note" value="{{ old('note') }}">
        @error('note')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Thêm</button>
    <a href="{{ route('spending.index') }}">Quay lại</a>
</form>
