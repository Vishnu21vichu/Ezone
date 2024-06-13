<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/guidestyle.css">
        <title>Guide</title>
        <link rel="icon" href="../img/LogoTab-01.png" type="image/png">
    
        <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        
        <link
        href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
        rel="stylesheet">
    </head>
<body>
    <header>
        <img src="../img/Logo-01.png" style="width: 120px; height: auto;">
        <ul class="navbar">
            <li><a href="Index.php">Home</a></li>
            <li><a href="Joinus.php">Join Us</a></li>
            <li><a href="Product.php">Products</a></li>
            <li><a href="contactus.php">Contact us</a></li>
            </ul>
    
        <div class="h-right">
            <a href="Index1.php">
                <h4 style="display: inline-block;">Log out</h4>
                <h4 class="material-icons-sharp" style="font-size: 30px; vertical-align: middle;">logout</h4>
            </a>        
            <div class="bx bx-menu" id="menu-icon"></div>
            </div>
        </header>

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 style="color: #59c4d2; margin-top: 60px;"><b>How to Charge</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <img style="width: 70%; margin-left: 40px;" src="../img/h4.png" class="img-fluid">
                <h2 class="text-center mt-3 mb-3">Plug in</h2>
                <p class="text-center" style="color: #fff;">Connect to your charging port.</p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <img style="width: 70%;  margin-left: 40px;" src="../img/h2.png" class="img-fluid">
                <h2 class="h5 text-center mt-3 mb-3">Tap to Start Your Charge</h2>
                <p class="text-center" style="color: #fff;">By Cash, Ezone card or credit card.</p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <img style="width: 70%;  margin-left: 40px;" src="../img/h3.png" class="img-fluid">
                <h2 class="h5 text-center mt-3 mb-3">Charge Up & Go</h2>
                <p class="text-center" style="color: #fff;">Your next destination awaits.</p>
            </div>
        </div>
        <button id="learnMoreBtn" class="learn-more-btn">Learn More</button>
    </section>
    <!-- End Categories of The Month -->

    <!-- The content that the button will scroll to -->

<div id="contentSection" class="content-section">
    <div><h1 class="text-center" style="font-size: 50px; font-family: 'Roboto', sans-serif; color: #fff;">How to Start a Charge</h1></div>
    <div><h4 class="text-center" style="color: #fff;">Choose how you'd like to pay</h4></div>
    <div class="content-container">
        <div class="title-container" style="border-bottom: 2px solid #59c4d2; margin-top: 40px;">
        <button class="title-button" onclick="showContent('orders')"> <h4 class="material-icons-sharp" style=" font-size: 30px; vertical-align:middle;">monetization_on</h4>   Cash</button>
        <button class="title-button" onclick="showContent('products')"><h4 class="material-icons-sharp" style=" font-size: 30px; vertical-align:middle;">tap_and_play</h4>   RFID</button>
        <button class="title-button" onclick="showContent('supplier')"><h4 class="material-icons-sharp" style=" font-size: 30px; vertical-align:middle;">credit_card</h4>   Credit Card</button>
         </div>

        <div id="orders" class="content">

            <section class="container1">
                <div class="container1-text">
                    <h5 style="color: #59c4d2;">Cash or UPI</h5>
                    <h2>1. Remove the appropriate connector from its holster and plug it into your EV’s charge port. (*Listen for the click!*)</h2>
                    <h2>2. On the charger screen, select Cash or UPI payment option.</h2>
                    <h2>3. Scan the QR code and make the payment or select Print the Bill and u can pay in cash to the nearby executive.</h2>
                    <h2>4. When you’re ready to end your session, tap “Stop” on the charger screen, then unplug the connector.</h2>

                </div>
                <div class="container1-img">
                    <img src="../img/image 2.webp">
                </div>
            </section>

        </div>
        
        <div id="products" class="content" style="display: none;">
             <section class="container1">
                <div class="container1-text">
                    <h5 style="color: #59c4d2;">RFID Card</h5>
                    <h2>If you already created your EZone account and have your EZone RFID card, make sure it’s activated before trying to start a charge.</h2>
                    <br>
                    <h2>1. Remove the appropriate connector from its holster and plug it into your EV’s charge port. (*Listen for the click!*)</h2>
                    <h2>2. On the charger screen, select RFID payment option.</h2>
                    <h2>3. Tap the RFID card where indicated on the charger.</h2>
                    <h2>4. When you’re ready to end your session, tap “Stop” on the charger screen, then unplug the connector.</h2>
                </div>
                <div class="container1-img">
                    <img src="../img/image.webp">
                </div>
            </section>
        </div>
        <div id="supplier" class="content" style="display: none;">
            <section class="container1">
                <div class="container1-text">
                    <h5 style="color: #59c4d2;">Credit Card</h5>
                    <h2>1. Remove the appropriate connector from its holster and plug it into the charge port. (*Listen for the click!*)</h2>

                        <h2>2. On the charger screen, select Credit Card payment option.</h2>
                        
                            <h2>3. Swipe or tap your credit card on the credit card reader.</h2>
                        
                                <h2>4. When you’re ready to end your session, tap “Stop” on the charger screen, then unplug the connector.</h2>
                </div>
                <div class="container1-img">
                    <img src="../img/image 3.webp">
                </div>
            </section>
        </div>
    </div>
       
</div>

<section class="footer">
    <div class="footer-box">
        <h3 style="color: aqua;">Services</h3>
        <a href="#">Campaigns</a>
        <a href="#">Brandings</a>
        <a href="#">Offline</a>
    </div>

    <div class="footer-box">
        <h3 style="color: aqua;">About</h3>
        <a href="#">Our Stories</a>
        <a href="#">Benefits</a>
        <a href="#">Team</a>
        <a href="#">Careers</a>
    </div>

    <div class="footer-box">
        <h3 style="color: aqua;">Help</h3>
        <a href="#">FAQs</a>
        <a href="#">Contact us</a>
    </div>

    <div class="footer-box">
        <h3 style="color: aqua;">Social</h3>
        <div class="social">
            <a href="#"><i class="ri-instagram-fill"></i></a>
            <a href="#"><i class="ri-twitter-fill"></i></a>
            <a href="#"><i class="ri-facebook-fill"></i></a>
        </div>
    </div>
</section>

<script>

    // Variables to store the button and the last scroll position
    let learnMoreBtn = document.getElementById('learnMoreBtn');
    let lastScrollTop = 0;
    
    // Function to toggle the visibility of the button based on scroll direction
    function toggleButtonVisibility() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            // Scrolling down
            learnMoreBtn.style.opacity = '0';
            learnMoreBtn.style.transform = 'translateY(20px)';
        } else {
            // Scrolling up
            learnMoreBtn.style.opacity = '1';
            learnMoreBtn.style.transform = 'translateY(0)';
        }
        lastScrollTop = scrollTop;
    }
    
    // Event listener for the scroll event
    window.addEventListener('scroll', toggleButtonVisibility);
    
    // Initial setup for the button
    learnMoreBtn.style.opacity = '1';
    learnMoreBtn.style.transform = 'translateY(0)';
    
    // Smooth scrolling to the target content when the button is clicked
    learnMoreBtn.addEventListener('click', function(event) {
        event.preventDefault();
        let targetPosition = document.getElementById('contentSection').offsetTop - 80; // Subtract the height of the navbar (80px)
        document.querySelector('html').scrollTo({
            top: targetPosition,
            behavior: "smooth"
        });
    });
    
    
    function showContent(id) {
     // Hide all content sections
     document.querySelectorAll('.content').forEach(content => {
        content.style.display = 'none';
     });
    
     // Display the content section related to the clicked title
     document.getElementById(id).style.display = 'block';
    }
    
    
    </script>
     <script src="../js/script.js"></script>
     </body>
</html>