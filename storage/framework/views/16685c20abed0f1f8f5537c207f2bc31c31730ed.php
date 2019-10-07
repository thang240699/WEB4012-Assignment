<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose">
                            <h4 class="card-title ">DANH MỤC</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"><span class="check"></span></span></label>
                                                </div>
                                            </th>
                                            <th><?php echo e($category['id']); ?></th>
                                            <th><?php echo e($category['name']); ?></th>
                                            <th><?php echo e($category['image']); ?></th>
                                            <th class="td-actions text-right">
                                                <a href="<?php echo e(URL::route('categories.update',$category['id'])); ?>">
                                                    <button type="button" rel="tooltip" title="" class="btn btn-success"
                                                            data-original-title="Sửa">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </a>
                                                <a onclick="return checkDelete('Bạn có chắn là muốn xoá không?')"
                                                   href="<?php echo e(URL::route('categories.delete',$category['id'])); ?>">
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
                                <a class="btn btn-danger" href="add">
                                    Thêm danh mục
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/admin/pages/categories/view.blade.php ENDPATH**/ ?>