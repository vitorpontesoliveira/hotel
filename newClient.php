<div class="container mt-5">
        <div class="border p-4 mx-auto" style="max-width: 400px;">
            <h2 class="text-center">Cadastro de Cliente</h2>
            <form action="?page=save" method="post">
                <input type="hidden" name="acao" value="cadastrarClient">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu Nome" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="Digite seu Telefone" pattern="\d{10,}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu E-mail" required>
                </div>
                <div class="text-center">
                    <input type="submit" value="Cadastrar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>