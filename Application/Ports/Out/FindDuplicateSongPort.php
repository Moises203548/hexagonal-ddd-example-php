<?php
declare(strict_types=1);

interface FindDuplicateSongPort
{
    /** Busca otra canción con el mismo nombre, álbum y banda (ignora la propia si ya tiene id). */
    public function findDuplicate(SongModel $song): ?SongModel;
}
