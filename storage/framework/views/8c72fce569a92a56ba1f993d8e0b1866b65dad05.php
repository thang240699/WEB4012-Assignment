<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose">
                            <h4 class="card-title ">Thành viên</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>Tên thành viên</th>
                                    <th>Địa chỉ email</th>
                                    <th>Vai trò</th>
                                    <th class="text-right">Actions</th>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($user['name']); ?></th>
                                            <th><?php echo e($user['email']); ?></th>
                                            <th>
                                                <?php if($user['role_id'] == null): ?>
                                                    Khách hàng
                                                <?php else: ?>
                                                    Admin
                                                <?php endif; ?>
                                            </th>
                                            <th class="td-actions text-right">
                                                <a href="<?php echo e(URL::route('users.update',$user['id'])); ?>">
                                                    <button type="button" rel="tooltip" title="" class="btn btn-success"
                                                            data-original-title="Sửa">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </a>
                                                <a onclick="return checkDelete('Bạn có chắn là muốn xoá không?')"
                                                   href="<?php echo e(URL::route('users.delete',$user['id'])); ?>">
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
                                    Thêm thành viên
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/admin/pages/users/view.blade.php ENDPATH**/ ?>