var submit = document.querySelector('#botao');

function senhasIguais() {
    let senha = document.querySelector("#senha").value;
    let caixaComSenha = document.querySelector("#comSenha");
    let spanComSenha = document.querySelector(".msg-comSenha");

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

function vazio(){
    let nome = document.querySelector("#nome");
    let email = document.querySelector("#email");
    let senha = document.querySelector("#senha");
    let comSenha = document.querySelector("#comSenha");
    let error = 0
    //Verifica campo nome
    if (nome.value.length == 0) {
        let spanNome = document.querySelector(".msg-nome");
        nome.classList.add("is-invalid");
        spanNome.innerHTML = "Campo Vazio";
        error+=1;
    }else{
        let spanNome = document.querySelector(".msg-nome");
        nome.classList.remove("is-invalid");
        spanNome.innerHTML = "";
    }
    //Verifica campo email
    if(email.value.length == 0){
        let spanEmail = document.querySelector(".msg-email");
        email.classList.add("is-invalid");
        spanEmail.innerHTML = "Campo Vazio";
        error+=1;
    }else{
        let spanEmail = document.querySelector(".msg-email");
        email.classList.removed("is-invalid");
        spanEmail.innerHTML = "";
    }
    //Verifica campo senha
    if(senha.value.length == 0){
        let spanSenha = document.querySelector(".msg-senha");
        senha.classList.add("is-invalid");
        spanSenha.innerHTML = "Campo Vazio";
        error+=1;
    }else{
        let spanSenha = document.querySelector(".msg-senha");
        senha.classList.remove("is-invalid");
        spanSenha.innerHTML = "";
    }
    //Verifica campo comSenha
    if(comSenha.value.length == 0){
        let spanComSenha = document.querySelector(".msg-comSenha");
        comSenha.classList.add("is-invalid");
        spanComSenha.innerHTML = "Campo Vazio";
        error+=1;
    }else{
        let spanComSenha = document.querySelector(".msg-comSenha");
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
    }else{
        caixaEmail = document.querySelector("#email");
        spanEmail = document.querySelector(".msg-email");
        caixaEmail.classList.add("is-invalid");
        spanEmail.innerHTML = "E-mail já existente";
    }
});
