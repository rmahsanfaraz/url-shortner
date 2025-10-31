# Changelog

All notable changes to the URL Shortener project.

## [2.0.0] - 2025-10-31

### Added
- **URL Expiration Feature**
  - Optional expiration dates for short URLs
  - Automatic expiration checking on redirect
  - Visual indicators for expired URLs in management interface
  - Database field: `expires_at`

- **QR Code Generation**
  - Automatic QR code generation for each short URL
  - Integration with Google Charts API
  - Display QR codes immediately after URL creation
  - QR code endpoint: `/qrcode.php?code={shortcode}`

- **Copy to Clipboard**
  - One-click button to copy short URLs
  - Available on both main page and management page
  - Browser Clipboard API integration
  - User confirmation alerts

- **URL Management Dashboard**
  - New management interface at `manage.html`
  - Table view showing all URLs with full details
  - Real-time data loading from backend
  - Color-coded expired URL indicators
  - Responsive design for mobile and desktop

- **Enhanced Analytics**
  - Last accessed timestamp tracking
  - Database field: `last_accessed`
  - Updated on each redirect
  - Available via analytics API

- **Delete Functionality**
  - Remove unwanted short URLs
  - Confirmation dialog before deletion
  - API endpoint: `/delete.php`
  - Immediate UI update after deletion

- **Configuration Management**
  - Centralized base URL configuration
  - `config.php`: Backend configuration with `$base_url`
  - `config.js`: Frontend configuration with `BASE_URL`
  - Easy deployment across different domains

- **Documentation**
  - Comprehensive README with all features
  - FEATURES.md with detailed feature descriptions
  - TESTING.md with step-by-step testing guide
  - SUMMARY.md with implementation overview
  - Migration guide for existing installations

### Changed
- Updated database schema with new fields
- Enhanced UI with better styling and layout
- Improved error handling and validation
- Refactored code to use centralized configuration

### Technical Details
- Database: Added `expires_at` and `last_accessed` columns
- API: Added 3 new endpoints (list, delete, qrcode)
- UI: Enhanced with new management dashboard
- Security: All queries use prepared statements
- Compatibility: Works with modern browsers

### Files Added
1. delete.php - URL deletion endpoint
2. list.php - List all URLs endpoint
3. manage.html - URL management interface
4. manage.js - Management page JavaScript
5. qrcode.php - QR code generation endpoint
6. config.js - Frontend configuration
7. migration.sql - Database migration script
8. FEATURES.md - Feature documentation
9. TESTING.md - Testing guide
10. SUMMARY.md - Implementation summary
11. CHANGELOG.md - This file
12. .gitignore - Git ignore rules

### Files Modified
1. database.sql - Updated schema
2. config.php - Added base URL configuration
3. shorten.php - Added expiration support
4. redirect.php - Added expiration checking
5. analytics.php - Enhanced with new fields
6. index.php - Added new features UI
7. scripts.js - Enhanced functionality
8. style.css - Updated styling
9. README.md - Complete documentation update

## [1.0.0] - 2025-10-30

### Initial Release
- Basic URL shortening functionality
- Custom short codes
- Visit count tracking
- Basic analytics
- Simple web interface
