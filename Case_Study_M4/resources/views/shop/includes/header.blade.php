<div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{route('shop.index')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1"></span> Fashion</h1>
                </a>
            </div>


            <div class="col-lg-6 col-6 text-left">
        <form action="{{ route('shop.search') }}" method="GET">
            @csrf
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for products">
                <div class="input-group-append">
                    <div class="col-4">
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-search"></i> <!-- Thay đổi biểu tượng tại đây -->
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


         



            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{route('cart.index')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge cart_total">
                        {{ $ss_cart['cart_total'] }}
                    </span>
                </a>
            </div>
        </div>
        