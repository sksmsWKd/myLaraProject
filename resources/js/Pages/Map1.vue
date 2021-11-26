<template>
    <l-map style="height:70vh" :zoom="zoom" :center="center"   :bounds="bounds"
      :max-bounds="maxBounds">
        <l-tile-layer :url="url" :attribution="attribution"/>
        <l-geo-json :geojson="geojson" :options="geojsonOptions"/>
        <l-circle
            :lat-lng="circle.center"
            :radius="circle.radius"
            :color="circle.color"/>
    </l-map>

</template>

<script>
    // DON'T load Leaflet components here! Its CSS is needed though, if not imported
    // elsewhere in your application.
    import "leaflet/dist/leaflet.css"
    import {LMap, LGeoJson, LTileLayer, LCircle} from "@vue-leaflet/vue-leaflet";
    import {latLngBounds} from "leaflet"
    import geojsonfile from "./geojsonfile";

    // let geodata = JSON.parse(geojsonfile);

    export default {
        components: {
            LMap,
            LGeoJson,
            LTileLayer,
            LCircle,
            latLngBounds
        },
        data() {
            return {
                loading: false,
                show: true,
                enableTooltip: true,
                geojsonfile: geojsonfile,
                zoom: 7,
                bounds: latLngBounds([
                    [
                        40.70081290280357, -74.26963806152345
                    ],
                    [
                        40.82991732677597, -74.08716201782228
                    ]
                ]),
                maxBounds: latLngBounds([
                    [
                        40.70081290280357, -74.26963806152345
                    ],
                    [
                        40.82991732677597, -74.08716201782228
                    ]
                ]),
                center: [
                    36.596028299868834, 128.01433309814848
                ],
                circle: {
                    center: [
                        37.413220, 126
                    ],
                    radius: 100000,
                    color: 'red'
                },
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                fillColor: "#dfdfdf",
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

                geojson: {
                    type: "FeatureCollection",
                    features: [geojsonfile]
                },
                geojsonOptions: {
                    // Options that don't rely on Leaflet methods.
                }
            };
        }
    };
</script>