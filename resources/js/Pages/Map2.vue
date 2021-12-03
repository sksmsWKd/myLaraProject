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
            </h2>
        </template>

        <div id="map" style="width: 80%; height: 700px"></div>

    </app-layout>

</template>
<script>
    import geojsonfile from "./geojsonfile";
    import AppLayout from "@/Layouts/AppLayout.vue";
    export default {
        components: {
            AppLayout
        },

        mounted() {

            const mapOptions = {
                center: new naver
                    .maps
                    .LatLng(38, 125),
                zoom: 11,
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

                    switch (region) {
                        case '서울특별시':
                            point = naver
                                .maps
                                .LatLng(37.5820587276502, 126.97914178314467);
                            var inforegion = region;

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

                            break;

                        case '부산광역시':
                            point = naver
                                .maps
                                .LatLng(35.215627818345965, 129.03666066607425);
                            var inforegion = region;

                            break;

                        case '대구광역시':
                            point = naver
                                .maps
                                .LatLng(35.89970846670154, 128.53782825490094);
                            var inforegion = region;

                            break;
                        case '울산광역시':
                            point = naver
                                .maps
                                .LatLng(35.571600828984856, 129.25979277577076);
                            var inforegion = region;

                            break;
                        case '세종특별자치시':

                            point = naver
                                .maps
                                .LatLng(36.52637935936001, 127.39670530710237);
                            var inforegion = region;

                            break;
                        case '대전광역시':

                            point = naver
                                .maps
                                .LatLng(36.34344125167462, 127.37836783201705);
                            var inforegion = region;

                            break;
                        case '광주광역시':

                            point = naver
                                .maps
                                .LatLng(35.17686535594658, 126.85391604457695);
                            // var inforegion = region;
                            var inforegion = "외국입니다.";
                            break;
                        case '경기도':

                            point = naver
                                .maps
                                .LatLng(37.57812827049015, 127.4206063176053);
                            var inforegion = region;

                            break;
                        case '강원도':

                            point = naver
                                .maps
                                .LatLng(37.840185938725476, 128.26038788434911);
                            var inforegion = region;

                            break;
                        case '충청남도':

                            point = naver
                                .maps
                                .LatLng(36.6218316114712, 126.81876286143893);
                            var inforegion = region;

                            break;
                        case '충청북도':

                            point = naver
                                .maps
                                .LatLng(36.973005089464976, 127.60722444354838);
                            var inforegion = region;

                            break;
                        case '경상북도':

                            point = naver
                                .maps
                                .LatLng(36.471908295437814, 128.82957316636407);
                            var inforegion = region;

                            break;
                        case '경상남도':

                            point = naver
                                .maps
                                .LatLng(35.49034616582705, 128.3023769605749);
                            var inforegion = region;

                            break;
                        case '전라북도':

                            point = naver
                                .maps
                                .LatLng(35.76338470849839, 127.16867184513735);
                            var inforegion = region;

                            break;
                        case '전라남도':

                            point = naver
                                .maps
                                .LatLng(34.94147936019404, 126.95406100030283);
                            var inforegion = region;

                            break;

                        case '제주특별자치도':

                            point = naver
                                .maps
                                .LatLng(33.38584286233105, 126.55283202819172);
                            var inforegion = region;

                            break;

                    }

                    infowindow.setContent([
                        '<div class="iw_inner" style="border:2px solid gold ; box-shadow: 20px 10px 33p' +
                                'x #FF0000;  background-color: #CCFFFF ">',
                        '   <h3>' + inforegion + '</h3>',
                        '   <p>서울특별시 중구 태평로1가 31 | 서울특별시 중구 세종대로 110 서울특별시청<br />',
                        '       <br />',
                        '       02-120 | 공공,사회기관 &gt; 특별,광역시청<br />',
                        '       <a href="http://www.seoul.go.kr" target="_blank">www.seoul.go.kr/</a>',
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