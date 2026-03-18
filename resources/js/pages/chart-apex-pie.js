/**
 * Template Name: UBold - Admin & Dashboard Template
 * By (Author): Coderthemes
 * Module/App (File Name): Chart Apex Pie
 */
import { CustomApexChart, ins } from '../app'
//
// SIMPLE PIE CHART
//
new CustomApexChart({
    selector: '#simple-pie',
    options: () => ({
        chart: {
            height: 320,
            type: 'pie',
        },
        series: [36, 28, 18, 12, 6],
        labels: ['Brand A', 'Brand B', 'Brand C', 'Brand D', 'Brand E'],
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 5
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '14px',
                fontWeight: 500
            }
        },
        colors: [ins('primary'), ins('warning'), ins('danger'), ins('info'), ins('secondary')],
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                },
            }
        }]
    })
})


//
// SIMPLE DONUT CHART
//
new CustomApexChart({
    selector: '#simple-donut',
    options: () => ({
        chart: {
            height: 320,
            type: 'donut',
        },
        series: [48, 32, 28, 15, 7],
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 5
        },
        labels: ['Organic Search', 'Direct', 'Referral', 'Social Media', 'Email'],
        colors: [ins('secondary'), ins('purple'), ins('info'), ins('gray'), ins('light')],
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '14px',
                fontWeight: 500
            }
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                },
            }
        }]
    })
})


//
// MONOCHROME PIE CHART
//
new CustomApexChart({
    selector: '#monochrome-pie',
    options: () => ({
        chart: {
            height: 320,
            type: 'pie',
        },
        series: [120, 90, 150, 180, 160, 70],
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 5
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '14px',
                fontWeight: 500
            }
        },
        theme: {
            monochrome: {
                enabled: true
            }
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                },
            }
        }]
    })
})


//
// GRADIENT DONUT CHART
//
new CustomApexChart({
    selector: '#gradient-donut',
    options: () => ({
        chart: {
            height: 320,
            type: 'donut',
        },
        series: [38, 26, 18, 12, 6],
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 5
        },
        labels: ['Social', 'Productivity', 'Entertainment', 'Education', 'Health'],
        colors: [ins('primary'), ins('orange'), ins('danger'), ins('info'), ins('secondary')],
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '14px',
                fontWeight: 500
            }
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                },
            }
        }],
        fill: {
            type: 'gradient'
        }
    })
})


//
// PATTERNED DONUT CHART
//
new CustomApexChart({
    selector: '#patterned-donut',
    options: () => ({
        chart: {
            height: 320,
            type: 'donut',
            dropShadow: {
                enabled: true,
                color: '#111',
                top: -1,
                left: 3,
                blur: 3,
                opacity: 0.2
            }
        },
        stroke: {
            show: true,
            width: 2,
        },
        series: [38, 27, 18, 12, 5],
        labels: ['Netflix', 'YouTube', 'Amazon Prime', 'Disney+', 'HBO Max'],
        dataLabels: {
            enabled: false
        },
        fill: {
            type: 'pattern',
            opacity: 1,
            pattern: {
                enabled: true,
                style: ['circles', 'slantedLines', 'verticalLines', 'horizontalLines', 'squares'],
            },
        },
        states: {
            hover: {
                enabled: false
            }
        },
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 5
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                },
            }
        }]
    })
})


//
// PIE CHART WITH IMAGE FILL
//
new CustomApexChart({
    selector: '#image-pie',
    options: () => ({
        chart: {
            height: 320,
            type: 'pie',
        },
        labels: ['Apple', 'Tesla', 'Amazon', 'Google'],
        series: [30, 44, 60, 39],
        fill: {
            type: 'image',
            opacity: 0.85,
            image: {
                src: ['/images/stock/small-1.jpg', '/images/stock/small-2.jpg', '/images/stock/small-3.jpg', '/images/stock/small-4.jpg'],
                width: 25,
                imagedHeight: 25
            },
        },
        stroke: {
            width: 4
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'middle',
            floating: false,
            fontSize: '14px',
            offsetX: 0,
            offsetY: 7
        },
        responsive: [{
            breakpoint: 600,
            options: {
                chart: {
                    height: 240
                },
                legend: {
                    show: false
                },
            }
        }]
    })
})


//
// DONUT UPDATE
//
const getOptions = () => ({
    chart: {
        height: 320,
        type: 'donut',
    },
    dataLabels: {
        enabled: false
    },
    series: [64, 75, 33, 53],
    legend: {
        show: true,
        position: 'bottom',
        horizontalAlign: 'center',
        verticalAlign: 'middle',
        floating: false,
        fontSize: '14px',
        offsetX: 0,
        offsetY: 7
    },
    colors: [ins('purple'), ins('warning'), ins('danger'), ins('info')],
    responsive: [{
        breakpoint: 600,
        options: {
            chart: {
                height: 240
            },
            legend: {
                show: false
            },
        }
    }]
})

const updateChart = new CustomApexChart({
    selector: '#update-donut',
    options: getOptions,
})

function appendData() {
    const arr = updateChart.chart.w.globals.series.map(function () {
        return Math.floor(Math.random() * (100 - 1 + 1)) + 1;
    });
    arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1);
    return arr;
}

function removeData() {
    const arr = updateChart.chart.w.globals.series.map(function () {
        return Math.floor(Math.random() * (100 - 1 + 1)) + 1;
    });
    arr.pop();
    return arr;
}

function randomize() {
    return updateChart.chart.w.globals.series.map(function () {
        return Math.floor(Math.random() * (100 - 1 + 1)) + 1;
    });
}

function reset() {
    return getOptions().series;
}

document.querySelector("#randomize").addEventListener("click", function () {
    updateChart.chart.updateSeries(randomize());
});

document.querySelector("#add").addEventListener("click", function () {
    updateChart.chart.updateSeries(appendData());
});

document.querySelector("#remove").addEventListener("click", function () {
    updateChart.chart.updateSeries(removeData());
});

document.querySelector("#reset").addEventListener("click", function () {
    updateChart.chart.updateSeries(reset());
});