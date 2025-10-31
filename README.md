
# URL Shortener

A simple, colorful URL shortener built with PHP and SQL. This application allows users to shorten URLs, create custom short codes, and track analytics like visit counts.

---

## Features
- **URL Shortening**: Generate short URLs for any valid long URL.
- **Custom Short Codes**: Users can specify custom short codes for their URLs.
- **URL Expiration**: Set expiration dates for short URLs (optional).
- **QR Code Generation**: Automatically generate QR codes for short URLs.
- **Copy to Clipboard**: Easy one-click copying of short URLs.
- **URL Management**: View, manage, and delete all created short URLs.
- **Enhanced Analytics**: Track visit counts, creation date, expiration date, and last accessed time.
- **Responsive Design**: A user-friendly and colorful interface.

---

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

---

## Installation

### 1. Prerequisites
- A PHP-compatible web server (e.g., Apache, Nginx)
- MySQL database server
- Composer (optional, if dependencies are added later)

### 2. Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/rmahsanfaraz/url-shortener.git
   cd url-shortener
   ```

2. Import the database:
   - For new installations: Open `database.sql` in a SQL client or MySQL command-line and execute it to create the necessary table.
   - For existing installations: Run `migration.sql` to add new columns (expires_at, last_accessed) to your existing urls table.

3. Configure database connection:
   - Open `config.php` and update the database credentials:
     ```php
     $host = 'localhost';
     $db = 'url_shortener';
     $user = 'root';
     $pass = 'yourpassword';
     ```

4. Upload files to your server:
   - Place all project files in your server's public directory (e.g., `/var/www/html`).

5. Set up a domain (optional):
   - Configure your server to point to the project directory.

---

## Usage
1. Open the application in your web browser.
   - Example: `http://yourdomain.com/`

2. Shorten URLs:
   - Enter a long URL in the input field.
   - Optionally, specify a custom short code.
   - Optionally, set an expiration period in days.
   - Click **Shorten** to generate the short URL.
   - Use the **Copy to Clipboard** button to easily copy the short URL.
   - View the automatically generated QR code for mobile sharing.

3. Manage URLs:
   - Click on **Manage URLs** to view all created short URLs.
   - View detailed information including visit counts, creation date, expiration date, and last accessed time.
   - Delete URLs you no longer need.
   - Copy short URLs directly from the management page.

4. Analytics:
   - Use the `analytics.php` endpoint to get analytics for a specific short URL.
   - Example: `http://yourdomain.com/analytics.php?code=shortcode`
   - View analytics including visit count, creation date, expiration date, and last accessed time.

5. Redirect:
   - Share the generated short URL.
   - Visitors will be redirected to the original URL.

---

## Folder Structure
```plaintext
url-shortener/
├── index.php         # Frontend UI
├── manage.html       # URL management page
├── config.php        # Database configuration
├── shorten.php       # URL shortening logic
├── redirect.php      # URL redirection logic
├── analytics.php     # Analytics endpoint
├── delete.php        # Delete short URLs
├── list.php          # List all URLs endpoint
├── qrcode.php        # QR code generation endpoint
├── style.css         # Styling for the UI
├── scripts.js        # Frontend interactivity for main page
├── manage.js         # Frontend interactivity for management page
├── database.sql      # SQL file for table creation
└── README.md         # Project documentation
```

---

## API Endpoints
### **1. Shorten URL**
- **Endpoint**: `/shorten.php`
- **Method**: `POST`
- **Payload**:
  ```json
  {
    "url": "https://example.com",
    "custom_code": "mycustomcode", // Optional
    "expires_in_days": 30 // Optional
  }
  ```
- **Response**:
  ```json
  {
    "short_url": "http://yourdomain.com/redirect.php?code=shortcode",
    "short_code": "shortcode"
  }
  ```

### **2. Redirect URL**
- **Endpoint**: `/redirect.php?code=shortcode`
- **Description**: Redirects to the original URL if not expired

### **3. Analytics**
- **Endpoint**: `/analytics.php?code=shortcode`
- **Response**:
  ```json
  {
    "original_url": "https://example.com",
    "visit_count": 10,
    "created_at": "2025-01-01 12:00:00",
    "expires_at": "2025-02-01 12:00:00",
    "last_accessed": "2025-01-15 14:30:00"
  }
  ```

### **4. List URLs**
- **Endpoint**: `/list.php`
- **Method**: `GET`
- **Response**: Array of all URLs with their details

### **5. Delete URL**
- **Endpoint**: `/delete.php`
- **Method**: `POST` or `DELETE`
- **Payload**:
  ```json
  {
    "short_code": "shortcode"
  }
  ```
- **Response**:
  ```json
  {
    "success": true,
    "message": "URL deleted successfully"
  }
  ```

### **6. Generate QR Code**
- **Endpoint**: `/qrcode.php?code=shortcode`
- **Method**: `GET`
- **Response**:
  ```json
  {
    "qr_url": "https://chart.googleapis.com/chart?...",
    "short_url": "http://yourdomain.com/redirect.php?code=shortcode"
  }
  ```

---

## Screenshots
![URL SHORTNER](url_short.png)
---

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

## Contributing
Feel free to fork the repository and submit pull requests for enhancements or bug fixes.
