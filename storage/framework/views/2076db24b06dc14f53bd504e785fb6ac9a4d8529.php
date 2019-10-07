<?php $__env->startSection('title', 'Chi tiết giỏ hàng'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
             style="background-image: url(http://ducthanhco.vn/uploads/backgrounds/bg_default.jpg);">
        <h2 class="l-text2 t-center">
            Giỏ hàng
        </h2>
    </section>
    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
        <?php if(session()->get('cart') != null): ?>
            <!-- Cart item -->
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Sản phẩm</th>
                                <th class="column-3">Đơn giá</th>
                                <th class="column-4">Số lượng</th>
                                <th class="column-5">Tổng</th>
                            </tr>
                            <?php $__currentLoopData = $cart_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="table-row" id="cart_item<?php echo e($value['id']); ?>">
                                    <td class="column-1">
                                        <a href="<?php echo e(route('delete.cart', $value['id'])); ?>">
                                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                                <img
                                                    src="<?php echo e(asset('public/images/products')); ?>/<?php echo e($value['image']); ?>"
                                                    alt="IMG-PRODUCT">

                                            </div>
                                        </a>
                                    </td>
                                    <td class="column-2"><?php echo e($value['name']); ?></td>
                                    <td class="column-3"><?php echo e(number_format(($value['price'] - $value['price']*$value['sale']%100 ))); ?>

                                        vnd
                                    </td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input id="number" class="size8 m-text18 t-center num-product number"
                                                   type="number"
                                                   name="num-product1" value="<?php echo e($value['qty']); ?>"
                                                   data-id="<?php echo e($value['id']); ?>" data-price="<?php echo e($value['price']); ?>">

                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5"><span
                                            id="<?php echo e($value['id']); ?>"><?php echo e(number_format(($value['price'] - $value['price']*$value['sale']%100 )*  $value['qty'])); ?></span>
                                        vnd
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        <div class="size11 bo4 m-r-10">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code"
                                   placeholder="Coupon Code">
                        </div>

                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                            <!-- Button -->
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
                        </div>
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <a href="<?php echo e(route('clear.cart')); ?>">
                            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Xóa giỏ hàng
					</button>
                        </a>
                    </div>
                </div>

                <!-- Total -->
                <form action="<?php echo e(route('checkout.cart')); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                    <h5 class="m-text20 p-b-24">
                        Thông tin đơn hàng
                    </h5>

                    <!--  -->
                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name"
                                   placeholder="Tên người nhận">
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="telephone"
                                   placeholder="Số điện thoại">
                        </div>
                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address"
                                  placeholder="Địa chỉ"></textarea>
                        <span class="s-text18 w-size19 w-full-sm">
						Chú ý:
					</span>
                        <div class="w-size20 w-full-sm">
                            <p class="s-text8 p-b-23">
                                Thanh toán trực tiếp khi nhận hàng.!
                            </p>
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Tổng tiền:
					</span>
                        <span id="total" class="m-text21 w-size20 w-full-sm">
                        <?php echo e(number_format($tongtien)); ?>

                            vnd
					</span>
                        <input type="hidden" name="total" value="200000">
                        <input type="hidden" name="status" value="1">
                    </div>

                    <div class="size15 trans-0-4">
                        <?php if(Auth::user()!=null): ?>
                            <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Check Out
					</button>

                        <?php else: ?>
                            <p>Bạn phải đăng nhập để tiến hành tạo đơn hàng</p>
                        <?php endif; ?>
                    </div>
                </div>
                </form>
        </div>
        <?php else: ?>
            <p class="text-center">Giỏ hàng trống: <a href="<?php echo e(url('/')); ?>"><b>Đến shop ngay</b></a></p>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        function function_name(number) {
            return number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        }

        $(document).ready(function () {
            $(".number").change(function () {
                var value = $(this).val();
                var id = $(this).attr('data-id');
                var price = $(this).attr('data-price');
                var count = $('#count').html();
                if ((value !== '') && (value.indexOf('.') === -1)) {
                    $('.update-cart').val(Math.max(Math.min(value, 10), 0));
                    if (value > 10) {
                        value = 10;
                    }
                    $.ajax({
                        type: "POST",
                        dataType: "JSON",
                        url: '<?php echo e(route('update.cart')); ?>',
                        data:
                            {
                                id: id,
                                qty: value,
                                _token: '<?php echo csrf_token(); ?>'
                            }, success: function (result) {
                            console.log(result);

                            if (value == 0) {
                                $('#count').text(parseInt(count - 1));
                                $('#cart_item' + id).remove();
                            }
                            if (typeof result == 'string') {
                                $('#count').text(parseInt(count - 1));
                                $('.cart_info').remove();
                                $('.here').append(result);
                            }
                            var sum = value * price
                            $('span#' + id).html(function_name(sum));
                            $('#total').html(function_name(result) + ' vnd');

                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/pages/cart.blade.php ENDPATH**/ ?>