var submit = document.querySelector('#botao');

function senhasIguais() {
    var senha = document.querySelector("#senha").value;
    var caixaComSenha = document.querySelector("#comSenha");
    var spanComSenha = document.querySelector(".msg-comSenha");

    if (senha !== caixaComSenha.value) {
        caixaComSenha.classList.add("is-invalid");
        spanComSenha.innerHTML = "Senhas diferentes";
        return 1;
    } else {
        caixaComSenha.classList.remove("is-invalid");
        spanComSenha.innerHTML = "";
        return 0;
    }
}

function vazio() {
    var nome = document.querySelector("#nome");
    var email = document.querySelector("#email");
    var senha = document.querySelector("#senha");
    var comSenha = document.querySelector("#comSenha");
    var error = 0;

    // Verifica campo nome
    if (nome.value.length == 0) {
        var spanNome = document.querySelector(".msg-nome");
        nome.classList.add("is-invalid");
        spanNome.innerHTML = "Campo Vazio";
        error += 1;
    } else {
        var spanNome = document.querySelector(".msg-nome");
        nome.classList.remove("is-invalid");
        spanNome.innerHTML = "";
    }
    // Verifica campo email
    if (email.value.length == 0) {
        var spanEmail = document.querySelector(".msg-email");
        email.classList.add("is-invalid");
        spanEmail.innerHTML = "Campo Vazio";
        error += 1;
    } else {
        var spanEmail = document.querySelector(".msg-email");
        email.classList.remove("is-invalid");
        spanEmail.innerHTML = "";
    }
    // Verifica campo senha
    if (senha.value.length == 0) {
        var spanSenha = document.querySelector(".msg-senha");
        senha.classList.add("is-invalid");
        spanSenha.innerHTML = "Campo Vazio";
        error += 1;
    } else {
        var spanSenha = document.querySelector(".msg-senha");
        senha.classList.remove("is-invalid");
        spanSenha.innerHTML = "";
    }
    // Verifica campo comSenha
    if (comSenha.value.length == 0) {
        var spanComSenha = document.querySelector(".msg-comSenha");
        comSenha.classList.add("is-invalid");
        spanComSenha.innerHTML = "Campo Vazio";
        error += 1;
    } else {
        var spanComSenha = document.querySelector(".msg-comSenha");
        comSenha.classList.remove("is-invalid");
        spanComSenha.innerHTML = "";
    }

    if (error > 0) {
        return 1;
    }
}

submit.addEventListener("click", function (event) {
    if (senhasIguais() === 1 || vazio() === 1) {
        event.preventDefault();
    } else {
        var caixaEmail = document.querySelector("#email");
        var spanEmail = document.querySelector(".msg-email");
        caixaEmail.classList.add("is-invalid");
        spanEmail.innerHTML = "E-mail já existente";
    }
});
