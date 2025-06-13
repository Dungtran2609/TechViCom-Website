

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Chi tiết thương hiệu</h1>
        <div>
            <a href="<?php echo e(route('admin.brands.edit', $brand)); ?>" class="btn btn-primary">
                <i class="fas fa-edit"></i> Sửa thương hiệu
            </a>
            <a href="<?php echo e(route('admin.brands.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Trở về trang danh sách
            </a>
        </div>
    </div>

    <div class="row">
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin cơ bản</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th style="width: 150px;">ID:</th>
                            <td><?php echo e($brand->brand_id); ?></td>
                        </tr>
                        <tr>
                            <th>Tên thương hiệu:</th>
                            <td><?php echo e($brand->name); ?></td>
                        </tr>
                        <tr>
                            <th>Chuỗi ký tự:</th>
                            <td><?php echo e($brand->slug); ?></td>
                        </tr>
                        <tr>
                            <th>Mô tả:</th>
                            <td><?php echo e($brand->description ?? 'Không có mô tả'); ?></td>
                        </tr>
                        <tr>
                            <th>Hình ảnh:</th>
                            <td>
                                <?php if($brand->image): ?>
                                    <a href="<?php echo e(asset('storage/' . $brand->image)); ?>" target="_blank">
                                        <img src="<?php echo e(asset('storage/' . $brand->image)); ?>" width="120" alt="Hình ảnh thương hiệu" class="img-thumbnail">
                                    </a>
                                    <small class="text-muted">(Nhấn để xem kích thước gốc)</small>
                                <?php else: ?>
                                    <span class="text-muted">Không có hình ảnh</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Trạng thái:</th>
                            <td>
                                <span class="badge bg-<?php echo e($brand->status ? 'success' : 'secondary'); ?>">
                                    <?php echo e($brand->status ? 'Hiển thị' : 'Ẩn'); ?>

                                </span>
                                <br>
                                <small class="text-muted">Cập nhật lần cuối: <?php echo e($brand->updated_at->format('d/m/Y H:i')); ?></small>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Thông tin thêm</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">Không có thông tin phụ thêm cho thương hiệu.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\TechViCom_Website_BE\resources\views/admin/brands/detailBrand.blade.php ENDPATH**/ ?>