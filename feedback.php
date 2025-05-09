<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="icon" type="image/png" href="favicon-32x32.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <style>
        .stars input {
            display: none;
        }

        .stars label {
            font-size: 2rem;
            color: gray;
            cursor: pointer;
            transition: color 0.2s;
        }

        .stars input:checked~label,
        .stars label:hover,
        .stars label:hover~label {
            color: gold;
        }

        .feedback-section {
            max-height: 200px;
            overflow-y: auto;
        }

        .feedback-item {
            border-bottom: 1px solid #dee2e6;
            padding: 0.5rem 0;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg w-100" style="max-width: 500px;">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Rate Us</h4>
                <form action="submit_feedback.php" method="POST">
                    <div class="stars d-flex justify-content-center mb-3 flex-row-reverse">
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5">★</label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4">★</label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3">★</label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2">★</label>
                        <input type="radio" id="star1" name="rating" value="1" required>
                        <label for="star1">★</label>
                    </div>
                    <div class="mb-3">
                        <textarea name="feedback" class="form-control" rows="4" placeholder="Your Feedback" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Submit Feedback</button>
                </form>
                <div class="feedback-section mt-4" id="feedback-list">
                    <h5 class="border-bottom pb-2">Feedbacks</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional if you use Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function generateStars(rating) {
            let stars = '';
            for (let i = 1; i <= 5; i++) {
                stars += i <= rating ? '⭐' : '☆';
            }
            return stars;
        }

        function loadFeedbacks() {
            fetch('fetch_feedbacks.php')
                .then(response => response.json())
                .then(data => {
                    let feedbackHTML = '<h5 class="border-bottom pb-2">Feedbacks</h5>';
                    data.forEach(item => {
                        feedbackHTML += `
                            <div class='feedback-item'>
                                <strong>${item.name}:</strong> <span>${generateStars(item.rating)}</span>
                                <p class="mb-0">${item.feedback}</p>
                            </div>`;
                    });
                    document.getElementById('feedback-list').innerHTML = feedbackHTML;
                })
                .catch(error => console.error('Error:', error));
        }
        window.onload = loadFeedbacks;
    </script>
</body>

</html>
