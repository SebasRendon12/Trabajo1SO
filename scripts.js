function mostrar(i) {
  document.getElementById('Acciones' + i).style.display = 'block';
}

function ocultar(i) {
  document.getElementById('Acciones' + i).style.display = 'none';
}

function crear() {
  document.getElementById('btnCrear').style.display = 'none';
  document.getElementById('formCrear').style.display = 'block';
}