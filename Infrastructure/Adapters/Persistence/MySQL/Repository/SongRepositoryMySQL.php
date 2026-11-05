<?php
declare(strict_types=1);

final class SongRepositoryMySQL implements
    SaveSongPort,
    UpdateSongPort,
    DeleteSongPort,
    GetSongByIdPort,
    GetAllSongsPort,
    FindDuplicateSongPort
{
    public function __construct(private PDO $pdo, private SongPersistenceMapper $mapper)
    {
    }

    public function save(SongModel $song): SongModel
    {
        $e = $this->mapper->toEntity($song);
        $stmt = $this->pdo->prepare(
            'INSERT INTO songs (name, rhythm, duration_seconds, album, position_in_album, band, performer, author, release_date)
             VALUES (:name, :rhythm, :duration, :album, :position, :band, :performer, :author, :release_date)'
        );
        $stmt->execute($this->params($e));

        return $song->withId(new SongId((int) $this->pdo->lastInsertId()));
    }

    public function update(SongModel $song): SongModel
    {
        $e = $this->mapper->toEntity($song);
        $stmt = $this->pdo->prepare(
            'UPDATE songs SET name = :name, rhythm = :rhythm, duration_seconds = :duration, album = :album,
                    position_in_album = :position, band = :band, performer = :performer, author = :author,
                    release_date = :release_date
             WHERE id = :id'
        );
        $stmt->execute($this->params($e) + ['id' => $e->id]);

        return $song;
    }

    public function delete(SongId $id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM songs WHERE id = :id');
        $stmt->execute(['id' => $id->value()]);
    }

    public function getById(SongId $id): ?SongModel
    {
        $stmt = $this->pdo->prepare('SELECT * FROM songs WHERE id = :id');
        $stmt->execute(['id' => $id->value()]);
        $row = $stmt->fetch();

        return $row ? $this->mapper->toModel(SongEntity::fromRow($row)) : null;
    }

    public function getAll(?string $search, int $page, int $limit): array
    {
        $sql = 'SELECT * FROM songs';
        if ($search !== null) {
            $sql .= ' WHERE name LIKE :s1 OR album LIKE :s2 OR band LIKE :s3 OR performer LIKE :s4 OR author LIKE :s5';
        }
        $sql .= ' ORDER BY id DESC LIMIT :limit OFFSET :offset';

        $stmt = $this->pdo->prepare($sql);
        if ($search !== null) {
            foreach (['s1', 's2', 's3', 's4', 's5'] as $p) {
                $stmt->bindValue(':' . $p, '%' . $search . '%');
            }
        }
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', ($page - 1) * $limit, PDO::PARAM_INT);
        $stmt->execute();

        $songs = [];
        foreach ($stmt->fetchAll() as $row) {
            $songs[] = $this->mapper->toModel(SongEntity::fromRow($row));
        }
        return $songs;
    }

    public function findDuplicate(SongModel $song): ?SongModel
    {
        $sql = 'SELECT * FROM songs WHERE name = :name AND album = :album AND band = :band';
        $params = [
            'name' => $song->name()->value(),
            'album' => $song->album()->value(),
            'band' => $song->band()->value(),
        ];
        if ($song->id() !== null) {
            $sql .= ' AND id <> :id';
            $params['id'] = $song->id()->value();
        }
        $stmt = $this->pdo->prepare($sql . ' LIMIT 1');
        $stmt->execute($params);
        $row = $stmt->fetch();

        return $row ? $this->mapper->toModel(SongEntity::fromRow($row)) : null;
    }

    private function params(SongEntity $e): array
    {
        return [
            'name' => $e->name,
            'rhythm' => $e->rhythm,
            'duration' => $e->durationSeconds,
            'album' => $e->album,
            'position' => $e->positionInAlbum,
            'band' => $e->band,
            'performer' => $e->performer,
            'author' => $e->author,
            'release_date' => $e->releaseDate,
        ];
    }
}
