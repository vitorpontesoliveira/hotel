
function validarNome() {
    const nomeInput = document.getElementById('nome');
    const nomeErro = document.getElementById('nomeErro');
    const nome = nomeInput.value.trim();

    // Verificar se o nome contém apenas letras e espaços
    if (/^[a-zA-Z\s]+$/.test(nome)) {
        nomeErro.textContent = '';
    } else {
        nomeErro.textContent = 'Nome deve conter apenas letras e espaços.';
    }
}