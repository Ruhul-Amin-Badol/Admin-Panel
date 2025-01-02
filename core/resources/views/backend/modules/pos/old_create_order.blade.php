{{--@extends('backend.modules.pos.layouts.app')--}}
@extends('backend.layouts.master')

@section('title')
    <title>Pos-{{ get_option('title') }}</title>
@endsection

@section('content')
    {{--    <div class="page-wrapper pos-pg-wrapper ms-0">--}}
    <div class="content pos-design p-0">
        <div class="btn-row d-sm-flex align-items-center">
            <a href="{{route('orders.index')}}" class="btn btn-secondary mb-xs-3" ><span class="me-1 d-flex align-items-center"><i
                        data-feather="shopping-cart" class="feather-16"></i></span>View Orders</a>



        </div>


        <div class="row align-items-start pos-wrapper">
            <div class="col-md-12 col-lg-8">
                <div class="  bg-white">
                    <div class="card card-body gutter-b  border-0">
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label for="">Publications *</label>
                                <select name="seller" id="seller" class="select" onchange="productList()">

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
                            <h6 class="d-flex align-items-center mb-0">Total Products Added<span class="count count-cart"> </span>
                            </h6>

                            <a href="javascript:void(0);" class="d-flex align-items-center text-danger" onclick="clearCart()">
                                <span class="me-1"><i data-feather="x" class="feather-16"></i></span>Clear all</a>
                        </div>

                        <div class="product-wrap" id="cart">

                            {{--                            cart product will displayed here --}}

                        </div>

                        <div class="d-grid btn-block">
                            <a class="btn btn-secondary " href="javascript:void(0);">
                                Item Total : <span class="itemTotal"> </span>
                            </a>
                        </div>
                    </div>
                    <div class="block-section cart-summary-view">
                        <div class="selling-info">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="input-block">
                                        <label>Shipping</label>
                                        <input type="text" class="form-control" id="cart_shipping" name="cart_shipping"  value="40">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="input-block">
                                        <label>Discount</label>
                                        <input type="text" class="form-control" id="cart_discount" name="cart_discount">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="input-block">
                                        <label>Apply Coupon</label>
                                        <input type="hidden" name="coupon_discount" id="coupon_discount" value="">
                                        <select name="coupon_code" id="coupon_code" class="form-control">
                                            <option value="">Select Coupon</option>
                                            @foreach($coupons as $coupon)
                                                <option value="{{ $coupon->code }}">{{ $coupon->code}}</option>
                                            @endforeach
                                        </select>
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
                                    <td>Sub Total</td>
                                    <td class="text-end subtotalAmount">0.00</td> <!-- Added default value -->
                                </tr>
                                <tr>
                                    <td class="danger">Discount</td>
                                    <td class="danger text-end discount">0.00</td> <!-- Added default value -->
                                </tr>
                                <tr>
                                    <td class="danger">Coupon Discount</td>
                                    <td class="danger text-end coupon_discount">0.00</td> <!-- Added default value -->
                                </tr>

                                <tr>
                                    <td>Total</td>
                                    <td class="text-end totalAmount">0.00</td> <!-- Added default value -->
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>



                    <div class="block-section payment-method">
                        <h6>Payment Method</h6>
                        <div class="row d-flex align-items-center justify-content-center methods">
                            @foreach($paymentMethods as $paymentMethod)
                                <div class="col-md-6 col-lg-4 paymentMethodSelect mb-2"  data-bs-toggle="modal" data-bs-target="#payment" data-payment-id="{{$paymentMethod->id}}">
                                    <div class="default-cover">
                                        <a href="javascript:void(0);">
                                            <img src="{{image('theme/admin/assets/img/icons/cash-pay.svg')}}" alt="Payment Method">
                                            <span>{{$paymentMethod->name}}</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>



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
                                    <h4 class="card-title text-center">Shipping Address and Gift Info</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('pos.cart.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="cart_data" id="cart_data">
                                    <input type="hidden" name="itemTotal" id="itemTotal">
                                    <input type="hidden" name="shipping" id="shipping">
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
                                                       name="name" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email: <small>(Alternative)</small></label>
                                                <input  id="email" type="text" class="form-control"
                                                        name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number: *</label>
                                                <input id="phone" type="text" class="form-control"
                                                       name="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number: <small>(Alternative)</small></label>
                                                <input id="phone_alt" type="text" class="form-control"
                                                       name="phone_alt">
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-3">

                                            <h5>Address Detail</h5>

                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select class="form-control" id="country_id" name="country_id"
                                                        onchange="GetCities()">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $key => $co)
                                                        <option value="{{ $co->id }}">{{ $co->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city">City: * <span class="refresh" title="Refresh City"> <i class=" text-danger ri-restart-line"></i>
                                                        </span> </label>
                                                <select class="form-control select2" id="city_id"
                                                        name="city_id" onchange="GetUpazilas()">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city">Thana/Upazila: *</label>
                                                <select class="form-control select2" id="upazila_id"
                                                        name="upazila_id">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address *</label>
                                                <textarea id="address" class="form-control" name="address" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Post Code: </label>
                                                <input id="zip" type="text" class="form-control"
                                                       name="zip">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Exam Year: </label>
                                                <input id="exam_year" type="number" class="form-control"
                                                       name="exam_year" placeholder="Exam Year">
                                            </div>
                                        </div>
                                        <div class="col-md-12">

                                            <button id="placeOrder" type="submit"
                                                    class="btn btn-danger w-100 mt-3 py-3">Place Order</button>
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

    {{--customer add modal--}}
    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="customerForm" action="{{route('pos.customers.store')}}" method="POST">
                        {{--                    <form id="customerForm" action="#" method="POST">--}}
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Customer Name*</label>
                                    <input type="text" name="name"  class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Email</label>
                                    <input type="email"  name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Phone*</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="input-blocks">
                                    <label>Alternative  Phone</label>
                                    <input type="text"   name="phone_alt" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-sm-flex justify-content-end">
                            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
                            {{--                            <button type="button" class="btn btn-submit me-2" onclick="submitForm()">Submit</button>--}}
                            <button type="submit" class="btn btn-submit me-2">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
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
                                <div class="col-md-4">
                                    <select class="select" id="payment_method_id" name="payment_method_id">

                                        @foreach($paymentMethods as $payment)
                                            <option value="{{ $payment->id }}"> {{ $payment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control amount" name="amount" placeholder="Amount" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control transaction_id" name="transaction_id" placeholder="Transaction Id">
                                </div>
                            </div>
                            <div class="row mt-3">
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


@endsection
@section('script')
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
            $(".paymentMethodSelect").click(function() {
                var paymentId = $(this).data("payment-id");
                $("#payment_method_id").val(paymentId).trigger("change");
            });

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



            {{--$('#orderPaymentUpdate').on('submit', function(event) {--}}
            {{--    event.preventDefault(); // Prevent default form submission behavior--}}
            {{--    var form_data = $(this).serialize(); // Create an object with the form data--}}
            {{--    $.ajax({--}}
            {{--        type: 'POST',--}}
            {{--        url: '{{ route('orders.payment.store')}}',--}}
            {{--        data: form_data,--}}
            {{--        success: function(response) {--}}
            {{--            // Handle the response from the server--}}
            {{--            if (response.message) {--}}
            {{--                Swal.fire({--}}
            {{--                    icon: 'success',--}}
            {{--                    title: 'Success',--}}
            {{--                    text: response.message--}}
            {{--                }).then(function() {--}}
            {{--                    window.location = "{{route('orders.index')}}";--}}
            {{--                });--}}
            {{--            }--}}
            {{--        },--}}
            {{--        error: function(xhr, status, error) {--}}
            {{--            // Handle the error response from the server--}}
            {{--            Swal.fire({--}}
            {{--                icon: 'error',--}}
            {{--                title: 'Error',--}}
            {{--                text: xhr.responseJSON.errors ? Object.values(xhr.responseJSON.errors)[0][0] : 'An error occurred while submitting the form. Please try again.'--}}
            {{--            });--}}
            {{--        }--}}
            {{--    });--}}
            {{--});--}}

        });




        // Function to submit cart data
        function submitCartData() {
            // Get cart data from sessionStorage
            const cartData = sessionStorage.getItem('cart');
            let itemTotal = 0;
            cart.forEach(item => {
                itemTotal += item.subtotal;
            });

            // Get other data from the page


            const shipping = $('.shipping').text();
            const discount = $('.discount').text();
            const couponCode = $('#coupon_code').val();
            const couponDiscount = $('.coupon_discount').text();
            const subtotal = $('.subtotalAmount').text();
            const total = $('.totalAmount').text();

            // Set values of hidden input fields
            $('#cart_data').val(cartData);
            $('#itemTotal').val(itemTotal);
            $('#shipping').val(shipping);
            $('#discount').val(discount);
            $('#couponCode').val(couponCode);
            $('#couponDiscount').val(couponDiscount);
            $('#subtotal').val(subtotal);
            $('#total').val(total);
        }
        // Call submitCartData function before submitting the form
        $('#placeOrder').on('click', function(e) {
            e.preventDefault(); // Prevent default form submission
            submitCartData(); // Set cart data and other data to hidden input fields
            $(this).closest('form').submit(); // Submit the form
        });

        function duplicateItem(itemId) {
            // Find the item to be duplicated in the cart array
            const itemToDuplicate = cart.find(item => item.id == itemId);

            if (itemToDuplicate) {
                // Clone the item object
                const duplicatedItem = { ...itemToDuplicate };

                // For example, you can update the ID or reset the quantity
                duplicatedItem.id = itemToDuplicate.id; // Keep the same ID as the original item

                // duplicatedItem.unique_id = generateUniqueId(itemId);
                duplicatedItem.quantity = 1;
                duplicatedItem.isDuplicate =1;


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
            if (typeof(Storage) === "undefined") {
                console.error("SessionStorage is not supported in this browser.");
                // return;
            }

            $(document).on('click','.product', function () {
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
            <div class="d-flex align-items-center product-info" data-bs-toggle="modal" data-bs-target="#products">
                <a href="javascript:void(0);" class="img-bg">
                    <img src="${item.thumb_image}" alt="${item.english_name}">
                </a>
                <div class="info">
                    <span>${item.id}</span>
                    <h6><a href="javascript:void(0);">${truncateText(item.english_name, 25)}</a></h6>
                    <p>${formatPrice(item.current_price)}${item.mrp_price > item.current_price ? `(<del>${formatPrice(item.mrp_price)}</del>)` : ''} X ${item.quantity} = ${formatPrice(item.subtotal)}</p>
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

            calculateCartTotal();
        }

        // for quntity increase  +/- button click
        function updateQuantity(itemId, change,index) {
            const itemIndex =index; //cart.findIndex(item => item.id == itemId);

            if (itemIndex !== -1) {
                // Update the quantity
                cart[itemIndex].quantity += change;

                // If the quantity becomes 0 or negative, or 1, remove the item from the cart
                if (cart[itemIndex].quantity <= 0) {
                    toastr.error('Quantity cannot be less than 1.');
                    // removeItem(itemId);
                    cart[itemIndex].quantity = 1; // Reset quantity to 1
                } else {
                    // Calculate and update subtotal
                    const subtotal = cart[itemIndex].current_price * cart[itemIndex].quantity;
                    cart[itemIndex].subtotal = subtotal;

                    // Update cart in sessionStorage
                    sessionStorage.setItem('cart', JSON.stringify(cart));

                    // Render the updated cart
                    renderCart();
                }
            }
        }


        // on input value
        function UpdateCart(itemId,index) {

            const quantityInput = $(`#quantity${index}`);
            const quantityValue = quantityInput.val();
            const quantity = parseInt(quantityValue);
            // Check if the quantity is a valid number
            if (!isNaN(quantity)) {
                // Find the item in the cart
                // const itemIndex = cart.findIndex(item => item.id == itemId);

                const itemIndex =index;

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
        function removeSingleItem(itemId,index) {
            // const itemIndex = cart.findIndex(item => item.id == itemId);
            const itemIndex =index;
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
                itemTotal += item.subtotal;
            });

            const shipping = parseFloat($('#cart_shipping').val() || 0); // Default to 0 if shipping is empty
            let discount = parseFloat($('#cart_discount').val());
            let couponDiscount = parseFloat($('#coupon_discount').val() || 0);


            // Check if discount is entered as a percentage
            if ($('#cart_discount').val().endsWith('%')) {
                const discountPercentage = parseFloat(discount) / 100;
                discount = itemTotal * discountPercentage;
            }

            // Ensure discount is a valid number
            discount = isNaN(discount) ? 0 : discount;

            const subtotal = itemTotal + shipping;

            const total = subtotal - (discount+couponDiscount); // Corrected calculation

            // Format shipping, discount, subtotal, and total
            const formattedShipping = formatPrice(shipping);
            const formattedDiscount = formatPrice(discount);
            const formattedCouponDiscount = formatPrice(couponDiscount);
            const formattedSubtotal = formatPrice(subtotal);
            const formattedTotal = formatPrice(total);

            // Update shipping, discount, subtotal, and total in table rows
            $('.shipping').text(formattedShipping);
            $('.discount').text(formattedDiscount);
            $('.coupon_discount').text(formattedCouponDiscount);
            $('.subtotalAmount').text(formattedSubtotal);
            $('.totalAmount').text(formattedTotal);
        }

        // on input discount or shipping calculation amount
        $('#cart_shipping, #cart_discount').on('input', function () {

            calculateCartTotal();
        });

        // function truncateText(text, maxLength) {
        //     if (text.length > maxLength) {
        //         return text.substring(0, maxLength) + '...';
        //     } else {
        //         return text;
        //     }
        // }

        function truncateText(text, maxLength) {
            if (typeof text === 'string' && text.length > maxLength) {
                return text.substring(0, maxLength) + '...';
            } else {
                return text || ''; // Return an empty string if text is undefined
            }
        }


        // function formatPrice(price) {
        //     return ' ৳ ' + price.toFixed(2); // Assuming price is a numerical value
        // }
        function formatPrice(price) {
            if (typeof price === 'number' && !isNaN(price)) {
                return '৳ ' + price.toFixed(2);
            } else {
                return '৳ 0.00'; // Return a default price if the input is invalid
            }
        }

        window.onload = function() {
            renderCart();
            //sessionStorage.removeItem('cart');
        };



        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            try {
                var selectSimple = $('#seller');

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
        $('#customerForm').submit(function(event) {
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
                success: function(response) {
                    // Hide loading indicator and enable button
                    $spinner.addClass('d-none');
                    $text.show();
                    $button.prop('disabled', false);

                    toastr.success(response.message);

                    $('#create').modal('hide');
                    $('#create')[0].reset()
                },
                error: function(xhr, status, error) {
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
            var seller_id = $('#seller').val();

            $.ajax({
                url: '{{ route('pos.search.product') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    search: search,
                    category_id: category_id,
                    seller_id: seller_id,
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


    </script>
@endsection