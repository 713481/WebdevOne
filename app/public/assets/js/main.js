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

// Fetch and display reviews when the page is loaded
document.addEventListener('DOMContentLoaded', function () {
    fetch('/get-reviews')
        .then(response => response.json())
        .then(data => {
            const reviewsSection = document.getElementById('reviewsSection');
            
            // Check if reviews are returned and loop through to display
            if (data.length > 0) {
                data.forEach(review => {
                    const reviewElement = document.createElement('div');
                    reviewElement.classList.add('review');
                    reviewElement.innerHTML = `
                        <h5>${review.name}</h5>
                        <p>${review.message}</p> <!-- Use the correct field name -->
                    `;
                    reviewsSection.appendChild(reviewElement);
                });
            } else {
                reviewsSection.innerHTML = '<p class="text-muted">No reviews yet.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching reviews:', error);
        });
});

document.addEventListener('DOMContentLoaded', function () {
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            // Log the form data to ensure it's captured correctly
            console.log({ name, email, message });

            // Create a FormData object to send the form data
            const formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('message', message);

            // Send the data using fetch (AJAX request)
            fetch('/submit-review', {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                console.log('Raw Response:', response); // Log the entire response to see the raw content
                return response.text(); // Use .text() to log the raw text body before parsing
            })
            .then(text => {
                console.log('Raw Text Body:', text); // Log the raw body content
                // Now try to parse it as JSON
                try {
                    const data = JSON.parse(text); // Manually parse the text as JSON
                    if (data.success) {
                        const newReview = document.createElement('div');
                        newReview.classList.add('review');
                        newReview.innerHTML = `
                            <h5>${name}</h5>
                            <p>${message}</p>
                        `;
                        document.getElementById('reviewsSection').prepend(newReview);
                        reviewForm.reset();
                    } else {
                        alert('Error submitting review: ' + data.message);
                    }
                } catch (error) {
                    console.error('Error parsing JSON:', error);
                }
            })
            .catch(error => {
                console.error('Error submitting review:', error);
            });
            
        });
    }
});

document.querySelector("#reservationForm").addEventListener("submit", function(e) {
    var reservationDate = document.querySelector("#reservation_date").value;
    var today = new Date();
    var selectedDate = new Date(reservationDate.split("/").reverse().join("-")); // Converts dd/mm/yyyy to yyyy-mm-dd

    if (selectedDate < today) {
        // Show the error message
        document.querySelector("#error-message").textContent = "You cannot reserve a past date.";
        e.preventDefault();  // Prevent form submission
    } else {
        document.querySelector("#error-message").textContent = ""; // Clear the error if the date is valid
    }
});
