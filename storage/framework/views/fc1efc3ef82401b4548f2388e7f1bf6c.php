<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Danh mục sản phẩm</h1>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('admin.products.categories.trashed')); ?>" class="btn btn-danger">
            <i class="fas fa-trash"></i> Thùng rác
        </a>
        <a href="<?php echo e(route('admin.products.categories.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm danh mục
        </a>
    </div>
</div>

<form method="GET" action="<?php echo e(route('admin.products.categories.index')); ?>" class="mb-4 d-flex gap-2">
    <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control w-25" placeholder="Tìm danh mục...">
    <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
</form>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle table-hover table-centered">
                <thead class="bg-light-subtle">
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Chuỗi ký tự</th>
                        <th>Danh mục cấp trên</th>
                        <th width="200px">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($category->category_id); ?></td>
                            <td>
                                <p class="text-dark fw-medium fs-15 mb-0"><?php echo e($category->name); ?></p>
                            </td>
                            <td>
                                <?php if($category->image): ?>
                                    <div class="rounded bg-light avatar-md d-flex align-items-center justify-content-center">
                                        <img src="<?php echo e(asset('storage/' . $category->image)); ?>" alt="Image" class="avatar-md">
                                    </div>
                                <?php else: ?>
                                    Không có ảnh.
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge bg-<?php echo e($category->status ? 'success' : 'secondary'); ?>">
                                    <?php echo e($category->status ? 'Hiển thị' : 'Ẩn'); ?>

                                </span>
                            </td>
                            <td><?php echo e($category->slug); ?></td>
                            <td><?php echo e($category->parent ? $category->parent->name : 'Không có'); ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo e(route('admin.products.categories.show', $category)); ?>" class="btn btn-light btn-sm" title="Xem chi tiết">
                                        <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                    </a>
                                    <a href="<?php echo e(route('admin.products.categories.edit', $category)); ?>" class="btn btn-soft-primary btn-sm" title="Chỉnh sửa">
                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                    </a>
                                    <form action="<?php echo e(route('admin.products.categories.destroy', $category)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xoá danh mục này?')" title="Xoá">
                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="mt-3">
                <?php echo e($categories->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TechViCom_Website_BE\resources\views/admin/products/categories/index.blade.php ENDPATH**/ ?>