document.getElementById('cadastrar_ativo').addEventListener('click', function() {
    // Fecha o modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
    modal.hide();

    // Redireciona para outra página
    window.location.href = "../view/ativos.php";
});