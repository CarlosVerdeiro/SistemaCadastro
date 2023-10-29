// Selecione o formulário
let form = document.querySelector("#Formulario");

// Adicione um evento de validação quando o formulário for enviado
form.addEventListener("submit", function (event) {
    if (!vazio()) {
        event.preventDefault(); // Impede o envio do formulário se houver campos vazios
    }
});

function vazio() {
    let email = document.querySelector("#email");
    let senha = document.querySelector("#senha");
    let error = 0;

    // Verifica campo email
    if (email.value.trim() === "") {
        let spanEmail = document.querySelector(".msg-email");
        email.classList.add("is-invalid");
        spanEmail.innerHTML = "Campo Vazio";
        error += 1;
    } else {
        let spanEmail = document.querySelector(".msg-email");
        email.classList.remove("is-invalid");
        spanEmail.innerHTML = "";
    }

    // Verifica campo senha
    if (senha.value.trim() === "") {
        let spanSenha = document.querySelector(".msg-senha");
        senha.classList.add("is-invalid");
        spanSenha.innerHTML = "Campo Vazio";
        error += 1;
    } else {
        let spanSenha = document.querySelector(".msg-senha");
        senha.classList.remove("is-invalid");
        spanSenha.innerHTML = "";
    }

    return error === 0;
}
