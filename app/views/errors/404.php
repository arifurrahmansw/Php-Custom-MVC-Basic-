<?php
$title = "Page Not Found";
ob_start();
?>
<div class="container text-center">
    <h1 class="display-4">Oops! Page Not Found</h1>
    <p class="lead">The page you're looking for doesn't exist or has been moved.</p>
    <a href="<?= ENV['BASE_PATH']; ?>" class="btn btn-primary">Go Back to Home</a>
</div>
<?php
$content = ob_get_clean();
require "../app/views/layouts/app.php";
?>