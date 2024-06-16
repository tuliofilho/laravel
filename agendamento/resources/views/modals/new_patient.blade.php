<div class="modal fade" id="newPatientModal" tabindex="-1" role="dialog" aria-labelledby="newPatientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPatientModalLabel">Adicionar Novo Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="newPatientForm">
                    <div class="form-group">
                        <label for="newPatientNome">Nome</label>
                        <input type="text" class="form-control" id="newPatientNome" required>
                    </div>
                    <div class="form-group">
                        <label for="newPatientEmail">Email</label>
                        <input type="email" class="form-control" id="newPatientEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="newPatientTelefone">Telefone</label>
                        <input type="text" class="form-control" id="newPatientTelefone" required>
                    </div>
                    <div class="form-group">
                        <label for="newPatientEndereco">Endereço</label>
                        <input type="text" class="form-control" id="newPatientEndereco" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>
