//chart1
const labels = [
    '01',
    '02',
    '03',
    '04',
    '05',
    '06',
    '07',
    '08',
    '09',
    '10',
    '11',
    '12',
    '13',
    '14',
    '15',
    '16',
    '17',
    '18',
    '19',
    '20',
    '21',
    '22',
    '23',
    '24',
    '25',
    '26',
    '27',
    '28',
    '29',
    '30',
    '31',
];



const data = {
    labels: labels,
    datasets: [{
        label: 'User Register',
        backgroundColor: 'rgb(70, 124, 250)',
        borderColor: 'rgb(70, 124, 250)',
        data: chart, //[0, 10, 5, 2, 20, 30, 45]
    }]
};

const config = {
    type: 'line',
    data: data,
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

//Chart2
const labels2 = [
    '01',
    '02',
    '03',
    '04',
    '05',
    '06',
    '07',
    '08',
    '09',
    '10',
    '11',
    '12',
    '13',
    '14',
    '15',
    '16',
    '17',
    '18',
    '19',
    '20',
    '21',
    '22',
    '23',
    '24',
    '25',
    '26',
    '27',
    '28',
    '29',
    '30',
    '31',
];



const data2 = {
    labels: labels,
    datasets: [{
        label: 'User Traffic',
        backgroundColor: 'rgb(26, 82, 58)',
        borderColor: 'rgb(26, 82, 58)',
        data: chart2, //[0, 10, 5, 2, 20, 30, 45]
    }]
};

const config2 = {
    type: 'line',
    data: data2,
};

const myChart2 = new Chart(
    document.getElementById('myChart2'),
    config2
);

//Chart3

const data3 = {
    labels: [
        'Admin',
        'Conference Admin',
        'Author',
        'Reviewer'
    ],
    datasets: [{
        label: 'User',
        data: chart3,
        backgroundColor: [
            'rgb(57, 0, 77)',
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
};

const config3 = {
    type: 'pie',
    data: data3,
};

const myChart3 = new Chart(
    document.getElementById('myChart3'),
    config3
);

