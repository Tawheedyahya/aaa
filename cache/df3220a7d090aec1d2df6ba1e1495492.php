<?php $__env->startSection('page_title', 'Our Projects - LED Signage Portfolio'); ?>
<?php $__env->startSection('meta_description', 'Browse our portfolio of LED display board installations — hospital signage, retail storefronts, corporate displays, and outdoor billboards across India.'); ?>
<?php $__env->startSection('meta_keywords', 'LED board projects, LED signage portfolio, hospital LED board installation, shop LED board examples, outdoor LED display projects, LED signage Coimbatore'); ?>
<?php $__env->startSection('og_title', 'Our LED Signage Projects | AAA LED Portfolio'); ?>
<?php $__env->startSection('og_description', 'Real LED board installations for hospitals, retail stores, corporate offices, and outdoor displays across India. See our work.'); ?>

<?php $__env->startPush('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/projects.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "CollectionPage",
            "@id": "https://yourdomain.com/projects#webpage",
            "url": "https://yourdomain.com/projects",
            "name": "Our LED Signage Projects | AAA LED Portfolio",
            "description": "Browse our portfolio of LED display board installations — hospital signage, retail storefronts, corporate displays, and outdoor billboards across India.",
            "isPartOf": {
                "@id": "https://yourdomain.com#website"
            },
            "breadcrumb": {
                "@id": "https://yourdomain.com/projects#breadcrumb"
            }
        },
        {
            "@type": "BreadcrumbList",
            "@id": "https://yourdomain.com/projects#breadcrumb",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "https://yourdomain.com"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Projects",
                    "item": "https://yourdomain.com/projects"
                }
            ]
        }
    ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="projects-hero" aria-labelledby="projects-hero-title">
        <div class="projects-hero__glow" aria-hidden="true"></div>
        <div class="section-inner projects-hero__inner">
            <nav class="breadcrumb reveal" aria-label="Breadcrumb">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li aria-current="page">Projects</li>
                </ol>
            </nav>
            <span class="projects-hero__eyebrow reveal">Our Work</span>
            <h1 id="projects-hero-title" class="projects-hero__title reveal">
                LED Signage Projects &amp; Installations
            </h1>
            <p class="projects-hero__text reveal">
                From hospital wayfinding systems to eye-catching retail storefronts — explore real
                LED board installations we have designed, manufactured, and deployed across India.
            </p>
        </div>
    </section>

    
    <!-- <section class="ad-banner" aria-label="Advertisement">
        <div class="ad-banner__inner">
            <span class="ad-banner__label">Advertisement</span>
            <div class="ad-banner__slot">
                [ Ad Space — 728×90 or custom banner ]
            </div>
        </div>
    </section> -->

    
    <section class="projects-section" aria-labelledby="projects-title">
        <div class="section-inner">
            <div class="projects__grid">
                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <!-- <?php if($index > 0 && $index % 3 === 0): ?>
                        <article class="ad-card reveal" aria-label="Advertisement">
                            <span class="ad-card__label">Ad</span>
                            <div class="ad-card__slot">
                                [ Ad Space — 300×250 or custom ]
                            </div>
                        </article>
                    <?php endif; ?> -->

                    <a href="<?php echo e(url('projects/' . $project['id'])); ?>" class="project-card reveal">
                        <div class="project-card__media">
                            <img
                                src="<?php echo e(asset('assets/projects/' . $project['images'][0])); ?>"
                                alt="<?php echo e($project['title']); ?>"
                                loading="lazy"
                                width="400"
                                height="275">
                            <?php if(!empty($project['category'])): ?>
                                <span class="project-card__category"><?php echo e($project['category']); ?></span>
                            <?php endif; ?>
                            <?php if(count($project['images']) > 1): ?>
                                <span class="project-card__count">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                    <?php echo e(count($project['images'])); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="project-card__body">
                            <div class="project-card__meta">
                                <?php if(!empty($project['location'])): ?>
                                    <span class="project-card__meta-location">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                        <?php echo e($project['location']); ?>

                                    </span>
                                <?php endif; ?>
                                <?php if(!empty($project['date'])): ?>
                                    <span class="project-card__meta-date">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                        <?php echo e(\Carbon\Carbon::parse($project['date'])->format('M Y')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <h2 class="project-card__title"><?php echo e($project['title']); ?></h2>
                            <p class="project-card__text"><?php echo e($project['short_description']); ?></p>
                            <span class="project-card__link">
                                Read More
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                            </span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if(count($projects) === 0): ?>
                <div class="projects-empty">
                    <p>No projects published yet. Check back soon.</p>
                </div>
            <?php endif; ?>

            <div class="projects-footer reveal">
                <a href="/contact" class="btn btn--primary">Start Your Project</a>
            </div>
        </div>
    </section>

    
    <!-- <section class="ad-banner" aria-label="Advertisement">
        <div class="ad-banner__inner">
            <span class="ad-banner__label">Advertisement</span>
            <div class="ad-banner__slot">
                [ Ad Space — 728×90 or custom banner ]
            </div>
        </div>
    </section> -->

    
    <section class="cta-band" aria-labelledby="projects-cta-title">
        <div class="cta-band__glow" aria-hidden="true"></div>
        <div class="section-inner cta-band__inner reveal">
            <h2 id="projects-cta-title" class="cta-band__title">Have a Project in Mind?</h2>
            <p class="cta-band__text">Get in touch for a free consultation and quote for your LED signage needs.</p>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/yahi/freelance/aaa/views/projects.blade.php ENDPATH**/ ?>