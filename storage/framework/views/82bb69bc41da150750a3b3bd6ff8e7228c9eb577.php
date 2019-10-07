<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose">
                            <h4 class="card-title ">SẢN PHẨM</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Khuyến mãi</th>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"><span class="check"></span></span></label>
                                                </div>
                                            </th>
                                            <th><?php echo e($product['id']); ?></th>
                                            <th><?php echo e($product['name']); ?></th>
                                            <th><?php echo e(number_format($product['price'])); ?> VND</th>
                                            <th><?php echo e($product['quantity']); ?></th>
                                            <th><?php echo e($product['sale']); ?> %</th>
                                            <th class="td-actions text-right">
                                                <a href="<?php echo e(URL::route('products.update',$product['id'])); ?>">
                                                    <button type="button" rel="tooltip" title="" class="btn btn-success"
                                                            data-original-title="Sửa">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </a>
                                                <a onclick="return checkDelete('Bạn có chắn là muốn xoá không?')"
                                                   href="<?php echo e(URL::route('products.delete',$product['id'])); ?>">
                                                    <button type="button" rel="tooltip" title="" class="btn btn-danger"
                                                            data-original-title="Xoá">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </a>
                                            </th>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php echo e($products->links()); ?>

                                <a class="btn btn-danger" href="add">
                                    Thêm sản phẩm
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/admin/pages/products/view.blade.php ENDPATH**/ ?>