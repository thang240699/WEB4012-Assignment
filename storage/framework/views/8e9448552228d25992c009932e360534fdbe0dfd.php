<?php $__env->startSection('content'); ?>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-rose">
                            <h4 class="card-title ">SỬA SẢN PHẨM</h4>
                        </div>
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" method="post">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="form-group">
                                    <label>Mã khoá học (Tự tăng)</label>
                                    <input type="text" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tên danh mục cha</label>
                                    <select class="form-control selectpicker" data-style="btn btn-link"
                                            id="exampleFormControlSelect1" name="category_id">
                                        <option value="<?php echo e(old('category_id', isset($product) ? $product['category_id'] : null)); ?>"><?php echo e($category_id['name']); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category['id']); ?>"> <?php echo e($category['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên danh mục con</label>
                                    <select class="form-control selectpicker" data-style="btn btn-link"
                                            id="exampleFormControlSelect1" name="sub_category_id">
                                        <?php echo e(old('sub_category_id', isset($product) ? $product['sub_category_id'] : null)); ?>"><?php echo e($sub_category_id['sub_name']); ?>

                                        <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($sub['id']); ?>"> <?php echo e($sub['sub_name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tên Sản Phẩm</label>
                                    <input name="name" type="text" class="form-control"
                                           value="<?php echo e(old('name', isset($product) ? $product['name'] : null)); ?>">
                                </div>

                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input name="price" type="text" class="form-control"
                                           value="<?php echo e(old('price', isset($product) ? $product['price'] : null)); ?>">
                                </div>
                                <label>Hình ảnh: </label>
                                <input name="image" class="form-control" type="file">
                                <input type="hidden" name="name_img"
                                       value="<?php echo e(old('image', isset($product) ? $product['image'] : null)); ?>">
                                ( <?php echo e(old('name', isset($product) ? $product['name'] : null)); ?> )
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input name="quantity" type="text" class="form-control"
                                           value="<?php echo e(old('quantity', isset($product) ? $product['quantity'] : null)); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input name="sale" type="text" class="form-control"
                                           value="<?php echo e(old('sale', isset($product) ? $product['sale'] : null)); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <br>
                                    <textarea name="description" class="form-control"
                                              id="editor1"><?php echo e(old('description', isset($product) ? $product['description'] : null)); ?></textarea>
                                    <script src="<?php echo e(asset('public/ckeditor/ckeditor.js')); ?>"></script>
                                    <script> CKEDITOR.replace('editor1'); </script>
                                </div>
                                <button type="submit" class="btn btn-danger">Sửa sản phẩm</button>
                                <a href="<?php echo e(URL::route('products.view')); ?>"><button type="submit" class="btn btn-info">Hủy</button></a>
                            </form>
                            <a class="btn btn-danger" href="view">Danh sách khoá học</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Thangvvpd02424_WEB4012_Assignment\resources\views/admin/pages/products/update.blade.php ENDPATH**/ ?>