<template>
	 <div id="map" style="width: 80%; height: 700px"></div>
</template>
<script>
import geojsonfile from "./geojsonfile";
export default {

	 mounted() {
        const mapOptions = { 
            center: new naver.maps.LatLng(38, 127),
            zoom: 8,
            //  useStyleMap: true,
        };
		  
        this.map = new naver.maps.Map("map", mapOptions);
		  	this.map.data.addGeoJson(geojsonfile);
              //폴리곤 생성
	 }
}
</script>