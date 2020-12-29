<template>
    <canvas :width="width" :height="height" :id="id"></canvas>
</template>

<script>
    import Chart from "chart.js";

    export default {
        props: [
            'id','width','height','type',
            'title','labels','data','top',
            'left','right','bottom', 'fill',
            'backgroundColor', 'borderColor',
            'borderWidth','layout'
            ],

        mounted() {
            var ctx = document.getElementById(this.id).getContext('2d');

            new Chart(ctx, {
                type: this.type ? this.type : 'bar',
                data: {
                    labels: this.labels,
                    datasets: [{
                        label: this.title,
                        data: this.data,
                        fill: this.fill,
                        backgroundColor: this.backgroundColor,
                        borderColor: this.borderColor,
                        borderWidth: this.borderWidth ? this.borderWidth : 1,
                        
                    }],
                },
                options: {
                title: {
                    display: false,
                    text: 'Custom Chart Title'
                },
                legend:{
                    display: false,
                },
                layout:{
                    padding:{
                        top:this.top,
                        left:this.left,
                        right:this.right,
                        bottom:this.bottom
                    }
                },
                }       
            });
        }
    }
</script>