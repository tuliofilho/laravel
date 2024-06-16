$(document).ready(function() {
    function loadPatientDetails(patientId) {
        $.ajax({
            url: '/api/patient-details/' + patientId,
            method: 'GET',
            success: function(data) {
                $('#patientNomeInput').val(data.nome);
                $('#patientEmailInput').val(data.email);
                $('#patientTelefoneInput').val(data.telefone);
                $('#patientEnderecoInput').val(data.endereco);

                $('#anotacoesList').empty();
                data.anotacoes.forEach(function(anotacao) {
                    $('#anotacoesList').append('<li class="list-group-item">' + anotacao.anotacao + '</li>');
                });

                $('#patientAppointmentsList').empty();
                data.agendamentos.forEach(function(agendamento) {
                    $('#patientAppointmentsList').append('<li class="list-group-item">' + moment(agendamento.data).format('YYYY-MM-DD HH:mm') + ' - ' + agendamento.descricao + '</li>');
                });

                $('#patientModal').modal('show');
            }
        });
    }

    $('#patientForm').on('submit', function(event) {
        event.preventDefault();
        var patientId = $('#patientForm').data('id');
        var patientData = {
            nome: $('#patientNomeInput').val(),
            email: $('#patientEmailInput').val(),
            telefone: $('#patientTelefoneInput').val(),
            endereco: $('#patientEnderecoInput').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: '/api/update-patient/' + patientId,
            method: 'POST',
            data: patientData,
            success: function(data) {
                $('#patientModal').modal('hide');
                location.reload(); // Reload the page to reflect changes
            }
        });
    });

    $('#anotacaoForm').on('submit', function(event) {
        event.preventDefault();
        var patientId = $('#patientForm').data('id');
        var anotacao = $('#anotacaoInput').val();

        $.ajax({
            url: '/api/create-note',
            method: 'POST',
            data: {
                paciente_id: patientId,
                anotacao: anotacao,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('#anotacaoInput').val('');
                $('#anotacoesList').append('<li class="list-group-item">' + anotacao + '</li>');
            }
        });
    });

    $('#newPatientForm').on('submit', function(event) {
        event.preventDefault();
        var newPatientData = {
            nome: $('#newPatientNome').val(),
            email: $('#newPatientEmail').val(),
            telefone: $('#newPatientTelefone').val(),
            endereco: $('#newPatientEndereco').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: '/api/create-patient',
            method: 'POST',
            data: newPatientData,
            success: function(data) {
                $('#newPatientModal').modal('hide');
                location.reload(); // Reload the page to reflect the new patient
            }
        });
    });

    $(document).on('click', '.viewPatientDetails', function() {
        var patientId = $(this).data('id');
        $('#patientForm').data('id', patientId);
        loadPatientDetails(patientId);
    });

    $('#addNewPatient').on('click', function() {
        $('#newPatientModal').modal('show');
    });

    $('#patientsMenu').on('click', function() {
        $('#patientsList').show();
        $('#calendarContainer').hide();
    });

    $('#calendarMenu').on('click', function() {
        $('#patientsList').hide();
        $('#calendarContainer').show();
    });

    // Default view is calendar
    $('#calendarContainer').show();
});
