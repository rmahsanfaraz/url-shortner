async function loadUrls() {
    try {
        const response = await fetch('list.php');
        const urls = await response.json();
        
        if (urls.length === 0) {
            document.getElementById('urls-list').innerHTML = '<p>No URLs found.</p>';
            return;
        }

        let html = `
            <table>
                <thead>
                    <tr>
                        <th>Short Code</th>
                        <th>Original URL</th>
                        <th>Visits</th>
                        <th>Created</th>
                        <th>Expires</th>
                        <th>Last Accessed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
        `;

        urls.forEach(url => {
            const isExpired = url.expires_at && new Date(url.expires_at) < new Date();
            const expiresText = url.expires_at ? new Date(url.expires_at).toLocaleString() : 'Never';
            const lastAccessedText = url.last_accessed ? new Date(url.last_accessed).toLocaleString() : 'Never';
            
            html += `
                <tr>
                    <td><a href="redirect.php?code=${url.short_code}" target="_blank">${url.short_code}</a></td>
                    <td>${url.original_url.substring(0, 50)}${url.original_url.length > 50 ? '...' : ''}</td>
                    <td>${url.visit_count}</td>
                    <td>${new Date(url.created_at).toLocaleString()}</td>
                    <td class="${isExpired ? 'expired' : ''}">${expiresText}</td>
                    <td>${lastAccessedText}</td>
                    <td class="actions">
                        <button class="analytics-btn" onclick="window.open('analytics.php?code=${url.short_code}', '_blank')">Analytics</button>
                        <button class="copy-btn" onclick="copyToClipboard('http://short.skystreamstech.com/redirect.php?code=${url.short_code}')">Copy</button>
                        <button class="delete-btn" onclick="deleteUrl('${url.short_code}')">Delete</button>
                    </td>
                </tr>
            `;
        });

        html += '</tbody></table>';
        document.getElementById('urls-list').innerHTML = html;
    } catch (error) {
        document.getElementById('urls-list').innerHTML = '<p style="color: red;">Error loading URLs.</p>';
        console.error('Error:', error);
    }
}

async function deleteUrl(shortCode) {
    if (!confirm(`Are you sure you want to delete the short URL: ${shortCode}?`)) {
        return;
    }

    try {
        const response = await fetch('delete.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ short_code: shortCode })
        });

        const result = await response.json();
        
        if (result.success) {
            alert('URL deleted successfully!');
            loadUrls(); // Reload the list
        } else {
            alert('Error: ' + (result.error || 'Failed to delete URL'));
        }
    } catch (error) {
        alert('Error deleting URL');
        console.error('Error:', error);
    }
}

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('URL copied to clipboard!');
    }).catch(err => {
        console.error('Failed to copy: ', err);
        alert('Failed to copy URL');
    });
}

// Load URLs when page loads
loadUrls();
