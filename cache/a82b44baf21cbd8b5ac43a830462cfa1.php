<style>
    .site-footer {
        background: #0a0a0a;
        color: #ccc;
        padding: 60px 0 0;
        font-family: 'Inter', sans-serif;
    }
    .footer-inner {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1.5fr;
        gap: 40px;
    }
    .footer-brand .brand-name {
        font-size: 1.6rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .footer-brand .brand-name img {
        height: 36px;
        width: 36px;
        border-radius: 6px;
    }
    .footer-brand p {
        font-size: 0.9rem;
        line-height: 1.7;
        color: #999;
        margin-bottom: 20px;
    }
    .footer-social {
        display: flex;
        gap: 12px;
    }
    .footer-social a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        transition: background 0.3s, transform 0.3s;
    }
    .footer-social a:hover {
        background: #e63946;
        transform: translateY(-2px);
    }
    .footer-social a svg {
        width: 18px;
        height: 18px;
        fill: #ccc;
        transition: fill 0.3s;
    }
    .footer-social a:hover svg {
        fill: #fff;
    }
    .footer-col h4 {
        color: #fff;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 20px;
    }
    .footer-col ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-col ul li {
        margin-bottom: 10px;
    }
    .footer-col ul li a {
        color: #999;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s;
    }
    .footer-col ul li a:hover {
        color: #e63946;
    }
    .footer-contact-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
        font-size: 0.9rem;
        color: #999;
        line-height: 1.6;
    }
    .footer-contact-item svg {
        flex-shrink: 0;
        width: 18px;
        height: 18px;
        fill: #e63946;
    }
    .footer-contact-item strong {
        color: #ddd;
        font-weight: 500;
    }
    .footer-bottom {
        margin-top: 50px;
        border-top: 1px solid rgba(255,255,255,0.08);
        padding: 20px 24px;
        text-align: center;
        font-size: 0.8rem;
        color: #666;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }
    .footer-bottom a {
        color: #e63946;
        text-decoration: none;
    }
    @media (max-width: 900px) {
        .footer-inner {
            grid-template-columns: 1fr 1fr;
        }
    }
    @media (max-width: 560px) {
        .footer-inner {
            grid-template-columns: 1fr;
            gap: 32px;
        }
        .site-footer {
            padding: 40px 0 0;
        }
    }
</style>

<footer class="site-footer">
    <div class="footer-inner">

        <div class="footer-brand">
            <div class="brand-name">
                <img src="../../public/assets/static_images/logo.jpeg" alt="AAA LED logo">
                AAA LED
            </div>
            <p>
                Premium LED display boards, signboards, and indoor-outdoor signage
                for hospitals, clinics, shops, and commercial spaces across Coimbatore and all over India.
            </p>
            <div class="footer-social">
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Instagram">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.054 1.97.24 2.43.403a4.088 4.088 0 0 1 1.47.957c.453.453.736.874.957 1.47.164.46.35 1.26.403 2.43.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.24 1.97-.403 2.43a4.088 4.088 0 0 1-.957 1.47 4.088 4.088 0 0 1-1.47.957c-.46.164-1.26.35-2.43.403-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.97-.24-2.43-.403a4.088 4.088 0 0 1-1.47-.957 4.088 4.088 0 0 1-.957-1.47c-.164-.46-.35-1.26-.403-2.43C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.054-1.17.24-1.97.403-2.43A4.088 4.088 0 0 1 3.593 3.3a4.088 4.088 0 0 1 1.47-.957c.46-.164 1.26-.35 2.43-.403C8.759 1.885 9.139 1.873 12 1.873V2.163Zm0 1.802c-3.15 0-3.49.012-4.717.069-.97.044-1.496.207-1.847.344-.466.182-.8.398-1.15.748-.35.35-.566.684-.748 1.15-.137.351-.3.877-.344 1.847-.057 1.227-.069 1.567-.069 4.717s.012 3.49.069 4.717c.044.97.207 1.496.344 1.847.182.466.398.8.748 1.15.35.35.684.566 1.15.748.351.137.877.3 1.847.344 1.227.057 1.567.069 4.717.069s3.49-.012 4.717-.069c.97-.044 1.496-.207 1.847-.344.466-.182.8-.398 1.15-.748.35-.35.566-.684.748-1.15.137-.351.3-.877.344-1.847.057-1.227.069-1.567.069-4.717s-.012-3.49-.069-4.717c-.044-.97-.207-1.496-.344-1.847a3.11 3.11 0 0 0-.748-1.15 3.11 3.11 0 0 0-1.15-.748c-.351-.137-.877-.3-1.847-.344-1.227-.057-1.567-.069-4.717-.069Zm0 3.064a4.975 4.975 0 1 1 0 9.95 4.975 4.975 0 0 1 0-9.95Zm0 1.802a3.173 3.173 0 1 0 0 6.346 3.173 3.173 0 0 0 0-6.346Zm5.221-3.27a1.17 1.17 0 1 1 0 2.34 1.17 1.17 0 0 1 0-2.34Z"/></svg>
                </a>
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Facebook">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073Z"/></svg>
                </a>
            </div>
        </div>

        <div class="footer-col">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Services</h4>
            <ul>
                <li><a href="#">LED Display Boards</a></li>
                <li><a href="#">Hospital Signage</a></li>
                <li><a href="#">Shop Boards</a></li>
                <li><a href="#">Outdoor Signage</a></li>
                <li><a href="#">Indoor Displays</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Contact Us</h4>

            <div class="footer-contact-item">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7Zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/></svg>
                <div>
                    SF No 184 Part Site No 6,<br>
                    Breeze Avenue, Saramedu,<br>
                    Karumbukadai, Vinayagar Temple,<br>
                    Coimbatore - 641008,<br>
                    Tamil Nadu, India
                </div>
            </div>

            <div class="footer-contact-item">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2ZM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8Zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7Z"/></svg>
                <div><strong>Opening Hours:</strong><br>24/7 Open</div>
            </div>
        </div>

    </div>

    <div class="footer-bottom">
        &copy; <?php echo e(date('Y')); ?> AAA LED. All rights reserved. | Designed &amp; developed with care.
    </div>
</footer>
<?php /**PATH /home/yahi/freelance/aaa/views/layouts/footer.blade.php ENDPATH**/ ?>