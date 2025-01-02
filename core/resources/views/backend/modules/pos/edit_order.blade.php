@extends('backend.layouts.master')

@section('meta')
    <title>Pos-{{ get_option('title') }}</title>
@endsection

@section('content')
{{--    <div class="page-wrapper pos-pg-wrapper ms-0">--}}
        <div class="content pos-design p-0">
            <div class="row align-items-start pos-wrapper">
                <div class="col-md-12 col-lg-4">
                    <div class="  bg-white">
                        <div class="card card-body gutter-b  border-0" style="margin-bottom:0px;">
                            <div class="form-group row mb-3">
                                <div class="col-md-6">
                                    <label for="">Publications *</label>
                                    <select name="publisher" id="publisher" class="select" onchange="productList()">

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Category *</label>
                                    <select  name="category_id" id="category_id" class="select category" onchange="productList()">

                                    </select>
                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <label>Search  Product</label>
                                    <fieldset class="form-group mb-0 d-flex barcodeselection">
                                        <input type="text" class="form-control border-dark product_search"
                                               id="product_search" placeholder="Search Your Product" oninput="productList()">
                                    </fieldset>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="pos-categories tabs_wrapper">
                        <div class="pos-products">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-3">Products List</h5>
                            </div>
                            <div class="tabs_container" >
                                <div class="tab_content active" data-tab="all">
                                    <div class="row" id="productList" style="max-height: 800px; overflow-y: scroll;">




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-4 ps-0">
                    <aside class="product-order-list">
                        <div class="product-added block-section">
                            <div class="head-text d-flex align-items-center justify-content-between">
{{--                                <h6 class="d-flex align-items-center mb-0">Total Products Added<span--}}
{{--                                        class="count count-cart"> </span></h6>--}}

                                <h6 class="d-flex align-items-center mb-0">
                                    Total Products Added <i class="fas fa-shopping-cart fa-2x ml-2"></i>
                                    <span class="count-badge count-cart"></span>
                                </h6>

                                <a href="javascript:void(0);" class="d-flex align-items-center text-danger"
                                   onclick="clearCart()">
                                    <span class="me-1"><i data-feather="x" class="feather-16"></i></span>Clear all</a>
                            </div>

                            <div class="product-wrap" id="cart">

                                {{--                            cart product will displayed here --}}

                            </div>

                        </div>


                    </aside>
                </div>
                <div class="col-md-12 col-lg-4 ps-0">
                    <aside class="product-order-list">

                        <div class="block-section cart-summary-view">


                            <div class="selling-info">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="input-block">
                                            <label>Shipping</label>
                                            <input type="text" class="form-control" id="cart_shipping"
                                                   name="cart_shipping" value="{{$order->shipping_charge}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="input-block">
                                            <label>Discount</label>
                                            <input type="text" class="form-control" id="cart_discount"
                                                   name="cart_discount" value="{{$order->discount}}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="input-block">
                                            <label>Apply Coupon</label>
                                            <input type="hidden" name="coupon_discount" id="coupon_discount"
                                                   value="{{$order->coupon_amount}}">
                                            <select name="coupon_code" id="coupon_code" class="form-control">
                                                <option value="">Select Coupon</option>
                                                @foreach($coupons as $coupon)
                                                    <option value="{{ $coupon->code }}" {{ $coupon->code == $order->coupon_code ? 'selected' : '' }}>
                                                        {{ $coupon->code }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="input-block">
                                            <label>Packing</label>
                                            <input type="text" class="form-control" id="packing_charge" name="packing_charge" value="{{$order->packing_charge}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-total  ">
                                <table class="table table-responsive table-borderless">
                                    <tbody>
                                    <tr>
                                        <td>Total Item Price</td>
                                        <td class="text-end itemTotal"></td>
                                    </tr>

                                    <tr>
                                        <td>Shipping</td>
                                        <td class="text-end shipping">0.00</td>
                                    </tr>

                                    <tr>
                                        <td>Packing Charge</td>
                                        <td class="text-end packingCharge">0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td class="text-end subtotalAmount">0.00</td> <!-- Added default value -->
                                    </tr>
                                    <tr>
                                        <td class="danger">Discount</td>
                                        <td class="danger text-end discount">0.00</td> <!-- Added default value -->
                                    </tr>
                                    <tr>
                                        <td class="danger">Coupon Discount</td>
                                        <td class="danger text-end coupon_discount">0.00</td>
                                        <!-- Added default value -->
                                    </tr>
                                 
                                    <tr>
                                        <td class="fw-bold"> Grand Total</td>
                                        <td class="text-end totalAmount">0.00</td> 
                                    </tr>

                                     <tr>
                                        <td>Paid</td>
                                        <td class="text-end">{{formatPrice($order->transactions->sum('amount'))}}</td> 
                                    </tr>
                                    
                                    <!--  <tr>-->
                                    <!--    <td class="danger">Due</td>-->
                                    <!--    <td class=" danger text-end">{{formatPrice($order->total- $order->transactions->sum('amount'))}}</td>-->
                                    <!--</tr>    -->
                                    
                                    </tbody>

                                </table>
                            </div>


                        </div>
                        <div class="btn-row d-sm-flex align-items-center justify-content-between">
                            <a href="javascript:void(0);" class="btn btn-info btn-icon flex-fill" data-bs-toggle="modal" data-bs-target="#payment"><span class="me-1 d-flex align-items-center"><i data-feather="credit-card" class="feather-16"></i></span> Make Payment</a>
                        </div>
                        <div class="block-section payment-method">
                            {{--                        <h6>Payment Transactions Details</h6>--}}
                            <div class="summary">
                                @include('backend.modules.pos.payment_summary')
                            </div>
                        </div>
                        <div class="customer-info block-section">
                            <h6>Customer Information</h6>
                            <div class="input-block d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <select class="select" name="customer_id" id="customer_id">


                                    </select>
                                </div>
                                <a href="#" class="btn btn-success btn-icon" data-bs-toggle="modal"
                                   data-bs-target="#create"><i data-feather="user-plus" class="feather-16"></i></a>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between border-bottom mb-0">
                                    <div class="header-title">
                                        <h4 class="card-title text-center">Shipping and Gift Info</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('pos.orders.update',$order->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="cart_data" id="cart_data">
                                        <input type="hidden" name="itemTotal" id="itemTotal">
                                        <input type="hidden" name="shipping" id="shipping">
                                        <input type="hidden" name="packing_charge" id="packingCharge">
                                        <input type="hidden" name="discount" id="discount">

                                        <input type="hidden" name="coupon_code" id="couponCode">
                                        <input type="hidden" name="coupon_discount" id="couponDiscount">
                                        <input type="hidden" name="subtotal" id="subtotal">
                                        <input type="hidden" name="total" id="total">



                                        <div class="row mt-2">

                                            <div class="col-md-12 mb-2">

                                                <h5>Customer Detail</h5>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name: *</label>
                                                    <input id="name" type="text" class="form-control"
                                                           name="name" required="" value="{{$order->shipping->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email: <small>(Alternative)</small></label>
                                                    <input id="email" type="text" class="form-control"
                                                           name="email" value="{{$order->shipping->email}}">
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile Number: </label>

                                                    <input  type="text" class="form-control"
                                                           name="phone" value="{{$order->shipping->phone}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile Number: <small>(Alternative)</small></label>

                                                    <input id="phone_alt" type="text" class="form-control"
                                                           name="phone_alt" value="{{$order->shipping->alternate_phone}}">
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-3">

                                                <h5>Address Detail</h5>

                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address *</label>
                                                    <textarea id="address" class="form-control" name="address"
                                                              required=""> {{$order->shipping->address}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <select class="form-control" id="country_id" name="country_id"
                                                            onchange="GetCities()">
                                                        <option value="">Select Country</option>
                                                        @foreach ($countries as $key => $co)
                                                            <option value="{{ $co->id }}" {{ $co->id == $order->shipping->country_id ? 'selected' : '' }}>{{ $co->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city">City: * <span class="refresh"
                                                                                    title="Refresh City"> <i
                                                                class=" text-danger ri-restart-line"></i>
                                                        </span> </label>
                                                    <select class="form-control select2" id="city_id"
                                                            name="city_id" onchange="GetUpazilas()">
                                                        <option value="{{$order->shipping->city_id}} ">{{$order->shipping->city->name}}</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="city">Thana/Upazila: *</label>
                                                    <select class="form-control select2" id="upazila_id"
                                                            name="upazila_id">
                                                        <option value="{{$order->shipping->upazila_id}} ">{{$order->shipping->upazila->name}}</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sale Date: </label>
                                                    <input id="sale_date" type="date" class="form-control"
                                                           name="sale_date" value="{{$order->sale_date}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Post Code: </label>
                                                    <input id="zip" type="text" class="form-control"
                                                           name="zip" value="{{$order->zip}}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">

                                                <button id="placeOrder" type="submit"
                                                        class="btn btn-danger w-100 mt-3 py-3">Place Order
                                                </button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
{{--    </div>--}}
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create User</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="customerForm" action="{{route('pos.customers.store')}}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-12 col-sm-6">
                                <div class="input-block">
                                    <label>User Type<span class="star-sign">*</span></label>
                                    <select name="user_type" id="user_type" class="select">
                                        <option value="">Select User Type</option>
                                        @foreach($userTypes as $userType)
                                            <option value="{{ $userType }}">{{ $userType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Customer Name<span class="star-sign">*</span></label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Phone<span class="star-sign">*</span></label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Alternative Phone</label>
                                    <input type="text" name="phone_alt" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-sm-flex justify-content-end">
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                            {{--                            <button type="button" class="btn btn-submit me-2" onclick="submitForm()">Submit</button>--}}
                            <button type="submit" class="btn btn-submit me-2">
                                <span class="spinner-border spinner-border-sm d-none" role="status"
                                      aria-hidden="true"></span>
                                <span class="text">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


{{-- payment method modal--}}
<div class="modal fade" id="payment" tabindex="-1" aria-labelledby="create" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Save Payment Method Info</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="orderPaymentMethod" action=" " method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <select class="select" id="payment_method_id" name="payment_method_id">

                                    @foreach($paymentMethods as $payment)
                                        <option value="{{ $payment->id }}"> {{ $payment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="number" class="form-control amount" name="amount" placeholder="Amount" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control transaction_id" name="transaction_id" placeholder="Transaction Id">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <textarea name="note" class="form-control" rows="1" placeholder="Comment"></textarea>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="modal-footer d-sm-flex justify-content-end">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-submit me-2">
                        <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                        <span class="text">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--current price updaete modal--}}
<div class="modal fade modal-default pos-modal" id="products" aria-labelledby="products">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-4 d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <h5 class="me-4">Product Details</h5>
                    {{--                    <span class="badge bg-info d-inline-block mb-0"></span>--}}
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div id="modal-product-details"  >





                </div>
                <div class="form-group mt-3">
                    <label for="modal-product-price">Current Price</label>
                    <input type="text" class="form-control" id="modal-product-price">
                </div>
            </div>
            <div class="modal-footer d-sm-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="save-modal-product-details">Save</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')



        <style>
        .star-sign {
            color: red;
            font-weight: bold;
        }


        .count-badge {
            margin-top: -28px;
            margin-left: -11px; /* Adjust as needed */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background-color: red;
            color: white;
            font-size: 12px;
            z-index: 1; /* Ensure badge is on top */
        }
    </style>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <script>
        // Retrieve the cart items passed from the controller and decode them
        const cartItems = JSON.parse(@json($cart));

        // Store the decoded cart items in session storage
        sessionStorage.setItem('cart', JSON.stringify(cartItems));
        // renderCart();
    </script>



    <script type="text/javascript">
        $(document).ready(function () {
            $('#coupon_code').change(function () {
                var couponCode = $(this).val();

                var cartData = JSON.parse(sessionStorage.getItem('cart'));
                $.ajax({
                    url: '{{ route("apply.coupon") }}',
                    method: 'POST',
                    data: {
                        coupon_code: couponCode,
                        cart: JSON.stringify(cartData)
                    },
                    success: function (response) {
                        if (response.error) {
                            // Handle the case where there is an error with the coupon
                            console.error('Error applying coupon:', response.error);
                        } else {
                            // Update the cart UI with the new cart data and display the discount amount and total
                            var updatedCart = response.cart;
                            var discountAmount = response.discount_amount;

                            // Store the updated cart data in sessionStorage
                            sessionStorage.setItem('cart', JSON.stringify(updatedCart));

                            // Call the renderCart() function to update the cart UI
                            renderCart();

                            $('.coupon_discount').text(discountAmount);
                            $('#coupon_discount').val(discountAmount);


                            // Call calculateCartTotal() function to recalculate the total
                            calculateCartTotal();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(xhr.responseText);

                        // Show toastr alert for the error
                        toastr.error(xhr.responseJSON.error);
                    }

                });
            });


            $('#coupon_discount').on('change', function() {
                // Get the selected discount value
                var discountValue = $(this).val();

                if (discountValue === '00') {
                    $('#coupon_code').val('');
                }
            });
        });


        function removeBTN(index){

            $.ajax({

                type: 'POST',
                url: '{{ route('pos.method.remove') }}',
                data: { index: index},
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.success
                    });

                    $('.summary').html(response.html);
                },
                error: function(xhr, status, error) {
                    // Handle the error response from the server
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON.errors ? Object.values(xhr.responseJSON.errors)[0][0] : 'An error occurred while removing the payment. Please try again.'
                    });
                }
            });
        }

        $(document).ready(function() {

            // on click open payment method modal with selected method
            // $(".paymentMethodSelect").click(function() {
            //     var paymentId = $(this).data("payment-id");
            //     $("#payment_method_id").val(paymentId).trigger("change");
            // });

            // payment saving form using modal
            $('#orderPaymentMethod').on('submit', function(event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('pos.method.store') }}',
                    data: form_data,
                    success: function(response) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        });
                        $('.summary').html(response.html);

                        $('#payment').modal('toggle');

                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON.errors ? Object.values(xhr.responseJSON.errors)[0][0] : 'An error occurred while submitting the form. Please try again.'
                        });
                    }
                });
            });
        });


        // Function to submit cart data
        function submitCartData() {
            // Get cart data from sessionStorage
            const cartData = sessionStorage.getItem('cart');
            let itemTotal = 0;
            cart.forEach(item => {
                itemTotal += item.current_price * item.quantity;

            });

            // Get other data from the page


            const shipping = $('.shipping').text();
            const packing = $('.packingCharge').text();
            const discount = $('.discount').text();
            const couponCode = $('#coupon_code').val();
            const couponDiscount = $('.coupon_discount').text();
            const subtotal = $('.subtotalAmount').text();
            const total = $('.totalAmount').text();

            // Set values of hidden input fields
            $('#cart_data').val(cartData);
            $('#itemTotal').val(itemTotal);
            $('#shipping').val(shipping);
            $('#packingCharge').val(packing);
            $('#discount').val(discount);
            $('#couponCode').val(couponCode);
            $('#couponDiscount').val(couponDiscount);
            $('#subtotal').val(subtotal);
            $('#total').val(total);
        }

        // Call submitCartData function before submitting the form
        $('#placeOrder').on('click', function (e) {
            e.preventDefault(); // Prevent default form submission
            submitCartData(); // Set cart data and other data to hidden input fields
            $(this).closest('form').submit(); // Submit the form
        });

        function duplicateItem(itemId) {
            // Find the item to be duplicated in the cart array
            const itemToDuplicate = cart.find(item => item.id == itemId);

            if (itemToDuplicate) {
                // Clone the item object
                const duplicatedItem = {...itemToDuplicate};

                // For example, you can update the ID or reset the quantity
                duplicatedItem.id = itemToDuplicate.id; // Keep the same ID as the original item

                // duplicatedItem.unique_id = generateUniqueId(itemId);
                duplicatedItem.quantity = 1;
                duplicatedItem.isDuplicate = 1;


                // Check if the original item has a non-zero price
                if (itemToDuplicate.current_price > 0) {
                    // Set the price of the duplicated item to zero
                    duplicatedItem.current_price = 0;
                    duplicatedItem.subtotal = 0; // Reset subtotal
                }

                // Add the duplicated item to the cart
                cart.push(duplicatedItem);

                // Save the updated cart to sessionStorage
                sessionStorage.setItem('cart', JSON.stringify(cart));

                // Render the updated cart UI
                renderCart();

                // Show a success message
                toastr.success('Item duplicated successfully.');
            } else {
                toastr.error('Item not found in cart.');
            }
        }
        function updateSingleItemSubtotal(productId, newSubtotal) {
            // Find the product in the cart array based on the product ID
            var productIndex = cart.findIndex(item => item.id == productId);
            if (productIndex !== -1) {
                // Update the current price and subtotal of the product in the cart
                cart[productIndex].current_price = 0;
                cart[productIndex].subtotal = newSubtotal;
                // Re-render the cart UI
                renderCart();
            }
        }

        // product add to cart
        $(document).ready(function () {
            // Check if sessionStorage is available
            if (typeof (Storage) === "undefined") {
                console.error("SessionStorage is not supported in this browser.");
                // return;
            }

            $(document).on('click', '.product', function () {
                // Extract product data from the data-product attribute

                const productData = $(this).data('product');

                // Check if the product already exists in the cart
                const existingProductIndex = cart.findIndex(item => item.id === productData.id);

                if (existingProductIndex !== -1) {
                    // If the product already exists, update its quantity
                    cart[existingProductIndex].quantity += 1;
                    // Recalculate the subtotal based on the updated quantity
                    cart[existingProductIndex].subtotal = cart[existingProductIndex].current_price * cart[existingProductIndex].quantity;
                } else {
                    // If the product doesn't exist, add it to the cart
                    // Calculate the subtotal for the product
                    const subtotal = productData.current_price * productData.quantity;
                    productData.subtotal = subtotal; // Store the subtotal in productData
                    cart.push(productData);
                }

                $('#coupon_discount').val('00');
                $('.coupon_discount').val('00');


                // Store the updated cart in sessionStorage
                sessionStorage.setItem('cart', JSON.stringify(cart));

                // Render the updated cart
                renderCart();


                // Show a success message using toastr
                toastr.success('Item added to cart successfully.');
            });

        });

        const cart = JSON.parse(sessionStorage.getItem('cart')) || [];

        // Function of product  cart
        function renderCart() {
            $('#cart').empty();
            let itemCounts = {};
            let total = 0; // Initialize total variable
            let uniqueProductCount = 0;

            if (cart.length === 0) {
                // If the cart is empty, display a message
                $('#cart').append(`<p class="text-center text-danger">No products available in the cart.</p>`);
            } else {
                // If the cart is not empty, render the products
                cart.forEach((item, index) => {
                    const subtotal = item.current_price * item.quantity;
                    total += subtotal; // Add subtotal to total

                    if (!(item.id in itemCounts)) {
                        itemCounts[item.id] = 1;
                        uniqueProductCount++; // Increment unique product count when encountering a new product
                    }

                    $('#cart').append(`
        <div class="product-list d-flex align-items-center justify-content-between" id="quantity${item.id}">
            <div class="d-flex align-items-center product-info" data-bs-toggle="modal" data-bs-target="#products"    data-item-index="${index}">
                <a href="javascript:void(0);" class="img-bg">
                    <img src="${item.thumb_image}" alt="${item.english_name}">
                </a>
                <div class="info">
                    <span>${item.product_code}</span>
                    <h6><a href="javascript:void(0);">${truncateText(item.english_name, 55)}</a></h6>
                    <p>
    ${formatPrice(item.current_price)} 
    ${item.mrp_price > item.current_price ? `(<del>${formatPrice(item.mrp_price)}</del>)` : ''} 
    X ${item.quantity} = ${formatPrice(item.subtotal)}
</p>

                    
             
                </div>
            </div>
            <div class="qty-item text-center">
                <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" onclick="updateQuantity('${item.id}', -1,'${index}')" data-bs-toggle="tooltip" data-bs-placement="top" title="minus">
                    <i class="fas fa-minus-circle"></i>
                </a>
                <input type="text" class="form-control text-center"  onblur="UpdateCart('${item.id}','${index}')" onchange="UpdateCart('${item.id}' ,'${index}')"  id="quantity${index}" name="quantity${item.id}"  value="${item.quantity}">
                <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" onclick="updateQuantity('${item.id}', 1,'${index}')" data-bs-toggle="tooltip" data-bs-placement="top" title="plus">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>



<div class="d-flex align-items-center action">
           <a class="btn-icon edit-icon me-2" href="javascript:void(0);" onclick='updateSingleItemSubtotal("${item.id}", 0)' title="Update Subtotal 0">
    <i class="fas fa-sync-alt"></i>
</a>

<a class="btn-icon copy-icon me-2" href="javascript:void(0);" onclick='duplicateItem("${item.id}")' title="Duplicate">
    <i class="fas fa-copy text-info"></i>
</a>

<a class="btn-icon delete-icon confirm-text" href="javascript:void(0);" onclick='removeSingleItem("${item.id}" ,"${index}")' title="Delete">
    <i class="fas fa-trash-alt"></i>
</a>

            </div>
        </div>
    `);



                });
            }

            $('.itemTotal').text(formatPrice(total));
            $('.count-cart').text(uniqueProductCount);

            var v=getCartTotalWeight(60,cart);
            $('#cart_shipping').val(v);


            calculateCartTotal();
        }


        // for quntity increase  +/- button click
        // function updateQuantity(itemId, change, index) {
        //     const itemIndex = index; //cart.findIndex(item => item.id == itemId);

        //     if (itemIndex !== -1) {
        //         // Update the quantity
        //         cart[itemIndex].quantity += change;

        //         // If the quantity becomes 0 or negative, or 1, remove the item from the cart
        //         if (cart[itemIndex].quantity <= 0) {
        //             toastr.error('Quantity cannot be less than 1.');
        //             // removeItem(itemId);
        //             cart[itemIndex].quantity = 1; // Reset quantity to 1
        //         } else {
        //             // Calculate and update subtotal
        //             const subtotal = cart[itemIndex].current_price * cart[itemIndex].quantity;
        //             cart[itemIndex].subtotal = subtotal;

        //             // Update cart in sessionStorage
        //             sessionStorage.setItem('cart', JSON.stringify(cart));

        //             // Render the updated cart
        //             renderCart();
        //         }
        //     }
        // }
        
        function updateQuantity(itemId, change, index) {
    const itemIndex = index; //cart.findIndex(item => item.id == itemId);

    if (itemIndex !== -1) {
        // Ensure quantity is an integer by using parseInt
        cart[itemIndex].quantity = parseInt(cart[itemIndex].quantity, 10) + change;

        // If the quantity becomes 0 or negative, or 1, remove the item from the cart
        if (cart[itemIndex].quantity <= 0) {
            toastr.error('Quantity cannot be less than 1.');
            cart[itemIndex].quantity = 1; // Reset quantity to 1
        } else {
            // Calculate and update subtotal
            const subtotal = parseFloat(cart[itemIndex].current_price) * cart[itemIndex].quantity;
            cart[itemIndex].subtotal = subtotal;

            // Update cart in sessionStorage
            sessionStorage.setItem('cart', JSON.stringify(cart));

            // Render the updated cart
            renderCart();
        }
    }
}



        // on input value
        function UpdateCart(itemId, index) {

            const quantityInput = $(`#quantity${index}`);
            const quantityValue = quantityInput.val();
            const quantity = parseInt(quantityValue);


            // Check if the quantity is a valid number
            if (!isNaN(quantity)) {
                // Find the item in the cart
                // const itemIndex = cart.findIndex(item => item.id == itemId);

                const itemIndex = index;

                // Update the quantity if the item is found
                if (itemIndex !== -1) {
                    cart[itemIndex].quantity = quantity;

                    // Calculate and update the subtotal for the item
                    cart[itemIndex].subtotal = cart[itemIndex].current_price * quantity;

                    // Update cart in sessionStorage
                    sessionStorage.setItem('cart', JSON.stringify(cart));

                    // Render the updated cart
                    renderCart();
                }
            }
        }


        // remove  single product
        function removeSingleItem(itemId, index) {
            // const itemIndex = cart.findIndex(item => item.id == itemId);
            const itemIndex = index;
            if (itemIndex !== -1) {
                // Remove the item from the cart
                cart.splice(itemIndex, 1);
                sessionStorage.setItem('cart', JSON.stringify(cart));
                // Render the updated cart
                renderCart();
                toastr.success('Item removed from cart.');
            } else {
                toastr.error('Item not found in cart.');
            }
        }

        // claer all products
        function clearCart() {
            // Clear the 'cart' key from sessionStorage
            sessionStorage.removeItem('cart');
            // Show success message
            toastr.success('Cart cleared successfully.');
            location.reload();
            // Render the cart UI
            renderCart();


        }


        function calculateCartTotal() {
            let itemTotal = 0;

            cart.forEach(item => {
                itemTotal += item.current_price * item.quantity;
            });


            const shipping = parseFloat($('#cart_shipping').val() || 0); // Default to 0 if shipping is empty
            let discount = parseFloat($('#cart_discount').val());
            let couponDiscount = parseFloat($('#coupon_discount').val() || 0);
            const packing = parseFloat($('#packing_charge').val() || 0);


            // Check if discount is entered as a percentage
            if ($('#cart_discount').val().endsWith('%')) {
                const discountPercentage = parseFloat(discount) / 100;
                discount = itemTotal * discountPercentage;
            }

            // Ensure discount is a valid number
            discount = isNaN(discount) ? 0 : discount;

            const subtotal = itemTotal + shipping + packing;

            const total = subtotal - (discount + couponDiscount); // Corrected calculation

            // Format shipping, discount, subtotal, and total
            const formattedShipping = formatPrice(shipping);
            const formattedPacking = formatPrice(packing);
            const formattedDiscount = formatPrice(discount);
            const formattedCouponDiscount = formatPrice(couponDiscount);
            const formattedSubtotal = formatPrice(subtotal);
            const formattedTotal = formatPrice(total);

            // Update shipping, discount, subtotal, and total in table rows
            $('.shipping').text(formattedShipping);
            $('.packingCharge').text(formattedPacking);
            $('.discount').text(formattedDiscount);
            $('.coupon_discount').text(formattedCouponDiscount);
            $('.subtotalAmount').text(formattedSubtotal);
            $('.totalAmount').text(formattedTotal);
        }

        // on input discount or shipping calculation amount
        $('#cart_shipping, #cart_discount, #packing_charge').on('input', function () {

            calculateCartTotal();
        });



        // Event listener for showing product details when the modal is opened
        $('#products').on('show.bs.modal', function(event) {
            const button = $(event.relatedTarget);
            const itemIndex = button.data('item-index');
            showProductDetailsInModal(itemIndex);
        });

        // Function to show  single product details in the modal
        function showProductDetailsInModal(itemIndex) {


            const modalBody = $('#modal-product-details');

            const modalPriceInput = $('#modal-product-price');

            const storedCart = JSON.parse(sessionStorage.getItem('cart'));

            if (storedCart && itemIndex >= 0 && itemIndex < storedCart.length) {
                const item = storedCart[itemIndex];

                modalBody.html(`
            <div class="product-list d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center flex-fill">
                    <a href="javascript:void(0);" class="img-bg me-2" >
                        <img src="${item.thumb_image || ''}" alt="img" style="height: 50px;">
                    </a>
                    <div class="info d-flex align-items-center justify-content-between flex-fill">
                        <div>
                              <span style="background-color: var(--bintel-color);border-radius: 3px;font-weight: 600;color: #fff; font-size: 14px;padding: 0 10px; min-width: 64px;" >${item.product_code || ''}</span>
                            <h6 style="font-size: 12px;font-weight: 600;margin-bottom: 0;">${truncateText(item.english_name || '', 45)}</h6>
                        </div>
                        <div>
                         <p style=" font-size: 13px; font-weight: 600; color: #5b6670;">
                            ${formatPrice(item.current_price || 0)}${item.mrp_price > item.current_price ? ` (<del>${formatPrice(item.mrp_price)}</del>)` : ''}</p>
                        </div>
                    </div>
                </div>
            </div>
        `);

                modalPriceInput.val(item.current_price || '');
                modalPriceInput.attr('data-item-index', itemIndex);
            } else {
                console.error('Item is undefined or itemIndex is out of bounds. Cannot display details.');
            }
        }
        // Save button event listener in the modal
        $('#save-modal-product-details').on('click', function() {
            const newPrice = $('#modal-product-price').val();
            const itemIndex = $('#modal-product-price').attr('data-item-index');
            updateCurrentPrice(itemIndex, newPrice);
            renderCart();
            $('#products').modal('hide');
        });
        // Function to update product price in the cart array
        function updateCurrentPrice(itemIndex, newPrice) {
            if (itemIndex !== undefined && itemIndex >= 0 && itemIndex < cart.length) {
                const parsedPrice = parseFloat(newPrice);
                if (!isNaN(parsedPrice)) {
                    cart[itemIndex].current_price = parsedPrice;
                    cart[itemIndex].subtotal = cart[itemIndex].current_price * cart[itemIndex].quantity;
                    sessionStorage.setItem('cart', JSON.stringify(cart));
                } else {
                    console.error('Invalid price value. Cannot update product price.');
                }
            } else {
                console.error('Item is undefined or itemIndex is out of bounds. Cannot update product price.');
            }
        }





        function truncateText(text, maxLength) {
            if (typeof text === 'string' && text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
            } else {
                return text || ''; // Return an empty string if text is undefined
            }
        }




function formatPrice(price) {
    // If the price is a boolean, null, undefined, or empty string, we treat it as 0
    if (price === null || price === undefined || price === '' || typeof price === 'boolean') {
        return '৳ 0.00';
    }

    // Check if the price is already a number
    if (typeof price === 'number') {
        // Return the formatted price with two decimal places (DOUBLE(8,2))
        return '৳ ' + price.toFixed(2);
    }

    // Try to parse the price as a number
    price = parseFloat(price);

    // Check if the price is valid
    if (!isNaN(price)) {
        return '৳ ' + price.toFixed(2);
    } else {
        return '৳ 0.00'; // Default fallback
    }
}



        // function formatPrice(price) {
        //     if (typeof price === 'number' && !isNaN(price)) {
        //         return '৳ ' + price.toFixed(2);
        //     } else {
        //         return '৳ 0.00'; // Return a default price if the input is invalid
        //     }
        // }

        window.onload = function () {
            renderCart();
        };


        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            try {
                var selectSimple = $('#publisher');

                selectSimple.select2({
                    placeholder: ' Search Publications',
                    minimumInputLength: 1,
                    allowClear: true,
                    ajax: {
                        url: '{{ route('publishers.search') }}', // route in admin.php
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(term) {
                            return {
                                q: term.term
                            }
                        },
                        processResults: function(data) {
                            return {
                                results: data
                            };
                        }

                    }



                });


            } catch (err) {
                console.log(err);
            }

            try {
                var category = $('#category_id');

                category.select2({
                    placeholder: 'Search Category...',
                    minimumInputLength: 1,
                    allowClear: true,
                    ajax: {
                        url: '{{ route('categories.search') }}',  // route in admin.php
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50,
                        data: function(term) {
                            return {
                                q: term.term
                            }
                        },
                        processResults: function(data) {
                            return {
                                results: data
                            };
                        }

                    }

                });


            } catch (err) {
                console.log(err);
            }

            try {
                var customer = $('#customer_id');

                customer.select2({

                    placeholder: 'Select Customer...',
                    minimumInputLength: 1,
                    allowClear: true,
                    ajax: {
                        url: '{{ route('pos.search.customer')}}',
                        dataType: 'json',
                        type: "GET",
                        quietMillis: 50 ,
                        data: function(term) {
                            return {
                                q: term.term
                            }
                        }
                        , processResults: function(data) {
                            return {
                                results: data
                            };
                        }
                    }

                });

                customer.on('change', function() {
                    const customerId = $(this).val();

                    // Make an Ajax request to fetch patient information from the server
                    $.ajax({
                        url: '{{ route('pos.customer.inf') }}',
                        method: 'GET',
                        data: { customerId: customerId },
                        dataType: 'json',
                        success: function(response) {
                            // Update the  customer Name and Mobile fields
                            $("#name").val(response.name);
                            $("#phone").val(response.phone);
                            $("#phone_alt").val(response.phone_alt);
                            $("#email").val(response.email);

                            $("#address").val(response.address);


                            $('#country_id').off('change').val(response.country_id).trigger("change").on('change', function(event) {
                                event.preventDefault();
                            });


                            setTimeout(function() {
                                $('#city_id').off('change').val(response.city_id).trigger("change").on('change', function(event) {
                                    event.preventDefault();
                                });
                            }, 1000);

                            setTimeout(function() {
                                $('#upazila_id').val(response.upazila_id).trigger("change");
                            }, 1300);

                            $("#zip").val(response.zip);




                        },
                        error: function() {
                            // Handle any errors that occur during the Ajax request
                            console.log('Error fetching to information.');
                        }
                    });
                });
            }

            catch (err) {
                console.log(err);
            }




        });


        // using modal customer add
        $('#customerForm').submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();
            var $form = $(this);

            var $button = $form.find('.btn-submit');
            var $spinner = $button.find('.spinner-border');
            var $text = $button.find('.text');

            // Show loading indicator and disable button
            $spinner.removeClass('d-none');
            $text.hide();
            $button.prop('disabled', true);

            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Hide loading indicator and enable button
                    $spinner.addClass('d-none');
                    $text.show();
                    $button.prop('disabled', false);

                    toastr.success(response.message);

                    $('#create').modal('hide');
                    $('#create')[0].reset()
                },
                error: function (xhr, status, error) {
                    // Hide loading indicator and enable button
                    $spinner.addClass('d-none');
                    $text.show();
                    $button.prop('disabled', false);

                    toastr.error(xhr.responseText);
                }
            });
        });


        function productList() {
            var search = $('.product_search').val();
            var category_id = $('#category_id').val();
            var publisher_id = $('#publisher').val();

            $.ajax({
                url: '{{ route('pos.search.product') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    search: search,
                    category_id: category_id,
                    publisher_id: publisher_id,
                },
                success: function(response) {
                    // Directly use the response object
                    if (response.error === "no") {
                        $('#productList').html(response.dataView);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while loading products.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                    console.error(error);
                }
            });
        }
        productList();

        function GetCities() {
            var countryId = $('#country_id').val();
            if (countryId) {
                $.ajax({
                    url: '{{ route('places.cities') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        country_id: countryId
                    },
                    success: function(data) {
                        $('#city_id').html(null);
                        $.each(data, function(index, city) {
                            $('#city_id').append($('<option>', {
                                value: city.id,
                                text: city.name
                            }));
                        });
                        GetUpazilas();  // Fetch Upazilas after populating cities
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching cities:', error);
                    }
                });
            }
        }

        function GetUpazilas() {
            var cityId = $('#city_id').val();
            if (cityId) {
                $.ajax({
                    url: '{{ route('places.upazilas') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        city_id: cityId
                    },
                    success: function(data) {
                        $('#upazila_id').html(null);
                        $.each(data, function(index, upazila) {
                            $('#upazila_id').append($('<option>', {
                                value: upazila.id,
                                text: upazila.name
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching upazilas:', error);
                    }
                });
            }
        }


        $('.refresh').on('click', function(e) {
            GetCities();
        });


        function getCartTotalWeight(baseCharge = 60, cart = []) {
            
            var paid='{{$order->payment_status}}';
            if(paid=='paid'){
                return 0;
            }
            // Initialize total weight
            let totalWeight = 0;

            // Iterate over the cart items
            cart.forEach((item, index) => {
                const weight = item.product_weight || 0; // Default to 0 if product_weight is undefined
                totalWeight += weight * item.quantity; // Multiply weight by quantity
            });

            // Add 10% for packaging weight
            //totalWeight += totalWeight * 0.1;

            const weightInKg = Math.ceil(totalWeight / 1000); // Convert grams to kilograms, round up
            const extraChargePerKg = 20;

            // Calculate total charge
            if (weightInKg <= 1) {
                return baseCharge; // Base charge for up to 1 kg
            }

            // Charge for additional kilograms
            const additionalCharge = (weightInKg - 1) * extraChargePerKg;
            return baseCharge + additionalCharge;
        }

    </script>
@endsection
