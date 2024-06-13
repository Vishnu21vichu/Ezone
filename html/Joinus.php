<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
    <title>Join Us</title>
    <link rel="icon" href="../img/LogoTab-01.png" type="image/png">

    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet">
</head>
<style>

#scrollUpBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    background: rgb(8, 239, 255);
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    transition: background 0.3s, transform 0.3s;
    }

    #scrollUpBtn:hover {
        background: rgb(255, 255, 255)
    }

    #scrollUpBtn:active {
        transform: scale(0.9);
    }


.faq-container {
            max-width: 1200px;
            margin: auto;
        }

        .question-container {
            position: relative;
            padding: 20px;
            margin: 5px 0;
            transition: color 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        }

        .question {
            cursor: pointer;
            text-decoration: none;
            color: #ffffff; /* Change color to match your design */
        }
        .question:hover .underline,
        .question.open .underline {
            transform: scaleX(1);
        }

        .question::after {
            content: 'chevron_right';
            font-family: 'Material Icons Sharp', sans-serif;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            transition: transform 0.3s;
            color: #ffffff;
        }
        .question-container.open .question::after {
            transform: translateY(-50%) rotate(90deg);
            transition: transform 0.3s;
        }

        .answer {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.5s ease-out;
            padding: 0 10px;
            margin-left: 10px;
        }

        .open {
            color:aqua;
        }

        .open::after {
            transform: translateY(-50%) rotate(90deg);
        }
</style>
<body>
    <!-- -header design-->
<header>
    <img src="../img/Logo-01.png" style="width: 120px; height: auto;">
    <ul class="navbar">
        <li><a href="Index.php">Home</a></li>
        <li><a href="Product.php">Products</a></li>
        <li><a href="guide.php">Guide</a></li>
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

    <section class="home">
        <div class="home-text">
        <h1>Partner <br> With Us</h1>
        <h5>Solutions for the organization</h5>
        </section>

        <section class="container1">
            <div class="container1-img">
                <img src="../img/w1.png">
            </div>

            <div class="container1-text">
                <h5>Franchise</h5>
                <h2>Build your own EZone Charging Hub Starting at Rs. 10,00,000.</h2>
            </div>
        </section>

        <section class="container1">
            <div class="container1-text">
                <h5>Destination and Commercial charging</h5>
                <h2>Offer EV charging as an amenity at your property.</h2>
            </div>
            <div class="container1-img">
                <img src="../img/w3.png">
            </div>
        </section>

        <section class="container1">
            <div class="container1-img">
                <img src="../img/w2.png">
            </div>

            <div class="container1-text">
                <h5>Products and Services</h5>
                <h2>Your investment on your terms</h2>
            </div>
        </section>

        <section class="feature">
            <div class="feature-content">
                <div class="center-text">
                    <h2>Why<h2 style="color: aqua;">partner with us? </h2></h2>
                </div>
                <div class="row">
                    <div class="row-img">
                        <img src="../img/r3.png">
                    </div>
                    <h3 style="color: aqua;">Reliability</h3>
                    <h5 style="margin-top: 10px;">Manufactured, designed, and made in India. Largest EV charging network and growing.</h5>
                </div>

                <div class="row">
                    <div class="row-img">
                        <img src="../img/r1.png">
                    </div>
                    <h3 style="color: aqua;">Transparency</h3>
                    <h5 style="margin-top: 10px;">Complete visibility of your chargers and it's usage through our Charging System Management Software (CSMS).</h5>
                </div>

                <div class="row">
                    <div class="row-img">
                        <img src="../img/r2.png">
                    </div>
                    <h3 style="color: aqua;">Feasibility</h3>
                    <h5 style="margin-top: 10px;">Both Hardware and Software built in house, means no technical pendency on any third party vendor. End to end solution in house by Ezone.</h5>
                </div>
            </div>
        </section>
        <section>
            <div class="contact-container">
                <form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
                    <div class="contact-left-title">
                        <h2>Request Form</h2>
                    </div>
                    <input type="hidden" name="access_key" value="74136d0a-f765-4107-8561-b5f13a2a1c4a">
                    <div class="row-container">
                        <div class="icon-input">
                            <span class="material-icons-sharp">person_outline</span>
                            <input type="text" name="name" placeholder="Full Name*" class="contact-inputs" required>
                        </div>
                        
                        <div class="icon-input">
                            <span class="material-icons-sharp">mail_outline</span>
                            <input type="email" name="email" placeholder="Email*" class="contact-inputs" required>
                        </div>
                    </div>
                    
                    <div class="row-container">
                        <div class="icon-input">
                            <span class="material-icons-sharp">phone</span>
                            <input type="text" name="phone" placeholder="91*" class="contact-inputs" required>
                        </div>
        
                        <div class="icon-input">
                            <span class="material-icons-sharp">place</span>
                            <input type="text" name="city" placeholder="City*" class="contact-inputs" required>
                        </div>
                    </div>
        
                    <textarea name="message" rows="4" placeholder="Additional Message" class="contact-inputs"></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </section>
        
        <section>
            <div class="center-text">
                <h3 style="font-size: 20px;">FAQ</h3>
                <br>
                <h2 style="color: aqua;">Got questions on EV?</h2>
                <br>
                <br>
            </div>

            <div class="faq-container">
                <div class="question-container" onclick="toggleAnswer('q1')">
                    <div class="question"><h3>How long is the installation process?</h3></div>
                   
                </div>
                <div class="answer" id="q1">A charger installation typically takes 2-3 hours, after we have completed installation pre-requisites. Contact Us now to learn more!</div>
        
                <div class="question-container" onclick="toggleAnswer('q2')">
                    <div class="question"><h3>How long the warranty contract is valid for?</h3></div>
                </div>
                <div class="answer" id="q2">EZone offers a warranty period of 1 year for our chargers.</div>
        
                <div class="question-container" onclick="toggleAnswer('q3')">
                    <div class="question"><h3>Are there Public EV Car Charging Stations in India?</h3></div>
                    
                </div>
                <div class="answer" id="q3">As of July 2021, 350 more public charging stations were installed, adding to the convenience of driving an EV. Gujarat, Madhya Pradesh, Maharashtra, Kerala, Andhra Pradesh, Uttarakhand, Tamil Nadu are some of the states that are now equipped with public EV charging stations. The added sanction for the installation of 2,877 charging stations will further increase the number of EVs taking to the streets in India in the coming years.</div>
        
                <div class="question-container" onclick="toggleAnswer('q4')">
                    <div class="question"><h3>How Much Does it cost to Fully Charge Your Electric Car?</h3></div>
                    
                </div>
                <div class="answer" id="q4">The battery pack of the EV model and the range it covers will let you get the right estimate of fully charging your car. On average, it would cost anywhere between Rs 150 to Rs 200 to fully charge your electric vehicle.</div>
        
        
            </div>
        </section>

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
         <!-- Scroll Up Button -->
         <button onclick="scrollToTop()" id="scrollUpBtn" title="Go to top"><span class="material-icons-sharp" style="font-size: 40px; color: darkblue;">
            keyboard_arrow_up
            </span></button>


        <script> 
    
        function toggleAnswer(answerId) {
            var answer = document.getElementById(answerId);
            var questionContainer = answer.previousElementSibling;

            answer.classList.toggle("open");
            answer.style.maxHeight = answer.classList.contains("open") ? answer.scrollHeight + "px" : 0;

            questionContainer.classList.toggle("open");
        }

         // Function to scroll smoothly to the top of the page
         function scrollToTop() {
                document.body.scrollTop = 0; // For Safari
                document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
            }

            // Show/hide the scroll-up button based on scrolling
            window.onscroll = function () {
                showScrollUpButton();
            };

            function showScrollUpButton() {
                var scrollUpBtn = document.getElementById("scrollUpBtn");
                if (
                    document.body.scrollTop > 20 ||
                    document.documentElement.scrollTop > 20
                ) {
                    scrollUpBtn.style.display = "block";
                } else {
                    scrollUpBtn.style.display = "none";
                }
            }
        </script>

           
    <script src="../js/script.js"></script>
</body>
</html>