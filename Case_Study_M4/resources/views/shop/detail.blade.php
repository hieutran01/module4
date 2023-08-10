@extends('shop.layouts.master')
@section('content')
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <img class="w-100 h-100" src="{{asset($product->image)}}" alt="Image">
        </div>
        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold">Tên sản phẩm:<br>
                <?php echo ($product['name']);?></h3>

                <div class="mb-4">
                    <h3 class="font-weight-semi-bold">Size:</h3>
                    <div class="form-group">
                        <?php $sizes = [0 => 'S', 1 => 'M', 2 => 'L', 3 => 'XL']; ?>
                        @foreach($sizes as $key => $size)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="size_{{ $size }}" name="size"
                                value="{{ $size }}" @if($size==$product->size) checked @endif>
                            <label class="form-check-label" for="size_{{ $size }}">{{ $size }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>



            <div class="mb-4">
                <p><a href="#" data-toggle="modal" data-target="#exampleModal" class="text-dark">
                        <h6>Hướng dẫn chọn size</h6>
                    </a></p>
            </div>


            <h3 class="font-weight-semi-bold mb-4">Giá tiền: <br>
                <?php echo number_format($product['price']);?> VNĐ</h3>
            <h2 class="mb-4">
                <h2>Mô tả:</h2><?php echo ($product['description']);?>
            </h2>

            <div class="d-flex align-items-center mb-4 pt-2">
                <button id="noluon" class="btn btn-green px-3">
                    <a class="fa fa-shopping-cart mr-1" href="{{route('shop.store',$product->id)}}"
                        id="{{$product->id}}">Thêm vào giỏ hàng</a>
                </button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hướng dẫn chọn size</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="w-100" src="{{ asset('shop/img/a1.jpg') }}" alt="Hướng dẫn chọn size" width="auto"
                    height="auto">

            </div>
        </div>
    </div>
</div>

<script>
function displayImage() {
    // Replace 'path_to_your_image' with the actual path to your image
    var imageSrc = 'path_to_your_image';

    document.getElementById('productImage').src = imageSrc;
} <
/script

@endsection