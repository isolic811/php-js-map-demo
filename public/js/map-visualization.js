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
        }).done(function(data){
            myFeatureGroup.clearLayers();
            let myData = JSON.parse(data);
            myData.forEach(function(entry) {
                L.marker([entry.longitude, entry.latitude]).addTo(myFeatureGroup);
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
        }).done(function(data){
            let myData = JSON.parse(data);
            L.marker([myData.longitude, myData.latitude]).addTo(myFeatureGroup);
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
        }).done(function(data){
            let myData = JSON.parse(data);
            L.circle([myData.longitude, myData.latitude], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(myFeatureGroup);
        });
    }
);