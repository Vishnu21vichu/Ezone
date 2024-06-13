<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Map with marker</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        #map {
            width: 100%;
            height: 100%;
        }
    
        .popup-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 1.1rem;
        }
        .popup-title {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .popup-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 1rem;
        }
        .popup-link {
            margin: 0.2rem;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
        }
        .popup-link:hover {
            background-color: #f5f5f5;
        }
        
        .button-close {

             position: absolute;
             top: 0.5rem;
            right: 0.9rem;
            width: 3em;
            height: 3em;
            z-index: 9999;
            border: none;
            background: #333;
            border-radius: 5px;
            transition: background 0.5s;
            }

            .X {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 1.6em;
            height: 1.5px;
            background-color: aqua;
            transform: translateX(-50%) rotate(45deg);
            }

            .Y {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 1.6em;
            height: 1.5px;
            background-color: aqua;
            transform: translateX(-50%) rotate(-45deg);
            }

            .close {
            position: absolute;
            display: flex;
            padding: 0.8rem 1.5rem;
            align-items: center;
            justify-content: center;
            transform: translateX(-50%);
            top: -70%;
            left: 50%;
            width: 3em;
            height: 1.7em;
            font-size: 12px;
            background-color: rgb(19, 22, 24);
            color: rgb(187, 229, 236);
            border: none;
            border-radius: 3px;
            pointer-events: none;
            opacity: 0;
            }

            .button-close:hover {
            background-color: aqua;
            .X{
                background-color: #333;
            }
            .Y{
                background-color: #333;
            }
            }

            .button-close:active {
            background-color: rgb(130, 0, 0);
            }

          

            @keyframes close {
            100% {
                opacity: 1;
            }
            }


    </style>
</head>
<body>
    <div id="map"></div>
    <button class="button-close" onclick="redirectToIndex()">
  <span class="X"></span>
  <span class="Y"></span>
  <div class="close">Close</div>
</button>
    
    <script>
        const map = L.map('map');
        map.setView([12.9718, 77.5861], 11);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const placeCoordinates = {
            "Kengeri": [12.92225, 77.48423],
            "Banashankari": [12.934457578185683, 77.54684456276244],
            "Indra Nagar": [12.96333296231808, 77.66179910154719],
            "KR Puram": [13.000709583460095, 77.69238759921735],
            "HBR": [13.027799000810562, 77.64333047340241],
            "Whitefield": [12.96370926565409, 77.75060671666562],
            "Ecity": [12.851915780665356, 77.6680636257049],
     
            "Sarjapura":[12.876314827162384, 77.7769291736105],
 
            "JP Nagar":[12.895139978180383, 77.58359564070763],
 
            "Rajarajeshwari nagar":[12.927256490905943, 77.52491420871269], 
            "Gotigere": [12.869455540614574, 77.59070013585676], 
 
            "HSR": [12.919090390861673, 77.64884547126788],
            "Kormangala": [12.942848141823589, 77.62326792710479], 
            "Lalbagh":[12.959416787119897, 77.5829275739582],
            "Shivaji Nagar": [12.973635947077957, 77.5952871926142], 
            "Yeswanthpur": [13.010203018520988, 77.56798072498525],
            "Yeswanthpur2": [13.033121260355642, 77.53437310861433],
            "Yelahanka2": [13.095553113378362, 77.60448310694107],
            "Yelahanka": [13.105394595976767, 77.58831597068504]
 
            
        };

        function createBatteryPopup(title, batteryData, url) {
            const totalBatteries = 5;
            const greenBatteries = '🟢'.repeat(batteryData);
            const redBatteries = '🔴'.repeat(totalBatteries - batteryData);
            const batteryString = `${redBatteries} ${greenBatteries}`;
            return `<span class="popup-content">
                <span class="popup-title">${title}</span>
                ${batteryString}
                <br>
                <br>
                <a class="popup-link" href="${url}" target="_blank">Get Directions</a>
            </span>`;
        }
        function redirectToIndex() {
            window.location.href = 'index.php';
        }
        const customIcon = L.icon({
            iconUrl: '../img/Pin.png', // Path to your custom icon
            iconSize: [27, 45], // Size of the icon
            iconAnchor: [16, 32], // Point of the icon which will correspond to marker's location
            popupAnchor: [0, -32] // Point from which the popup should open relative to the iconAnchor
        });
        fetch('fetch_data.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(location => {
                    const coordinates = placeCoordinates[location.Place];
                    if (coordinates) {
                        L.marker(coordinates, {
                            title: location.Place,
                            icon: customIcon
                        })
                        .bindPopup(createBatteryPopup(location.Place, location.Battery, "https://maps.app.goo.gl/hR64mA5pyFqFQLmr7"))
                        .addTo(map);
                    } else {
                        console.error(`Coordinates for place "${location.Place}" not found.`);
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    
    </script>
</body>
</html>
