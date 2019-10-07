<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h3 class="card-title">Sản phẩm: <b><?php echo e($product['name']); ?></b></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nội dung</th>
                                        <th>Ngày bình luận</th>
                                        <th>Người bình luận</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($detail->status); ?></td>
                                            <td><?php echo e($detail->created_at); ?></td>
                                            <td><?php echo e($detail->name); ?></td>
                                            <td class="td-actions text-right">
                                                <a href="<?php echo e(URL::route('ratings.delete', $detail->id)); ?>">
                                                    <button type="button" rel="tooltip" class="btn btn-info btn-round"
                                                            data-original-title="Xóa" title="">
                                                        <i class="material-icons">delete</i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/admin/pages/ratings/details.blade.php ENDPATH**/ ?>