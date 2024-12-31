<!-- template-parts/home/social-bar.php -->
<div class="social-links-wrapper navbar-nav">
 
    <div class="social-links-grid">
        <div class="social-row">
            <a href="https://www.facebook.com/robokreyol" class="social-btn" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                <i class="bi bi-facebook text-facebook"></i>
                <span>Facebook</span>
            </a>
            <a href="https://www.youtube.com/@mokreyol" class="social-btn" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                <i class="bi bi-youtube text-youtube"></i>
                <span>YouTube</span>
            </a>
        </div>
        <div class="social-row">
            <a href="https://www.tiktok.com/@mokreyol" class="social-btn" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                <i class="bi bi-tiktok text-tiktok"></i>
                <span>TikTok</span>
            </a>
            <a href="https://twitter.com/mokreyol" class="social-btn" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                <i class="bi bi-twitter-x text-twitter"></i>
                <span>Twitter</span>
            </a>
        </div>
    </div>
</div>

<style>
/* Social Media Styles */
.social-links-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-left: 1.5rem;
}

.social-title {
    font-size: 0.8rem;
    font-weight: bold;
    margin-bottom: 4px;
    text-align: center;
}

.social-links-grid {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.social-row {
    display: flex;
    gap: 3px;
}

.social-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2px 6px;
    text-decoration: none;
    color: #fff !important;
    font-size: 0.8rem;
    transition: 0.2s;
    border-radius: 3px;
    white-space: nowrap;
    border: 1px solid rgba(255, 255, 255, 0.3);
    width: 100px; /* Set a fixed width for all buttons */
}

.social-btn i {
    margin-right: 4px;
    font-size: 1rem;
}

.social-btn:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: rgba(255, 255, 255, 0.5);
}

/* Icon Colors */
.text-facebook { color: #fff !important; }
.text-youtube { color: #fff !important; }
.text-tiktok { color: #fff !important; }
.text-twitter { color: #fff !important; }

/* Mobile Styles */
@media (max-width: 767.98px) {
    .social-links-wrapper {
        margin: 1rem 0 0 0;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        width: 100%;
    }

    .social-title {
        margin-bottom: 0.5rem;
    }

    .social-links-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
        width: 100%;
        max-width: 200px; /* Reduced max-width for tighter mobile grid */
    }

    .social-row {
        display: contents;
    }

    .social-btn {
        justify-content: center;
        padding: 8px;
        width: auto; /* Adjust width for mobile */
    }
    
    .social-btn span {
        display: none;
    }
    
    .social-btn i {
        margin-right: 0;
        font-size: 1.2rem;
    }
}
</style>