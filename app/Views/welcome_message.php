<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .custom-control.material-checkbox {
            --color: #26a69a;
        }

        .custom-control.material-checkbox .material-control-input {
            display: none;
        }

        .custom-control.material-checkbox .material-control-input:checked~.material-control-indicator {
            border-color: var(--color);
            transform: rotateZ(45deg) translate(1px, -5px);
            width: 10px;
            border-top: 0px solid #fff;
            border-left: 0px solid #fff;
        }

        .custom-control.material-checkbox .material-control-indicator {
            display: inline-block;
            position: absolute;
            top: 4px;
            left: 0;
            width: 16px;
            height: 16px;
            border: 2px solid #aaa;
            transition: 0.3s;
        }

        .custom-control.fill-checkbox {
            --color: #26a69a;
        }

        .custom-control.fill-checkbox .fill-control-input {
            display: none;
        }

        .custom-control.fill-checkbox .fill-control-input:checked~.fill-control-indicator {
            background-color: var(--color);
            border-color: var(--color);
            background-size: 80%;
        }

        .custom-control.fill-checkbox .fill-control-indicator {
            border-radius: 3px;
            display: inline-block;
            position: absolute;
            top: 4px;
            left: 0;
            width: 16px;
            height: 16px;
            border: 2px solid #aaa;
            transition: 0.3s;
            background: transperent;
            background-size: 0%;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3E%3Cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3E%3C/svg%3E");
        }

        .custom-control.overflow-checkbox .overflow-control-input {
            display: none;
        }

        .custom-control.overflow-checkbox .overflow-control-input:checked~.overflow-control-indicator::after {
            transform: rotateZ(45deg) scale(1);
            top: -6px;
            left: 5px;
        }

        .custom-control.overflow-checkbox .overflow-control-input:checked~.overflow-control-indicator::before {
            opacity: 1;
        }

        .custom-control.overflow-checkbox .overflow-control-indicator {
            border-radius: 3px;
            display: inline-block;
            position: absolute;
            top: 4px;
            left: 0;
            width: 16px;
            height: 16px;
            border: 2px solid #aaa;
        }

        .custom-control.overflow-checkbox .overflow-control-indicator::after {
            content: "";
            display: block;
            position: absolute;
            width: 16px;
            height: 16px;
            transition: 0.3s;
            transform: rotateZ(90deg) scale(0);
            width: 10px;
            border-bottom: 4px solid #aaa;
            border-right: 4px solid #aaa;
            border-radius: 3px;
            top: -2px;
            left: 2px;
        }

        .custom-control.overflow-checkbox .overflow-control-indicator::before {
            content: "";
            display: block;
            position: absolute;
            width: 16px;
            height: 16px;
            transition: 0.3s;
            width: 10px;
            border-right: 7px solid #fff;
            border-radius: 3px;
            transform: rotateZ(45deg) scale(1);
            top: -4px;
            left: 5px;
            opacity: 0;
        }

        .custom-control.material-switch {
            --color: #26a69a;
            padding-left: 0;
        }

        .custom-control.material-switch .material-switch-control-input {
            display: none;
        }

        .custom-control.material-switch .material-switch-control-input:checked~.material-switch-control-indicator::after {
            background-color: var(--color);
            left: 17px;
        }

        .custom-control.material-switch .material-switch-control-indicator {
            display: inline-block;
            position: relative;
            margin: 0 10px;
            top: 4px;
            width: 32px;
            height: 16px;
            background: #ddd;
            border-radius: 16px;
            transition: 0.3s;
        }

        .custom-control.material-switch .material-switch-control-indicator::after {
            content: "";
            display: block;
            position: absolute;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            transition: 0.3s;
            top: -1px;
            left: -1px;
            background: #fdfdfd;
            box-shadow: 0 2px 10px #aaa;
        }

        .custom-control.ios-switch {
            --color: #4cd964;
            padding-left: 0;
        }

        .custom-control.ios-switch .ios-switch-control-input {
            display: none;
        }

        .custom-control.ios-switch .ios-switch-control-input:active~.ios-switch-control-indicator::after {
            width: 20px;
        }

        .custom-control.ios-switch .ios-switch-control-input:checked~.ios-switch-control-indicator {
            border: 10px solid var(--color);
        }

        .custom-control.ios-switch .ios-switch-control-input:checked~.ios-switch-control-indicator::after {
            top: -8px;
            left: 4px;
        }

        .custom-control.ios-switch .ios-switch-control-input:checked:active~.ios-switch-control-indicator::after {
            left: 0px;
        }

        .custom-control.ios-switch .ios-switch-control-indicator {
            display: inline-block;
            position: relative;
            margin: 0 10px;
            top: 4px;
            width: 32px;
            height: 20px;
            background: #fff;
            border-radius: 16px;
            transition: 0.3s;
            border: 2px solid #ddd;
        }

        .custom-control.ios-switch .ios-switch-control-indicator::after {
            content: "";
            display: block;
            position: absolute;
            width: 16px;
            height: 16px;
            border-radius: 16px;
            transition: 0.3s;
            top: 0px;
            left: 0px;
            background: #fff;
            box-shadow: 0 0 2px #aaa, 0 2px 5px #999;
        }

        .custom-control.border-switch {
            --color: #4cd964;
            padding-left: 0;
        }

        .custom-control.border-switch .border-switch-control-input {
            display: none;
        }

        .custom-control.border-switch .border-switch-control-input:checked~.border-switch-control-indicator {
            border-color: var(--color);
        }

        .custom-control.border-switch .border-switch-control-input:checked~.border-switch-control-indicator::after {
            left: 14px;
            background-color: var(--color);
        }

        .custom-control.border-switch .border-switch-control-indicator {
            display: inline-block;
            position: relative;
            margin: 0 10px;
            top: 4px;
            width: 32px;
            height: 20px;
            background: #fff;
            border-radius: 16px;
            transition: 0.3s;
            border: 2px solid #ccc;
        }

        .custom-control.border-switch .border-switch-control-indicator::after {
            content: "";
            display: block;
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            transition: 0.3s;
            top: 2px;
            left: 2px;
            background: #ccc;
        }

        .custom-control.teleport-switch {
            --color: #4cd964;
            padding-left: 0;
        }

        .custom-control.teleport-switch .teleport-switch-control-input {
            display: none;
        }

        .custom-control.teleport-switch .teleport-switch-control-input:checked~.teleport-switch-control-indicator {
            border-color: var(--color);
        }

        .custom-control.teleport-switch .teleport-switch-control-input:checked~.teleport-switch-control-indicator::after {
            left: -14px;
        }

        .custom-control.teleport-switch .teleport-switch-control-input:checked~.teleport-switch-control-indicator::before {
            right: 2px;
            background-color: var(--color);
        }

        .custom-control.teleport-switch .teleport-switch-control-indicator {
            display: inline-block;
            position: relative;
            margin: 0 10px;
            top: 4px;
            width: 32px;
            height: 20px;
            background: #fff;
            border-radius: 16px;
            transition: 0.3s;
            border: 2px solid #ccc;
            overflow: hidden;
        }

        .custom-control.teleport-switch .teleport-switch-control-indicator::after {
            content: "";
            display: block;
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            transition: 0.3s;
            top: 2px;
            left: 2px;
            background: #ccc;
        }

        .custom-control.teleport-switch .teleport-switch-control-indicator::before {
            content: "";
            display: block;
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            transition: 0.3s;
            top: 2px;
            right: -14px;
            background: #ccc;
        }

        .list-group:first-child .list-group-control:first-child {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .list-group::last-child .list-group-control:last-child {
            border-bottom-left-radius: 0.25rem;
            border-bottom-right-radius: 0.25rem;
        }

        .list-group.list-group-flush:last-child .list-group-control:last-child {
            border-bottom: 0;
            margin-bottom: 0;
        }

        .list-group.list-group-flush:first-child .list-group-control:first-child {
            border-top: 0;
        }

        .list-group.list-group-flush .list-group-control {
            border-right: 0;
            border-left: 0;
            border-radius: 0;
        }

        .list-group .list-group-control {
            position: relative;
            display: block;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
        }

        .list-group .list-group-control .custom-control {
            margin: 0;
            padding: 0.75rem 1.25rem;
            padding-left: 3rem;
            display: block;
        }

        .list-group .list-group-control .custom-control .custom-control-indicator,
        .list-group .list-group-control .custom-control .material-control-indicator,
        .list-group .list-group-control .custom-control .fill-control-indicator,
        .list-group .list-group-control .custom-control .overflow-control-indicator {
            top: 1rem;
            left: 1.25rem;
        }
    </style>

</head>

<body>
    <div class="container">

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body p-5">
                    <div class="table-responsive" style="height: 500px;">
                        <div class="card my-3">
                            <ul class="list-group list-group-flush">
                                <?php
                                $no = 1;
                                foreach ($DA as $va) {
                                ?>

                                    <li class="list-group-control">
                                        <label class="custom-control overflow-checkbox">
                                            <input type="radio" name="idDrs" onclick="onClickProses(this.value)" class="overflow-control-input idDrsGet" id="<?= $va['DrainaseID'] ?>" value="<?= $va['DrainaseID'] ?>">
                                            <span class="overflow-control-indicator"></span>
                                            <span class="overflow-control-description"><?= $va['NamaDaerah'] ?></span>
                                            <h4><?= $va['Keterangan'] ?></h4>
                                            <h6><?= $va['Kondisi'] ?></h6>
                                        </label>
                                    </li>

                                <?php
                                    $no++;
                                }
                                ?>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="mapid" style="height: 800px;">

                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="<?= base_url('assets/geojson/bukittinggi.js') ?>"></script>
<script>
    var map = L.map('mapid')
        .setView([-0.30907, 100.37055], 14, );

    var openstreetmap = L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 20
        })

    // Tile type: openstreetmap Hot
    var openstreetmapHot = L.tileLayer(
        'http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 20
        })

    // Tile type: openstreetmap Osm
    var openstreetmapOsm = L.tileLayer(
        'http://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>',
            maxZoom: 20
        })

    var latlngs = [
        [45.51, -122.68],
        [37.77, -122.43],
        [34.04, -118.2]
    ];

    var daerahA = L.polyline(latlngs, {
        color: 'red'
    }).addTo(map);

    //Base layers definition and addition

    var allOptions = {
        "Open streetmap": openstreetmap,
        "Open streetmap: Hot": openstreetmapHot,
        "Open streetmap: Osm": openstreetmapOsm,
        "Daerah A": daerahA,
    };

    // var latlngs = [
    //     [45.51, -122.68],
    //     [37.77, -122.43],
    //     [34.04, -118.2]
    // ];


    // L.geoJSON(bukittinggi).addTo(map);

    // Initialize with openstreetmap
    openstreetmap.addTo(map);

    // Add baseLayers to map as control layers
    L.control.layers(allOptions).addTo(map);




    onClickProses(0);
    var polyline = [];

    function onClickProses(arr) {
        hidePolyline();
        // map.removeLayer(polyline);
        // var arr = [];
        // $("input[type=radio]").each(function() {
        //     var self = $(this);
        //     if (self.is(':checked')) {
        //         arr.push(self.attr("id"));
        //     }
        // });
        // var arr = 0;
        // $("input[type=radio]").each(function() {
        //     var self = $(this);
        //     if (self.is(':checked')) {
        //         console.log(self.attr("id"));

        //         arr = self.attr("id");
        //     }
        // });

        console.log(arr);

        $.ajax({
            type: "POST",
            url: "<?= base_url('get-coordinat') ?>",
            data: {
                idDrainAce: arr
            },
            enctype: 'multipart/form-data',
            dataType: "json",
            success: function(response) {
                // console.log(response.coordinat);
                if (arr == 0) {
                    $.each(response, function(i, item) {
                        // console.log(item.coordinat);
                        L.polyline(item.coordinat, {
                            color: item.warna
                        }).addTo(map);
                        // map.fitBounds(polyline[i].getBounds());

                    });
                    map.setView([-0.30907, 100.37055], 14);

                } else {
                    var bounds = L.bounds()
                    $.each(response, function(i, item) {
                        // console.log(item.coordinat);
                        polyline[i] = L.polyline(item.coordinat, {
                            color: item.warna
                        }).addTo(map).bindTooltip(item.kondisi).openTooltip();
                        bounds.extend(polyline[i])
                    });
                    map.fitBounds(bounds);

                }


                // polyline = L.polyline(response.coordinat, {
                //     color: 'red'
                // }).addTo(map);

                // map.addLayer(polyline);
                // polyline1 = L.polyline(response.coordinat1, {
                //     color: 'red'
                // }).addTo(map);
                // if (polyline != undefined) {
                // };
                // zoom the map to the polyline
                // map.fitBounds(polyline.getBounds());

            },
            failure: function(response) {
                alert(response.responseText);
            },
            error: function(response) {
                alert(response.responseText);
            }
        });
    }

    function clickZoom(e) {
        map.setView(e.target.getLatLng(), 15);
    }

    function hidePolyline() {
        // map.removeLayer(polyline); // For hide
        // polyline.remove();
        map.eachLayer(function(layer) {
            // console.log(layer);
            if (!!layer.toGeoJSON) {
                map.removeLayer(layer);
            }
            // map.removeLayer(layer);
        });
    }
</script>

</html>