<div class="modal fade" id="patientModal" tabindex="-1" role="dialog" aria-labelledby="patientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="patientModalLabel">Detalhes do Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="patientTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Detalhes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="appointments-tab" data-toggle="tab" href="#appointments" role="tab" aria-controls="appointments" aria-selected="false">Agendamentos</a>
                    </li>
                </ul>
                <div class="tab-content" id="patientTabsContent">
                    <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                        <form id="patientForm">
                            <div class="form-group">
                                <label for="patientNome">Nome</label>
                                <input type="text" class="form-control" id="patientNomeInput" required>
                            </div>
                            <div class="form-group">
                                <label for="patientEmail">Email</label>
                                <input type="email" class="form-control" id="patientEmailInput" required>
                            </div>
                            <div class="form-group">
                                <label for="patientTelefone">Telefone</label>
                                <input type="text" class="form-control" id="patientTelefoneInput" required>
                            </div>
                            <div class="form-group">
                                <label for="patientEndereco">Endereço</label>
                                <input type="text" class="form-control" id="patientEnderecoInput" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                        <hr>
                        <h5>Anotações</h5>
                        <ul id="anotacoesList" class="list-group"></ul>
                        <form id="anotacaoForm" class="mt-3">
                            <div class="form-group">
                                <label for="anotacao">Nova Anotação</label>
                                <textarea class="form-control" id="anotacaoInput" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-secondary">Adicionar Anotação</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="appointments" role="tabpanel" aria-labelledby="appointments-tab">
                        <h5>Agendamentos</h5>
                        <ul id="patientAppointmentsList" class="list-group"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
