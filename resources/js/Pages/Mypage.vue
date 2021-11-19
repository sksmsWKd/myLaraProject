<template>
    <div>
        <div>
            <canvas id="chart" width="400" height="400"></canvas>
        </div>
        <div class="selectBox">
            <select id="selection"  @change="selection()">
                <option value="11">1</option>
                <option value="22">2</option>
                <option value="33">3</option>
            </select>
            <button @click="applyChange()">
              변경
            </button>
          
        </div>
        <mainbox></mainbox>
        <mainbox/>
        gd
    </div>
</template>
<script>
    import Navbar from "@/Layouts/Navbar.vue";
    import Mainbox from "@/Layouts/Mainbox.vue";
    import {Chart, registerables} from 'chart.js';

    Chart.register(...registerables);

    export default {

        methods: {
            selection() {
               
                console.log(selection.value);
                // console.log(this.myChart);
                this.myChart.data.datasets[0].data[0] = document.getElementById('selection').value;
                 console.log(this.myChart.data.datasets[0].data[0]);
                 //변경누르면에러
               
            },
        applyChange(){
        this.myChart.update();
        },

        fillData() {
            const ctx = document
                .getElementById('chart')
                .getContext('2d');
            this.myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Red',
                        'Blue',
                        'Yellow',
                        'Green',
                        'Purple',
                        'Orange'
                    ],
                    datasets: [
                        {
                            label: '# of Votes',
                            data: [
                                12,
                                19,
                                3,
                                5,
                                2,
                                3
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        }
    },

    mounted() {
        this.fillData();
    },
    data() {
        return {myChart: null};
    },

    components: {
        Navbar,
        Mainbox
       
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