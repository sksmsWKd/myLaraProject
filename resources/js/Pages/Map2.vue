<template>
    <div id="map" style="width: 80%; height: 700px"></div>
</template>
<script>
    import geojsonfile from "./geojsonfile";

    export default {

        mounted() {

            const mapOptions = {
                center: new naver
                    .maps
                    .LatLng(38, 125),
                zoom: 8,
                useStyleMap: true
            };

            this.map = new naver
                .maps
                .Map("map", mapOptions);
            this
                .map
                .data
                .addGeoJson(geojsonfile);
            this
                .map
                .data
                .setStyle({strokeColor: 'red', fillColor: 'red'});

            //폴리곤 생성

            this
                .map
                .data
                .addListener('mouseover', (e) => {
                    this
                        .map
                        .setCursor("pointer");
                    var feature = e.feature;

                    this
                        .map
                        .data
                        .overrideStyle(feature, {
                            strokeColor: 'yellow',
                            fillColor: 'yellow'
                        });

                });

            this
                .map
                .data
                .addListener('mouseout', (e) => {
                    var feature = e.feature;
                    this
                        .map
                        .setCursor("auto");

                    this
                        .map
                        .data
                        .overrideStyle(feature, {
                            strokeColor: 'red',
                            fillColor: 'red'
                        });

                });
        }
    }
</script>