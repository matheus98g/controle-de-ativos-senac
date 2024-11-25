<div class="container mt-4">

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar ativo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label">Descrição:</label>
                            <input type="text" class="form-control" id="descricao">
                        </div>
                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label">Tipo:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="">Selecione...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label">Marca:</label>
                            <select class="form-select" aria-label="Default select example">
                                <option value="">Selecione...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label">Quantidade:</label>
                            <input type="number" class="form-control" id="quantidade">
                        </div>
                        <div class="mb-1">
                            <label for="recipient-name" class="col-form-label">Observação:</label>
                            <input type="text" class="form-control" id="obs">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                            <button type="button" class="btn btn-primary" id="cadastrar_ativo">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>