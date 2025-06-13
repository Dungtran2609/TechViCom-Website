

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Thương hiệu</h1>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('admin.brands.trashed')); ?>" class="btn btn-danger">
                <i class="fas fa-trash"></i> Thùng rác
            </a>
            <a href="<?php echo e(route('admin.brands.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Thêm thương hiệu
            </a>
        </div>
    </div>

    <form method="GET" action="<?php echo e(route('admin.brands.index')); ?>" class="mb-4 d-flex gap-2">
        <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="form-control w-25" placeholder="Tìm thương hiệu...">
        <button type="submit" class="btn btn-outline-primary">Tìm kiếm</button>
    </form>

    <?php if(request()->has('search')): ?>
        <div class="mb-4">
            <a href="<?php echo e(route('admin.brands.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-list"></i> Quay lại danh sách đầy đủ
            </a>
        </div>
    <?php endif; ?>

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
                            <th>STT</th>
                            <th>Tên thương hiệu</th>
                            <th>Mô tả</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Chuỗi ký tự</th>
                            <th width="200px">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($stt++); ?></td>
                                <td>
                                    <p class="text-dark fw-medium fs-15 mb-0"><?php echo e($brand->name); ?></p>
                                </td>
                                <td><?php echo e($brand->description ?? 'Không có mô tả'); ?></td>
                                <td>
                                    <?php if($brand->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $brand->image)); ?>" width="50" alt="Hình ảnh thương hiệu">
                                    <?php else: ?>
                                        <span class="text-muted">Không có hình ảnh</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-<?php echo e($brand->status ? 'success' : 'secondary'); ?>">
                                        <?php echo e($brand->status ? 'Hiển thị' : 'Ẩn'); ?>

                                    </span>
                                </td>
                                <td><?php echo e($brand->slug); ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo e(route('admin.brands.show', $brand)); ?>" class="btn btn-light btn-sm" title="Xem chi tiết">
                                            <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                        </a>
                                        <a href="<?php echo e(route('admin.brands.edit', $brand)); ?>" class="btn btn-soft-primary btn-sm" title="Chỉnh sửa">
                                            <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                        </a>
                                        <form action="<?php echo e(route('admin.brands.destroy', $brand)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-soft-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xoá thương hiệu này?')" title="Xoá">
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
                    <?php if($brands->hasPages()): ?> <!-- Kiểm tra xem có phân trang không -->
                        <?php echo e($brands->links('pagination::bootstrap-5')); ?>

                    <?php else: ?>
                        <p class="text-muted">Không đủ dữ liệu để hiển thị phân trang.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TechViCom_Website_BE\resources\views/admin/brands/listBrands.blade.php ENDPATH**/ ?>