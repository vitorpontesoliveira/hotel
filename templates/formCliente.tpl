{extends file="template.tpl"}
{block name=main}
    <div class="border p-4 mx-auto bg-white" style="max-width: 400px;">
        <h2 class="text-center">Cadastros de Cliente</h2>
        <form action="formCliente/save" method="post">
            <input type="hidden" value="{$model1->cliente_id}" name="cliente_id">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" value="{$model1->nome}" class="form-control" name="nome" id="nome"
                    placeholder="Nome completo" required>
                <span id="nomeErro" style="color: red;"></span>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="tel" value="{$model1->telefone}"class="form-control" name="telefone" id="telefone"
                    placeholder="(DDD)_____-____">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" value="{$model1->email}" class="form-control" name="email" id="email"
                    placeholder="example@hotmail.com" required>
            </div>
            <div class="text-center">
                <input type="submit" value="Cadastrar" class="btn btn-primary">
                <button type="button" class="btn btn-secondary" onclick="#">Cancelar</button>
            </div>
        </form>
    </div>
{/block}