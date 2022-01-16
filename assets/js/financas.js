let form = document.getElementById("form_crud");
let descricao = document.getElementById("descricao");

form.addEventListener('submit', submitForm);
descricao.addEventListener('blur', validateDescricao);

function validateDescricao() {
  let div = document.getElementById("valida_descricao");
  descricao.value = descricao.value.trim();

  if (descricao.value == "" || descricao.value.length < 4) {
    div.innerHTML = "A descrição dever ter mais de 4 caracteres";

    return false;
  } else {
    div.innerHTML = "";

    return true;
  }
}

function submitForm(event) {
  console.log('Submit form');
  if (!(validateDescricao())) {
    event.preventDefault();

    alert("Verifique os dados e tente novamente!");
  }
  else {
    console.log("Sucesso ao submeter dados!");
  }
}
