<header class="site-header">
    <div class="container header-inner">
        <div class="header-left">
            <button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="brand" href="/">
                <img src="../../public/assets/static_images/logo.jpeg" alt="LED board maker logo" class="brand-logo">
                <span>AAA LED</span>
            </a>
        </div>

        <nav class="main-nav" aria-label="Primary navigation">
            <a href="/" class="<?= activeRoute('/') ?>">Home</a>
            <a href="/about" class="<?= activeRoute('/about') ?>">About</a>
            <a href="/projects" class="<?= activeRoute('/projects') ?>">Projects</a>
            <a href="/contact" class="<?= activeRoute('/contact') ?>">Contact</a>
        </nav>
    </div>
</header>

<div class="mobile-menu" id="mobileMenu" aria-label="Mobile navigation">
    <div class="mobile-menu-head">
        <span>Menu</span>
        <button class="menu-close" type="button" aria-label="Close navigation">×</button>
    </div>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/projects">Projects</a>
    <a href="/contact">Contact</a>
</div>
<?php /**PATH /home/yahi/freelance/aaa/views/layouts/header.blade.php ENDPATH**/ ?>