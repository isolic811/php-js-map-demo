var map = L.map('map',{
    center: [45.8150, 15.9819],
    zoom: 12
});

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
var myFeatureGroup = L.featureGroup().addTo(map);

$("#get-data").click( function()
    {
        $.ajax({
            type:"get",
            url:"index.php",
            data:
                {action:"get_start_data"}
        }).done(function(coordinates){
            myFeatureGroup.clearLayers();
            let parsedCoordinates = JSON.parse(coordinates);
            parsedCoordinates.forEach(function(coordinate) {
                L.marker([coordinate.longitude, coordinate.latitude]).addTo(myFeatureGroup);
            });
        });
    }
);

$("#get-entry").click( function()
    {
        $.ajax({
            type:"get",
            url:"index.php",
            data:
                {action:"get_new_entry"}
        }).done(function(coordinate){
            let parsedCoordinate = JSON.parse(coordinate);
            L.marker([parsedCoordinate.longitude, parsedCoordinate.latitude]).addTo(myFeatureGroup);
        });
    }
);

$("#get-zone-entry").click( function()
    {
        $.ajax({
            type:"get",
            url:"index.php",
            data:
                {action:"get_new_entry"}
        }).done(function(coordinate){
            let parsedCoordinate = JSON.parse(coordinate);
            L.circle([parsedCoordinate.longitude, parsedCoordinate.latitude], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(myFeatureGroup);
        });
    }
);