<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>URL Shortener</h1>
        <form id="shorten-form">
            <input type="url" name="url" placeholder="Enter URL to shorten" required>
            <input type="text" name="custom_code" placeholder="Custom short code (optional)">
            <button type="submit">Shorten</button>
        </form>
        <div id="result"></div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
