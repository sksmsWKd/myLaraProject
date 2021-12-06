<template>

    <app-layout title="map2">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight ">
                <div class="dropdown show float-sm-left mr-4 mb-4">
                    <a
                        class="btn btn-secondary dropdown-toggle"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        일반범죄
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item">재산범죄</a>
                        <a class="dropdown-item">강력범죄</a>
                        <a class="dropdown-item">공무원범죄</a>
                    </div>
                </div>

                 <div class="dropdown show float-sm-left mr-4 mb-4">
                    <a
                        class="btn btn-secondary dropdown-toggle"
                        href="#"
                        role="button"
                        id="dropdownMenuLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        강력범죄
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item">재산범죄</a>
                        <a class="dropdown-item">강력범죄</a>
                        <a class="dropdown-item">공무원범죄</a>
                    </div>


                </div>
                    
            <select
                id="crime"
                class="land"
                style="background-color: rgb(24, 26, 27)">
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
            </select>

            <select
                id="crimetype"
                class="land"
                style="background-color: rgb(24, 26, 27)">
                <option value="재산범죄">재산범죄</option>
                <option value="강력범죄">강력범죄</option>
                <option value="공무원범죄">공무원범죄</option>
            </select>

            </h2>
        </template>
        <div id="map" style="width: 80%; height: 700px">
   <img src="../../img/gradient.png" alt="">
            
        </div>

    </app-layout>

</template>
<script>
    import geojsonfile from "./geojsonfile";
    import AppLayout from "@/Layouts/AppLayout.vue";
    export default {
        components: {
            AppLayout
        },
        props:['crimeData'],

        data(){
            return{
                    crimeDatas:"",
            }
        },
        mounted() {


// var CustomOverlay = function(options) {
//     this._element = $('<div style="position:absolute;left:0;top:0;width:124px; height:130px;background-color:#F2F0EA;text-align:center;border:2px solid #6C483B;">' +
//                         '<img src=  "../../gradient.JPG" style="width: 120px; height:130px">' +
//                         '<span style="font-weight: bold;"> Brown </span>' +
//                         '</div>')

//     this.setPosition(options.position);
//     this.setMap(options.map || null);
// };

// CustomOverlay.prototype = new naver.maps.OverlayView();
// CustomOverlay.prototype.constructor = CustomOverlay;

// CustomOverlay.prototype.setPosition = function(position) {
//     this._position = position;
//     this.draw();
// };

// CustomOverlay.prototype.getPosition = function() {
//     return this._position;
// };

// CustomOverlay.prototype.onAdd = function() {
//     var overlayLayer = this.getPanes().overlayLayer;

//     this._element.appendTo(overlayLayer);
// };

// CustomOverlay.prototype.draw = function() {
//     if (!this.getMap()) {
//         return;
//     }

//     var projection = this.getProjection(),
//         position = this.getPosition(),
//         pixelPosition = projection.fromCoordToOffset(position);

//     this._element.css('left', pixelPosition.x);
//     this._element.css('top', pixelPosition.y);
// };

// CustomOverlay.prototype.onRemove = function() {
//     var overlayLayer = this.getPanes().overlayLayer;

//     this._element.remove();
//     this._element.off();
// };

            this.crimeDatas = this.crimeData;
         
            const mapOptions = {
                center: new naver
                    .maps
                    .LatLng(38, 125),
                zoom: 11,
                useStyleMap: true,
                 zoomControl: true, //줌 컨트롤
              zoomControlOptions: { 
            position: naver.maps.Position.TOP_RIGHT
        },
     
            };

            this.map = new naver
                .maps
                .Map("map", mapOptions);
            this
                .map
                .data
                .addGeoJson(geojsonfile);



// marker



  
// var position = new naver.maps.LatLng(37.3849483, 127.1229117);

// var overlay = new CustomOverlay({
//     map: this.map,
//     position: position
// });



            this
                .map
                .data
                .setStyle(
                    {fillColor: '#ff0000', fillOpacity: 0.0001, strokeColor: '#ff0000', strokeWeight: 2, strokeOpacity: 0.4}
                );

            //폴리곤 생성

            var tooltip = $(
                '<div style="position:absolute;z-index:1000;padding:5px 10px;background-color:#' +
                'fff;border:solid 2px #000;font-size:14px;pointer-events:none;display:none;"></' +
                'div>'
            );

            tooltip.appendTo(this.map.getPanes().floatPane);
            // MapPanes 객체는 오버레이를 지도 위에 렌더링할 수 있는 DOM 요소를 포함하며, 지도에 있는 여러 레이어의 스택(stack) 순서를
            // 나타냅니다. floatPane 은 모든 레이아웃 위에 위치 메시지 내용 메시지 생성 메시지 생성 contentString 은
            // bootstrap/ tailwindcss 안됨.
            var infowindow = new naver
                .maps
                .InfoWindow({content: "로딩 중입니다"});


            
            
          
            this
                .map
                .data
                .addListener('mouseover', (e) => {
                    
                    const selectedYear = document
                    .getElementById('crime')
                    .value;


                     const crimetype = document
                    .getElementById('crimetype')
                    .value;



                    this
                        .map
                        .setCursor("pointer");
                    var feature = e.feature;
                    var region = feature.getProperty('CTP_KOR_NM');
                    tooltip
                        .css({display: '', left: e.offset.x, top: e.offset.y})
                        .text(region);
                    this
                        .map
                        .data
                        .overrideStyle(feature, {
                            fillOpacity: 0.6,
                            strokeWeight: 4,
                            strokeOpacity: 1
                        });

                    // var point = naver     .maps     .LatLng(e.coord._lat, e.coord._lng);

                    var point = naver
                        .maps
                        .LatLng(e.offset.x, e.offset.y);

                          var namelist = [
                '서울',
                '부산',
                '대구',
                '인천',
                '광주',
                '대전',
                '울산',
                '세종',
                '경기',
                '강원',
                '충북',
                '충남',
                '전북',
                '전남',
                '경북',
                '경남',
                '제주'
            ];

                    switch (region) {
                        case '서울특별시':
                            point = naver
                                .maps
                                .LatLng(37.5820587276502, 126.97914178314467);
                            var inforegion = region;
                           
                            var crime = crimetype;
                               var cYear = selectedYear;
                            var nPeople =  this.crimeDatas[0][selectedYear + "년 " + namelist[1]];

                         
                            
                            this
                                .map
                                .data
                                .overrideStyle(feature, {
                                    fillOpacity: 0.6,
                                    strokeWeight: 4,
                                    strokeOpacity: 1,
                                    fillColor: '#f7e600'
                                });


                            break;
                        case '인천광역시':
                            point = naver
                                .maps
                                .LatLng(37.47452697399199, 126.70679201321082);
                            var inforegion = region;
                            var cYear;
                            var crime;
                            var nPeople;
                            break;

                        case '부산광역시':
                            point = naver
                                .maps
                                .LatLng(35.215627818345965, 129.03666066607425);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;

                        case '대구광역시':
                            point = naver
                                .maps
                                .LatLng(35.89970846670154, 128.53782825490094);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '울산광역시':
                            point = naver
                                .maps
                                .LatLng(35.571600828984856, 129.25979277577076);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '세종특별자치시':

                            point = naver
                                .maps
                                .LatLng(36.52637935936001, 127.39670530710237);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '대전광역시':

                            point = naver
                                .maps
                                .LatLng(36.34344125167462, 127.37836783201705);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '광주광역시':

                            point = naver
                                .maps
                                .LatLng(35.17686535594658, 126.85391604457695);
                            // var inforegion = region;
                            var inforegion = region;
                                 var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '경기도':

                            point = naver
                                .maps
                                .LatLng(37.57812827049015, 127.4206063176053);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '강원도':

                            point = naver
                                .maps
                                .LatLng(37.840185938725476, 128.26038788434911);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '충청남도':

                            point = naver
                                .maps
                                .LatLng(36.6218316114712, 126.81876286143893);
                            var inforegion = region;
                                 var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '충청북도':

                            point = naver
                                .maps
                                .LatLng(36.973005089464976, 127.60722444354838);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '경상북도':

                            point = naver
                                .maps
                                .LatLng(36.471908295437814, 128.82957316636407);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '경상남도':

                            point = naver
                                .maps
                                .LatLng(35.49034616582705, 128.3023769605749);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;      
                        case '전라북도':

                            point = naver
                                .maps
                                .LatLng(35.76338470849839, 127.16867184513735);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;
                        case '전라남도':

                            point = naver
                                .maps
                                .LatLng(34.94147936019404, 126.95406100030283);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;

                        case '제주특별자치도':

                            point = naver
                                .maps
                                .LatLng(33.38584286233105, 126.55283202819172);
                            var inforegion = region;
                             var cYear;
                            var crime;
                            var nPeople;
                            break;

                    }

                    infowindow.setContent([
                        '<div class="iw_inner" style="border:2px solid gold ; box-shadow: 20px 10px 33p' +
                                'x #FF0000;  background-color: #CCFFFF ">',
                        '   <h3>' + inforegion + '</h3>',
                        '   <p>' + cYear  +'년    범죄 종류' +crime    + nPeople + ' 명'+ '<br />',
                        '       <br />',
                        '       <br />',
                        '   </p>',
                        '</div>'
                    ].join(''));
                                                
                    
                    //동적으로 데이터 받아와 infowindow 교체

                    if (infowindow.getMap()) {
                        infowindow.close();
                    } else {

                        infowindow.DEFAULT_OPTIONS.position = point;
                        infowindow.open(this.map, point);
                        console.log("오픈");
                        console.log(feature);

                    }

                    // open 뒷자리. var infowindow = new naver     .maps     .InfoWindow({content:
                    // region}); this .map     .data     .overrideStyle(feature, { strokeColor:
                    // 'red', fillColor: 'red'     }); console.log(feature);
                    // infowindow.open(this.map, naver.maps.LatLng(feature),);

                });

            this
                .map
                .data
                .addListener('mouseout', (e) => {
                    var feature = e.feature;
                    this
                        .map
                        .setCursor("auto");
                    // this     .map     .data .overrideStyle(feature, {         strokeColor: 'red',
                    // fillColor: 'red'     });
                    tooltip
                        .hide()
                        .empty();
                    this
                        .map
                        .data
                        .revertStyle();
                    infowindow.close();
                });

        }
    }
</script>