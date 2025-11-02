<section id="book-a-table" class="book-a-table section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Reserva tu Mesa</h2>
        <p><span>Reserva tu</span> <span class="description-title">Experiencia con Nosotros</span></p>
    </div>

    <div class="container">
        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

            <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"></div>

            <div class="col-lg-8 d-flex align-items-center reservation-form-bg" data-aos="fade-up" data-aos-delay="200">
                <form id="reservationForm" method="post" role="form" class="php-email-form">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Tu Nombre" required>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Tu Email" required>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Tu Teléfono" required>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="date" name="date" class="form-control" id="date" placeholder="Fecha" min="<?php 
                                $minDate = new DateTime('+1 day');
                                echo $minDate->format('Y-m-d'); 
                            ?>">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="time" class="form-control" name="time" id="time" placeholder="Hora" min="11:00" max="22:00">
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="number" class="form-control" name="people" id="people" placeholder="# de personas" min="1" max="20" required>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" id="message" rows="5" placeholder="Mensaje (alergias, celebración especial, etc.)"></textarea>
                    </div>

                    <div class="text-center mt-3">
                        <div class="loading">Enviando...</div>
                        <div class="error-message"></div>
                        <div class="sent-message">¡Tu solicitud de reserva fue enviada! Te llamaremos o enviaremos un email para confirmar. ¡Gracias!</div>
                        <button type="submit" onclick="validateAndShowModal(event)">Reservar Mesa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">✅ Confirmación de Reserva</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Resumen de tu reservación:</h6>
                <div class="reservation-details">
                    <p><strong>Nombre:</strong> <span id="modalName"></span></p>
                    <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                    <p><strong>Teléfono:</strong> <span id="modalPhone"></span></p>
                    <p><strong>Fecha:</strong> <span id="modalDate"></span></p>
                    <p><strong>Hora:</strong> <span id="modalTime"></span></p>
                    <p><strong>Personas:</strong> <span id="modalPeople"></span></p>
                    <p><strong>Mensaje:</strong> <span id="modalMessage"></span></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Corregir Datos</button>
                <button type="button" class="btn btn-success" onclick="confirmReservation()">Confirmar Reserva</button>
            </div>
        </div>
    </div>
</div>

<script>
function validateAndShowModal(event) {
    if(event) {
        event.preventDefault();
        event.stopPropagation();
    }

    document.querySelector('.loading').style.display = 'none';
    document.querySelector('.error-message').style.display = 'none';
    document.querySelector('.sent-message').style.display = 'none';

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const date = document.getElementById('date').value;
    const time = document.getElementById('time').value;
    const people = document.getElementById('people').value;
    const message = document.getElementById('message').value;

    if(!name || !email || !phone || !people) {
        document.querySelector('.error-message').textContent = 'Por favor completa todos los campos requeridos';
        document.querySelector('.error-message').style.display = 'block';
        return false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)) {
        document.querySelector('.error-message').textContent = 'Por favor ingresa un email válido';
        document.querySelector('.error-message').style.display = 'block';
        return false;
    }

    if(date) {
        const selectedDate = new Date(date);
        const minDate = new Date();
        minDate.setDate(minDate.getDate() + 1);
        minDate.setHours(0, 0, 0, 0);
        
        if(selectedDate < minDate) {
            document.querySelector('.error-message').textContent = 'La reserva debe ser con al menos 1 día de anticipación';
            document.querySelector('.error-message').style.display = 'block';
            return false;
        }
    } else {
        document.querySelector('.error-message').textContent = 'Por favor selecciona una fecha';
        document.querySelector('.error-message').style.display = 'block';
        return false;
    }

    if(!time) {
        document.querySelector('.error-message').textContent = 'Por favor selecciona una hora';
        document.querySelector('.error-message').style.display = 'block';
        return false;
    }

    document.getElementById('modalName').textContent = name;
    document.getElementById('modalEmail').textContent = email;
    document.getElementById('modalPhone').textContent = phone;
    document.getElementById('modalDate').textContent = date;
    document.getElementById('modalTime').textContent = time;
    document.getElementById('modalPeople').textContent = people;
    document.getElementById('modalMessage').textContent = message ? message : 'Ninguno';

    const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
    modal.show();
    
    return false;
}

function confirmReservation() {
    document.querySelector('.loading').style.display = 'block';
    document.querySelector('.error-message').style.display = 'none';
    document.querySelector('.sent-message').style.display = 'none';

    setTimeout(function() {
        document.querySelector('.loading').style.display = 'none';
        document.querySelector('.sent-message').style.display = 'block';
        const modal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
        modal.hide();
        document.getElementById('reservationForm').reset();
    }, 2000);
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('reservationForm');
    if(form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            return false;
        });
    }
    
    const dateInput = document.getElementById('date');
    if(dateInput) {
        const minDate = new Date();
        minDate.setDate(minDate.getDate() + 1);
        const minDateString = minDate.toISOString().split('T')[0];
        dateInput.setAttribute('min', minDateString);
    }
});
</script>

<style>
.reservation-details {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    margin-top: 10px;
}

.reservation-details p {
    margin-bottom: 8px;
    border-bottom: 1px solid #dee2e6;
    padding-bottom: 8px;
}

.reservation-details p:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.loading, .error-message, .sent-message {
    display: none;
}
</style>