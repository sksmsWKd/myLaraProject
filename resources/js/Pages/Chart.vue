<template>
    <app-layout title="Chart">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight flow-center">
                Crime data on the chart
            </h2>
        </template>
        <!-- <mainbox></mainbox> -->
        <div>
            <canvas class="col-xs-1 mx-auto " id="chart" width="1200" height="700"></canvas>
        </div>

        <div style="width:200px" class="text-gray-200 d-flex mx-auto">
            <select
                id="selection"
                @change="changes()"
                class="land"
                
                style="background-color: rgb(24, 26, 27)">
                <option value="0">범죄발생총건수</option>
                <option value="1">인구수 소계</option>
                <option value="2">10만명당 범죄발생수</option>
                <option value="3">형법범 소계</option>
                <option value="4">형법범 - 재산범죄 소계</option>
                <option value="11">형법범 - 강력범죄 (흉악) 소계</option>
                <option value="16">형법범 - 강력범죄 (폭력) 소계
                </option>
                <option value="25">위조범죄 소계</option>
                <option value="26">공무원범죄 소계</option>
                <option value="27">풍속범죄 소계</option>
                <option value="28">특별법범 소계</option>
                <option value="29">형법범 과실범죄 소계</option>
                <option value="30">기타형법범죄 소계</option>
            </select>
            <!-- <button @click="applyChange()"> 변경 </button> -->

            <select
                id="crime"
                @change="changes()"
                class="land"
                style="background-color: rgb(24, 26, 27)">
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
            </select>

        </div>
       


    </app-layout>
</template>

<script>

 
    import {Chart, registerables} from 'chart.js';
    import {defineComponent} from "vue";
    import AppLayout from "@/Layouts/AppLayout.vue";
    import Navbar from "@/Layouts/Navbar.vue";
    
    Chart.register(...registerables);

    export default {

        props: ['age','posts'],

        methods: {

            updateChartYearwithCrime(selectedYear, selectedCrime) {
                switch (selectedYear) {
                    case "2014":
                    case "2015":
                        // console.log(this.myChart.data.datasets[0].data); 	console.log(selectedYear+"
                        // "+this.namelist[3]); console.log(this.myChart.data.datasets[0].data);
                    case "2016":
                    case "2017":
                    case "2018":
                    case "2019":
                        this.updateChartYear(selectedCrime, selectedYear);
                        break;
                }
                this.myChart.options.plugins.title.text = selectedYear + "년도" +
                         "그래프";
                this
                    .myChart
                    .update();

            },

            updateChartYear(selectedCrime, selectedYear) {

                for (var i = 0; i < 17; i++) {
                    this
                        .myChart
                        .data
                        .datasets[0]
                        .data[i] = this
                        .age[selectedCrime][selectedYear + "년 " + this.namelist[i]];
                }
                this
                    .myChart
                    .update();
            },

            //   applyChange(){   this.myChart.update();    },
            changes() {

                const selectedYear = document
                    .getElementById('crime')
                    .value;
                const selectedCrime = document
                    .getElementById('selection')
                    .value;

                console.log(selectedYear);
                console.log(selectedCrime);

                switch (selectedCrime) {
                    case "0":
                    case "1":       
                    case "2":
                    case "3":
                    case "4":
                    case "11":
                        //
                    case "16":
                    case "25":
                    case "26":
                    case "27":
                    case "28":                      
                    case "29":                 
                    case "30":
                        this.updateChartYearwithCrime(selectedYear, selectedCrime);
                        break;
                }
                this.myChart.options.plugins.title.text = selectedYear + "년도" +
                        selectedCrime + "그래프";
                this
                    .myChart
                    .update();
            },

            fillData() {
                const ctx = document
                    .getElementById('chart')
                    .getContext('2d');
                this.myChart = new Chart(ctx, {
                    type: 'bar',
                    options: {
                        responsive: false,
                        plugins: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            responsive: true,
                            title: {
                                display: true,
                                text: '2014년도 범죄발생총건수 그래프',
                                fontSize: 14
                            }
                        }
                    },
                    data: {
                        labels: [
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
                        ],
                        datasets: [
                            {
                                label: '# of Votes',
                                data: [

                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 부산"],
                                    this.age[0]["2019년 대구"],
                                    this.age[0]["2019년 인천"],
                                    this.age[0]["2019년 광주"],
                                    this.age[0]["2019년 대전"],
                                    this.age[0]["2019년 울산"],
                                    this.age[0]["2019년 세종"],
                                    this.age[0]["2019년 경기"],
                                    this.age[0]["2019년 강원"],
                                    this.age[0]["2019년 충북"],
                                    this.age[0]["2019년 충남"],
                                    this.age[0]["2019년 전북"],
                                    this.age[0]["2019년 전남"],
                                    this.age[0]["2019년 경북"],
                                    this.age[0]["2019년 경남"],
                                    this.age[0]["2019년 제주"]
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
                                borderWidth: 1
                            }
                        ]
                    }
                });

            }
        },

        mounted() {
           

            this.fillData();
            this.crime = this.age;
            this.namelist = [
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
        },

        data() {
            this.myChart = null
            return {crime: "loading", namelist: "ㅁㄴㅇ"};
        },

        components: {
            Navbar,
       
            defineComponent,
            AppLayout,
  

        }
    }
</script>

<style lang="scss">

    //지역마다 path 에 title붙이기.

    .navbar {
        z-index: 1;
    }
    #info-box {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        background-color: #000000;
        color: aliceblue;
        border: 2px solid #BF0A30;
        border-radius: 5px;
        padding: 5px;
        font-family: arial;
    }
</style>