<?php $__env->startSection('page_title', 'Contact Us'); ?>
<?php $__env->startSection('meta_description', 'Contact AAA LED for LED display boards, hospital signage, shop boards, and outdoor LED signage. Get a free quote for your project anywhere in India.'); ?>
<?php $__env->startSection('meta_keywords', 'contact AAA LED, LED board maker Coimbatore contact, hospital LED board enquiry, LED signage quote India, LED board price Coimbatore'); ?>

<?php $__env->startSection('og_title', 'Contact AAA LED | Get a Free LED Signage Quote'); ?>
<?php $__env->startSection('og_description', 'Reach out to AAA LED for a free consultation and quote on LED display boards, hospital signage, and outdoor displays across India.'); ?>

<?php $__env->startPush('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/contact.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section class="contact-hero" aria-labelledby="contact-hero-title">
        <div class="contact-hero__glow" aria-hidden="true"></div>
        <div class="section-inner contact-hero__inner">
            <nav class="breadcrumb reveal" aria-label="Breadcrumb">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <span class="contact-hero__eyebrow reveal">Get in Touch</span>
            <h1 id="contact-hero-title" class="contact-hero__title reveal">
                Let's Build Your Next LED Board
            </h1>
            <p class="contact-hero__text reveal">
                Tell us about your signage requirement &mdash; hospital wayfinding, shop boards,
                or outdoor displays &mdash; and our team will get back to you with a free quote.
            </p>
        </div>
    </section>

    <section class="contact-section" aria-label="Contact details and form">
        <div class="section-inner contact-grid">

            <div class="contact-info reveal reveal--left">
                <span class="section-eyebrow">Reach Us</span>
                <h2 class="contact-info__title">Contact Information</h2>

                <ul class="contact-info__list">
                    <li>
                        <span class="contact-info__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7Zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/></svg>
                        </span>
                        <div>
                            <h3>Address</h3>
                            <p>SF No 184 Part Site No 6, Breeze Avenue, Saramedu,<br>Karumbukadai, Coimbatore - 641008, Tamil Nadu, India</p>
                        </div>
                    </li>
                    <li>
                        <span class="contact-info__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92Z"/></svg>
                        </span>
                        <div>
                            <h3>Phone</h3>
                            <p><a href="tel:+910000000000">+91 00000 00000</a></p>
                        </div>
                    </li>
                    <li>
                        <span class="contact-info__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2Z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </span>
                        <div>
                            <h3>Email</h3>
                            <p><a href="mailto:aaa@gmail.com">aaa@gmail.com</a></p>
                        </div>
                    </li>
                    <li>
                        <span class="contact-info__icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </span>
                        <div>
                            <h3>Working Hours</h3>
                            <p>24/7 Open &mdash; Pan-India Service</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="contact-form-wrap reveal reveal--right">
                <?php if(isset($status)): ?>
                    <div class="contact-alert contact-alert--<?php echo e($status); ?>">
                        <?php echo e($message); ?>

                    </div>
                <?php endif; ?>

                <form method="POST" action="/contact/send" class="contact-form" novalidate>
                    <h2 class="contact-form__title">Send Us a Message</h2>

                    <div class="contact-form__field">
                        <label for="name" class="contact-form__label">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="contact-form__input <?php echo e(isset($errors['name']) ? 'contact-form__input--error' : ''); ?>"
                            value="<?php echo e($old['name'] ?? ''); ?>"
                            placeholder="Your name"
                            required>
                        <?php if(isset($errors['name'])): ?>
                            <span class="contact-form__error"><?php echo e($errors['name']); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="contact-form__field">
                        <label for="phone" class="contact-form__label">Contact Number</label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            class="contact-form__input <?php echo e(isset($errors['phone']) ? 'contact-form__input--error' : ''); ?>"
                            value="<?php echo e($old['phone'] ?? ''); ?>"
                            placeholder="Your phone number"
                            required>
                        <?php if(isset($errors['phone'])): ?>
                            <span class="contact-form__error"><?php echo e($errors['phone']); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="contact-form__field">
                        <label for="description" class="contact-form__label">Description</label>
                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            class="contact-form__input contact-form__textarea <?php echo e(isset($errors['description']) ? 'contact-form__input--error' : ''); ?>"
                            placeholder="Tell us about your requirement..."
                            required><?php echo e($old['description'] ?? ''); ?></textarea>
                        <?php if(isset($errors['description'])): ?>
                            <span class="contact-form__error"><?php echo e($errors['description']); ?></span>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="contact-form__submit">
                        Send Message
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                    </button>
                </form>
            </div>

        </div>
    </section>

    
    <section class="cta-band" aria-labelledby="contact-cta-title">
        <div class="cta-band__glow" aria-hidden="true"></div>
        <div class="section-inner cta-band__inner reveal">
            <h2 id="contact-cta-title" class="cta-band__title">Prefer to Talk Right Now?</h2>
            <p class="cta-band__text">Call our team for an immediate consultation on any LED signage project.</p>
            <div class="hero__cta">
                <a href="tel:+910000000000" class="btn btn--primary">Call Now</a>
                <a href="/projects" class="btn btn--ghost">View Our Work</a>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/yahi/freelance/aaa/views/contact.blade.php ENDPATH**/ ?>