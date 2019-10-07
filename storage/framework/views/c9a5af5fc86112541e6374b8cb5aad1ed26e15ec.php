<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose">
                            <h4 class="card-title ">THÊM DANH MỤC CON</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo route('sub-categories.insert'); ?>" enctype="multipart/form-data"
                                  method="post">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Mã danh mục (Tự tăng)</label>
                                    <input type="text" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Danh mục cha</label>
                                    <select class="form-control selectpicker" data-style="btn btn-link"
                                            id="exampleFormControlSelect1" name="category_id">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category['id']); ?>">
                                                <?php echo e($category['name']); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tên danh mục</label>
                                    <input name="sub_name" type="text" class="form-control">
                                </div>
                                <?php if(count($errors) > 0): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <button type="submit" class="btn btn-danger">Thêm</button>
                            </form>
                            <a class="nav-link" href="view">
                                <button type="button" class="btn btn-danger">Danh sách danh mục</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/admin/pages/subcategories/insert.blade.php ENDPATH**/ ?>