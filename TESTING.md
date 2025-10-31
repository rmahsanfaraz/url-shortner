# Testing Guide for New Features

This guide provides step-by-step instructions to test the new features.

## Prerequisites
- PHP web server (Apache/Nginx)
- MySQL database
- Modern web browser

## Setup Steps

1. **Import Database**
   ```bash
   mysql -u root -p url_shortener < database.sql
   ```

2. **Configure Database Connection**
   Edit `config.php` with your database credentials.

3. **Start Web Server**
   ```bash
   php -S localhost:8000
   ```

## Testing New Features

### 1. Test URL Expiration
1. Open `http://localhost:8000/index.php`
2. Enter a URL: `https://example.com`
3. Set custom code: `test1`
4. Set expires in days: `1`
5. Click "Shorten"
6. Verify short URL is created
7. Test immediate access works
8. *Note: To test expiration, you would need to wait 1 day or manually modify the database*

### 2. Test QR Code Generation
1. After creating a short URL, scroll down
2. Verify QR code image is displayed
3. Try scanning with mobile device QR scanner
4. Verify it redirects to the correct URL

### 3. Test Copy to Clipboard
1. After creating a short URL
2. Click "Copy to Clipboard" button
3. Verify alert shows "URL copied to clipboard!"
4. Paste into notepad to confirm it worked

### 4. Test URL Management Page
1. Click "Manage URLs" link on main page
2. Verify all created URLs are displayed in table
3. Check that columns show:
   - Short Code
   - Original URL
   - Visits
   - Created date
   - Expires date
   - Last Accessed
   - Action buttons

### 5. Test Analytics Button
1. From management page, click "Analytics" button
2. Verify new tab opens with JSON data
3. Confirm it includes:
   - original_url
   - visit_count
   - created_at
   - expires_at
   - last_accessed

### 6. Test Copy from Management Page
1. Click "Copy" button next to any URL
2. Verify alert confirms copy
3. Paste to verify correct URL

### 7. Test Delete Functionality
1. Click "Delete" button next to a URL
2. Confirm deletion in dialog
3. Verify URL is removed from table
4. Try accessing deleted short URL
5. Verify it shows "Invalid URL!"

### 8. Test Visit Count & Last Accessed
1. Create a new short URL
2. Note the visit count (should be 0)
3. Open the short URL in new tab
4. Return to management page
5. Refresh the page
6. Verify visit count increased to 1
7. Verify "Last Accessed" is now populated

## API Testing

### Test Shorten API
```bash
curl -X POST http://localhost:8000/shorten.php \
  -H "Content-Type: application/json" \
  -d '{"url":"https://github.com","custom_code":"gh","expires_in_days":7}'
```

### Test List API
```bash
curl http://localhost:8000/list.php
```

### Test Analytics API
```bash
curl http://localhost:8000/analytics.php?code=gh
```

### Test QR Code API
```bash
curl http://localhost:8000/qrcode.php?code=gh
```

### Test Delete API
```bash
curl -X POST http://localhost:8000/delete.php \
  -H "Content-Type: application/json" \
  -d '{"short_code":"gh"}'
```

## Expected Results

✅ All features should work without errors
✅ Database updates should be atomic
✅ UI should be responsive and user-friendly
✅ QR codes should be scannable
✅ Copy functionality should work in modern browsers
✅ Analytics should track accurately
✅ Expired URLs should show expiration message

## Troubleshooting

### Issue: "Connection failed"
- Check database credentials in config.php
- Verify MySQL service is running

### Issue: QR code not showing
- Check internet connection (uses Google Charts API)
- Check browser console for errors

### Issue: Copy button not working
- Ensure using HTTPS or localhost
- Check browser supports Clipboard API

### Issue: Management page not loading URLs
- Check list.php endpoint
- Verify database connection
- Check browser console for errors
