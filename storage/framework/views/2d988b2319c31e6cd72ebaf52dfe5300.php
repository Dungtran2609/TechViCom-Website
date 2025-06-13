<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Thùng rác danh mục</h1>
        <a href="<?php echo e(route('admin.products.categories.index')); ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Trở về danh mục
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">
            <?php if($categories->count() > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Danh mục cha</th>
                                <th>Trạng thái</th>
                                <th>Ngày xoá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category->category_id); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($category->parent?->name ?? 'Không có'); ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo e($category->status ? 'success' : 'secondary'); ?>">
                                            <?php echo e($category->status ? 'Hiển thị' : 'Ẩn'); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e($category->deleted_at->format('d/m/Y H:i')); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.products.categories.restore', $category->category_id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-undo"></i> Khôi phục
                                            </button>
                                        </form>
                                        <form action="<?php echo e(route('admin.products.categories.force-delete', $category->category_id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Xoá vĩnh viễn?')">
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
                </div>
            <?php else: ?>
                <p class="text-muted">Không có danh mục nào trong thùng rác.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TechViCom_Website_BE\resources\views/admin/products/categories/trashed.blade.php ENDPATH**/ ?>