CREATE DATABASE IF NOT EXISTS rgagdb;

CREATE TABLE IF NOT EXISTS usuario (
usuario_id INT UNSIGNED AUTO_INCREMENT,
usuario_nombre VARCHAR(20),
usuario_password VARCHAR(40),
usuario_correo  VARCHAR(100),
usuario_edad TINYINT UNSIGNED,
usuario_status ENUM("INACTIVO", "ACTIVO", "ELIMINADO") DEFAULT "INACTIVO",
usuario_fecha_registro DATETIME DEFAULT NOW(),
usuario_codigo_activacion VARCHAR(40),
usuario_rol ENUM("USUARIO", "MODERADOR", "MODOP", "WEBMASTER", "ADMINISTRADOR") DEFAULT "USUARIO",
KEY key_usuario_id(usuario_id),
PRIMARY KEY(usuario_id));

CREATE TABLE IF NOT EXISTS imagen (
imagen_id INT UNSIGNED AUTO_INCREMENT,
imagen_titulo VARCHAR(150) DEFAULT "TITULO IMAGEN",
imagen_nombre VARCHAR(100),
imagen_seccion ENUM("gif", "comic", "topic") DEFAULT "TOPIC",
imagen_impresion BIGINT UNSIGNED,
imagen_voto_negativo BIGINT UNSIGNED DEFAULT 0,
imagen_voto_positivo BIGINT UNSIGNED DEFAULT 0,
imagen_fecha_subida DATETIME DEFAULT NOW(),
imagen_fecha_moderada DATETIME DEFAULT '0000-00-00 00:00:00',
imagen_estado ENUM("PENDIENTE", "APROBADA", "DESAPROBADA") DEFAULT "PENDIENTE",
KEY key_imagen_id(imagen_id),
PRIMARY KEY(imagen_id));

CREATE TABLE IF NOT EXISTS log_usuario (
log_usuario_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
log_usuario_usuario_id INT(10) UNSIGNED NOT NULL,
log_usuario_fecha DATETIME,
INDEX (log_usuario_usuario_id),
FOREIGN KEY (log_usuario_usuario_id)
REFERENCES usuario(usuario_id));

CREATE TABLE IF NOT EXISTS comentario (
comentario_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
comentario_imagen_id INT(10) UNSIGNED NOT NULL,
comentario_fecha DATETIME DEFAULT NOW(),
comentario_usuario_id INT(10) UNSIGNED NOT NULL,
comentario_comentari VARCHAR(500),
FOREIGN KEY (comentario_imagen_id)
REFERENCES imagen(imagen_id),
FOREIGN KEY (comentario_usuario_id)
REFERENCES usuario(usuario_id));

CREATE TABLE IF NOT EXISTS voto (

voto_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

voto_imagen_id INT(10) UNSIGNED NOT NULL,

voto_usuario_id INT(10) UNSIGNED NOT NULL,

voto_valor ENUM("-1","1"),

voto_fecha DATETIME DEFAULT NOW(),

FOREIGN KEY (voto_imagen_id)

REFERENCES imagen(imagen_id),

FOREIGN KEY (voto_usuario_id)

REFERENCES usuario(usuario_id));

CREATE TABLE IF NOT EXISTS voto_moderador (
voto_moderador_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
voto_moderador_imagen_id INT(10) UNSIGNED NOT NULL,
voto_moderador_usuario_id INT(10) UNSIGNED NOT NULL,
voto_tipo ENUM("APROBADA", "DESAPROBADA"),
FOREIGN KEY (voto_moderador_imagen_id)
REFERENCES imagen(imagen_id),
FOREIGN KEY (voto_moderador_usuario_id)
REFERENCES usuario(usuario_id));