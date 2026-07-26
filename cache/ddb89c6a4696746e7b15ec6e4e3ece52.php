<?php $__env->startSection('page_title', 'About Us'); ?>
<?php $__env->startSection('meta_description', 'AAA LED is Coimbatore\'s trusted LED board manufacturer, delivering hospital signage, shop boards, and outdoor LED displays across India since our founding. Learn our story.'); ?>
<?php $__env->startSection('meta_keywords', 'about AAA LED, LED board manufacturer Coimbatore, LED signage company India, hospital LED board maker, LED display board factory Coimbatore'); ?>

<?php $__env->startSection('og_title', 'About AAA LED | Coimbatore\'s Trusted LED Board Manufacturer'); ?>
<?php $__env->startSection('og_description', 'Discover how AAA LED became a trusted name in LED signage — in-house design, weatherproof manufacturing, and pan-India installation for hospitals, shops, and businesses.'); ?>

<?php $__env->startPush('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/about.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('structured_data'); ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@graph": [
        {
            "@type": "AboutPage",
            "@id": "https://yourdomain.com/about#webpage",
            "url": "https://yourdomain.com/about",
            "name": "About AAA LED | Coimbatore's Trusted LED Board Manufacturer",
            "description": "AAA LED is Coimbatore's trusted LED board manufacturer, delivering hospital signage, shop boards, and outdoor LED displays across India.",
            "isPartOf": {
                "@id": "https://yourdomain.com#website"
            },
            "about": {
                "@id": "https://yourdomain.com#organization"
            },
            "breadcrumb": {
                "@id": "https://yourdomain.com/about#breadcrumb"
            }
        },
        {
            "@type": "BreadcrumbList",
            "@id": "https://yourdomain.com/about#breadcrumb",
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
                    "name": "About Us",
                    "item": "https://yourdomain.com/about"
                }
            ]
        },
        {
            "@type": "Organization",
            "@id": "https://yourdomain.com#organization",
            "name": "AAA LED",
            "url": "https://yourdomain.com",
            "logo": "https://yourdomain.com/public/assets/static_images/logo.jpeg",
            "description": "AAA LED designs, manufactures, and installs LED display boards and signage for hospitals, clinics, retail stores, and commercial establishments across India.",
            "foundingLocation": {
                "@type": "Place",
                "name": "Coimbatore, Tamil Nadu, India"
            },
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Coimbatore",
                "addressRegion": "Tamil Nadu",
                "postalCode": "641XXX",
                "addressCountry": "IN"
            },
            "sameAs": [
                "https://www.facebook.com/yourpage",
                "https://www.instagram.com/yourpage"
            ]
        }
    ]
}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="about-hero" aria-labelledby="about-hero-title">
        <div class="about-hero__glow" aria-hidden="true"></div>
        <div class="section-inner about-hero__inner">
            <nav class="breadcrumb reveal" aria-label="Breadcrumb">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li aria-current="page">About Us</li>
                </ol>
            </nav>
            <span class="about-hero__eyebrow reveal">Who We Are</span>
            <h1 id="about-hero-title" class="about-hero__title reveal">
                Coimbatore's Trusted Name in LED Signage &amp; Display Boards
            </h1>
            <p class="about-hero__text reveal">
                For over a decade of combined craftsmanship, AAA LED has designed, manufactured, and installed
                premium LED display boards and signage for hospitals, clinics, retail stores, and businesses
                across Coimbatore and every corner of India. This is our story, our process, and our promise.
            </p>
        </div>
    </section>

    
    <section class="our-story" aria-labelledby="our-story-title">
        <div class="section-inner our-story__grid">
            <div class="our-story__media reveal reveal--left">
                <picture>
                    <source
                        srcset="
                            <?php echo e(asset('assets/static_images/about-480.webp')); ?> 480w,
                            <?php echo e(asset('assets/static_images/about-768.webp')); ?> 768w,
                            <?php echo e(asset('assets/static_images/about-1200.webp')); ?> 1200w"
                        sizes="(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 450px"
                        type="image/webp">
                    <img
                        src="<?php echo e(asset('assets/static_images/about-768.webp')); ?>"
                        alt="AAA LED fabrication team assembling a custom LED signboard in Coimbatore"
                        loading="lazy"
                        width="450"
                        height="800">
                </picture>
                <div class="our-story__badge">
                    <strong>500+</strong>
                    <span>Boards Delivered</span>
                </div>
            </div>

            <div class="our-story__content reveal reveal--right">
                <span class="section-eyebrow">Our Story</span>
                <h2 id="our-story-title" class="section-title">Built on Precision, Grown Through Trust</h2>
                <p class="section-text">
                    AAA LED started with a simple goal — to give hospitals, clinics, and businesses across
                    Coimbatore access to LED signage that looks premium and survives Indian weather without
                    constant repairs. What began as a small in-house workshop has grown into a full manufacturing
                    and installation operation trusted by government organizations and private clients alike.
                </p>
                <p class="section-text">
                    Every board that leaves our facility is designed, wired, and tested in-house before it ever
                    reaches a client site. That control over the full process is what lets us guarantee
                    durability, consistent brightness, and on-time delivery, whether the installation is a single
                    shop sign in Coimbatore or a pan-India rollout for a hospital chain.
                </p>

                <div class="story-timeline">
                    <div class="story-timeline__item reveal">
                        <span class="story-timeline__dot" aria-hidden="true"></span>
                        <div>
                            <h3>In-house Design</h3>
                            <p>Every layout is planned and engineered by our own design team before fabrication begins.</p>
                        </div>
                    </div>
                    <div class="story-timeline__item reveal">
                        <span class="story-timeline__dot" aria-hidden="true"></span>
                        <div>
                            <h3>Precision Manufacturing</h3>
                            <p>Weatherproof components and quality LEDs assembled to strict in-house standards.</p>
                        </div>
                    </div>
                    <div class="story-timeline__item reveal">
                        <span class="story-timeline__dot" aria-hidden="true"></span>
                        <div>
                            <h3>Pan-India Installation</h3>
                            <p>Our own installation teams handle setup and support from Coimbatore to any city in India.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="mission-vision" aria-labelledby="mission-vision-title">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-eyebrow">What Drives Us</span>
                <h2 id="mission-vision-title" class="section-title">Our Mission &amp; Vision</h2>
            </div>

            <div class="mission-vision__grid">
                
                <article class="mv-card reveal reveal--left">
                    <div class="mv-card__icon" aria-hidden="true">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24" cy="24" r="22" stroke="#ec4899" stroke-width="1.5" opacity="0.2"/>
                            <circle cx="24" cy="24" r="16" stroke="#ec4899" stroke-width="2"/>
                            <circle cx="24" cy="24" r="8" fill="#ec4899" opacity="0.15"/>
                            <circle cx="24" cy="24" r="4" fill="#ec4899"/>
                            <path d="M24 4V10M24 38V44M4 24H10M38 24H44" stroke="#ec4899" stroke-width="1.5" stroke-linecap="round" opacity="0.4"/>
                        </svg>
                    </div>
                    <h3>Our Mission</h3>
                    <p>
                        To deliver LED signage that businesses and hospitals can rely on for years — combining
                        honest pricing, in-house quality control, and installation support that doesn't disappear
                        after the sale.
                    </p>
                </article>

                
                <article class="mv-card reveal reveal--right">
                    <div class="mv-card__icon" aria-hidden="true">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 24C4 24 10 10 24 10C38 10 44 24 44 24C44 24 38 38 24 38C10 38 4 24 4 24Z" stroke="#ec4899" stroke-width="2" stroke-linejoin="round"/>
                            <circle cx="24" cy="24" r="8" stroke="#ec4899" stroke-width="2"/>
                            <circle cx="24" cy="24" r="4" fill="#ec4899"/>
                            <path d="M38 6L34 10M42 10L38 14" stroke="#ec4899" stroke-width="1.5" stroke-linecap="round" opacity="0.6"/>
                        </svg>
                    </div>
                    <h3>Our Vision</h3>
                    <p>
                        To become the most trusted LED board manufacturer in South India, known equally for design
                        quality, manufacturing durability, and dependable service across every state we serve.
                    </p>
                </article>
            </div>
        </div>
    </section>

    
    <section class="about-stats reveal" aria-label="AAA LED milestones">
        <div class="about-stats__inner">
            <div class="about-stats__item">
                <span class="about-stats__num" data-count-to="500">0</span><span class="about-stats__plus">+</span>
                <span class="about-stats__label">Boards Installed</span>
            </div>
            <div class="about-stats__item">
                <span class="about-stats__num" data-count-to="100">0</span><span class="about-stats__plus">+</span>
                <span class="about-stats__label">Govt Organizations Served</span>
            </div>
            <div class="about-stats__item">
                <span class="about-stats__num" data-count-to="20">0</span><span class="about-stats__plus">+</span>
                <span class="about-stats__label">Cities Covered</span>
            </div>
            <div class="about-stats__item">
                <span class="about-stats__num" data-count-to="24">0</span><span class="about-stats__slash">/7</span>
                <span class="about-stats__label">Pan-India Support</span>
            </div>
        </div>
    </section>

    
    <section class="core-values" aria-labelledby="core-values-title">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-eyebrow">Our Values</span>
                <h2 id="core-values-title" class="section-title">What Guides Every Board We Build</h2>
                <p class="section-text">
                    These aren't slogans on a wall — they're the standards our design, fabrication, and
                    installation teams are held to on every single project.
                </p>
            </div>

            <div class="values__grid">
                
                <article class="value-card reveal">
                    <div class="value-card__icon" aria-hidden="true">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 2L6 10V20C6 31.05 12.9 41.18 22 44C31.1 41.18 38 31.05 38 20V10L22 2Z" stroke="#ec4899" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M16 22L20 26L28 18" stroke="#ec4899" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="value-card__title">Quality First</h3>
                    <p class="value-card__text">Every board uses tested LEDs and weatherproof materials built to perform in Indian heat, dust, and monsoon conditions.</p>
                </article>

                
                <article class="value-card reveal">
                    <div class="value-card__icon" aria-hidden="true">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="22" cy="22" r="18" stroke="#ec4899" stroke-width="2"/>
                            <path d="M22 12V22L28 28" stroke="#ec4899" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M34 8L38 4M10 8L6 4" stroke="#ec4899" stroke-width="1.5" stroke-linecap="round" opacity="0.4"/>
                        </svg>
                    </div>
                    <h3 class="value-card__title">On-Time Delivery</h3>
                    <p class="value-card__text">Clear timelines set at quotation and honored at installation, with no last-minute surprises.</p>
                </article>

                
                <article class="value-card reveal">
                    <div class="value-card__icon" aria-hidden="true">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="32" r="6" stroke="#ec4899" stroke-width="2"/>
                            <circle cx="32" cy="32" r="6" stroke="#ec4899" stroke-width="2"/>
                            <circle cx="22" cy="14" r="6" stroke="#ec4899" stroke-width="2"/>
                            <path d="M17 18L14 26M27 18L30 26M18 32H26" stroke="#ec4899" stroke-width="1.5" stroke-linecap="round" opacity="0.5"/>
                        </svg>
                    </div>
                    <h3 class="value-card__title">Pan-India Reach</h3>
                    <p class="value-card__text">From Coimbatore to any city in India, our own teams handle installation and after-sales support.</p>
                </article>

                
                <article class="value-card reveal">
                    <div class="value-card__icon" aria-hidden="true">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 16L22 8L38 16V28L22 36L6 28V16Z" stroke="#ec4899" stroke-width="2" stroke-linejoin="round"/>
                            <path d="M22 20V28M18 22H26" stroke="#ec4899" stroke-width="2" stroke-linecap="round"/>
                            <path d="M14 14L18 12M30 14L26 12" stroke="#ec4899" stroke-width="1.5" stroke-linecap="round" opacity="0.4"/>
                        </svg>
                    </div>
                    <h3 class="value-card__title">Honest Pricing</h3>
                    <p class="value-card__text">Transparent quotes with no hidden costs, so you know exactly what you are paying for.</p>
                </article>
            </div>
        </div>
    </section>

    
    <section class="process" aria-labelledby="process-title">
        <div class="section-inner">
            <div class="section-head reveal">
                <span class="section-eyebrow">Our Process</span>
                <h2 id="process-title" class="section-title">From Consultation to Installation</h2>
            </div>

            <div class="process__track">
                <div class="process__line" aria-hidden="true"></div>

                <div class="process__step reveal">
                    <span class="process__num">01</span>
                    <h3>Consultation</h3>
                    <p>We visit or discuss your site requirements — hospital wayfinding, retail signage, or outdoor display — and understand your space, budget, and visibility needs.</p>
                </div>

                <div class="process__step reveal">
                    <span class="process__num">02</span>
                    <h3>Design &amp; Quote</h3>
                    <p>Our in-house designers prepare a custom layout and transparent quote, so you know exactly what you're getting before fabrication starts.</p>
                </div>

                <div class="process__step reveal">
                    <span class="process__num">03</span>
                    <h3>Manufacturing</h3>
                    <p>Boards are fabricated in our Coimbatore facility using weatherproof materials and tested LED components built for Indian outdoor conditions.</p>
                </div>

                <div class="process__step reveal">
                    <span class="process__num">04</span>
                    <h3>Installation &amp; Support</h3>
                    <p>Our own installation teams handle setup at your site — anywhere in India — with ongoing support after the board goes live.</p>
                </div>
            </div>
        </div>
    </section>

    
    <section class="cta-band" aria-labelledby="about-cta-title">
        <div class="cta-band__glow" aria-hidden="true"></div>
        <div class="section-inner cta-band__inner reveal">
            <h2 id="about-cta-title" class="cta-band__title">Let's Build Your Next LED Board</h2>
            <p class="cta-band__text">Talk to our team about hospital signage, shop boards, or outdoor displays — anywhere in India.</p>
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
            // Scroll reveal
            var reveals = document.querySelectorAll('.reveal');
            var supportsIO = 'IntersectionObserver' in window;

            if (!supportsIO) {
                reveals.forEach(function (el) { el.classList.add('is-visible'); });
            } else {
                var revealObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            revealObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });
                reveals.forEach(function (el) { revealObserver.observe(el); });
            }

            // Animated stat counters
            var counters = document.querySelectorAll('[data-count-to]');
            var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            function animateCounter(el) {
                var target = parseInt(el.getAttribute('data-count-to'), 10) || 0;
                if (prefersReducedMotion) {
                    el.textContent = target;
                    return;
                }
                var duration = 1400;
                var start = null;

                function step(timestamp) {
                    if (!start) start = timestamp;
                    var progress = Math.min((timestamp - start) / duration, 1);
                    var eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.floor(eased * target);
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        el.textContent = target;
                    }
                }
                window.requestAnimationFrame(step);
            }

            if (counters.length) {
                if (!supportsIO) {
                    counters.forEach(animateCounter);
                } else {
                    var counterObserver = new IntersectionObserver(function (entries) {
                        entries.forEach(function (entry) {
                            if (entry.isIntersecting) {
                                animateCounter(entry.target);
                                counterObserver.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.4 });
                    counters.forEach(function (el) { counterObserver.observe(el); });
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/yahi/freelance/aaa/views/about.blade.php ENDPATH**/ ?>