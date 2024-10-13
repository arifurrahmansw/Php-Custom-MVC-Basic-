<?php
$title = "Contact Us";
ob_start();
$errors = $_SESSION['form_errors'] ?? [];
$formData = $_SESSION['form_data'] ?? [];
unset($_SESSION['form_errors'], $_SESSION['form_data']);
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h3>Contact Us</h3>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="list-unstyled mb-0">
                        <?php foreach ($errors as $err): ?>
                            <li><?php echo htmlspecialchars($err); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo htmlspecialchars($_SESSION['success_message']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
            <form action="<?= ENV['BASE_PATH'] ?>contact/submit" method="POST" class="needs-validation" novalidate>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']); ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        value="<?php echo isset($formData['name']) ? htmlspecialchars($formData['name']) : ''; ?>">
                    <?php if (isset($errors['name'])): ?>
                        <div class="invalid-feedback">
                            <?php echo htmlspecialchars($errors['name']); ?>
                        </div>
                    <?php else: ?>
                        <div class="invalid-feedback">
                            Please provide your name.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="<?php echo isset($formData['email']) ? htmlspecialchars($formData['email']) : ''; ?>">
                    <?php if (isset($errors['email'])): ?>
                        <div class="invalid-feedback">
                            <?php echo htmlspecialchars($errors['email']); ?>
                        </div>
                    <?php else: ?>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea id="message" name="message" class="form-control" required><?php echo isset($formData['message']) ? htmlspecialchars($formData['message']) : ''; ?></textarea>
                    <?php if (isset($errors['message'])): ?>
                        <div class="invalid-feedback">
                            <?php echo htmlspecialchars($errors['message']); ?>
                        </div>
                    <?php else: ?>
                        <div class="invalid-feedback">
                            Please enter your message.
                        </div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn button button-contactForm">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        } else {
                            var emailInput = form.querySelector('#email');
                            if (!validateEmail(emailInput.value)) {
                                emailInput.setCustomValidity("Invalid email format.");
                                emailInput.reportValidity();
                                event.preventDefault();
                                event.stopPropagation();
                            } else {
                                emailInput.setCustomValidity("");
                            }
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            function validateEmail(email) {
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(String(email).toLowerCase());
            }
        })();
    </script>
<?php
$content = ob_get_clean();
require "resources/views/layouts/app.php";
