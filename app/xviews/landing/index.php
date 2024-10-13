<?php
$title = "Home page";
ob_start();
?>
<h1 class="text-center my-4">Home page</h1>
<div class="container">
    <div class="row">
        <?php if (!empty($data['rows'])): ?>
            <?php foreach ($data['rows'] as $row): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="post-card-1 border-radius-10 hover-up">
                        <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image:url(<?= isset($row['image']) ? htmlspecialchars($row['image']) : ENV['BASE_PATH'] . 'images/default/default-image.png'; ?>)">
                            <a class="img-link" href="/blog/3"></a>
                            <span class="top-right-icon bg-success">
                                <i class="elegant-icon icon_camera_alt"></i>
                            </span>
                        </div>
                        <div class="post-content p-30">
                            <div class="d-flex post-card-content">
                                <h5 class="post-title mb-20 font-weight-900">
                                    <a href="#"><?php echo htmlspecialchars($row['title']); ?></a>
                                </h5>
                                <p class="card-text"><?php echo htmlspecialchars($row['body']); ?></p>
                            </div>
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