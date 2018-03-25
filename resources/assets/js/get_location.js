
$('#get-location-btn').click((event) => {
    console.log('get-location-btn clicked')
    getLocation()
})

function showPosition(position) {
    $('#latitude').val(position.coords.latitude)
    $('#longitude').val(position.coords.longitude)
}

function getLocation() {
    console.log('getting location')
    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(showPosition)
    else      
        console.log("Geolocation is not supported by this browser.")
}