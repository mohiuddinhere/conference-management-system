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
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
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