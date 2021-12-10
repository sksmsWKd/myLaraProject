<template>

    <app-layout title="map2">
        <template #header class="text-gray-200">
            <div class="inline-block ">
            <h2 class="font-semibold text-xl text-gray-200 mr-20 leading-tight ">
               Crime data on the map
            </h2>
            </div>
                    <!--#40E0D0 #FF8C00 #FF0080 -->
                    <!-- 1. 지도에 년도/범죄자수 저장 + 잘보이게 -->
                    <!-- ㅇㅇ -->
                    <!-- 2. 년도 선택시 색 선택-->
                    <!-- ㅇㅇ -->
                    <!-- 3. 차트페이지 게시글표시 -->
                      <div class="inline-block text-gray-200 mr-2  ">
                <select id="year"  @change="changes()" class="land" style="background-color: rgb(24, 26, 27)">
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                </select>
 </div>
               <div class="inline-block text-gray-200  mr-20 ">
                <select
                    id="crimetype"
                    class="land"
                      @change="changes()"
                    style="background-color: rgb(24, 26, 27)">
                    <option value="4">재산범죄 소계</option>
                    <option value="11">강력범죄 소계</option>
                    <option value="12">살인</option>
                    <option value="25">위조범죄 소계</option>
                <option value="26">공무원범죄 소계</option>
                <option value="27">풍속범죄 소계</option>
                <option value="28">특별법범 소계</option>
                <option value="29">형법범 과실범죄 소계</option>
                <option value="30">기타형법범죄 소계</option>
                </select>
 </div>
           
        </template>
        <div id="map" class="mx-auto mt-3" style="width: 80%; height: 700px; z-index: 2;">
            <img
                src="../../img/gradient.png"
                id="img"
                alt=""
                style="z-index: -99999; height: 200px ;width:20px;"></div>

        </app-layout>

</template>
    <script>
        import geojsonfile from "./geojsonfile";
        import AppLayout from "@/Layouts/AppLayout.vue";
        export default {
            components: {
                AppLayout
            },
            props: ['crimeData'],

            data() {
                return {crimeDatas: ""}
            },

            methods: {
              

                changes() {
                    let arr1 = [
                        1,
                        2,
                        3,
                        4,
                        5,
                        6,
                        7,
                        8,
                        9,
                        10,
                        11,
                        12,
                        13,
                        14,
                        15,
                        16
                    ];
                    let namelist = [
                        '강원',
                        '경기',
                        '경남',
                        '경북',
                        '광주',
                        '대구',
                        '대전',
                        '부산',
                        '서울',
                        '세종',
                        '울산',
                        '인천',
                        '전남',
                        '전북',
                        '제주',
                        '충남',
                        '충북'
                    ];

                    const selectedCrime = document
                        .getElementById('crimetype')
                        .value;

                    const selectedYear = document
                        .getElementById('year')
                        .value;
                  

                        console.log(selectedCrime);
                    let arr2 = [];

                    for (let i = 0; i < 17; i++) {
                        arr2.push(this.crimeDatas[selectedCrime][selectedYear+"년 " + namelist[i]],);
                    }
                    console.log(arr2);
                    // arr2.sort(function(a, b)  {      if(a > b) return 1;     if(a === b) return
                    // 0; if(a < b) return -1;     });
                    
                    switch(selectedYear){
                        case "2014":

                            break;
                         case "2015":
                            break;
                         case "2016":
                            break;
                         case "2017":
                            break;
                         case "2018":
                            break;
                         case "2019":
                            break;
                    }
                    switch (selectedCrime) {

                        case "4":
                          
                            for (let i = 0; i < namelist.length; i++) {
                                let color = 0.00001 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
                            }

                            break;

                        case "11":
                           
                            for (let i = 0; i < namelist.length; i++) {
                                let color = 0.00035 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
                            }
                            break;

                        case "12":
                           
                            for (let i = 0; i < namelist.length; i++) {
                                let color = 0.01 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
                            }
                            break;

                            case "25":
 for (let i = 0; i < namelist.length; i++) {
                                let color = 0.0001 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
 }
                            break;

                            case "26":
 for (let i = 0; i < namelist.length; i++) {
                                let color = 0.001 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
 }
                            break;

                            case "27":
 for (let i = 0; i < namelist.length; i++) {
                                let color = 0.0005 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
 }
                            break;

                            case "28":
 for (let i = 0; i < namelist.length; i++) {
                                let color = 0.00001 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
 }
                            break;

                            case "29":
 for (let i = 0; i < namelist.length; i++) {
                                let color = 0.0005 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
 }
                            break;

                            case "30":
 for (let i = 0; i < namelist.length; i++) {
                                let color = 0.0001 * arr2[i];
                                this
                                    .map
                                    .data
                                    .overrideStyle(this.map.data._features[i], {
                                        fillOpacity: color,
                                        strokeWeight: 2,
                                        strokeOpacity: 0.4,
                                        fillColor: '#ff0000'
                                    });
                                console.log(color);
 }
                            break;

                    }
                }
            },
            mounted() {

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
                    }
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

                // this.map.data._features[0].DEFAULT_OVERLAY_STYLE.fillColor="#FF0099";
                // this.map.data._features[0]._overlays[0].fillColor="FF0099"
                // this.map.data._features[0]._overlays[0].DEFAULT_OPTIONS.fillColor="#FF0099";
                // this.map.data._features[0]._overlays[0].fillOpacity=1; 폴리곤 생성

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
                    .addListener('click', (e) => {
                        this
                            .map
                            .setCursor("pointer");
                        if (e.feature.getProperty('CTP_KOR_NM') == '서울특별시') {
                            alert('서울');
                            console.log(this.map.data);
                            this
                                .map
                                .data
                                .overrideStyle(e.feature, {
                                    fillOpacity: 0.6,
                                    strokeWeight: 4,
                                    strokeOpacity: 1,
                                    fillColor: '#FF0099'
                                });

                        }
                    });

                this
                    .map
                    .data
                    .addListener('mouseover', (e) => {

                        const selectedYear = document
                            .getElementById('year')
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
                            //마우스오버 색
                        // this
                        //     .map
                        //     .data
                        //     .overrideStyle(feature, {
                        //         fillOpacity: 0.6,
                        //         strokeWeight: 4,
                        //         strokeOpacity: 1
                        //     });

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
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[0]];

                              
                                break;

                            case '부산광역시':
                                point = naver
                                    .maps
                                    .LatLng(35.215627818345965, 129.03666066607425);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[1]];

                                break;

                            case '대구광역시':
                                point = naver
                                    .maps
                                    .LatLng(35.89970846670154, 128.53782825490094);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[2]];

                                break;
                            case '인천광역시':
                                point = naver
                                    .maps
                                    .LatLng(37.47452697399199, 126.70679201321082);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[3]];

                                break;
                            case '광주광역시':

                                point = naver
                                    .maps
                                    .LatLng(35.17686535594658, 126.85391604457695);
                                // var inforegion = region;
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[4]];

                                break;
                            case '대전광역시':

                                point = naver
                                    .maps
                                    .LatLng(36.34344125167462, 127.37836783201705);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[5]];

                                break;

                            case '울산광역시':
                                point = naver
                                    .maps
                                    .LatLng(35.571600828984856, 129.25979277577076);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[6]];

                                break;
                            case '세종특별자치시':

                                point = naver
                                    .maps
                                    .LatLng(36.52637935936001, 127.39670530710237);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[7]];

                                break;

                                break;
                            case '경기도':

                                point = naver
                                    .maps
                                    .LatLng(37.57812827049015, 127.4206063176053);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[8]];

                                break;
                            case '강원도':

                                point = naver
                                    .maps
                                    .LatLng(37.840185938725476, 128.26038788434911);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[9]];

                                break;

                            case '충청북도':

                                point = naver
                                    .maps
                                    .LatLng(36.973005089464976, 127.60722444354838);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[10]];

                                break;
                            case '충청남도':

                                point = naver
                                    .maps
                                    .LatLng(36.6218316114712, 126.81876286143893);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[11]];

                                break;
                            case '전라북도':

                                point = naver
                                    .maps
                                    .LatLng(35.76338470849839, 127.16867184513735);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[12]];

                                break;
                            case '전라남도':

                                point = naver
                                    .maps
                                    .LatLng(34.94147936019404, 126.95406100030283);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[13]];

                                break;

                            case '경상북도':

                                point = naver
                                    .maps
                                    .LatLng(36.471908295437814, 128.82957316636407);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[14]];

                                break;
                            case '경상남도':

                                point = naver
                                    .maps
                                    .LatLng(35.49034616582705, 128.3023769605749);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[15]];

                                break;

                            case '제주특별자치도':

                                point = naver
                                    .maps
                                    .LatLng(33.38584286233105, 126.55283202819172);
                                var inforegion = region;
                                var crime = crimetype;
                                var cYear = selectedYear;
                                var nPeople = this.crimeDatas[crime][selectedYear + "년 " + namelist[16]];

                                break;

                        }

                        var cType = $("#crimetype option:checked").text()

                        infowindow.setContent([
                            '<div class="iw_inner" style="border:2px solid gold ; box-shadow: 20px 10px 33p' +
                                    'x #FF0000;  background-color: #CCFFFF ">',
                            '   <h3>' + inforegion + '</h3>',
                            '   <p>' + cYear + '년    //    범죄 종류   : ' + cType + "  " + nPeople +
                                    ' 명<br />',
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
                        // this
                        //     .map
                        //     .data
                        //     .revertStyle();
                        //스타일원래대로
                        infowindow.close();
                    });

            }
        }
    </script>
    <style lang="scss">
        .img {
            z-index: -2 !important;
            position: absolute;
            top: 50px;
            left: 50px;
        }
        #img {
            z-index: 2 !important;
        }
    </style>