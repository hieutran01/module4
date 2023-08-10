@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<style>
.image-container {
    max-width: 100%;
    height: auto;
}
</style>
<main class="page-content">
    <h2 class="offset-5">Chỉnh sửa sản phẩm</h2>
    <div class="container">

        <div class="col-12 col-lg-12 d-flex">
            <div class="card border shadow-none w-100">
                <div class="card-body">
                    <form class="row g-3" action="{{route('product.update',[$products->id])}}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Tên</label>
                            <input type="text" class="form-control" value="{{$products->name}}" name="name">
                            @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Thể loại</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">--Vui lòng chọn--</option>
                                @foreach ($categories as $category)
                                <option <?= $category->id == $products->category_id ? 'selected' : '' ?>
                                    value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                            <div class="col-12">
                                <label class="form-label">Giá tiền</label>
                                <input type="text" class="form-control" value="{{$products->price}}" name="price">
                                @error('price')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Số lượng</label>
                                <input type="text" class="form-control" value="{{$products->amount}}" name="amount">
                                @error('amount')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Mô tả</label>
                                <textarea class="form-control" name="description" id="description"
                                    placeholder="Mô tả">{{ $products->description }}</textarea>
                                @error('description')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="">-- Chọn trạng thái --</option>
                                    <option value="1" @if ($products->status == 1) selected @endif>Còn hàng</option>
                                    <option value="0" @if ($products->status == 0) selected @endif>Hết hàng</option>
                                    </option>
                                </select>
                                @error('status')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Ảnh</label>
                                <input type="file" class="form-control" name="image" id="image">
                                @if ($products->image)
                                <div class="image-container">
                                    <img id="preview" src="{{ asset($products->image) }}" alt="{{$products->name}}"
                                        style="max-width: 100px;" />
                                </div>
                                @endif

                                @error('image')
                                <div class="text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="d-grid"> <br>
                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                    <a href="{{ route('product.index') }}" class="btn btn-primary">Quay lại</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Gọi hàm previewImage khi có thay đổi trong trường input file
document.getElementById('image').addEventListener('change', previewImage);
</script>

@endsection