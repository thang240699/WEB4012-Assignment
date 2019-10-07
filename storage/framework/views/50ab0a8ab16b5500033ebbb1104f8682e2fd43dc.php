<?php $__env->startSection('title', 'Sản phẩm chi tiết'); ?>

<?php $__env->startSection('content'); ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="slick3 slick-initialized slick-slider slick-dotted">
                        <div class="slick-list draggable">
                            <div class="slick-track" style="opacity: 1; width: 1503px;">
                                <div class="item-slick3 slick-slide slick-current slick-active"
                                     data-thumb="images/thumb-item-01.jpg" data-slick-index="0" aria-hidden="false"
                                     tabindex="0" role="tabpanel" id="slick-slide10"
                                     aria-describedby="slick-slide-control10"
                                     style="width: 501px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                    <div class="wrap-pic-w">
                                        <img src="<?php echo e(asset('public/images/products')); ?>/<?php echo $product['image']; ?> "
                                             alt="IMG-PRODUCT">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    <?php echo e($product['name']); ?>

                </h4>

                <span class="m-text17">
					<?php echo e(number_format($product['price'])); ?> VND
				</span>

                <p class="s-text8 p-t-10">
                    <!--                Giày đẹp-->
                </p>

                <!--  -->
                <div class="p-t-33 p-b-60">
                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">

                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input id="quantity" class="size8 m-text18 t-center num-product quantity-button"
                                       type="number" name="quantity"
                                       value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>

                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                <!-- Button -->
                                <button id="<?php echo e($product['id']); ?>" type="submit"
                                        class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 addcart">
									Add to Cart
								</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-b-45">
                    <span class="s-text8">Số lượng: <?php echo e($product['quantity']); ?></span>
                </div>
                <div class="p-b-45">
                    <span class="s-text8">Loại hàng:
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($category['name']); ?> ,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($sub_category['sub_name']); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </span>
                </div>

                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Mô tả sản phẩm
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            <?php echo $product['description']; ?>

                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Nhật xét
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <?php if($ratings != null): ?>
                            <p class="s-text8">
                                <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="m-text22 w-size14 w-full-sm">
						<?php echo e($rating->name); ?> :
					</span>
                                    <span class="m-text21 w-size20 w-full-sm">
                                    <?php echo e($rating->status); ?> ( <?php echo e($rating->created_at); ?> )
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </p>
                        <?php endif; ?>
                        <p class="s-text8">
                        <?php if(Auth::user() != null): ?>
                            <form action="<?php echo route('comment.product', $product['id']); ?>" method="post">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20"
                                          name="status" placeholder="Nội dung"></textarea>
                                <div class="w-size25">
                                    <!-- Button -->
                                    <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Bình luận
							</button>
                                </div>
                            </form>
                        <?php else: ?>
                            Vui lòng đăng nhập để bình luận sản phẩm
                            <?php endif; ?>
                            </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Reviews (0)
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel
                            sed
                            velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/pages/product.blade.php ENDPATH**/ ?>