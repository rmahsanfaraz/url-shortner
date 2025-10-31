document.getElementById('shorten-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const url = e.target.url.value;
    const customCode = e.target.custom_code.value;
    const expiresInDays = e.target.expires_in_days.value;

    const response = await fetch('shorten.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ url, custom_code: customCode, expires_in_days: expiresInDays }),
    });

    const result = await response.json();
    
    // Clear previous results
    document.getElementById('qrcode').innerHTML = '';
    
    if (result.error) {
        document.getElementById('result').innerHTML = `<span style="color: red;">${result.error}</span>`;
    } else {
        const shortUrl = result.short_url;
        const shortCode = result.short_code;
        
        document.getElementById('result').innerHTML = `
            <div class="success-result">
                <p>Short URL: <a href="${shortUrl}" target="_blank">${shortUrl}</a></p>
                <button onclick="copyToClipboard('${shortUrl}')" class="copy-btn">Copy to Clipboard</button>
                <button onclick="viewAnalytics('${shortCode}')" class="analytics-btn">View Analytics</button>
            </div>
        `;

        // Fetch and display QR code
        const qrResponse = await fetch(`qrcode.php?code=${shortCode}`);
        const qrResult = await qrResponse.json();
        if (qrResult.qr_url) {
            document.getElementById('qrcode').innerHTML = `
                <div class="qr-container">
                    <h3>QR Code</h3>
                    <img src="${qrResult.qr_url}" alt="QR Code">
                    <p>Scan to access the URL</p>
                </div>
            `;
        }
    }
});

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('URL copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}

function viewAnalytics(shortCode) {
    window.open(`analytics.php?code=${shortCode}`, '_blank');
}
