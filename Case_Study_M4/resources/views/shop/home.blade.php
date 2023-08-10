@extends('shop.layouts.master')
@section('content')
@include('sweetalert::alert')

    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" style="width:100%;height:450px" src="{{asset($product->image)}}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{$product ->name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{number_format($product ->price)}} VND</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{route('shop.show',[$product->id])}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Xem chi tiết</a>
                        <a href="{{route('shop.store',$product->id)}}" data-id="{{$product->id}}" class="add-to-cart btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    @endsection

    @section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart').click(function(e){
            e.preventDefault();

            let product_id = $(this).data('id');

            let option = {
                method: 'POST',
                url: "{{ route('shop.addtocart')}}",
                data: {
                    _token: '{{ csrf_token() }}', 
                    product_id: product_id
                },
                success: function(res) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thêm vào giỏ hàng thành công',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('.cart_total').html(res.cart_total);
                }
            };

            $.ajax(option);
        });
    });
</script>
@endsection
