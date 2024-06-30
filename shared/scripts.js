document.addEventListener('DOMContentLoaded', function() {
    const addForm = document.querySelector('#addForm');
    const editForm = document.querySelector('#editForm');

    if (addForm) {
        addForm.addEventListener('submit', async function(event) {
            event.preventDefault();

            const urlInput = document.querySelector('#url');
            const url = urlInput.value;

            if (!isValidUrl(url)) {
                alert('Please enter a valid URL.');
                return;
            }

            const isActive = await isUrlActive(url);
            if (!isActive) {
                alert('The URL is not active. Please enter a different URL.');
                return;
            }

            this.submit();
        });
    }

    if (editForm) {
        editForm.addEventListener('submit', async function(event) {
            event.preventDefault();

            const urlInput = document.querySelector('#url');
            const url = urlInput.value;

            if (!isValidUrl(url)) {
                alert('Please enter a valid URL.');
                return;
            }

            const isActive = await isUrlActive(url);
            if (!isActive) {
                alert('The URL is not active. Please enter a different URL.');
                return;
            }

            this.submit();
        });
    }

    function isValidUrl(url) {
        const pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
            '((([a-zA-Z0-9$-_@.&+!*\\(\\),]+\\.)+[a-zA-Z]{2,})|' + // domain name and extension
            '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-zA-Z0-9@:%_\\+.~#?&//=]*)?'); // port and path
        return pattern.test(url);
    }

    async function isUrlActive(url) {
        try {
            const response = await fetch(url, { method: 'HEAD', mode: 'cors' });
            return response.ok;
        } catch (error) {
            return false;
        }
    }
});
