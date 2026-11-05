-- ============================================================
-- CRUD Usuarios + Canciones  (MySQL 8 / MariaDB 10.x)
-- Ejecutar como root (phpMyAdmin > SQL, o: mysql -u root -p < database.sql)
-- Esquema alineado con UserRepositoryMySQL y SongRepositoryMySQL.
-- ============================================================

DROP DATABASE IF EXISTS crud_usuarios;
CREATE DATABASE crud_usuarios CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE crud_usuarios;

-- Usuarios (id UUID, password con hash bcrypt, role/status según los Enums del dominio)
CREATE TABLE users (
    id VARCHAR(36) NOT NULL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'MEMBER',
    status VARCHAR(20) NOT NULL DEFAULT 'ACTIVE',
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
) ENGINE=InnoDB;

-- Usuario administrador inicial  ->  admin@crud.com / Admin12345
INSERT INTO users (id, name, email, password, role, status, created_at, updated_at)
VALUES (
    '11111111-1111-4111-8111-111111111111',
    'Administrador',
    'admin@crud.com',
    '$2y$10$Y1UdjGHk4ePKftm/Yqm4wuetjAOJk6udxoZUQm8Ze.wVe0OZ8IrvC',
    'ADMIN',
    'ACTIVE',
    NOW(),
    NOW()
);

-- Canciones (entidad asignada: ejercicio 20)
CREATE TABLE songs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    rhythm VARCHAR(30) NOT NULL,
    duration_seconds INT UNSIGNED NOT NULL,
    album VARCHAR(100) NOT NULL,
    position_in_album SMALLINT UNSIGNED NOT NULL,
    band VARCHAR(100) NOT NULL,
    performer VARCHAR(100) NOT NULL,
    author VARCHAR(100) NOT NULL,
    release_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT uq_song UNIQUE (name, album, band)
) ENGINE=InnoDB;
