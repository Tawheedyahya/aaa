<?php $__env->startSection('page_title', $project['title'] . ' | AAA LED Projects'); ?>
<?php $__env->startSection('meta_description', \Illuminate\Support\Str::limit(strip_tags($project['description']), 160)); ?>
<?php $__env->startSection('meta_keywords', implode(', ', [$project['category'] . ' LED signage', $project['location'] . ' LED board', 'LED display installation', 'AAA LED project'])); ?>
<?php $__env->startSection('og_title', $project['title'] . ' | AAA LED'); ?>
<?php $__env->startSection('og_description', \Illuminate\Support\Str::limit(strip_tags($project['short_description']), 200)); ?>
<?php $__env->startSection('og_image', asset('assets/projects/' . $project['images'][0])); ?>
<?php $__env->startSection('canonical', url('projects/' . $project['id'])); ?>
<?php $__env->startSection('robots', 'index, follow'); ?>

<?php $__env->startPush('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/projects.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "BlogPosting",
            "@id": "<?php echo e(url('projects/' . $project['id'])); ?>#post",
            "url": "<?php echo e(url('projects/' . $project['id'])); ?>",
            "headline": "<?php echo e($project['title']); ?>",
            "description": "<?php echo e(\Illuminate\Support\Str::limit(strip_tags($project['short_description']), 200)); ?>",
            "image": <?php echo e(json_encode(array_map(function($img) {
                return asset('assets/projects/' . $img);
            }, $project['images']))); ?>,
            "datePublished": "<?php echo e($project['date']); ?>",
            "author": {
                "@type": "Organization",
                "name": "AAA LED"
            },
            "publisher": {
                "@type": "Organization",
                "name": "AAA LED",
                "logo": {
                    "@type": "ImageObject",
                    "url": "<?php echo e(asset('assets/static_images/logo.jpeg')); ?>"
                }
            },
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "<?php echo e(url('projects/' . $project['id'])); ?>"
            }
        },
        {
            "@type": "BreadcrumbList",
            "@id": "<?php echo e(url('projects/' . $project['id'])); ?>#breadcrumb",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo e(url('/')); ?>"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Projects",
                    "item": "<?php echo e(url('projects')); ?>"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "<?php echo e($project['title']); ?>",
                    "item": "<?php echo e(url('projects/' . $project['id'])); ?>"
                }
            ]
        }
    ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <article class="project-single" aria-labelledby="project-title">

        <div class="section-inner">

            <nav class="breadcrumb reveal" aria-label="Breadcrumb">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="/projects">Projects</a></li>
                    <li aria-current="page"><?php echo e($project['title']); ?></li>
                </ol>
            </nav>

            <a href="/projects" class="project-single__back reveal">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Back to Projects
            </a>

            <header class="project-single__header reveal">
                <?php if(!empty($project['category'])): ?>
                    <span class="project-single__category"><?php echo e($project['category']); ?></span>
                <?php endif; ?>
                <h1 id="project-title" class="project-single__title"><?php echo e($project['title']); ?></h1>
                <div class="project-single__meta">
                    <?php if(!empty($project['location'])): ?>
                        <span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 4px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                            <?php echo e($project['location']); ?>

                        </span>
                    <?php endif; ?>
                    <?php if(!empty($project['date'])): ?>
                        <span>
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: middle; margin-right: 4px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            <?php echo e(\Carbon\Carbon::parse($project['date'])->format('F j, Y')); ?>

                        </span>
                    <?php endif; ?>
                </div>
            </header>

            
            <?php if(!empty($project['images'])): ?>
                <div class="project-single__gallery <?php echo e(count($project['images']) === 1 ? 'project-single__gallery--single' : ''); ?> reveal">
                    <?php $__currentLoopData = $project['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img
                            src="<?php echo e(asset('assets/projects/' . $image)); ?>"
                            alt="<?php echo e($project['title']); ?> - Image <?php echo e($loop->iteration); ?>"
                            loading="<?php echo e($loop->first ? 'eager' : 'lazy'); ?>"
                            width="800"
                            height="600">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            
            <div class="project-single__description reveal">
                <h2>Project Details</h2>
                <?php
                    $paragraphs = explode("\n\n", trim($project['description']));
                ?>
                <?php $__currentLoopData = $paragraphs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $para): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e(trim($para)); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <!-- <?php if(!empty($project['ad'])): ?>
                <div class="project-single__ad reveal">
                    <span class="project-single__ad-label">Advertisement</span>
                    <div class="project-single__ad-slot">
                        [ Ad Space — 728×90 or native ad ]
                    </div>
                </div>
            <?php endif; ?> -->

            
            <div class="project-single__cta reveal">
                <div class="hero__cta">
                    <a href="/contact" class="btn btn--primary">Start a Similar Project</a>
                    <a href="/projects" class="btn btn--ghost">View All Projects</a>
                </div>
            </div>

        </div>
    </article>

    
    <section class="cta-band" aria-labelledby="single-cta-title">
        <div class="cta-band__glow" aria-hidden="true"></div>
        <div class="section-inner cta-band__inner reveal">
            <h2 id="single-cta-title" class="cta-band__title">Need Custom LED Signage?</h2>
            <p class="cta-band__text">Get in touch for a free consultation and quote tailored to your project.</p>
            <div class="hero__cta">
                <a href="/contact" class="btn btn--primary">Contact Us</a>
                <a href="tel:+910000000000" class="btn btn--ghost">Call Now</a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var reveals = document.querySelectorAll('.reveal');
            if (!('IntersectionObserver' in window)) {
                reveals.forEach(function (el) { el.classList.add('is-visible'); });
                return;
            }
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
            reveals.forEach(function (el) { observer.observe(el); });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/yahi/freelance/aaa/views/project-single.blade.php ENDPATH**/ ?>