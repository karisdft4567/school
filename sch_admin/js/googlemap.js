function initialize() {
                    var userLatLng;
                    var mapDiv = document.getElementById('map_canvas');
                    var Latitude = document.getElementById('Latitude');
                    var Longitude = document.getElementById('Longitude');
                    /*if (Latitude != null || Longitude != null) {
                        userLatLng = new google.maps.LatLng(document.getElementById("Latitude").value, document.getElementById("Longitude").value);
                    }
                    else {*/
                        userLatLng = new google.maps.LatLng(51.5074, 0.1278);
                    //}

                    var map = new google.maps.Map(mapDiv, {
                        center: userLatLng,
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    });

                    var marker = new google.maps.Marker({
                        position: userLatLng,
                        map: map,
                        title: 'Default Marker',
                        draggable: true
                    });
                  
                    google.maps.event.addListener(marker, 'drag', function (event) {
                        document.getElementById('Latitude').value = event.latLng.lat();
                        document.getElementById('Longitude').value = event.latLng.lng();
                     //alert(event.latLng.lat()+"="+event.latLng.lng());
                    });

                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        document.getElementById('Latitude').value = event.latLng.lat();
                        document.getElementById('Longitude').value = event.latLng.lng();
                    // alert(event.latLng.lat()+"="+event.latLng.lng());
                    });

                    // Create the search box and link it to the UI element.
                    var input = (document.getElementById('pac-input'));
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                    var searchBox = new google.maps.places.SearchBox((input));

                    // [START region_getplaces]
                    // Listen for the event fired when the user selects an item from the
                    // pick list. Retrieve the matching places for that item.
                    google.maps.event.addListener(searchBox, 'places_changed', function () {
                        var places = searchBox.getPlaces();

                        if (places.length == 0) {
                            return;
                        }
                        for (var i = 0, markers; markers = marker[i]; i++) {
                            marker.setMap(null);
                        }

                        // For each place, get the icon, place name, and location.
                        markers = [];
                        var bounds = new google.maps.LatLngBounds();
                        for (var i = 0, place; place = places[i]; i++) {
                            var image = {
                                url: place.icon,
                                size: new google.maps.Size(71, 71),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(17, 34),
                                scaledSize: new google.maps.Size(25, 25)
                            };

                            // Create a marker for each place.
                            var marker1 = new google.maps.Marker({
                                map: map,
                                draggable: true,
                                title: place.name,
                                position: place.geometry.location
                            });
                            
                            google.maps.event.addListener(marker1, 'drag', function (event) {
                                document.getElementById('Latitude').value = event.latLng.lat();
                                document.getElementById('Longitude').value = event.latLng.lng();
                             //alert(event.latLng.lat()+"="+event.latLng.lng());
                            });

                            google.maps.event.addListener(marker1, 'dragend', function (event) {
                                document.getElementById('Latitude').value = event.latLng.lat();
                                document.getElementById('Longitude').value = event.latLng.lng();
                            // alert(event.latLng.lat()+"="+event.latLng.lng());
                            });

                            latitude = marker1.getPosition().lat();
                            longitude = marker1.getPosition().lng();
                            document.getElementById('Latitude').value =latitude; document.getElementById('Longitude').value =longitude;
                            markers.push(marker1);

                            bounds.extend(place.geometry.location);
                        }
                        map.fitBounds(bounds);

                    });

                    google.maps.event.addListener(map, 'bounds_changed', function () {
                        var bounds = map.getBounds();
                        searchBox.setBounds(bounds);
                    });
                    return true;
                }
            google.maps.event.addDomListener(window, 'load', initialize);