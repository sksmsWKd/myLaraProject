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
                    .setStyle({strokeColor: 'yellow', fillColor: 'yellow'});

                //폴리곤 생성
                var contentString = ['<div class="iw_inner">', '   <h3>서울특별시</h3>', '</div>'].join(
                    ''
                );
                //메시지 내용
                var infowindow = new naver
                    .maps
                    .InfoWindow({content: contentString});
                //메시지 생성

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
                                strokeColor: 'red',
                                fillColor: 'red'
                            });

                        infowindow.open(this.map, naver.maps.LatLng(37,126));  

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