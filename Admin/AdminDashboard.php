<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="Adminstyle.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="icon" href="../img/LogoTab-01.png" type="image/png">
    <title>Admin Dashboard</title>
</head>
<style>

.file-upload-label input {
  display: none;
}
.file-upload-label svg {
  height: 50px;
  fill: rgb(82, 82, 82);
  margin-bottom: 20px;
}
.file-upload-label {
  cursor: pointer;
  background-color: #f5f5f5;
  padding: 30px 70px;
  border-radius: 40px;
  box-shadow: 0px 0px 200px -50px rgba(0, 0, 0, 0.719);
}
.file-upload-design {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 5px;
}
.browse-button {
  background-color: rgb(82, 82, 82);
  padding: 5px 15px;
  border-radius: 10px;
  color: white;
  transition: all 0.3s;
}
.browse-button:hover {
  background-color: rgb(14, 14, 14);
}

 form select{
    border: 0;
    margin: 10px 0;
    padding: 10px;
    outline: none;
    background: #f5f5f5;
    font-size: 16px;
    
}
form option{
    border-radius: 20px;
}
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 9999;
}

.spinner {
    position: absolute;
    top: 47%;
    left: 47%;
    transform: translate(-50%, -50%);
    border: 16px solid #f3f3f3;
    border-top: 16px solid #3498db;
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}


    table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 28px;
    text-align: left; /* Flush-left alignment */
}

thead {
    background-color: #040404; /* Light background for headers */
}

/* Add this to your existing CSS */
.active {
    background-color: #040404; /* Example: darker background for active state */
    color: white; /* Example: white text for active state */
    border-radius: 15px;
}

tbody tr:nth-child(even) {
    background-color: #000000; /* Alternating row colors */
}

/* Additional styles for specific elements */
.important-cell {
    font-weight: bold; /* Bold text for important cells */
}

.done-row {
    background-color: transparent;
    border: none; /* Remove border */
    cursor: pointer; /* Change the cursor to a pointer when hovering over the button */
}

.done-row:hover {
    color: black; 
}
 /* Modal styles */
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
    overflow: hidden; /* Prevent scroll from modal background */
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
    padding: 12px; /* Adjusted padding */
    border-radius: 12px;
    max-width: 300px; /* Reduced max-width */
    max-height: 50vh; /* Reduced max-height */
    transform: translate(-50%, -50%);
    opacity: 0;
    visibility: hidden;
    transition: 0.3s;
    overflow: hidden; /* Prevent scroll from modal */
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
}

body.open .modal {
    opacity: 1;
    visibility: visible;
    animation: modal-in 1s;
}

body.closed .modal {
    opacity: 0;
    visibility: hidden;
    transform: translate(-50%, -50%);
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
        transform: translate(-50%, -30%);
    }

    100% {
        opacity: 1;
        visibility: visible;
    }
}

</style>
<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="images/Logo.png">
                    <h2>E<span style="color: rgb(57, 163, 199);">Zone</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active" id="dashboard-link">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#" id="Prod-link">
                    <span class="material-icons-sharp">
                        post_add
                    </span>
                    <h3>Add Products</h3>
                </a>
                <a href="#" id="ticket-link">
                    <span class="material-icons-sharp">
                            question_answer
                    </span>
                    <h3>Tickets</h3>
                </a>
                <a href="#" id="Maps-link">
                    <span class="material-icons-sharp">
                    ev_station
                    </span>
                    <h3>Maps</h3>
                </a>
                <a href="#" id="orders-link">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Orders</h3>
                </a>
                <a href="#" id="admin-link">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="../html/Index1.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main id="main-content">
           

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b id="greeting"></b></p>
                        <small class="text-muted" id="aminnumb"></small>
                    </div>
                    <div class="profile-photo">
                        <img id="profilepic" src="">
                    </div>
                </div>
            </div>
                <!--End of nav-->
                <div class="user-profile">
                    <div class="logo">
                        <img id="logopic" src="">
                        <h2 id="logoname"></h2>
                      
                    </div>
                </div>                

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>
                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Meeting</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div id="reminders-list"></div>
                <!-- style="background-color: transparent;" -->

                <div class="notification add-reminder" id="add-reminder-btn" >
                <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- The Modal -->
    <div class="modal-background">
        <div class="modal">
            <div class="contact-container">
                <form id="reminderForm" class="contact-left" style=" align-items: center;">
                    <div class="contact-left-title">
                        <h2>Reminder</h2>
                    </div>
                    <div class="row-container">
                        <div class="icon-inputs">
                            <input type="text" name="reminder_title" placeholder="Title*" class="contact-inputs" required>
                        </div>
                        <div class="icon-inputs">
                            <input type="time" name="reminder_time" placeholder="Time*" class="contact-inputs" required>
                        </div>
                    </div>
                    <button type="submit">Add Reminder</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
    
    function updateMainContent(content) {
        const mainContent = document.getElementById('main-content');
        mainContent.innerHTML = content;
    }

    function setActiveLink(linkId) {
    // Remove active class from all links
    const links = document.querySelectorAll('.sidebar a');
    links.forEach(link => link.classList.remove('active'));

    // Add active class to the clicked link
    document.getElementById(linkId).classList.add('active');
}


 // Get the modal and background
 const modalBackground = document.querySelector('.modal-background');
        const modal = document.querySelector('.modal');

        // Get the button that opens the modal
        const btn = document.getElementById("add-reminder-btn");

        // Get the <span> element that closes the modal
        const span = document.querySelector(".close");

        // Get the form inside the modal
        const form = document.getElementById('reminderForm');

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            document.body.classList.add('open');
            document.body.classList.remove('closed');
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            document.body.classList.add('closed');
            document.body.classList.remove('open');
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modalBackground) {
                document.body.classList.add('closed');
                document.body.classList.remove('open');
            }
        }

        // Function to format time to 12-hour format with AM/PM
        function formatTimeTo12Hour(time) {
            let [hours, minutes] = time.split(':');
            let period = 'AM';

            hours = parseInt(hours);

            if (hours >= 12) {
                period = 'PM';
                if (hours > 12) {
                    hours -= 12;
                }
            } else if (hours === 0) {
                hours = 12;
            }

            return `${hours}:${minutes} ${period}`;
        }

        // Function to add reminder
        function addReminder(title, time) {
            const remindersList = document.getElementById('reminders-list');
            const formattedTime = formatTimeTo12Hour(time);
            const reminderHTML = `
                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>${title}</h3>
                            <small class="text_muted">
                                At: ${formattedTime}
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>
            `;
            remindersList.insertAdjacentHTML('beforeend', reminderHTML);
        }

        // Handle form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const title = form.elements.reminder_title.value;
            const time = form.elements.reminder_time.value;
            addReminder(title, time);
            document.body.classList.add('closed'); // Close the modal
            document.body.classList.remove('open'); // Ensure the modal is closed
            form.reset(); // Clear the form
        });

        document.getElementById('orders-link').addEventListener('click', function(event) {
    event.preventDefault();
    fetch('fetch_orders.php')
        .then(response => response.text())
        .then(data => {
            const ordersTableContent = `
                <table>
                    <thead>
                        <tr>
                            <th scope="col" width="50px">Sno</th>
                            <th scope="col">User</th>
                            <th scope="col" width="100px">Category</th>
                            <th scope="col" width="80px">Model</th>
                            <th scope="col" width="290px">Unique No.</th>
                        </tr>
                    </thead>
                    <tbody>${data}</tbody>
                </table>
            `;
            updateMainContent(ordersTableContent);
            setActiveLink('orders-link');
        })
        .catch(error => console.error('Error:', error));
});

document.getElementById('ticket-link').addEventListener('click', function (event) {
    event.preventDefault();
    fetch('fetch_data.php')
        .then(response => response.text())
        .then(data => {
            const ticketTableContent = `
                <table >
                    <thead>
                        <tr>
                            <th scope="col" width="100px">Name</th>
                            <th scope="col" width="20px">Email</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Location</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>${data}</tbody>
                </table>
            `;
            updateMainContent(ticketTableContent);
            setActiveLink('ticket-link');

            document.querySelectorAll('.done-row').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const id = this.getAttribute('data-id');
        
        // Send a POST request to delete the row
        fetch('fetch_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'delete_id=' + id,
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Log the response for debugging
            // If deletion is successful, remove the corresponding row from the table
            this.parentElement.parentElement.remove();
        })
        .catch(error => console.error('Error:', error));
                });
            });
        })
        .catch(error => console.error('Error:', error));
});

document.getElementById('Maps-link').addEventListener('click', function(event) {
    event.preventDefault();
    const mapdetails = `
    <section>
<div class="contact-container" style="margin-top:-70px;">
    <form method="POST" action="battery.php" class="contact-left">
        <div class="contact-left-title">
            <h2>PODS AVAILABILITY</h2>
        </div>
        <div class="row-container">
                <div class="icon-input">
                    <select name="Place" class="contact-inputs" required>
                        <option value="" disabled selected style="color: rgba(0, 0, 0, 0.264);">Place</option>
                        <option value="">Kengeri</option>
                        <option value="Rajarjeshwari Nagar">Rajarajeshwari Nagar</option>
                        <option value="Banashankari">Banashankari</option>
                        <option value="Lalbagh">Lalbhag</option>
                        <option value="JP Nagar">JP Nagar</option>
                        <option value="Gotigere">Gotigere</option>
                        <option value="Ecity">Ecity</option>
                        <option value="Sarjapur">Sarjapur</option>
                        <option value="Whitefield">Whitefield</option>
                        <option value="HSR">HSR</option>
                        <option value="Kormangala">Kormangala</option>
                        <option value="Indra Nagar">Indra Nagar</option>
                        <option value="KR Puram">KR Puram</option> 
                        <option value="HBR">HBR</option>
                        <option value="Shivaji Nagar">Shivaji Nagar</option>
                        <option value="Yeswanthpur">Yeswanthpur</option>
                        <option value="Yeswanthpur2">Yeswanthpur2</option>
                        <option value="Yelahanka">Yelahanka</option>
                        <option value="Yelahanka2">Yelahanka2</option>
                        </select>
                        <!-- Add more options as needed -->
                </div>
            <div class="icon-input">
                <input type="number" name="Battery" placeholder="Batteries" class="contact-inputs" required max="5" min="0">
            </div>
            </div>
            <button type="submit">Update</button>
            </form>
            </div>
            </section>`
    updateMainContent(mapdetails);
    setActiveLink('Maps-link'); // Set 'Orders' link as active
});
  


document.getElementById('admin-link').addEventListener('click', function(event) {
    event.preventDefault();
    const NewAdminContent = `
    <section>
    <div class="contact-container">
    <form method="POST" class="contact-left" action="signin.php" enctype="multipart/form-data">
        <div class="contact-left-title">
            <h2>NEW ADMIN</h2>
        </div>
        <div class="row-container">
            <div class="icon-inputs">
                <input type="text" name="adminname" placeholder="UserName*" class="contact-inputs" required>
            </div>

            <div class="icon-inputs">
                <input type="password" name="adminpassword" placeholder="Password*" class="contact-inputs" required>
            </div>

            <label for="file" class="file-upload-label">
                <div class="file-upload-design">
                    <svg viewBox="0 0 640 512" height="1em">
                        <path
                            d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"
                        ></path>
                    </svg>
                    <p style="color:#666;">Drag and Drop</p>
                    <p style="color:#666;">or</p>
                    <span class="browse-button">Browse file</span>
                </div>
                <input id="file" type="file" name="logo" accept="image/jpeg, image/png" />
            </label>
        </div>
        <button type="submit">Log In</button>
        <p id="message" style="color: red; display: none;">We have enough admins.</p>
    </form>
</div>
</section>
    `;
    updateMainContent(NewAdminContent);
    setActiveLink('admin-link'); // Set 'Orders' link as active
});


document.getElementById('Prod-link').addEventListener('click', function(event) {
    event.preventDefault();
    const ProdAddContent = `
    <section>
    <div class="contact-container" style="margin-top:-70px;">
        <form method="POST" action="product.php" class="contact-left">
            <div class="contact-left-title">
                <h2>ADD PRODUCTS</h2>
            </div>
            <div class="row-container">
                <div class="icon-inputs">
                    <select name="product_type" id="productType" class="contact-inputs" required onchange="updateProductNames()">
                        <option value="" disabled selected style="color: rgba(0, 0, 0, 0.264);">Type*</option>
                        <option value="Ic Engine Battery">IC Engine Battery</option>
                        <option value="e-cycle and Robotics">e-cycle and Robotics Battery</option>
                        <option value="2-wheeler Battery">2-wheeler Battery</option>
                        <option value="3-wheeler Battery">3-wheeler Battery</option>
                        <option value="(SCV) Battery">(SCV) Battery</option>
                        <option value="(LCV) Battery">(LCV) Battery</option>
                        <option value="MHCV Battery">MHCV Battery</option>
                    </select>
                </div>

                <div class="icon-input">
                    <select name="name" id="productName" class="contact-inputs" required>
                        <option value="" disabled selected style="color: rgba(0, 0, 0, 0.264);">Product Name*</option>
                        <!-- Options will be dynamically populated based on the selected product type -->
                    </select>
                </div>

                <div class="icon-inputs">
                    <input type="number" name="quantity" placeholder="quantity*" class="contact-inputs" required>
                </div>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</section>
    `;
    updateMainContent(ProdAddContent);
    setActiveLink('Prod-link'); // Set 'Orders' link as active
});



document.getElementById('dashboard-link').addEventListener('click', function(event) {
    event.preventDefault();
    // Assuming the dashboard content is stored in a variable named dashboardContent
    // This could be the HTML string for the dashboard or a function that generates it
    updateMainContent(dashboardContent);
    setActiveLink('dashboard-link'); // Set 'Dashboard' link as active
});
setActiveLink('dashboard-link');
const dashboardContent = `
    <h1>Dashboard</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Sales</h3>
                            <h1>₹ 65,024</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+81%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Site Visit</h3>
                            <h1>24,981</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Searches</h3>
                            <h1>14,147</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- New ADMINS Section -->
            <div class="new-users">
                <h2>All Admins</h2>
                <div class="user-list">
                    <div class="user">
                        <h2>List Of Admins</h2>
                    </div>
                    <div class="user">
                    <img src="images/plus.png" id="plusBtn" >

                    </div>
                </div>
            </div>
            <!-- End of New Users Section -->
`;

    function updateProductNames() {
        const productType = document.getElementById('productType').value;
        const productNameSelect = document.getElementById('productName');

        // Clear previous options
        productNameSelect.innerHTML = '';

        // Populate options based on selected product type
        switch (productType) {
            case 'Ic Engine Battery':
                addOption(productNameSelect, 'PINTAIL', 'PINTAIL');
                break;
            case 'e-cycle and Robotics':
                addOption(productNameSelect, 'MUNIA', 'MUNIA');
                break;
            case '2-wheeler Battery':
                addOption(productNameSelect, 'ROBIN', 'ROBIN');
                addOption(productNameSelect, 'FINCH', 'FINCH');
                break;
            case '3-wheeler Battery':
                addOption(productNameSelect, 'SHIKRA', 'SHIKRA');
                addOption(productNameSelect, 'MONAL', 'MONAL');
                break;
            case '(SCV) Battery':
                addOption(productNameSelect, 'FALCON PLATFORM', 'FALCON PLATFORM');
                break;
            case '(LCV) Battery':
                addOption(productNameSelect, 'HAWK PLATFORM', 'HAWK PLATFORM');
                break;
            case 'MHCV Battery':
                addOption(productNameSelect, 'PELICAN PLATFORM', 'PELICAN PLATFORM');
                break;
            default:
                productNameSelect.innerHTML = '<option value="" disabled selected style="color: rgba(0, 0, 0, 0.264);">Product Name*</option>';
        }
    }

    function addOption(selectElement, text, value) {
        const option = document.createElement('option');
        option.text = text;
        option.value = value;
        selectElement.add(option);
    }

    window.onload = function() {
    // Check if a user is logged in
    if (sessionStorage.getItem('loggedInUser')) {
        const loggedInUser = sessionStorage.getItem('loggedInUser');
        const profilePic = document.getElementById('profilepic');
        const logopic = document.getElementById('logopic');
        const logoname = document.getElementById('logoname');
        const adminnumb = document.getElementById('adminnumb');
        fetch('get_data.php') // Fetch data from get_data.php
            .then(response => response.json())
            .then(data => {
                const userData = data.find(entry => entry.user === loggedInUser);
                if (userData) {
                    profilePic.src = userData.logo; // Assuming userData.logo contains the image URL
                    logopic.src = userData.logo; // Assuming userData.logo contains the image URL
                    logoname.textContent = userData.user.toUpperCase(); // Display user name
                    adminnumb.textContent = userData.adminnumber; // Display admin number
                } else {
                    // Handle case when user is not found in admin data
                    profilePic.src = "images/default-profile-pic.jpg"; // Default profile picture
                    logopic.src = "images/default-profile-pic.jpg"; // Default profile picture
                    logoname.textContent = loggedInUser; // Display logged-in user's name
                    adminnumb.textContent = "Admin"; // Default admin number
                }
            })
            .catch(error => console.error('Error fetching data:', error));

        document.getElementById('greeting').textContent = loggedInUser.toUpperCase();
    }
};



document.getElementById('orders-link').addEventListener('click', function(event) {
    event.preventDefault();
    // Rest of the code
});

document.getElementById('Prod-link').addEventListener('click', function(event) {
    event.preventDefault();
    // Rest of the code
});

document.getElementById('ticket-link').addEventListener('click', function(event) {
    event.preventDefault();
    // Rest of the code
});

document.getElementById('admin-link').addEventListener('click', function(event) {
    event.preventDefault();
    // Rest of the code
});

document.getElementById('dashboard-link').addEventListener('click', function(event) {
    event.preventDefault();
    // Rest of the code
});

updateMainContent(dashboardContent);
    setActiveLink('dashboard-link'); // Set 'Dashboard' link as active


    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('preloader').style.display = 'none';
});
    // script.js
document.getElementById('plusBtn').addEventListener('click', () => {
    fetch('get_data.php') // Fetch data from get_data.php
        .then(response => response.json())
        .then(data => {
            const userContainer = document.querySelector('.user-list'); // Select the existing user list container
            data.forEach(entry => {
                const div = document.createElement('div');
                div.classList.add('user'); // Add class for styling if needed
                
                // Create an img element for the profile image
                const profileImg = document.createElement('img');
                profileImg.src = entry.logo; // Assuming entry.logo contains the image URL
                profileImg.alt = `${entry.user}'s Profile Image`; // Alt text for accessibility
                div.appendChild(profileImg);
                // Create a paragraph element for user name
                const userName = document.createElement('h2');
                userName.textContent = `${entry.user.charAt(0).toUpperCase() + entry.user.slice(1).toLowerCase()}`;
                div.appendChild(userName);
                userContainer.appendChild(div); // Append the created div to the existing user list container
            });
            // Remove the plus button and adjust the layout
            const plusBtn = document.getElementById('plusBtn');
            plusBtn.style.display = 'none'; // Hide the button instead of removing it
            // Optionally, you can add a class to the userContainer to adjust its layout
            userContainer.classList.add('full-width'); // Example class name, adjust as needed
        })
        .catch(error => console.error('Error fetching data:', error));
});
document.addEventListener('DOMContentLoaded', function () {
    const loginButton = document.getElementById('loginButton');
    const message = document.getElementById('message');
    const adminLink = document.getElementById('admin-link');
    adminLink.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior of the admin link
        // Disable the login button and show the message
        loginButton.disabled = true;
        message.style.display = 'block';
        // Simulate a delay (e.g., 2 seconds) for demonstration purposes
        setTimeout(() => {
            // Enable the login button and hide the message after the delay
            loginButton.disabled = false;
            message.style.display = 'none';
        }, 2000); // Adjust the delay as needed (in milliseconds)
    });
});
 </script>
</body>

</html>