<!-- <!DOCTYPE html> -->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahavir Electronics & Showroom</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @media screen and (min-width: 800px) {
            .container {
                max-width: 100%;
            }

            .question {
                margin-bottom: 20px;
            }

            .customer_name_cs {
                width: 50%;
                height: 40px;
            }

            .input_bar {
                display: flex;
                flex-direction: column;
                align-content: center;
                align-items: center;
            }

            .input_bar input {
                border-radius: 15px;
                padding: 8px;
                text-align: center;
                margin-bottom: 10px;

            }

            .input_bar select {
                border-radius: 15px;
                padding: 8px;
                text-align: center;
                margin-bottom: 10px;
            }
        }

        p {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="logo-container">
                <img src="https://mahavirelectronics.net/wp-content/uploads/2023/12/orignal-logo-1-e1701763691896.png" alt="Your Logo" class="logo">
            </div>
            <div class="feedback-form">Customer Feedback Survey</div>
        </header>
        <div class="scrollable-section">
            <form action=Submit.php" method="POST">
                <div class="input_bar">
                    <label for="customer_name" style="text-align:center;"><strong>Customer Name:</strong></label>
                    <input type="text" id="customer_name" placeholder="Enter your name here ...." name="customer_name" class="customer_name_cs" required><br>

                    <label for="customer_email" style="text-align:center;"><strong>Email:</strong></label>
                    <input type="email" id="customer_email" placeholder="Enter your email address" name="customer_email" class="customer_name_cs" required><br>

                    <label for="customer_mobile" style="text-align:center;"><strong>Mobile Number:</strong></label>
                    <input type="tel" id="customer_mobile" placeholder="Enter your mobile number" name="customer_mobile" class="customer_name_cs" required><br>
                </div>

                <div class="input_bar">
                    <label for="dummy_selector" style="text-align:center;"><strong>Select an Option:</strong></label>
                    <select id="dummy_selector" name="dummy_selector" class="customer_name_cs" style="padding: 8px; border-radius: 5px;">
                        <option value="Kondwa">Kondwa</option>
                        <option value="Fatimanagar">Fatimanagar</option>
                        <option value="Campus">Campus</option>
                        <option value="Salunkevihar">Salunkevihar</option>
                    </select>
                </div>


                <div class="question">
                    <p>1. Did our staff meet your expectations in terms of assistance and support?</p>
                    <div class="star-rating" id="question1">
                        <input type="hidden" name="rating1" value="0">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                </div>

                <div class="question">
                    <p>2. Did you feel that our showroom environment contributed to a positive and hygienic shopping experience?</p>
                    <div class="star-rating" id="question2">
                        <input type="hidden" name="rating2" value="0">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                </div>

                <div class="question">
                    <p>3. Did you find our pricing competitive compared to other players?</p>
                    <div class="star-rating" id="question3">
                        <input type="hidden" name="rating3" value="0">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                </div>

                <div class="question">
                    <p>4. How likely are you to recommend our showroom to friends or family?</p>
                    <div class="star-rating" id="question4">
                        <input type="hidden" name="rating4" value="0">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                </div>

                <div class="question">
                    <p>5. How likely are you to purchase from us again?</p>
                    <div class="star-rating" id="question5">
                        <input type="hidden" name="rating5" value="0">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                </div>


                <div style="text-align: center;">
                    <input type="submit" value="Submit Rating" class="submit-btn">
                </div>
            </form>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            function handleStarRating(starRating) {
                const stars = starRating.querySelectorAll('i');

                stars.forEach(function(star) {
                    star.addEventListener('click', function() {
                        const rating = parseInt(star.dataset.rating);
                        const hiddenInput = starRating.querySelector('input[type="hidden"]');
                        hiddenInput.value = rating;

                        stars.forEach(function(s, index) {
                            if (index < rating) {
                                s.classList.remove('far');
                                s.classList.add('fas');
                                s.style.color = '#FFD700';
                            } else {
                                s.classList.remove('fas');
                                s.classList.add('far');
                                s.style.color = '#ccc';
                            }
                        });
                    });
                });
            }


            document.querySelectorAll('.star-rating').forEach(function(starRating) {
                handleStarRating(starRating);
            });


            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault();


                const formData = new FormData(this);


                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'Submit.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {

                            // document.getElementById('modal-message').textContent = 'Rating submitted successfully!';
                            // document.getElementById('myModal').style.display = 'block';

                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Rating submitted successfully!',
                                confirmButtonText: 'OK'
                            }).then((result) => {

                                if (result.isConfirmed) {
                                    // window.location.href = 'https://www.google.com/search?gs_ssp=eJwFwUsKgCAQAFDa1hkCN61zzBA9QreY0amEPmCS0ul7r-3GbYQcfMgfyMYNsk7kFSOCIWYJenWyqtUqq5We0DAEmpf-xB3fmAQf7HO6r-gfQZEKFwzxBx8FGs4&q=mahavir+electronics+bibwewadi&rlz=1C1ONGR_enIN1066IN1066&sourceid=chrome&ie=UTF-8#lrd=0x3bc2eaa17bee014f:0x2f9294243a7e1db5,3';
                                    console.log('User confirmed success message');
                                    window.location.href = 'qrcode.php';
                                    // Reset form after modal is closed
                                    document.querySelector('.close').addEventListener('click', function() {
                                        document.getElementById('myModal').style.display = 'none';
                                        document.querySelector('form').reset();
                                    });
                                    // document.querySelector('form').reset();
                                    // location.reload();
                                    // Refresh the page after the modal is closed
        window.setTimeout(function() {
                    location.reload();
                }, 3000); // Refresh after 3 seconds (adjust as needed)
            } else {
                // Display error message in modal
                document.getElementById('modal-message').textContent = 'Error: ' + response.message;
                document.getElementById('myModal').style.display = 'block';
            }
                    }else {
                        console.error('HTTP error:', xhr.status);
                    }
                };


                xhr.send(new URLSearchParams(formData));
            });
        });
    </script>

    <!-- <script src="script.js"></script> -->

</body>


</html>