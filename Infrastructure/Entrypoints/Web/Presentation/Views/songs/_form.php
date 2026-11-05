<?php
$v = static fn(string $k): string => htmlspecialchars((string) ($values[$k] ?? ''), ENT_QUOTES, 'UTF-8');
?>
    <div class="form-group">
        <label for="name">Nombre</label><br>
        <input type="text" id="name" name="name" maxlength="150" required value="<?= $v('name') ?>">
    </div>

    <div class="form-group">
        <label for="rhythm">Ritmo</label><br>
        <select id="rhythm" name="rhythm" required>
            <option value="">Seleccione...</option>
            <?php foreach ($rhythmOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>" <?= (($values['rhythm'] ?? '') === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="duration">Duración (mm:ss)</label><br>
        <input type="text" id="duration" name="duration" placeholder="03:45" pattern="\d{1,3}:[0-5]\d" required value="<?= $v('duration') ?>">
    </div>

    <div class="form-group">
        <label for="album">Álbum</label><br>
        <input type="text" id="album" name="album" maxlength="100" required value="<?= $v('album') ?>">
    </div>

    <div class="form-group">
        <label for="position">Posición en el álbum</label><br>
        <input type="number" id="position" name="position" min="1" max="999" required value="<?= $v('position') ?>">
    </div>

    <div class="form-group">
        <label for="band">Banda</label><br>
        <input type="text" id="band" name="band" maxlength="100" required value="<?= $v('band') ?>">
    </div>

    <div class="form-group">
        <label for="performer">Intérprete</label><br>
        <input type="text" id="performer" name="performer" maxlength="100" required value="<?= $v('performer') ?>">
    </div>

    <div class="form-group">
        <label for="author">Autor</label><br>
        <input type="text" id="author" name="author" maxlength="100" required value="<?= $v('author') ?>">
    </div>

    <div class="form-group">
        <label for="release_date">Fecha de lanzamiento</label><br>
        <input type="date" id="release_date" name="release_date" max="<?= date('Y-m-d') ?>" required value="<?= $v('release_date') ?>">
    </div>
