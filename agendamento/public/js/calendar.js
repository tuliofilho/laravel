$(document).ready(function() {
    // Configurar o datepicker
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true
    }).on('changeDate', function(e) {
        var selectedDate = $('#datepicker').datepicker('getFormattedDate');
        loadAppointments(selectedDate);
    });

    function loadAppointments(date) {
        $.ajax({
            url: '/api/appointments-by-date',
            method: 'GET',
            data: { date: date },
            success: function(data) {
                var appointmentsTable = $('#appointmentsTable tbody');
                appointmentsTable.empty();

                if (data.length === 0) {
                    appointmentsTable.append('<tr><td colspan="3">Nenhum agendamento encontrado.</td></tr>');
                } else {
                    data.forEach(function(appointment) {
                        appointmentsTable.append(
                            '<tr>' +
                            '<td>' + appointment.descricao + '</td>' +
                            '<td>' + appointment.data + '</td>' +
                            '<td><button class="btn btn-primary btn-sm editAppointment" data-id="' + appointment.id + '">Editar</button></td>' +
                            '</tr>'
                        );
                    });

                    $('.editAppointment').on('click', function() {
                        var appointmentId = $(this).data('id');
                        editAppointment(appointmentId);
                    });
                }
            },
            error: function() {
                alert('Houve um erro ao buscar os agendamentos!');
            }
        });
    }

    $('#createAppointment').on('click', function() {
        $('#appointmentForm')[0].reset();
        $('#appointmentForm').off('submit').on('submit', function(event) {
            event.preventDefault();
            createAppointment();
        });
        $('#appointmentModal').modal('show');
    });

    function createAppointment() {
        var appointmentData = {
            data: $('#appointmentDate').val(),
            descricao: $('#appointmentDescription').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: '/api/create-appointment',
            method: 'POST',
            data: appointmentData,
            success: function(data) {
                $('#appointmentModal').modal('hide');
                loadAppointments($('#datepicker').datepicker('getFormattedDate'));
            }
        });
    }

    function editAppointment(appointmentId) {
        $.ajax({
            url: '/api/appointment-details/' + appointmentId,
            method: 'GET',
            success: function(data) {
                $('#appointmentDate').val(data.data);
                $('#appointmentDescription').val(data.descricao);

                $('#appointmentForm').off('submit').on('submit', function(event) {
                    event.preventDefault();
                    updateAppointment(appointmentId);
                });

                $('#appointmentModal').modal('show');
            }
        });
    }

    function updateAppointment(appointmentId) {
        var appointmentData = {
            data: $('#appointmentDate').val(),
            descricao: $('#appointmentDescription').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: '/api/update-appointment/' + appointmentId,
            method: 'POST',
            data: appointmentData,
            success: function(data) {
                $('#appointmentModal').modal('hide');
                loadAppointments($('#datepicker').datepicker('getFormattedDate'));
            }
        });
    }
});
