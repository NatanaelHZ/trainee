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
  // Graphs
  var ctx = document.getElementById('myChart')
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
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
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

/*


// ajax
let req = new XMLHttpRequest();
req.open("GET", "ajax/tamanho.php?sigla="+selectedSize, true);
req.send();
req.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        let dados = JSON.parse(this.responseText);
        numOpcoes = dados.numOpcoes;
        document.getElementById("mostraPreco").innerHTML = parseFloat(dados.preco).toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        document.getElementById("limiteSabores").innerHTML = dados.numOpcoes;
        document.getElementById("preco").value = dados.preco;
        document.getElementById("codTamanho").value = dados.codigo;
        document.getElementById("nomeTamanho").value = dados.nome;
    }
};*/