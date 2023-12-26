var ctx = document.getElementById('filmes-mais-premiados');

var labels = labels_filmes_mais_premiados;
var data = {
labels: labels,
datasets: [{
    axis: 'y',
    label: 'Prêmios de melhor filme',
    data: data_filmes_mais_premiados,
    fill: false,
    backgroundColor: [
    'rgba(255, 99, 132, 0.2)'
    ],
    borderColor: [
    'rgb(255, 99, 132)'
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