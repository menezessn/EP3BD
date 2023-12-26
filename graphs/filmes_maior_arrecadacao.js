var ctx = document.getElementById('filmes-maior-arrecadacao');

var labels = labels_filmes_maior_arrecadacao;
var data = {
labels: labels,
datasets: [{
    axis: 'y',
    label: 'Maior arrecadação',
    data: data_filmes_maior_arrecadacao,
    fill: false,
    backgroundColor: [
    'rgba(144, 238, 144, 0.2)'
    ],
    borderColor: [
    'rgb(0, 100, 0)'
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