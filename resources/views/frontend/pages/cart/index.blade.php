@extends('frontend.layout.master')
@section('content')
    <!--===========================
                BREADCRUMB START
            ============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset('uploads/default-files/breadcrumb_bg.jpg') }});">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Shopping Cart</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Shopping Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                BREADCRUMB END
            ============================-->



    <!--===========================
                CART VIEW START
            ============================-->
    <section class="wsus__cart_view mt_120 xs_mt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInUp">
                    <div class="cart_list">
                        @if ($cartItems->count() > 0)
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="pro_name">#</th>
                                            <th class="pro_img">Course</th>

                                            <th class="pro_name">Title</th>



                                            <th class="pro_select">Quantity</th>

                                            <th class="pro_tk">Price</th>

                                            <th class="pro_icon">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($cartItems as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="pro_img">

                                                    <img src="{{ asset($item->course->thumbnail) }}" alt="product"
                                                        class="img-fluid w-100">
                                                </td>

                                                <td class="pro_name">
                                                    <a href="{{ route('course.details', $item->course->slug) }}">{{ $item->course->title }}</a>
                                                </td>


                                                <td class="pro_select">
                                                    <div class="quentity_btn">

                                                        <input name="qty" value="1" type="text" placeholder="1">

                                                    </div>
                                                </td>


                                                <td class="pro_tk">
                                                    <h6>${{ $item->course->price }}</h6>
                                                    @if (!empty($item->course->discount))
                                                        <h6>${{ $item->course->discount }}</h6>
                                                    @endif

                                                </td>


                                                <td class="pro_icon">
                                                    <a href="{{ route('cart.remove', ['cart_item_id' => $item->id]) }}"><i
                                                            class="fal fa-times" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            No Items in Cart
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty_cart">
                                <h2>Your cart is empty</h2>
                                <p>Looks like you haven't added anything to your cart yet.</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-xxl-7 col-md-5 col-lg-6 wow fadeInUp"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <div class="continue_shopping">
                        <a href="{{ route('home') }}" class="common_btn">continue shopping</a>
                    </div>
                </div>
                    @if ($cartItems->count() > 0)
                           <div class="col-xxl-4 col-md-7 col-lg-6 wow fadeInUp"
                    style="visibility: visible; animation-name: fadeInUp;">
                    <div class="total_price">

                        <div class="subtotal_area">

                            <h5>Total<span>${{ cartTotal() }}</span></h5>
                            <a href="checkout.html" class="common_btn">proceed checkout</a>
                        </div>
                    </div>
                </div>
                    @endif

         
            </div>
        </div>
    </section>
    <!--===========================
                CART VIEW END
            ============================-->
@endsection
