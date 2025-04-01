document.addEventListener('DOMContentLoaded', function () {
    const highlightContainer = document.getElementById('highlighted-menu-items');

    if (highlightContainer) {
        fetch('/api/highlights')
            .then(response => response.json())
            .then(items => {
                if (items.length > 0) {
                    highlightContainer.innerHTML = '';

                    items.forEach(item => {
                        const col = document.createElement('div');
                        col.className = 'col-md-4';

                        col.innerHTML = `
                            <div class="card menu-card mb-4 shadow-sm">
                                <img src="${item.image_url}" class="menu-img" alt="${item.name}">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">${item.name}</h5>
                                    <p class="card-text">${item.description}</p>
                                    <p><strong>€${parseFloat(item.price).toFixed(2)}</strong></p>
                                </div>
                            </div>
                        `;

                        highlightContainer.appendChild(col);
                    });
                } else {
                    highlightContainer.innerHTML = '<p class="text-muted text-center">No highlights available.</p>';
                }
            })
            .catch(err => {
                console.error('Error loading highlights:', err);
                highlightContainer.innerHTML = '<p class="text-danger text-center">Failed to load highlights.</p>';
            });
    }
});
