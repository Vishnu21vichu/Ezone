<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ezone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $product_type = $_POST['product_type'];

    // Get the current quantity
    $sql = "SELECT quantity FROM product WHERE name = ? AND product_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $product_type);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantity = $row['quantity'];

        // Reduce the quantity by 1
        if ($quantity > 0) {
            $new_quantity = $quantity - 1;
            $sql = "UPDATE product SET quantity = ? WHERE name = ? AND product_type = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iss", $new_quantity, $name, $product_type);
            $stmt->execute();

            echo json_encode(['success' => true, 'newQuantity' => $new_quantity]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Quantity already zero']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Product not found']);
    }

    $stmt->close();
}

$conn->close();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Products&amp; Services</title>
    <link rel="icon" href="img/LogoTab-01.png" type="image/png">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <link rel="stylesheet" href="../css/Prod_Style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">

</head>

<body>
    <header>
        <img src="../img/Logo-01.png" style="width: 120px; height: auto;">
        <ul class="navbar">
            <li><a href="Index.php">Home</a></li>
            <li><a href="Joinus.php">Join us</a></li>
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

    <div class="container">
        <div class="tab-container mt-0">
            <div class="tab-content">
                <div class="w-full">
                    <div class="w-full flex flex-wrap items-center mt-20 mb-20">
                        <div class="w-full text-black sm:w-1/2">

                            <h2 style="color: #5ac4d2" class="text-3xl text-bold"><b>Proprietary Products</b></h2>
                            <div class="text-2xl font-light mt-4">Ezone offer a large range of batteries
                                to suit a variety of applications</div>
                        </div>
                        <div class="w-full sm:w-1/2"><img class="m-auto rounded-lg" src="../images/z1.png" alt="Ezone proprietary products">
                        </div>
                    </div>
                    <div class="details">
                        <div class="w-full mb-8 Product1">
                            <div style="margin-bottom: 20px;" class="w-full flex items-center pb-4 justify-between border-b border-green-450">
                                <h2 class="text-black font-semibold text-2xl">IC Engine Starter Battery</h2>
                                <div class="flex flex-end">
                                    <div class="modal-background"></div>

                                    <div class="modal">
                                        <h2 style="margin: 0 0 8px; color: rgb(255, 255, 255); text-align: center;">
                                            Successful</h2>
                                        <p id="randomNumber" style="margin: 0; color: rgba(255, 255, 255, 0.638); margin-bottom: 10px; text-align: center;">
                                        </p>
                                    </div>

                                    <div class="ml-2"><img src="../images/IC%20engine%20starter%20battery%20_SAC.svg" width="75"></div>
                                </div>
                            </div>
                            <div class="w-full flex justify-between py-4 flex-wrap">
                                <div class="w-full sm:w-1/4">
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/High%20capacity%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Low Self Discharge</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Assured starting after months of
                                                vacation</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Fast%20charging%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Fast Charging</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Trouble free starting for short
                                                trip users</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/BX5%20JIS.svg" style="height:50px!important" width="50" height="50"></div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Fully Compatible</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Direct replacement of current JIS
                                                standard batteries</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full sm:w-1/4">
                                    <div class="w-full">
                                        <h3 class="text-green-450 italic font-bold text-xl text-left">PINTAIL</h3>
                                        <button class="btn" onclick="updateQuantity('PINTAIL', 'Ic Engine Battery'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Voltage</span><span class="text-green-450">12V</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Capacity</span><span class="text-green-450">5Ah</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Energy</span><span class="text-green-450">64Wh</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div id="finishedModal" style="display:none;">
                                    <p>IT's Finish</p>
                                    <button onclick="closeModal()">Close</button>
                                </div>
                                <div class="w-full sm:w-2/5"><img class="m-auto" src="../images/z3.png" style="max-height:300px">
                                </div>
                            </div>
                        </div>

                        <script>
                            function updateQuantity(name, productType) {
                                var xhr = new XMLHttpRequest();
                                xhr.open("POST", "Product.php", true);
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        var response = JSON.parse(xhr.responseText);
                                        if (response.success) {
                                            if (response.newQuantity == 0) {
                                                document.getElementById('finishedModal').style.display = 'block';
                                            }
                                        }
                                    }
                                };
                                xhr.send("name=" + name + "&product_type=" + productType);
                            }

                            function closeModal() {
                                document.getElementById('finishedModal').style.display = 'none';
                            }
                        </script>

                        <div class="w-full mb-8">
                            <div style="margin-bottom: 20px;" class="w-full flex items-center pb-4 justify-between border-b border-green-450">
                                <h2 class="text-black font-semibold text-2xl">e-cycle and Robotics Battery
                                </h2>
                                <div class="flex flex-end">
                                    <div class="ml-2"><img src="../images/E-cycle_SAC.svg" width="75"></div>
                                    <div class="ml-2"><img src="../images/Robot_SAC.svg" width="75"></div>
                                </div>
                            </div>
                            <div class="w-full flex justify-between py-4 flex-wrap">
                                <div class="w-full sm:w-1/4">
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Fast%20charging%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Fast Charging</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">0-100% in 30 minutes (In
                                                specified working conditions)</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Assured%20safety%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Assured Safety</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Ultra safe BMS provides industry
                                                leading safety for your vehicle</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full sm:w-1/4">
                                    <h3 class="text-green-450 italic font-bold text-xl text-left">MUNIA</h3>
                                    <button class="btn" onclick="updateQuantity('MUNIA', 'e-cycle and Robotics'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                    <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                        <span class="">Voltage</span><span class="text-green-450">48V</span>
                                    </div>
                                    <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                        <span class="">Capacity</span><span class="text-green-450">19.2Ah</span>
                                    </div>
                                    <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                        <span class="">Energy</span><span class="text-green-450">980Wh</span>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div id="finishedModal" style="display:none;">
                                    <p>IT's Finish</p>
                                    <button onclick="closeModal()">Close</button>
                                </div>
                                <div class="w-full sm:w-2/5"><img class="m-auto" src="../images/z2.png" style="max-height:300px">
                                </div>
                            </div>
                        </div>

                        <!-- <script>
                            function updateQuantity(name, productType) {
                                var xhr = new XMLHttpRequest();
                                xhr.open("POST", "Product.php", true);
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState == 4 && xhr.status == 200) {
                                        var response = JSON.parse(xhr.responseText);
                                        if (response.success) {
                                            if (response.newQuantity == 0) {
                                                document.getElementById('finishedModal').style.display = 'block';
                                            }
                                        }
                                    }
                                };
                                xhr.send("name=" + name + "&product_type=" + productType);
                            }

                            function closeModal() {
                                document.getElementById('finishedModal').style.display = 'none';
                            }
                        </script> -->

                        <div class="w-full mb-8">
                            <div style="margin-bottom: 20px;" class="w-full flex items-center pb-4 justify-between border-b border-green-450">
                                <h2 class="text-black font-semibold text-2xl">2-wheeler Battery</h2>
                                <div class="flex flex-end">
                                    <div class="ml-2"><img src="../images/2-wheeler%20battery_SAC.svg" width="75"></div>
                                </div>
                            </div>
                            <div class="w-full flex justify-between py-4 flex-wrap">
                                <div class="w-full sm:w-1/4">
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Long%20life%20-3%20years.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Long Life</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">3 years of long life (In
                                                specified working conditions)</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Fast%20charging%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Fast Charging</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Charges up-to 80% in 2 hour which
                                                is significantly faster than present solutions</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Assured%20safety%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Assured Safety</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Ultra safe BMS provides industry
                                                leading safety for your vehicle</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full sm:w-1/4">
                                    <!-- ROBIN Product Section -->
                                    <div class="w-full">
                                        <h3 class="text-green-450 italic font-bold text-xl text-left">ROBIN</h3>
                                        <button class="btn" onclick="updateQuantity('ROBIN', '2-wheeler Battery'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Voltage</span><span class="text-green-450">72V</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Capacity</span><span class="text-green-450">28.8Ah</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Energy</span><span class="text-green-450">2.1kWh</span>
                                        </div>
                                    </div>

                                    <!-- FINCH Product Section -->
                                    <div class="w-full">
                                        <h3 class="text-green-450 italic font-bold text-xl text-left">FINCH</h3>
                                        <button class="btn" onclick="updateQuantity('FINCH', '2-wheeler Battery'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Voltage</span><span class="text-green-450">48V</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Capacity</span><span class="text-green-450">28.8Ah/38.4Ah</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Energy</span><span class="text-green-450">1.47kWh/1.96kWh</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-2/5"><img class="m-auto" src="../images/z4.png" style="max-height:600px"></div>
                            </div>
                        </div>
                        <div class="w-full mb-8">
                            <div style="margin-bottom: 20px;" class="w-full flex items-center pb-4 justify-between border-b border-green-450">
                                <h2 class="text-black font-semibold text-2xl">3-wheeler Battery</h2>
                                <div class="flex flex-end">
                                    <div class="ml-2"><img src="../images/Auto_SAC.svg" width="75"></div>
                                    <div class="ml-2"><img src="../images/Caddy_SAC.svg" width="75"></div>
                                </div>
                            </div>
                            <div class="w-full flex justify-between py-4 flex-wrap">
                                <div class="w-full sm:w-1/4">
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Long%20life%20-3%20years.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Long Life</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">3 years of long life (In
                                                specified working conditions)</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Fast%20charging%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Fast Charging</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Charges up-to 80% in 2 hours
                                                which is significantly faster than present solutions</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Assured%20safety%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Assured Safety</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Ultra safe BMS provides industry
                                                leading safety for your vehicle</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full sm:w-1/4">
                                    <div class="w-full">
                                        <h3 class="text-green-450 italic font-bold text-xl text-left">SHIKRA</h3>
                                        <button class="btn" onclick="updateQuantity('SHIKRA', '3-wheeler Battery'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Voltage</span><span class="text-green-450">48V</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Capacity</span><span class="text-green-450">86Ah/100Ah</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Energy</span><span class="text-green-450">4.4kWh/5.1kWh</span>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <h3 class="text-green-450 italic font-bold text-xl text-left">MONAL</h3>
                                        <button class="btn" onclick="updateQuantity('MONAL', '3-wheeler Battery'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Voltage</span><span class="text-green-450">48V</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Capacity</span><span class="text-green-450">200Ah</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Energy</span><span class="text-green-450">10.2kWh</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-2/5"><img class="m-auto" src="../images/z5.png" style="max-height:300px"></div>
                            </div>
                        </div>
                        <div class="w-full mb-8">
                            <div style="margin-bottom: 20px;" class="w-full flex items-center pb-4 justify-between border-b border-green-450">
                                <h2 class="text-black font-semibold text-2xl">Small Commercial Vehicle (SCV)
                                    Battery</h2>
                                <div class="flex flex-end">
                                    <div class="ml-2"><img src="../images/SCV%20truck.svg" width="75"></div>
                                    <div class="ml-2"><img src="../images/LCV%20tractor_SAC.svg" width="75">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex justify-between py-4 flex-wrap">
                                <div class="w-full sm:w-1/4">
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Long%20life%20-7%20years.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Long Life</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Upto 7 years of long life (In
                                                specified working conditions)</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Liquid%20cooling%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Liquid Cooling</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">High power yet compact liquid
                                                cooling for high ambient temperature condition</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Fast%20charging%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Fast Charging</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Charges up-to 80% in 1 hour which
                                                is significantly faster than present solutions</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="w-full sm:w-1/4">
                                    <!-- FALCON PLATFORM Product Section -->
                                    <div class="w-full">
                                        <h3 class="text-green-450 italic font-bold text-xl text-left">FALCON PLATFORM</h3>
                                        <button class="btn" onclick="updateQuantity('FALCON PLATFORM', '(SCV) Battery'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Voltage</span><span class="text-green-450">48V - 96V</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Capacity</span><span class="text-green-450">200Ah - 400Ah</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Energy</span><span class="text-green-450">10kWh - 40kWh</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-2/5"><img class="m-auto" src="../images/z6.png" style="max-height:300px"></div>
                            </div>
                        </div>
                        <div class="w-full mb-8">
                            <div style="margin-bottom: 20px;" class="w-full flex items-center pb-4 justify-between border-b border-green-450">
                                <h2 class="text-black font-semibold text-2xl">Light Commercial Vehicle (LCV)
                                    Battery</h2>
                                <div class="flex flex-end">
                                    <div class="ml-2"><img src="../images/LCV%20car_SAC.svg" width="75"></div>
                                    <div class="ml-2"><img src="../images/LCV%20lorry_SAC.svg" width="75">
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex justify-between py-4 flex-wrap">
                                <div class="w-full sm:w-1/4">
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Long%20life%20-7%20years.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Long Life</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Upto 5 years of long life (In
                                                specified working conditions)</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Liquid%20cooling%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Liquid Cooling</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">High power yet compact liquid
                                                cooling for high ambient temperature condition</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Fast%20charging%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Fast Charging</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Charges up-to 80% in 1 hour which
                                                is significantly faster than present solutions</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="w-full sm:w-1/4">
                                    <!-- HAWK PLATFORM Product Section -->
                                    <div class="w-full">
                                        <h3 class="text-green-450 italic font-bold text-xl text-left">HAWK PLATFORM</h3>
                                        <button class="btn" onclick="updateQuantity('HAWK PLATFORM', '(LCV) Battery'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Voltage</span><span class="text-green-450">120V - 420V</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Capacity</span><span class="text-green-450">100Ah - 400Ah</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Energy</span><span class="text-green-450">12kWh - 160kWh</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-2/5"><img class="m-auto" src="../images/z7.png" style="max-height:300px"></div>
                            </div>
                        </div>
                        <div class="w-full mb-8">
                            <div style="margin-bottom: 20px;" class="w-full flex items-center pb-4 justify-between border-b border-green-450">
                                <h2 class="text-black font-semibold text-2xl">MHCV Battery</h2>
                                <div class="flex flex-end">
                                    <div class="ml-2"><img src="../images/MHCV%20Bus_SAC.svg" width="75"></div>
                                </div>
                            </div>
                            <div class="w-full flex justify-between py-4 flex-wrap">
                                <div class="w-full sm:w-1/4">
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Long%20life%20-7%20years.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Long Life</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Upto 7 years of long life (In
                                                specified working conditions)</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Liquid%20cooling%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Liquid Cooling</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">High power yet compact liquid
                                                cooling for high ambient temperature condition</p>
                                        </div>
                                    </div>
                                    <div class="w-full flex items-center text-black mb-6">
                                        <div class="w-1/4">
                                            <div class="flex items-center justify-center"><img src="../images/Fast%20charging%20icon.svg" style="height:50px!important" width="50" height="50">
                                            </div>
                                        </div>
                                        <div class="w-3/4 text-left">
                                            <h4 class="font-semibold text-lg">Fast Charging</h4>
                                            <hr class="line-gradient">
                                            <p class="font-normal text-md">Charges up-to 80% in 1 hour which
                                                is significantly faster than present solutions</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="w-full sm:w-1/4">
                                    <!-- PELICAN PLATFORM Product Section -->
                                    <div class="w-full">
                                        <h3 class="text-green-450 italic font-bold text-xl text-left">PELICAN PLATFORM</h3>
                                        <button class="btn" onclick="updateQuantity('PELICAN PLATFORM', 'MHCV Battery'), toggleModal()"><i class="ri-add-circle-fill"></i></button>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Voltage</span><span class="text-green-450">420V - 680V</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Capacity</span><span class="text-green-450">100Ah - 400Ah</span>
                                        </div>
                                        <div class="flex justify-between text-black text-lg font-normal my-2 pl-2">
                                            <span class="">Energy</span><span class="text-green-450">40kWh - 280kWh</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full sm:w-2/5"><img class="m-auto" src="../images/z8.png" style="max-height:300px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <button onclick="scrollToTop()" id="scrollUpBtn" title="Go to top"><span class="material-icons-sharp" style="font-size: 40px; color: darkblue;">
            keyboard_arrow_up
        </span></button>
    <script>
        function scrollToTop() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
        }

        // Show/hide the scroll-up button based on scrolling
        window.onscroll = function() {
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

        //Unique code for purchase
        function generateRandomNumber() {
            var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            var result = '';

            for (var i = 0; i < 11; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }

            return result;
        }

        const toggleModal = () => {
            // Generate a random 7-digit alphanumeric number
            var randomNumber = generateRandomNumber();
            // Display the generated number in the message container
            var modalMessage = document.getElementById("randomNumber");
            modalMessage.innerHTML = "The Product will be ready at your nearest Ezone station. Show this Unique Number and collect your Product. Unique_ID: <span class='unique-code'>" + randomNumber + "</span>";

            const bodyClassList = document.body.classList;
            if (bodyClassList.contains("open")) {
                bodyClassList.remove("open");
                bodyClassList.add("closed");
            } else {
                bodyClassList.remove("closed");
                bodyClassList.add("open");
            }
        }
    </script>
    <script src="../js/script.js"></script>
</body>

</html>