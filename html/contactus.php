<!DOCTYPE html>
<html lang="en">
<!--Created by Tivotal-->

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../img/LogoTab-01.png" type="image/png">
  <title>Need Help?</title>

  <!--font awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

  <!--css file-->
  <link rel="stylesheet" href="../css/Cont_styles.css" />
</head>

<body>
  <div class="container">
    <div class="big-circle"></div>
    <div class="form">
      <div class="contact-info">
        <h3 class="title">Stuck Somewhere?</h3>
        <p class="text">
          We're here to help, just provide us with the location and other necessary information, and a member of our
          staff will arrive as quickly as lightning to assist you.
        </p>

        <div class="info">
          <div class="information">
            <i class="fa-solid fa-map-location-dot icon"></i>
            <p>Bangalore, India 560070</p>
          </div>
          <div class="information">
            <i class="fa-solid fa-envelope icon"></i>
            <p>aezone6001@gmail.com</p>
          </div>
          <div class="information">
            <i class="fa-solid fa-phone-volume icon"></i>
            <p>+91 7358178352</p>
          </div>
        </div>

        <div class="social-media">
          <p>Connect with Us</p>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
      <div class="contact-form">
        <div class="circle one"></div>
        <div class="circle two"></div>

        <form action="contact.php" method="post" autocomplete="off">
          <h3 class="title">Contact Us</h3>
          <div class="input-container">
            <input type="text" name="name" class="input" required />
            <label for="">Name</label>
            <span>Name</span>
          </div>
          <div class="input-container">
            <input type="email" name="email" class="input" required/>
            <label for="">Email</label>
            <span>Email</span>
          </div>
          <div class="input-container">
            <input type="tel" name="phone" class="input" required/>
            <label for="">Phone</label>
            <span>Phone</span>
          </div>
          <div class="input-container textarea">
            <textarea name="location" id="location" class="input" readonly></textarea>
            <label for="location">Location</label>
            <span>Location</span>
            <input type="button" value="Get Location" onclick="getLocation()" class="btn" />
          </div>
          <input type="button" value="Send" onclick="validateAndOpenPopup()" class="btn" />
          <div class="popup" id="popup">
            <img src="../img/tick.png">
            <h2>Thank You!</h2>
            <p>Soon our staff will reach out to your location and assist you.</p>
            <button onclick="closePopup(), redirectToIndex()" class="btn">OK</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    function redirectToIndex() {
      window.location.href = "Index.php"; // Redirect to index.php
    }
    function validateAndOpenPopup() {
      const name = document.querySelector('input[name="name"]');
      const email = document.querySelector('input[name="email"]');
      const phone = document.querySelector('input[name="phone"]');
  
      if (name.value && email.value && phone.value) {
        openPopup();
      } else {
        alert("Missed Out Something! Please fill in all required fields.");
      }
    }
  
    // The rest of your code remains the same
  </script>
  
  <script>

    //popup
    let popup = document.getElementById("popup");
    function openPopup() {
      popup.classList.add("open-popup");
    }
    function closePopup() {
      popup.classList.remove("open-popup");
    }



    const inputs = document.querySelectorAll(".input");

    function focusFunc() {
      let parent = this.parentNode;
      parent.classList.add("focus");
    }

    function blurFunc() {
      let parent = this.parentNode;
      if (this.value == "") {
        parent.classList.remove("focus");
      }

    }

    inputs.forEach((input) => {
      input.addEventListener("focus", focusFunc);

      input.addEventListener("blur", blurFunc);
    })

    //location
    const input = document.querySelectorAll(".input");

    function focusFunc() {
      let parent = this.parentNode;
      parent.classList.add("focus");
    }

    function blurFunc() {
      let parent = this.parentNode;
      if (this.value == "") {
        parent.classList.remove("focus");
      }
    }

    inputs.forEach((input) => {
      input.addEventListener("focus", focusFunc);
      input.addEventListener("blur", blurFunc);
    })

    //location
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
        document.getElementById("location").value = "Geolocation is not supported by this browser.";
        showError({ code: error.UNKNOWN_ERROR }); // Trigger unknown error for consistency
      }
    }

    function showPosition(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      var locationInput = document.getElementById("location");
      locationInput.value = "Latitude: " + latitude + ", Longitude: " + longitude;

      // Move the label up when the value is set
      locationInput.parentNode.classList.add("focus");
    }

    function showError(error) {
      let errorMessage;

      switch (error.code) {
        case error.PERMISSION_DENIED:
          errorMessage = "User denied the request for location.";
          break;
        case error.POSITION_UNAVAILABLE:
          errorMessage = "Location information is unavailable.";
          break;
        case error.TIMEOUT:
          errorMessage = "The request to get user location timed out.";
          break;
        default:
          errorMessage = "An unknown error occurred.";
      }

      document.getElementById("location").value = errorMessage;
      // Move the label up for error cases as well
      document.getElementById("location").parentNode.classList.add("focus");
    }
  </script>
</body>

</html>