<?php
declare(strict_types=1);

final class SongController
{
    public function __construct(
        private CreateSongUseCase $createSong,
        private UpdateSongUseCase $updateSong,
        private DeleteSongUseCase $deleteSong,
        private GetSongByIdUseCase $getSongById,
        private GetAllSongsUseCase $getAllSongs,
        private SongWebMapper $mapper
    ) {
    }

    /** @return SongResponse[] */
    public function list(?string $search, int $page, int $limit): array
    {
        return $this->mapper->toResponses(
            $this->getAllSongs->execute(new GetAllSongsQuery($search, $page, $limit))
        );
    }

    public function find(int $id): SongResponse
    {
        return $this->mapper->toResponse($this->getSongById->execute(new GetSongByIdQuery($id)));
    }

    public function create(array $post): SongResponse
    {
        $command = $this->mapper->toCreateCommand(CreateSongRequest::fromArray($post));
        return $this->mapper->toResponse($this->createSong->execute($command));
    }

    public function update(int $id, array $post): SongResponse
    {
        $command = $this->mapper->toUpdateCommand(UpdateSongRequest::fromArray($id, $post));
        return $this->mapper->toResponse($this->updateSong->execute($command));
    }

    public function delete(int $id): void
    {
        $this->deleteSong->execute(new DeleteSongCommand($id));
    }
}
