<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Registrar canción</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<form method="POST" action="?route=songs.store">
    <?php $values = $old ?? array(); ?>
    <?php require __DIR__ . '/_form.php'; ?>

    <button type="submit" class="btn btn-primary">Registrar canción</button>
    <a class="btn" href="?route=songs.index">Cancelar</a>
</form>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
