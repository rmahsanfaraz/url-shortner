<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free URL shortener tool to create short, memorable links. Track analytics, generate QR codes, and manage all your URLs in one place. Fast, simple, and secure.">
    <title>URL Shortener - Fast, Simple &amp; Secure</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title"><span class="hero-title-line">Shorten Your Links,</span> <span class="hero-title-line">Amplify Your Reach</span></h1>
                <p class="hero-subtitle">Create short, memorable links in seconds. Track analytics, generate QR codes, and manage all your URLs in one place.</p>
            </div>
            
            <!-- Main Form -->
            <div class="form-card">
                <form id="shorten-form">
                    <div class="input-group">
                        <input type="url" name="url" placeholder="Enter your long URL here..." required>
                    </div>
                    <div class="advanced-options">
                        <input type="text" name="custom_code" placeholder="Custom short code (optional)">
                        <input type="number" name="expires_in_days" placeholder="Expires in days (optional)" min="1">
                    </div>
                    <button type="submit" class="btn-primary">
                        <span>Shorten URL</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M4.16667 10H15.8333M15.8333 10L10 4.16667M15.8333 10L10 15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
                <div id="result"></div>
                <div id="qrcode"></div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Why Choose Our URL Shortener?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 10V3L4 14H11L11 21L20 10H13Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Lightning Fast</h3>
                    <p>Generate short links instantly with our optimized URL shortening engine.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 17H7C4.23858 17 2 14.7614 2 12C2 9.23858 4.23858 7 7 7H9M15 7H17C19.7614 7 22 9.23858 22 12C22 14.7614 19.7614 17 17 17H15M7 12H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Custom Links</h3>
                    <p>Create branded short links with custom codes that are easy to remember.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 19V6L20 12L9 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>QR Codes</h3>
                    <p>Automatically generate scannable QR codes for easy mobile sharing.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 11L12 14L22 4M21 12V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Link Analytics</h3>
                    <p>Track clicks, monitor performance, and get insights on your shortened URLs.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 8V12L15 15M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>Link Expiration</h3>
                    <p>Set expiration dates for temporary links with automatic cleanup.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon" aria-hidden="true">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 15V12M12 9H12.01M5.07183 19H18.9282C20.4678 19 21.4301 17.3333 20.6603 16L13.7321 4C12.9623 2.66667 11.0377 2.66667 10.2679 4L3.33975 16C2.56995 17.3333 3.53223 19 5.07183 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3>URL Management</h3>
                    <p>Organize and manage all your shortened URLs from a single dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Get Started?</h2>
                <p>Start shortening your URLs and tracking your links today!</p>
                <a href="manage.html" class="btn-secondary">Manage Your URLs</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 URL Shortener. Simple, Fast &amp; Secure.</p>
        </div>
    </footer>

    <script src="config.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
