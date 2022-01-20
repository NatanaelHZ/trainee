var _dados;

let req = new XMLHttpRequest();
req.open("GET", "../ajax/graficos.php", true);
req.send();
req.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      _dados = JSON.parse(this.responseText);
    }
};

setTimeout(() => {
 
  document.getElementById("load_page").style.display = "none";
  // Graphs
  var ctx = document.getElementById('myChart');
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'Jan.',
        'Fev.',
        'Mar.',
        'Abr.',
        'Mai.',
        'Jun.',
        'Jul.',
        'Ago.',
        'Set.',
        'Out.',
        'Nov.',
        'Dez'
      ],
      datasets: [{
        data: [
          _dados.hasOwnProperty('January') ? _dados.January.saldo : '', //_dados.January.saldo
          _dados.hasOwnProperty('February') ? _dados.February.saldo : '',
          _dados.hasOwnProperty('March') ? _dados.March.saldo : '',
          _dados.hasOwnProperty('April') ? _dados.April.saldo : '',
          _dados.hasOwnProperty('May') ? _dados.May.saldo : '',
          _dados.hasOwnProperty('June') ? _dados.June.saldo : '',
          _dados.hasOwnProperty('July') ? _dados.July.saldo : '',
          _dados.hasOwnProperty('August') ? _dados.August.saldo : '',
          _dados.hasOwnProperty('September') ? _dados.September.saldo : '',
          _dados.hasOwnProperty('October') ? _dados.October.saldo : '',
          _dados.hasOwnProperty('November') ? _dados.November.saldo : '',
          _dados.hasOwnProperty('December') ? _dados.December.saldo : '',
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#481CA6',
        borderWidth: 4,
        pointBackgroundColor: '#481CA6'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  });
}, 1000);
