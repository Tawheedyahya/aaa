<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vending Orders | AAA LED</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
    <style>
        .vending-main { max-width: 1440px; }
        .vending-form { margin-bottom: 28px; }
        .vending-id { font-size: 12px; color: #64748b; word-break: break-all; }
        .vending-status { white-space: nowrap; }
        .vending-actions { display: flex; align-items: center; gap: 8px; }
        @media (max-width: 768px) {
            .admin-sidebar { width: 180px; }
            .admin-main { padding: 24px 16px; }
            .admin-form { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="admin-wrap">
        <aside class="admin-sidebar">
            <div class="admin-sidebar__brand">Vending Admin</div>
            <nav class="admin-sidebar__nav">
                <a href="/vending" class="admin-sidebar__link admin-sidebar__link--active">Orders</a>
                <a href="/" class="admin-sidebar__link">View Site</a>
            </nav>
        </aside>

        <main class="admin-main vending-main">
            <header class="admin-header">
                <h1 class="admin-header__title">Vending orders</h1>
                <?php if($order): ?>
                    <a href="/vending" class="admin-btn admin-btn--ghost">Cancel editing</a>
                <?php else: ?>
                    <a href="#order-form" class="admin-btn admin-btn--primary">+ New order</a>
                <?php endif; ?>
            </header>

            <?php if(isset($_GET['created'])): ?>
                <div class="admin-alert admin-alert--success">Order created successfully.</div>
            <?php elseif(isset($_GET['updated'])): ?>
                <div class="admin-alert admin-alert--success">Order updated successfully.</div>
            <?php elseif(isset($_GET['deleted'])): ?>
                <div class="admin-alert admin-alert--success">Order deleted successfully.</div>
            <?php endif; ?>

            <?php if($error): ?>
                <div class="admin-alert admin-alert--error"><?php echo e($error); ?></div>
            <?php endif; ?>

            <form
                id="order-form"
                method="POST"
                action="<?php echo e($order && isset($order['id']) ? '/vending/' . $order['id'] . '/edit' : '/vending/create'); ?>"
                class="admin-form vending-form"
            >
                <h2 class="admin-header__title" style="font-size: 18px; margin-bottom: 20px;">
                    <?php echo e($order && isset($order['id']) ? 'Edit order' : 'Create order'); ?>

                </h2>
                <div class="admin-form__grid">
                    <div class="admin-form__field">
                        <label class="admin-form__label" for="product_name">Product name</label>
                        <input
                            id="product_name"
                            name="product_name"
                            class="admin-form__input"
                            type="text"
                            maxlength="100"
                            value="<?php echo e($order['product_name'] ?? 'protein_powder'); ?>"
                            required
                        >
                    </div>
                    <div class="admin-form__field">
                        <label class="admin-form__label" for="gram">Serving size</label>
                        <select id="gram" name="gram" class="admin-form__input" required>
                            <option value="">Choose grams</option>
                            <option value="30" <?php echo e(isset($order['gram']) && (int) $order['gram'] === 30 ? 'selected' : ''); ?>>30 grams</option>
                            <option value="60" <?php echo e(isset($order['gram']) && (int) $order['gram'] === 60 ? 'selected' : ''); ?>>60 grams</option>
                            <option value="90" <?php echo e(isset($order['gram']) && (int) $order['gram'] === 90 ? 'selected' : ''); ?>>90 grams</option>
                        </select>
                    </div>
                    <div class="admin-form__field">
                        <label class="admin-form__label" for="status">Status</label>
                        <select id="status" name="status" class="admin-form__input">
                            <option value="not_dispense" <?php echo e(($order['status'] ?? 'not_dispense') === 'not_dispense' ? 'selected' : ''); ?>>Not dispensed</option>
                            <option value="dispense" <?php echo e(($order['status'] ?? 'not_dispense') === 'dispense' ? 'selected' : ''); ?>>Dispensed</option>
                        </select>
                    </div>
                    <div class="admin-form__field">
                        <label class="admin-form__label">Completion</label>
                        <label class="admin-form__checkbox">
                            <input type="hidden" name="done" value="0">
                            <input type="checkbox" name="done" value="1" <?php echo e(!empty($order['done']) ? 'checked' : ''); ?>>
                            <span>Order is done</span>
                        </label>
                    </div>
                </div>
                <div class="admin-form__actions">
                    <button type="submit" class="admin-btn admin-btn--primary">
                        <?php echo e($order && isset($order['id']) ? 'Save changes' : 'Create order'); ?>

                    </button>
                    <?php if($order && isset($order['id'])): ?>
                        <a href="/vending" class="admin-btn admin-btn--ghost">Cancel</a>
                    <?php endif; ?>
                </div>
            </form>

            <?php if(count($orders) === 0): ?>
                <div class="admin-empty">
                    <p>No orders yet. Create your first order above.</p>
                </div>
            <?php else: ?>
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID / Order ID</th>
                                <th>Product</th>
                                <th>Grams</th>
                                <th>Status</th>
                                <th>Done</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        #<?php echo e($item['id']); ?><br>
                                        <span class="vending-id"><?php echo e($item['order_id']); ?></span>
                                    </td>
                                    <td class="admin-table__title"><?php echo e($item['product_name']); ?></td>
                                    <td><?php echo e($item['gram']); ?> g</td>
                                    <td>
                                        <span class="admin-badge vending-status">
                                            <?php echo e($item['status'] === 'dispense' ? 'Dispensed' : 'Not dispensed'); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e((int) $item['done'] === 1 ? 'Yes' : 'No'); ?></td>
                                    <td><?php echo e($item['created_at']); ?></td>
                                    <td>
                                        <div class="vending-actions">
                                            <a href="/vending/<?php echo e($item['id']); ?>/edit" class="admin-btn admin-btn--sm">Edit</a>
                                            <form method="POST" action="/vending/<?php echo e($item['id']); ?>/delete" onsubmit="return confirm('Delete this order?')">
                                                <button type="submit" class="admin-btn admin-btn--sm admin-btn--danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH /home/yahi/freelance/aaa/views/vending/orders.blade.php ENDPATH**/ ?>