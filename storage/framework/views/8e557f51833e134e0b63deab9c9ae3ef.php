

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Thùng rác thương hiệu</h1>
            <a href="<?php echo e(route('admin.brands.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Trở về danh sách thương hiệu
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-body">
                <?php if($brands->count() > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên thương hiệu</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày xoá</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($brand->brand_id); ?></td>
                                        <td><?php echo e($brand->name); ?></td>
                                        <td><?php echo e($brand->description ?? 'Không có mô tả'); ?></td>
                                        <td>
                                            <?php if($brand->image): ?>
                                                <img src="<?php echo e(asset('storage/' . $brand->image)); ?>" width="50"
                                                    alt="Hình ảnh thương hiệu">
                                            <?php else: ?>
                                                <span class="text-muted">Không có hình ảnh</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-<?php echo e($brand->status ? 'success' : 'secondary'); ?>">
                                                <?php echo e($brand->status ? 'Hiển thị' : 'Ẩn'); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($brand->deleted_at->format('d/m/Y H:i')); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('admin.brands.restore', $brand->brand_id)); ?>" method="POST"
                                                class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-sm btn-success"
                                                    onclick="return confirm('Bạn có chắc muốn khôi phục thương hiệu này không?')">
                                                    <i class="fas fa-undo"></i> Khôi phục
                                                </button>
                                            </form>
                                            <form action="<?php echo e(route('admin.brands.force-delete', $brand->brand_id)); ?>" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Bạn có chắc muốn xóa vĩnh viễn thương hiệu này không?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Xoá vĩnh viễn
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <?php echo e($brands->links('pagination::bootstrap-5')); ?>

                        </div>
                    </div>
                <?php else: ?>
                    <p class="text-muted">Không có thương hiệu nào trong thùng rác.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TechViCom_Website_BE\resources\views/admin/brands/trashedBrands.blade.php ENDPATH**/ ?>