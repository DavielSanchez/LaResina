<section id="contact" class="contact section">

    <div class="container section-title" data-aos="fade-up">
        <h2>Contacto</h2>
        <p><span>¿Necesitas Ayuda?</span> <span class="description-title">Contáctanos</span></p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5">
            <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.464319146924!2d-69.929123924269!3d18.483071971967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eaf89d8f3a7bb9d%3A0x6e63eb6f3dd5ef2f!2sSanto%20Domingo%2C%20Rep%C3%BAblica%20Dominicana!5e0!3m2!1ses!2sus!4v1700000000000!5m2!1ses!2sus"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="row gy-4">

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="icon bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Dirección</h3>
                        <p>Av. Principal #123, Santo Domingo, República Dominicana</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Teléfono</h3>
                        <p>+1 809 832 2567</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email</h3>
                        <p>info@laresina.com</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                    <i class="icon bi bi-clock flex-shrink-0"></i>
                    <div>
                        <h3>Horario de Atención</h3>
                        <p><strong>Lun-Sáb:</strong> 11:00 AM - 11:00 PM<br><strong>Domingos:</strong> 12:00 PM - 02:00 AM</p>
                    </div>
                </div>
            </div>

        </div>

        <form id="contactForm" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
            <div class="row gy-4">

                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Tu Nombre" required>
                </div>

                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="Tu Email" required>
                </div>

                <div class="col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Asunto" required>
                </div>

                <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Mensaje" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                    <div class="loading" style="display: none;">Cargando...</div>
                    <div class="error-message" style="display: none;"></div>
                    <div class="sent-message" style="display: none;">Tu mensaje ha sido enviado. ¡Gracias!</div>

                    <button type="submit">Enviar Mensaje</button>
                </div>

            </div>
        </form>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const formData = new FormData(form);
            const loading = form.querySelector('.loading');
            const errorMessage = form.querySelector('.error-message');
            const sentMessage = form.querySelector('.sent-message');
            
            // Mostrar loading, ocultar otros mensajes
            loading.style.display = 'block';
            errorMessage.style.display = 'none';
            sentMessage.style.display = 'none';
            errorMessage.textContent = '';
            
            // Enviar datos
            fetch('forms/contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error HTTP: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                loading.style.display = 'none';
                
                if (data.success) {
                    // ÉXITO
                    sentMessage.style.display = 'block';
                    form.reset();
                } else {
                    // ERROR
                    errorMessage.textContent = data.message;
                    errorMessage.style.display = 'block';
                }
            })
            .catch(error => {
                loading.style.display = 'none';
                errorMessage.textContent = 'Error de conexión. Intenta nuevamente.';
                errorMessage.style.display = 'block';
                console.error('Error:', error);
            });
        });
    }
});
</script>