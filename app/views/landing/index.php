<?php
$title = "Home page";
ob_start();
?>
<h1 class="text-center my-4">Home page</h1>
<div class="container">
    <div class="row">
        <?php if (!empty($data['apiData'])): ?>
            <?php foreach ($data['apiData'] as $item): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <img src="<?= isset($item['image']) ? htmlspecialchars($item['image']) : ENV['BASE_PATH'] . 'images/default/default-image-295x248.png'; ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars($item['title']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($item['body']); ?></p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No data available.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require "../app/views/layouts/app.php";
?>