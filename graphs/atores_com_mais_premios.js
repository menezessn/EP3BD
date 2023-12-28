var ctx = document.getElementById('atores-mais-premiados');

var labels = labels_bd;
var data = {
labels: labels,
datasets: [{
    axis: 'y',
    label: 'Número de premios',
    data: data_bd,
    fill: false,
    backgroundColor: [
    'rgba(173, 216, 230, 0.2)'
    ],
    borderColor: [
    'rgb(0, 0, 139)'
    ],
    borderWidth: 1
}]
};
var config = {
    type: 'bar',
    data,
    options: {
        indexAxis: 'y',
        scales: {
            x: {
            ticks: {
                beginAtZero: true,
                callback: function (value) {
                    // Exibe apenas valores inteiros
                return Math.floor(value) === value ? value : '';
                },
            },
            },
        },
    }
};

new Chart(ctx, config);