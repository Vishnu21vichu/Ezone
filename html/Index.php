<?php
include 'session.php';
// session_start();
// Check if the user is logged in
if (!isset($_SESSION['Email'])) {
    header("Location: Index1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Home</title>
    <link rel="icon" href="img/LogoTab-01.png" type="image/png">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">
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

    .modal-background {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: grid;
        place-items: center;
        opacity: 0;
        visibility: hidden;
        transform: scale(1, 1);
        background: rgba(0, 0, 0, 0.59);
        transition: 0.5s;
    }

    body.open .modal-background {
        visibility: visible;
        opacity: 1;
        animation: background-in 1s both;
    }

    .modal {
        position: fixed;
        top: 50%;
        left: 50%;
        background: #252328;
        color: #f9f9f9;
        padding: 48px 40px;
        border-radius: 12px;
        width: 400px;
        translate: -50% -50%;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s;
    }

    body.open .modal {
        opacity: 1;
        visibility: visible;
        animation: modal-in 1s;
    }

    body.closed .modal {
        opacity: 0;
        visibility: hidden;
        translate: -50% -50%;
    }


    @keyframes background-in {
        0% {
            scale: 0 0.005;
        }

        33% {
            scale: 1 0.005;
        }

        66%,
        100% {
            scale: 1 1;
        }
    }


    @keyframes modal-in {

        0%,
        66% {
            opacity: 0;
            visibility: hidden;
            translate: -50% -30%;
        }

        100% {
            opacity: 1;
            visibility: visible;
        }
    }
</style>

<body>
    <!-- -header design-->
    <header>
        <img src="../img/Logo-01.png" style="width: 120px; height: auto;">
        <ul class="navbar">
            <li><a href="Product.php">Products</a></li>
            <li><a href="Joinus.php">Join us</a></li>
            <li><a href="guide.php">Guide</a></li>
            <li><a href="contactus.php">Contact us</a></li>
        </ul>

        <div class="h-right">
            <a href="Index1.php?logout">
                <h4 style="display: inline-block;">Log out</h4>
                <h4 class="material-icons-sharp" style="font-size: 30px; vertical-align: middle;">logout</h4>
            </a> 
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <section class="home">
        <video autoplay muted loop>
            <source src="../img/Home.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="home-text">
            <h5>Future of Charging</h5>
            <h1>Any <span class="multiText"></span></h1>
            <p>Superfast and safe charging<br> stations nearly everywhere.</p>
            <a onclick="toggleModal()" class="btn">FIND STATIONS</a>

            <div class="modal-background" onclick="toggleModal()"></div>

            <div class="modal">
                <h2 style="margin: 0 0 8px; color: rgb(255, 255, 255);" class='bx bxs-bell-ring'></h2>
                <p style="margin: 0; color: rgba(255, 255, 255, 0.5); margin-bottom: 10px; font-size: 1rem;">
                    We apologize for any inconvenience, but the number of charging stations we presently have accessible
                    is limited to Bengaluru. We plan to extend this in the future.
                </p>
                <a href="Location.php" style="color: aqua">See Locations &rarr;</a>
            </div>

        </div>
    </section>

    <section class="feature">
        <div class="feature-content">
            <div class="center-text">
                <h2>How <h2 style="color: aqua;">We Work</h2>
                </h2>
            </div>
            <div class="row">
                <div class="row-img">
                    <img src="../img/nap1.jpg">
                </div>
                <h4>Fast Charging</h4>
            </div>

            <div class="row">
                <div class="row-img">
                    <img src="../img/nap2.jpg">
                </div>
                <h4>Good Management</h4>
            </div>

            <div class="row">
                <div class="row-img">
                    <img src="../img/nap3.jpg">
                </div>
                <h4>Renewable Energy</h4>
            </div>

            <div class="row">
                <div class="row-img">
                    <img src="../img/nap4.jpg">
                </div>
                <h4>Quality Charger</h4>
            </div>
        </div>
    </section>

    <section class="container1">
        <div class="container1-img">
            <img src="../img/h1.png">
        </div>

        <div class="container1-text">
            <h5>We Got you covered</h5>
            <h2>Evolutionary electric vehicle charging stations that are faster & more efficient.</h2>
            <a href="https://www.databridgemarketresearch.com/articles/charging-ahead-the-electric-vehicle-revolution" class="btn">Read more</a>
        </div>
    </section>

    <section class="container2">
        <div class="center-text">
            <h2>Checkout Our Blogs</h2>
        </div>
        <div class="container2-content">
            <div class="box">
                <img src="../img/t3.jpg">
                <h6>Adam | Aug 17,2023</h6>
                <h4>Best experience</h4>
            </div>

            <div class="box">
                <img src="../img/t2.jpg">
                <h6>Andrea | Jul 2,2023</h6>
                <h4>Extraordinary</h4>
            </div>

            <div class="box">
                <img src="../img/t1.jpg">
                <h6>Sam | Sep 13,2023</h6>
                <h4>Lovely!!</h4>
            </div>
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
    <button onclick="scrollToTop()" id="scrollUpBtn" title="Go to top"><span class="material-icons-sharp"
            style="font-size: 40px; color: darkblue;">
            keyboard_arrow_up
        </span></button>

    <script>
        const toggleModal = () => {
            const bodyClassList = document.body.classList;
            if (bodyClassList.contains("open")) {
                bodyClassList.remove("open");
                bodyClassList.add("closed");
            } else {
                bodyClassList.remove("closed");
                bodyClassList.add("open");
            }
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

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        var typingEffect = new Typed(".multiText",{
            strings : ["Place","Time"],
            loop:true,
            typeSpeed:100,
            backSpeed:80,
            backDelay:1500
        })
    </script>
</body>

</html>