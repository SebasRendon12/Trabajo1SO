function mostrar(i) {
  if (document.getElementById('Acciones' + i) !== null) {
    document.getElementById('Acciones' + i).style.display = 'block';
  }
}

function ocultar(i) {
  if (document.getElementById('Acciones' + i) !== null) {
    document.getElementById('Acciones' + i).style.display = 'none';
  }
}

function crear() {
  document.getElementById('btnCrear').style.display = 'none';
  document.getElementById('formCrear').style.display = 'block';
}
