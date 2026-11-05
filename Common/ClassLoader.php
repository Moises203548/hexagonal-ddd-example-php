<?php

declare(strict_types=1);

final class ClassLoader
{
    /**
     * @var array<string, string>
     */
    private static array $classMap = array(
        'InvalidUserEmailException' => 'Domain/Exceptions/InvalidUserEmailException.php',
        'InvalidUserIdException' => 'Domain/Exceptions/InvalidUserIdException.php',
        'InvalidUserNameException' => 'Domain/Exceptions/InvalidUserNameException.php',
        'InvalidUserPasswordException' => 'Domain/Exceptions/InvalidUserPasswordException.php',
        'InvalidUserRoleException' => 'Domain/Exceptions/InvalidUserRoleException.php',
        'InvalidUserStatusException' => 'Domain/Exceptions/InvalidUserStatusException.php',
        'UserAlreadyExistsException' => 'Domain/Exceptions/UserAlreadyExistsException.php',
        'UserNotFoundException' => 'Domain/Exceptions/UserNotFoundException.php',
        'InvalidCredentialsException' => 'Domain/Exceptions/InvalidCredentialsException.php',

        'UserRoleEnum' => 'Domain/Enums/UserRoleEnum.php',
        'UserStatusEnum' => 'Domain/Enums/UserStatusEnum.php',

        'UserId' => 'Domain/ValueObjects/UserId.php',
        'UserName' => 'Domain/ValueObjects/UserName.php',
        'UserEmail' => 'Domain/ValueObjects/UserEmail.php',
        'UserPassword' => 'Domain/ValueObjects/UserPassword.php',

        'UserModel' => 'Domain/Models/UserModel.php',
        'EmailDestinationModel' => 'Domain/Models/EmailDestinationModel.php',
        'EmailSenderException' => 'Domain/Exceptions/EmailSenderException.php',
        'EmailSenderPort' => 'Application/Ports/Out/EmailSenderPort.php',
        'EmailNotificationService' => 'Application/Services/EmailNotificationService.php',
        'EmailSenderService' => 'Infrastructure/Adapters/Email/EmailSenderService.php',

        'CreateUserUseCase' => 'Application/Ports/In/CreateUserUseCase.php',
        'UpdateUserUseCase' => 'Application/Ports/In/UpdateUserUseCase.php',
        'GetUserByIdUseCase' => 'Application/Ports/In/GetUserByIdUseCase.php',
        'GetAllUsersUseCase' => 'Application/Ports/In/GetAllUsersUseCase.php',
        'DeleteUserUseCase' => 'Application/Ports/In/DeleteUserUseCase.php',
        'LoginUseCase' => 'Application/Ports/In/LoginUseCase.php',

        'SaveUserPort' => 'Application/Ports/Out/SaveUserPort.php',
        'UpdateUserPort' => 'Application/Ports/Out/UpdateUserPort.php',
        'GetUserByIdPort' => 'Application/Ports/Out/GetUserByIdPort.php',
        'GetUserByEmailPort' => 'Application/Ports/Out/GetUserByEmailPort.php',
        'GetAllUsersPort' => 'Application/Ports/Out/GetAllUsersPort.php',
        'DeleteUserPort' => 'Application/Ports/Out/DeleteUserPort.php',

        'CreateUserCommand' => 'Application/Services/Dto/Commands/CreateUserCommand.php',
        'UpdateUserCommand' => 'Application/Services/Dto/Commands/UpdateUserCommand.php',
        'DeleteUserCommand' => 'Application/Services/Dto/Commands/DeleteUserCommand.php',
        'LoginCommand' => 'Application/Services/Dto/Commands/LoginCommand.php',
        'GetUserByIdQuery' => 'Application/Services/Dto/Queries/GetUserByIdQuery.php',
        'GetAllUsersQuery' => 'Application/Services/Dto/Queries/GetAllUsersQuery.php',

        'CreateUserService' => 'Application/Services/CreateUserService.php',
        'UpdateUserService' => 'Application/Services/UpdateUserService.php',
        'GetUserByIdService' => 'Application/Services/GetUserByIdService.php',
        'GetAllUsersService' => 'Application/Services/GetAllUsersService.php',
        'DeleteUserService' => 'Application/Services/DeleteUserService.php',
        'LoginService' => 'Application/Services/LoginService.php',
        'UserApplicationMapper' => 'Application/Services/Mappers/UserApplicationMapper.php',

        'Connection' => 'Infrastructure/Adapters/Persistence/MySQL/Config/Connection.php',
        'UserPersistenceDto' => 'Infrastructure/Adapters/Persistence/MySQL/Dto/UserPersistenceDto.php',
        'UserEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/UserEntity.php',
        'UserPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/UserPersistenceMapper.php',
        'UserRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/UserRepositoryMySQL.php',

        'CreateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateUserRequest.php',
        'UpdateUserWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateUserRequest.php',
        'LoginWebRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/LoginWebRequest.php',
        'UserResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UserResponse.php',
        'UserWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/UserWebMapper.php',
        'UserController' => 'Infrastructure/Entrypoints/Web/Controllers/UserController.php',
        'WebRoutes' => 'Infrastructure/Entrypoints/Web/Controllers/Config/WebRoutes.php',

        'View' => 'Infrastructure/Entrypoints/Web/Presentation/View.php',
        'Flash' => 'Infrastructure/Entrypoints/Web/Presentation/Flash.php',

        'DependencyInjection' => 'Common/DependencyInjection.php',

        // --- Canciones (ejercicio 20) ---
        'CreateSongUseCase' => 'Application/Ports/In/CreateSongUseCase.php',
        'DeleteSongUseCase' => 'Application/Ports/In/DeleteSongUseCase.php',
        'GetAllSongsUseCase' => 'Application/Ports/In/GetAllSongsUseCase.php',
        'GetSongByIdUseCase' => 'Application/Ports/In/GetSongByIdUseCase.php',
        'UpdateSongUseCase' => 'Application/Ports/In/UpdateSongUseCase.php',
        'DeleteSongPort' => 'Application/Ports/Out/DeleteSongPort.php',
        'FindDuplicateSongPort' => 'Application/Ports/Out/FindDuplicateSongPort.php',
        'GetAllSongsPort' => 'Application/Ports/Out/GetAllSongsPort.php',
        'GetSongByIdPort' => 'Application/Ports/Out/GetSongByIdPort.php',
        'SaveSongPort' => 'Application/Ports/Out/SaveSongPort.php',
        'UpdateSongPort' => 'Application/Ports/Out/UpdateSongPort.php',
        'CreateSongService' => 'Application/Services/CreateSongService.php',
        'DeleteSongService' => 'Application/Services/DeleteSongService.php',
        'CreateSongCommand' => 'Application/Services/Dto/Commands/CreateSongCommand.php',
        'DeleteSongCommand' => 'Application/Services/Dto/Commands/DeleteSongCommand.php',
        'UpdateSongCommand' => 'Application/Services/Dto/Commands/UpdateSongCommand.php',
        'GetAllSongsQuery' => 'Application/Services/Dto/Queries/GetAllSongsQuery.php',
        'GetSongByIdQuery' => 'Application/Services/Dto/Queries/GetSongByIdQuery.php',
        'GetAllSongsService' => 'Application/Services/GetAllSongsService.php',
        'GetSongByIdService' => 'Application/Services/GetSongByIdService.php',
        'SongApplicationMapper' => 'Application/Services/Mappers/SongApplicationMapper.php',
        'UpdateSongService' => 'Application/Services/UpdateSongService.php',
        'SongRhythmEnum' => 'Domain/Enums/SongRhythmEnum.php',
        'SongCreatedDomainEvent' => 'Domain/Events/SongCreatedDomainEvent.php',
        'InvalidSongDateException' => 'Domain/Exceptions/InvalidSongDateException.php',
        'InvalidSongDurationException' => 'Domain/Exceptions/InvalidSongDurationException.php',
        'InvalidSongFieldException' => 'Domain/Exceptions/InvalidSongFieldException.php',
        'InvalidSongIdException' => 'Domain/Exceptions/InvalidSongIdException.php',
        'InvalidSongPositionException' => 'Domain/Exceptions/InvalidSongPositionException.php',
        'InvalidSongRhythmException' => 'Domain/Exceptions/InvalidSongRhythmException.php',
        'SongAlreadyExistsException' => 'Domain/Exceptions/SongAlreadyExistsException.php',
        'SongNotFoundException' => 'Domain/Exceptions/SongNotFoundException.php',
        'SongModel' => 'Domain/Models/SongModel.php',
        'ReleaseDate' => 'Domain/ValueObjects/ReleaseDate.php',
        'SongDuration' => 'Domain/ValueObjects/SongDuration.php',
        'SongId' => 'Domain/ValueObjects/SongId.php',
        'SongName' => 'Domain/ValueObjects/SongName.php',
        'SongPosition' => 'Domain/ValueObjects/SongPosition.php',
        'SongText' => 'Domain/ValueObjects/SongText.php',
        'SongEntity' => 'Infrastructure/Adapters/Persistence/MySQL/Entity/SongEntity.php',
        'SongPersistenceMapper' => 'Infrastructure/Adapters/Persistence/MySQL/Mapper/SongPersistenceMapper.php',
        'SongRepositoryMySQL' => 'Infrastructure/Adapters/Persistence/MySQL/Repository/SongRepositoryMySQL.php',
        'CreateSongRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/CreateSongRequest.php',
        'SongResponse' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/SongResponse.php',
        'UpdateSongRequest' => 'Infrastructure/Entrypoints/Web/Controllers/Dto/UpdateSongRequest.php',
        'SongWebMapper' => 'Infrastructure/Entrypoints/Web/Controllers/Mapper/SongWebMapper.php',
        'SongController' => 'Infrastructure/Entrypoints/Web/Controllers/SongController.php',
    );

    public static function register(): void
    {
        spl_autoload_register(array(self::class, 'loadClass'));
    }

    public static function loadClass(string $className): void
    {
        if (!isset(self::$classMap[$className])) {
            return;
        }

        $baseDir = dirname(__DIR__) . DIRECTORY_SEPARATOR;
        $filePath = $baseDir . self::$classMap[$className];

        if (!file_exists($filePath)) {
            throw new RuntimeException(
                sprintf('No se encontró el archivo para la clase %s en %s', $className, $filePath)
            );
        }

        require_once $filePath;
    }
}