<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<main class="page-content" id="main">
    <div class="container">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card border shadow-none w-100">
                <div class="card-body">
                    <form action="{{ route('spending.update', [$spendings->id]) }}" method="post">
                        @method('PUT')
                        @csrf
                        <h1>Sửa thông tin</h1>

                        <div class="mb-3">
                            <label class="form-label">Danh mục</label>
                            <select class="form-control @error('danhmuc') is-invalid @enderror" name="danhmuc" id="danhmuc">
                                <option value="" selected disabled>--Chọn danh mục--</option>
                                <option value="Ăn" {{ $spendings->danhmuc == 'Ăn' ? 'selected' : '' }}>Ăn</option>
                                <option value="Thuốc" {{ $spendings->danhmuc == 'Thuốc' ? 'selected' : '' }}>Thuốc</option>
                                <option value="Nước" {{ $spendings->danhmuc == 'Nước' ? 'selected' : '' }}>Nước</option>
                            </select>
                            @error('danhmuc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Ngày</label>
                            <input type="date" class="form-control @error('ngay') is-invalid @enderror" name="ngay" value="{{ $spendings->ngay }}">
                            @error('ngay')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số tiền</label>
                            <input type="text" class="form-control @error('sotien') is-invalid @enderror" name="sotien" value="{{ $spendings->sotien }}">
                            @error('sotien')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" name="note" value="{{ $spendings->note }}">
                        </div>
            
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-danger btn-xs" href="{{ route('spending.index') }}">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
