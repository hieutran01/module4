@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')

<main class="page-content">
    <h2 class="offset-5">Thêm mới sản phẩm</h2>
    <div class="container">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card border shadow-none w-100">
                <div class="card-body">
                    <form class="row g-3" action="{{route('product.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên"
                                value="{{old('name')}}">
                            @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Thể loại</label>
                            <select name="category_id" id="" class="form-control" value="{{old('category_id')}}">
                                <option value="">--Vui lòng chọn--</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Giá tiền</label>
                            <input type="text" class="form-control" name="price" placeholder="Giá tiền"
                                value="{{old('price')}}">
                            @error('price')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Số lượng</label>
                            <input type="text" class="form-control" name="amount" placeholder="số lượng"
                                value="{{old('amount')}}">
                            @error('amount')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sizes">Các size:</label>
                            <div class="checkbox-group">
                                @foreach ($sizes as $size)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sizes[]"
                                        id="size_{{ $size->id }}" value="{{ $size->id }}">
                                    <label class="form-check-label" for="size_{{ $size->id }}">
                                        {{ $size->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" name="description" id="description"
                                placeholder="Mô tả">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>





                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="">-- Chọn trạng thái --</option>
                                <option value="1" @if (old('status')==1) selected @endif>Còn hàng</option>
                                <option value="0" @if (old('status')==0) selected @endif>Hết hàng</option>
                                </option>
                            </select>
                            @error('status')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-12">
                            <label class="form-label">Ảnh</label>
                            <input type="file" class="form-control" name="image" placeholder="Ảnh"
                                value="{{old('image')}}" onchange="previewImage(event)">
                            <div class="image-container mt-3">
                                <img id="preview" src="#" alt="Ảnh" style="max-width: 100px; display: none;">
                            </div>
                            @error('image')
                            <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="d-grid"> <br>
                                <button class="btn btn-primary" type="submit">Thêm</button>
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
</script>
@endsection