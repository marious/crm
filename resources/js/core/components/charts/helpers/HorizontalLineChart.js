import {HorizontalLineChart} from './Base';

export default {
    extends: HorizontalLineChart,
    props: {
        data: {
            default: null,
            required: true
        },
        darkMode: {
            type: Boolean,
            required: true
        }
    },
    mounted() {
        this.renderHorizontalLineChart();
    },
    watch: {
        darkMode: {
            handler: 'renderHorizontalLineChart',
            immediate: false
        }
    },
    methods: {
        renderHorizontalLineChart() {
            let xAxisColor = '#F0F2F5',
                yAxisColor = '#F0F2F5';
            if (this.darkMode) {
                xAxisColor = '#2f3541'
                yAxisColor = '#2f3541'
            } else {
                xAxisColor = '#F0F2F5'
                yAxisColor = '#F0F2F5'
            }
            this.renderChart({
                    labels: this.data.labels,
                    datasets: this.data.dataSets
                },
                {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                borderDash: [8, 4],
                                zeroLineBorderDash: [8, 4],
                                color: xAxisColor,
                                drawTicks: false
                            },
                            ticks: {
                                lineHeight: 1.5,
                                fontFamily: '\'Poppins\', sans-serif',
                                fontSize: 11.262,
                                fontColor: '#9397A0',
                                padding: 12
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                borderDash: [8, 4],
                                zeroLineBorderDash: [8, 4],
                                zeroLineColor: yAxisColor,
                                color: yAxisColor,
                                drawTicks: false
                            },
                            ticks: {
                                lineHeight: 1.5,
                                fontFamily: '\'Poppins\', sans-serif',
                                fontSize: 11.262,
                                fontColor: '#9397A0',
                                padding: 14,
                                precision: this.data.withoutDecimalPoint ? 0 : 2
                            }
                        }]
                    },
                    legend: {
                        display: false,
                    }
                }
            )
        }
    }
}
