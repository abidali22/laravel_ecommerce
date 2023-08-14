<div class="header-action-icon-2" id="shortdropdown">
    <a class="mini-cart-icon" href="{{route('cart')}}">
        <img alt="Sport Cart" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
        <span class="pro-count blue">{{Cart::count()}}</span>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach(Cart::content() as $item)
                <li>
                    <div class="shopping-cart-img">
                        <a href="{{ route('product-datail',['slug'=>$item->model->slug])}}"><img alt="{{$item->model->name}}" src="{{asset('assets/imgs/shop/product-').$item->model->id}}-1.jpg"></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="{{ route('product-datail',['slug'=>$item->model->slug])}}">{{substr($item->model->name,0,20)}}...</a></h4>
                        <h4><span>{{$item->qty}} × </span>${{$item->model->regular_price}}</h4>
                    </div>
                    <!-- <div class="shopping-cart-delete">
                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                    </div> -->
                </li>
            @endforeach
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>${{Cart::total()}}</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{route('cart')}}" class="outline">View cart</a>
                <a href="checkout.html">Checkout</a>
            </div>
        </div>
    </div>
</div>