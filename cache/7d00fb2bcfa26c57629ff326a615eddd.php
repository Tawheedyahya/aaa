<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($project ? 'Edit: ' . $project['title'] : 'New Project'); ?> | Admin</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>
<body>
    <div class="admin-wrap">
        <aside class="admin-sidebar">
            <div class="admin-sidebar__brand">AAA LED Admin</div>
            <nav class="admin-sidebar__nav">
                <a href="/admin/projects" class="admin-sidebar__link admin-sidebar__link--active">Projects</a>
                <a href="/" class="admin-sidebar__link" target="_blank">View Site</a>
            </nav>
        </aside>

        <main class="admin-main">
            <header class="admin-header">
                <h1 class="admin-header__title"><?php echo e($project ? 'Edit Project' : 'New Project'); ?></h1>
                <a href="/admin/projects" class="admin-btn admin-btn--ghost">&larr; Back</a>
            </header>

            <?php if(isset($_GET['saved'])): ?>
                <div class="admin-alert admin-alert--success">Project saved successfully.</div>
            <?php endif; ?>

            
            <form method="POST" action="<?php echo e($project ? '/admin/projects/edit/' . $project['id'] : '/admin/projects/store'); ?>" enctype="multipart/form-data" class="admin-form">

                <div class="admin-form__grid">
                    <div class="admin-form__field">
                        <label class="admin-form__label">Title</label>
                        <input type="text" name="title" class="admin-form__input" value="<?php echo e($project['title'] ?? ''); ?>" required>
                    </div>

                    <div class="admin-form__field">
                        <label class="admin-form__label">Category</label>
                        <select name="category" class="admin-form__input">
                            <option value="Hospital" <?php echo e(isset($project) && $project['category'] === 'Hospital' ? 'selected' : ''); ?>>Hospital</option>
                            <option value="Retail" <?php echo e(isset($project) && $project['category'] === 'Retail' ? 'selected' : ''); ?>>Retail</option>
                            <option value="Corporate" <?php echo e(isset($project) && $project['category'] === 'Corporate' ? 'selected' : ''); ?>>Corporate</option>
                            <option value="Government" <?php echo e(isset($project) && $project['category'] === 'Government' ? 'selected' : ''); ?>>Government</option>
                            <option value="Outdoor" <?php echo e(isset($project) && $project['category'] === 'Outdoor' ? 'selected' : ''); ?>>Outdoor</option>
                            <option value="General" <?php echo e(isset($project) && $project['category'] === 'General' ? 'selected' : ''); ?>>General</option>
                        </select>
                    </div>

                    <div class="admin-form__field">
                        <label class="admin-form__label">Location</label>
                        <input type="text" name="location" class="admin-form__input" value="<?php echo e($project['location'] ?? ''); ?>">
                    </div>

                    <div class="admin-form__field">
                        <label class="admin-form__label">Date</label>
                        <input type="date" name="date" class="admin-form__input" value="<?php echo e($project['date'] ?? date('Y-m-d')); ?>">
                    </div>

                    <div class="admin-form__field">
                        <label class="admin-form__label">Short Description</label>
                        <textarea name="short_description" class="admin-form__textarea" rows="3"><?php echo e($project['short_description'] ?? ''); ?></textarea>
                    </div>

                    <div class="admin-form__field">
                        <label class="admin-form__label">Show Ad</label>
                        <label class="admin-form__checkbox">
                            <input type="hidden" name="ad" value="0">
                            <input type="checkbox" name="ad" value="1" <?php echo e(isset($project) && $project['ad'] ? 'checked' : ''); ?>>
                            <span>Display advertisement slot on this project page</span>
                        </label>
                    </div>
                </div>

                <div class="admin-form__field">
                    <label class="admin-form__label">Description</label>
                    <textarea name="description" class="admin-form__textarea admin-form__textarea--lg" rows="12"><?php echo e($project['description'] ?? ''); ?></textarea>
                </div>

                
                <?php if($project && count($project['images']) > 0): ?>
                    <div class="admin-form__field">
                        <label class="admin-form__label">Current Images</label>
                        <div class="admin-image-grid">
                            <?php $__currentLoopData = $project['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="admin-image-item">
                                    <img src="<?php echo e(asset('assets/projects/' . $img)); ?>" alt="">
                                    
                                    <button type="submit"
                                            form="delete-img-<?php echo e($loop->index); ?>"
                                            class="admin-image-item__remove"
                                            onclick="return confirm('Remove this image?')"
                                            title="Remove image">&times;</button>
                                    <span class="admin-image-item__name"><?php echo e($img); ?></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                
                <div class="admin-form__field">
                    <label class="admin-form__label">Add Images</label>
                    <div class="admin-file-upload">
                        <input type="file" name="images[]" multiple accept="image/jpeg,image/png,image/gif,image/webp" id="imageInput">
                        <label for="imageInput" class="admin-file-upload__label">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                            Choose Images
                        </label>
                        <div id="filePreview" class="admin-file-preview"></div>
                    </div>
                    <p class="admin-form__hint">Accepted: JPG, PNG, GIF, WebP. Images are auto-converted to WebP on upload.</p>
                </div>

                <div class="admin-form__actions">
                    <button type="submit" class="admin-btn admin-btn--primary admin-btn--lg"><?php echo e($project ? 'Save Changes' : 'Create Project'); ?></button>
                    <a href="/admin/projects" class="admin-btn admin-btn--ghost">Cancel</a>
                </div>
            </form>
            

            
            <?php if($project && count($project['images']) > 0): ?>
                <?php $__currentLoopData = $project['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form method="POST" action="/admin/projects/delete-image/<?php echo e($project['id']); ?>" id="delete-img-<?php echo e($loop->index); ?>" style="display:none;">
                        <input type="hidden" name="image" value="<?php echo e($img); ?>">
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </main>
    </div>

    <script>
        document.getElementById('imageInput')?.addEventListener('change', function(e) {
            var preview = document.getElementById('filePreview');
            preview.innerHTML = '';
            for (var i = 0; i < e.target.files.length; i++) {
                (function(file) {
                    var div = document.createElement('div');
                    div.className = 'admin-file-preview__item';
                    if (file.type.startsWith('image/')) {
                        var reader = new FileReader();
                        reader.onload = function(ev) {
                            var img = document.createElement('img');
                            img.src = ev.target.result;
                            div.prepend(img);
                        };
                        reader.readAsDataURL(file);
                    }
                    var name = document.createElement('span');
                    name.textContent = file.name;
                    div.appendChild(name);
                    preview.appendChild(div);
                })(e.target.files[i]);
            }
        });
    </script>
</body>
</html><?php /**PATH /home/yahi/freelance/aaa/views/admin/project-edit.blade.php ENDPATH**/ ?>