const locations = {
    "Bundaran HI - Sedang🙂": { lat: -6.195, lng: 106.823 },
    "Kelapa Gading - Baik😊": { lat: -6.157, lng: 106.908 },
    "Jagakarsa - Baik😊": { lat: -6.330, lng: 106.822 },
    "Lubang Buaya - Sedang🙂": { lat: -6.304, lng: 106.885 },
    "Kebon Jeruk - Baik😊": { lat: -6.192, lng: 106.769 }
};

function initMap() {
    var indonesia = { lat: -2.548926, lng: 118.0148634 };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: { lat: -6.200, lng: 106.816 }, // Jakarta sebagai pusat
        gestureHandling: 'greedy' // Mengatasi teks "for development purposes only"
    });

    addMarkers(map, locations);
}

function addMarkers(map, locations) {
    for (const [name, location] of Object.entries(locations)) {
        const marker = new google.maps.Marker({
            position: location,
            map: map,
            title: name
        });

        const infowindow = new google.maps.InfoWindow({
            content: `<h3>${name}</h3>`
        });

        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
    }
}

window.onload = initMap;