<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>

<h1>Lista de canciones</h1>

<?php if (!empty($message)): ?>
    <div class="alert-error">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert-success">
        <?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>

<form method="GET" action="">
    <input type="hidden" name="route" value="songs.index">
    <input type="text" name="q" placeholder="Buscar por nombre, álbum, banda, intérprete o autor"
        value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>" size="50">
    <button type="submit" class="btn">Buscar</button>
    <?php if ($search !== ''): ?>
        <a class="btn" href="?route=songs.index">Limpiar</a>
    <?php endif; ?>
    <a class="btn btn-primary" href="?route=songs.create">Registrar canción</a>
</form>
<br>

<?php if (empty($songs)): ?>
    <p>No hay canciones para mostrar.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ritmo</th>
                <th>Duración</th>
                <th>Álbum</th>
                <th>#</th>
                <th>Banda</th>
                <th>Intérprete</th>
                <th>Autor</th>
                <th>Lanzamiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($songs as $song): ?>
                <tr>
                    <td><?= $song->id ?></td>
                    <td><?= htmlspecialchars($song->name, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($song->rhythm, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($song->duration, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($song->album, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= $song->position ?></td>
                    <td><?= htmlspecialchars($song->band, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($song->performer, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($song->author, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($song->releaseDate, ENT_QUOTES, 'UTF-8') ?></td>
                    <td class="col-actions">
                        <a class="btn btn-warning btn-sm" href="?route=songs.edit&amp;id=<?= $song->id ?>">Editar</a>
                        <form method="POST" action="?route=songs.delete" style="display:inline;"
                            onsubmit="return confirm('¿Eliminar la canción &quot;<?= htmlspecialchars($song->name, ENT_QUOTES, 'UTF-8') ?>&quot;?');">
                            <input type="hidden" name="id" value="<?= $song->id ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<p>
    <?php $qs = $search !== '' ? '&amp;q=' . urlencode($search) : ''; ?>
    <?php if ($page > 1): ?><a href="?route=songs.index&amp;page=<?= $page - 1 . $qs ?>">← Anterior</a><?php endif; ?>
    Página <?= $page ?>
    <?php if (count($songs) === $limit): ?><a href="?route=songs.index&amp;page=<?= $page + 1 . $qs ?>">Siguiente →</a><?php endif; ?>
</p>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
