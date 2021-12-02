<template>
    <app-layout title="Chart">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                asdasd
            </h2>
        </template>
        <!-- <mainbox></mainbox> -->
        <div>
            <canvas id="chart" width="300" height="300"></canvas>
        </div>
        <div class="selectBox">
            <select id="selection" @change="selection()">
                <option value="10">형법범</option>
                <option value="20">2</option>
                <option value="30">3</option>
            </select>
            <!-- <button @click="applyChange()"> 변경 </button> -->

            <select id="crime" @change="changes()">
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
            </select>

        </div>

    </app-layout>
</template>

<script>

    import Mainbox from "@/Layouts/Mainbox.vue";
    import {Chart, registerables} from 'chart.js';
    import {defineComponent} from "vue";
    import AppLayout from "@/Layouts/AppLayout.vue";
    import Navbar from "@/Layouts/Navbar.vue";
    Chart.register(...registerables);

    export default {
        props: ['age'],

        methods: {

            changes() {

                //  this.crime = this.age[document      .getElementById('crime')      .value];

                console.log(this.myChart);
                var selectedYear = document
                    .getElementById('crime')
                    .value;


                switch (selectedYear) {


						

                    case "2014":
                     	for(var i = 0; i< 16 ; i++){
						 this.myChart.data.datasets[0].data[i]= this.age[0][selectedYear+"년 "+this.namelist[i]];
					}
						  this
                    .myChart
                    .update();
                        break;
                    case "2015":
                    console.log(selectedYear);

						
							
						

						//   console.log(this.myChart.data.datasets[0].data);
			// 	console.log(selectedYear+" "+this.namelist[3]);
   					// console.log(this.myChart.data.datasets[0].data);
					for(var i = 0; i< 16 ; i++){
						 this.myChart.data.datasets[0].data[i]= this.age[0][selectedYear+"년 "+this.namelist[i]];
					}
						  this
                    .myChart
                    .update();

                        break;
                    case "2016":
                     	for(var i = 0; i< 16 ; i++){
						 this.myChart.data.datasets[0].data[i]= this.age[0][selectedYear+"년 "+this.namelist[i]];
					}
						  this
                    .myChart
                    .update();
                        break;
                    case "2017":
                  	for(var i = 0; i< 16 ; i++){
						 this.myChart.data.datasets[0].data[i]= this.age[0][selectedYear+"년 "+this.namelist[i]];
					}
						  this
                    .myChart
                    .update();
                        break;
                    case "2018":
                     	for(var i = 0; i< 16 ; i++){
						 this.myChart.data.datasets[0].data[i]= this.age[0][selectedYear+"년 "+this.namelist[i]];
					}
						  this
                    .myChart
                    .update();
                        break;
                    case "2019":
                        	for(var i = 0; i< 16 ; i++){
						 this.myChart.data.datasets[0].data[i]= this.age[0][selectedYear+"년 "+this.namelist[i]];
					}
						  this
                    .myChart
                    .update();
                        break;
                  

                }
                this.myChart.options.plugins.title.text = selectedYear;
                this
                    .myChart
                    .update();
            },
            selection() {

                console.log("선택값 " + selection.value);
                // console.log(this.myChart);
                this
                    .myChart
                    .data
                    .datasets[0]
                    .data[0] = document
                    .getElementById('selection')
                    .value;
                console.log("차트값 " + this.myChart.data.datasets[0].data[0]);
                this
                    .myChart
                    .update();

            },
            //   applyChange(){   this.myChart.update();    },

            fillData() {
                const ctx = document
                    .getElementById('chart')
                    .getContext('2d');
                this.myChart = new Chart(ctx, {
                    type: 'bar',
                    options: {
                        plugins: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            responsive: true,
                            title: {
                                display: true,
                                text: 'DDDDDDDDDDDD',
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
                                    this.age[0][(document
                    .getElementById('crime')
                    .value)+"년 "+this.namelist[3]],

                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"],
                                    this.age[0]["2019년 서울"]
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
                                    'rgba(75, 192, 192, 0.2)'
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
                                    'rgba(75, 192, 192, 1)'
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
                '강원',
                '충북',
                '충남',
                '전북',
                '전남',
                '경북',
                '경남',
                '제주',
            ];
        },
        data() {
            this.myChart = null
            return {crime: "loading", namelist: "ㅁㄴㅇ"};
        },

        components: {
            Navbar,
            Mainbox,
            defineComponent,
            AppLayout

        }
    }

    // window.onload = function (){     const selection =
    // document.getElementById('selection'); selection.addEventListener('change',
    // ()=> { console.log(selection.value);         console.log(this.data.myChart);
    // this.myChart.data.datasets[0].data= selection.value; this.myChart.update();
    // }); }
</script>

<style lang="scss">
    .navbar {
        z-index: 1;
    }
</style>