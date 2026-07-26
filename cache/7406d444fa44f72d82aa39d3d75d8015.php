<?php $__env->startSection('page_title', 'Home'); ?>
<?php $__env->startSection('meta_description', 'We provide LED board manufacturing and installation services in Coimbatore for hospitals, clinics, shops, and businesses, with reliable service across India.'); ?>
<?php $__env->startSection('meta_keywords', 'LED board maker Coimbatore, LED display board maker, hospital LED board, Apollo LED board, medical sign board, shop board maker, outdoor LED signage, LED board service India'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="../public/assets/css/home.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="hero" aria-labelledby="hero-title">
        <video class="hero__video" poster="../public/assets/img/hero-poster.jpg" autoplay loop muted playsinline preload="metadata" aria-hidden="true">
            <!-- <source src="../public/assets/static_video/hero_banner_video.webm" type="video/webm"> -->
            <source src="../public/assets/static_video/hero_banner_video.mp4" type="video/mp4">
            <track kind="captions" src="../public/assets/static_video/empty.vtt" srclang="en" label="No speech content">
        </video>

        <div class="hero__overlay" aria-hidden="true"></div>

        <div class="hero__content">
            <span class="hero__eyebrow">Coimbatore &middot; Pan-India Service</span>
            <h1 id="hero-title" class="hero__title">AAA LED</h1>
            <p class="hero__text">
                We create high-quality LED display boards, signboards, and indoor-outdoor signage
                for hospitals, clinics, shops, and commercial spaces across Coimbatore and all over India.
            </p>
            <div class="hero__cta">
                <a href="#" class="btn btn--primary">View Our Work</a>
                <a href="#" class="btn btn--ghost">Get a Free Quote</a>
            </div>
        </div>

        <div class="hero__scroll" aria-hidden="true">
            <span class="hero__scroll-dot"></span>
        </div>
    </section>

    
    <section class="trust-strip reveal" aria-label="Why clients trust AAA LED">
        <div class="trust-strip__inner">
            <div class="trust-strip__item">
                <span class="trust-strip__num">1+</span>
                <span class="trust-strip__label">Years Experience</span>
            </div>
            <div class="trust-strip__item">
                <span class="trust-strip__num">500+</span>
                <span class="trust-strip__label">Boards Installed</span>
            </div>
            <div class="trust-strip__item">
                <span class="trust-strip__num">100+</span>
                <span class="trust-strip__label">Govt Organizations Served</span>
            </div>
            <div class="trust-strip__item">
                <span class="trust-strip__num">24/7</span>
                <span class="trust-strip__label">Pan-India Support</span>
            </div>
        </div>
    </section>

    
    <section class="about-preview" aria-labelledby="about-title">
        <div class="section-inner about-preview__grid">
            <div class="about-preview__media reveal reveal--left">
                <picture>
                    <source
                        srcset="
                            ../public/assets/static_images/home-480.webp 480w,
                            ../public/assets/static_images/home-768.webp 768w,
                            ../public/assets/static_images/home-1200.webp 1200w"
                        sizes="(max-width: 768px) 100vw,
                            (max-width: 1200px) 50vw,
                            450px"
                        type="image/webp">

                    <img
                        src="../public/assets/static_images/home-768.webp"
                        alt="AAA LED team installing an LED signboard at a hospital in Coimbatore"
                        loading="lazy"
                        width="450"
                        height="800">
                </picture>
                <div class="about-preview__badge">
                    <strong>1+</strong>
                    <span>Years of Craft</span>
                </div>
            </div>

            <div class="about-preview__content reveal reveal--right">
                <span class="section-eyebrow">Who We Are</span>
                <h2 id="about-title" class="section-title"> Trusted LED Board Manufacturer</h2>
                <p class="section-text">
                    AAA LED designs, manufactures, and installs premium LED display boards and signage
                    for hospitals, clinics, retail stores, and commercial establishments. From concept to
                    installation, we deliver durable, energy-efficient signage built to perform in Indian
                    weather conditions &mdash; on time, every time.
                </p>
                <ul class="check-list">
                    <li>In-house design &amp; fabrication</li>
                    <li>Weatherproof outdoor LED signage</li>
                    <li>Custom indoor display boards</li>
                    <li>Pan-India installation &amp; support</li>
                </ul>
                <a href="#" class="link-arrow">Learn more about us &rarr;</a>
            </div>
        </div>
    </section>

    
    <section class="services" aria-labelledby="services-title">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-eyebrow">What We Do</span>
                <h2 id="services-title" class="section-title">Our LED Signage Services</h2>
                <p class="section-text">
                    Tailored LED and signboard solutions for every industry &mdash; from hospital wayfinding
                    to eye-catching retail storefronts.
                </p>
            </div>
            <?php
                $whatWeDo = include dirname(__DIR__) . '/views/data/what_we_do.blade.php';
            ?>
            <div class="services__grid">
                <?php foreach ($whatWeDo as $service): ?>
                    <article class="service-card reveal">
                        <div class="service-card__icon" aria-hidden="true">
                            <img src="../public/assets/svg/<?= htmlspecialchars($service['icon']) ?>"
                                    alt=""
                                    loading="lazy"
                                    width="48"
                                    height="48">
                        </div>
                        <h3 class="service-card__title"><?= htmlspecialchars($service['title']) ?></h3>
                        <p class="service-card__text"><?= htmlspecialchars($service['text']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    
    <!-- <section class="projects-preview" aria-labelledby="projects-title">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-eyebrow">Our Work</span>
                <h2 id="projects-title" class="section-title">Recent Projects</h2>
            </div>

            <div class="projects-preview__grid">
                <a href="#" class="project-card reveal">
                    <img src="../public/assets/img/projects/project-1.jpg" alt="LED signboard installed at a hospital entrance in Coimbatore" loading="lazy" width="500" height="360">
                    <div class="project-card__overlay">
                        <h3>Apollo Clinic Signage</h3>
                        <span>Hospital &middot; Coimbatore</span>
                    </div>
                </a>
                <a href="#" class="project-card reveal">
                    <img src="../public/assets/img/projects/project-2.jpg" alt="Outdoor LED display board on a retail storefront" loading="lazy" width="500" height="360">
                    <div class="project-card__overlay">
                        <h3>Retail Storefront Display</h3>
                        <span>Retail &middot; Coimbatore</span>
                    </div>
                </a>
                <a href="#" class="project-card reveal">
                    <img src="../public/assets/img/projects/project-3.jpg" alt="Indoor LED reception board for a corporate office" loading="lazy" width="500" height="360">
                    <div class="project-card__overlay">
                        <h3>Corporate Reception Board</h3>
                        <span>Corporate &middot; Chennai</span>
                    </div>
                </a>
            </div>

            <div class="section-cta reveal">
                <a href="#" class="btn btn--primary">View All Projects</a>
            </div>
        </div>
    </section> -->

    
    <section class="why-us" aria-labelledby="why-us-title">
        <div class="section-inner why-us__grid">
            <div class="reveal reveal--left">
                <span class="section-eyebrow">Why AAA LED</span>
                <h2 id="why-us-title" class="section-title">Built for Reliability, Designed to Impress</h2>
                <p class="section-text">
                    We combine engineering precision with creative design, so every board we deliver
                    looks great and keeps working for years.
                </p>
            </div>

            <div class="why-us__list reveal reveal--right">
                <div class="why-us__item">
                    <span class="why-us__num">01</span>
                    <div>
                        <h3>Quality Materials</h3>
                        <p>Premium LEDs and weatherproof components for long-lasting performance.</p>
                    </div>
                </div>
                <div class="why-us__item">
                    <span class="why-us__num">02</span>
                    <div>
                        <h3>On-Time Delivery</h3>
                        <p>Streamlined manufacturing and installation process with no delays.</p>
                    </div>
                </div>
                <div class="why-us__item">
                    <span class="why-us__num">03</span>
                    <div>
                        <h3>Pan-India Service</h3>
                        <p>From Coimbatore to anywhere in India &mdash; we install and support nationwide.</p>
                    </div>
                </div>
                <div class="why-us__item">
                    <span class="why-us__num">04</span>
                    <div>
                        <h3>Trusted by Hospitals</h3>
                        <p>Preferred vendor for hospital and clinic signage including Apollo network sites.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="testimonials" aria-labelledby="testimonials-title">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-eyebrow">Client Stories</span>
                <h2 id="testimonials-title" class="section-title">What Our Clients Say</h2>
            </div>

            <?php
                $testimonials = include dirname(__DIR__) . '/views/data/testimonials.blade.php';
            ?>
            <div class="testimonials__grid">
                <?php foreach ($testimonials as $t): ?>
                    <blockquote class="testimonial-card reveal">
                        <p>&ldquo;<?= htmlspecialchars($t['quote']) ?>&rdquo;</p>
                        <footer>
                            <img src="../public/assets/img/avatars/<?= htmlspecialchars($t['avatar']) ?>" alt="" loading="lazy" width="48" height="48">
                            <div>
                                <cite><?= htmlspecialchars($t['name']) ?></cite>
                                <span><?= htmlspecialchars($t['role']) ?></span>
                            </div>
                        </footer>
                    </blockquote>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    
    <section class="cta-band" aria-labelledby="cta-title">
        <div class="cta-band__glow" aria-hidden="true"></div>
        <div class="section-inner cta-band__inner reveal">
            <h2 id="cta-title" class="cta-band__title">Ready to Light Up Your Space?</h2>
            <p class="cta-band__text">Get a free consultation and quote for your LED signage project today.</p>
            <div class="hero__cta">
                <a href="#" class="btn btn--primary">Contact Us</a>
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/yahi/freelance/aaa/views/home.blade.php ENDPATH**/ ?>