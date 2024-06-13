<?php
include 'session.php';
// session_start();
if (isset($_GET['logout'])) {
    // Session::unset_all();
    //Session::delete();

    session_destroy();

    // Redirect to index.php or any other page
    header("Location: Index1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/styles_login.css">
    <title>Login & Sign-up Page</title>
    <style>
        #admin {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .link-button {
            background-color: #fefefe;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }

        .link-button1 {
            background-color: #eef1f1;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="connect.php" method="post">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="https://accounts.google.com/o/oauth2/auth?client_id=YOUR_GOOGLE_CLIENT_ID&redirect_uri=YOUR_GOOGLE_REDIRECT_URI&response_type=code&scope=email%20profile" target="_blank" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="https://www.facebook.com/v12.0/dialog/oauth?client_id=YOUR_FACEBOOK_APP_ID&redirect_uri=YOUR_FACEBOOK_REDIRECT_URI&response_type=code&scope=email" target="_blank" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://github.com/login/oauth/authorize?client_id=YOUR_GITHUB_CLIENT_ID&redirect_uri=YOUR_GITHUB_REDIRECT_URI&scope=read:user" target="_blank" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=YOUR_LINKEDIN_CLIENT_ID&redirect_uri=YOUR_LINKEDIN_REDIRECT_URI&scope=r_liteprofile%20r_emailaddress" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="Password" required>
                <button class="link-button1" style="color: #fff;">Sign In</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="https://accounts.google.com/o/oauth2/auth?client_id=YOUR_GOOGLE_CLIENT_ID&redirect_uri=YOUR_GOOGLE_REDIRECT_URI&response_type=code&scope=email%20profile" target="_blank" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="https://www.facebook.com/v12.0/dialog/oauth?client_id=YOUR_FACEBOOK_APP_ID&redirect_uri=YOUR_FACEBOOK_REDIRECT_URI&response_type=code&scope=email" target="_blank" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://github.com/login/oauth/authorize?client_id=YOUR_GITHUB_CLIENT_ID&redirect_uri=YOUR_GITHUB_REDIRECT_URI&scope=read:user" target="_blank" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=YOUR_LINKEDIN_CLIENT_ID&redirect_uri=YOUR_LINKEDIN_REDIRECT_URI&scope=r_liteprofile%20r_emailaddress" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" placeholder="Email" name="Email" required>
                <input type="password" placeholder="Password" name="Password" required>
                <a href="#">Forget Your Password?</a>
                <button class="link-button1" style="color: #fff;">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <form id="adminLoginForm" style="background-color: rgba(0, 255, 255, 0);" action="admininfo.ph" method="post">
                        <h1 style="margin-bottom: 10px;">Administrator</h1>
                        <input type="text" id="adminname" placeholder="Username" name="adminname" required>
                        <input type="password" id="adminpassword" placeholder="Password" name="adminpassword" required>
                        <div id="errorMessage" style="color: rgb(246, 7, 7);"></div>
                        <button class="link-button" style="color: #fff;">Sign In</button>
                    </form>

                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Don't Have a Account?</h1>
                    <p>Come walk with us into the new future today.</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('adminLoginForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            var adminname = document.getElementById('adminname').value;
            var adminpassword = document.getElementById('adminpassword').value;

            fetch('admininfo.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'adminname=' + encodeURIComponent(adminname) + '&adminpassword=' + encodeURIComponent(adminpassword)
    })
    .then(response => response.json())
    .then(data => {
        if (data.valid) {
            // Set session storage upon successful login
            sessionStorage.setItem('loggedInUser', adminname);

            // Redirect to the admin dashboard
            window.location.href = "../Admin/AdminDashboard.php";
        } else {
            // Display an error message
            document.getElementById('errorMessage').textContent = data.message || "Login failed.";
        }
    })
    .catch(error => console.error('Error during login:', error));
});


        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');
        const adminBtn = document.getElementById('admin');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });

        adminBtn.addEventListener('click', () => {
            container.classList.toggle("admin-sign-up");
        });
    </script>
</body>

</html>