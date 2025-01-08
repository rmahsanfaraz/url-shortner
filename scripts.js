document.getElementById('shorten-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const url = e.target.url.value;
    const customCode = e.target.custom_code.value;

    const response = await fetch('shorten.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ url, custom_code: customCode }),
    });

    const result = await response.json();
    if (result.error) {
        document.getElementById('result').innerHTML = `<span style="color: red;">${result.error}</span>`;
    } else {
        document.getElementById('result').innerHTML = `Short URL: <a href="${result.short_url}" target="_blank">${result.short_url}</a>`;
    }
});
