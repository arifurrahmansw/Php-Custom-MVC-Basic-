
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? htmlspecialchars($title) : 'Default Title'; ?></title>
    <meta name="description" content="<?php echo isset($metaDescription) ? htmlspecialchars($metaDescription) : 'This is a default description of the page for SEO purposes.'; ?>">
    <meta name="keywords" content="MVC, PHP, Website, Development, Custom, Application">
    <meta name="author" content="Your Name">
    <meta property="og:title" content="<?php echo isset($title) ? htmlspecialchars($title) : 'Default Title'; ?>" />
    <meta property="og:description" content="<?php echo isset($metaDescription) ? htmlspecialchars($metaDescription) : 'This is a default description for social sharing.'; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?= ENV['BASE_PATH'] ?>" />
    <meta property="og:image" content="<?= ENV['BASE_PATH'] ?>public/images/social-share-image.jpg" />
    <link rel="icon" href="<?= ENV['BASE_PATH'] ?>public/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ENV['BASE_PATH'] ?>public/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?= ENV['BASE_PATH'] ?>">MVC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= ENV['BASE_PATH'] ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= ENV['BASE_PATH'] ?>contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container mt-4">
        <?php echo $content; ?>
    </main>
    <footer class="text-center mt-4">
        <p>&copy; <?php echo date('Y'); ?> All Rights Reserved</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>