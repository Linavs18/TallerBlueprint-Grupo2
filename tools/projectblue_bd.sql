-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.40 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para projectblue_bd
CREATE DATABASE IF NOT EXISTS `projectblue_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projectblue_bd`;

-- Volcando estructura para tabla projectblue_bd.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla projectblue_bd.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla projectblue_bd.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla projectblue_bd.migrations: ~8 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2025_10_16_133354_y', 1),
	(6, '2025_10_16_135120_create_projects_table', 1),
	(7, '2025_10_16_135121_create_tasks_table', 1),
	(8, '2025_10_16_135122_create_project_users_table', 1);

-- Volcando estructura para tabla projectblue_bd.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla projectblue_bd.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla projectblue_bd.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla projectblue_bd.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla projectblue_bd.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `owner_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_owner_id_foreign` (`owner_id`),
  CONSTRAINT `projects_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla projectblue_bd.projects: ~7 rows (aproximadamente)
INSERT INTO `projects` (`id`, `title`, `description`, `owner_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Sistema de Gestión de Inventario', 'Desarrollo de un sistema completo para gestionar el inventario de productos, incluyendo entrada, salida, reportes y alertas de stock mínimo.', 1, '2025-02-01 14:00:00', '2025-02-01 14:00:00', NULL),
	(2, 'Aplicación Móvil de Delivery', 'Aplicación móvil para servicio de delivery de comidas con geolocalización, pagos en línea y seguimiento en tiempo real.', 2, '2025-02-05 15:30:00', '2025-02-05 15:30:00', NULL),
	(3, 'Plataforma E-learning', 'Plataforma educativa online con cursos, videos, evaluaciones y certificados digitales para instituciones educativas.', 1, '2025-02-10 16:45:00', '2025-02-10 16:45:00', NULL),
	(4, 'Sistema de Facturación Electrónica', 'Sistema para generar, enviar y gestionar facturas electrónicas cumpliendo con normativas fiscales locales.', 3, '2025-02-15 19:00:00', '2025-02-15 19:00:00', NULL),
	(5, 'CRM Empresarial', 'Sistema de gestión de relaciones con clientes, incluyendo seguimiento de ventas, soporte técnico y análisis de datos.', 4, '2025-02-20 13:15:00', '2025-02-20 13:15:00', NULL),
	(6, 'Portal de Recursos Humanos', 'Portal interno para gestión de empleados, vacaciones, nóminas, evaluaciones de desempeño y documentación.', 2, '2025-02-25 18:30:00', '2025-02-25 18:30:00', NULL),
	(7, 'Dashboard Analítico BI', 'Dashboard de inteligencia de negocios con visualización de datos, gráficos interactivos y reportes personalizados.', 5, '2025-03-01 15:00:00', '2025-03-01 15:00:00', NULL);

-- Volcando estructura para tabla projectblue_bd.project_users
CREATE TABLE IF NOT EXISTS `project_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_users_project_id_user_id_unique` (`project_id`,`user_id`),
  KEY `project_users_user_id_foreign` (`user_id`),
  CONSTRAINT `project_users_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla projectblue_bd.project_users: ~0 rows (aproximadamente)
INSERT INTO `project_users` (`id`, `project_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'member', '2025-02-01 14:30:00', '2025-02-01 14:30:00'),
	(2, 1, 3, 'member', '2025-02-01 15:00:00', '2025-02-01 15:00:00'),
	(3, 1, 4, 'admin', '2025-02-01 15:30:00', '2025-02-01 15:30:00'),
	(4, 2, 1, 'member', '2025-02-05 16:00:00', '2025-02-05 16:00:00'),
	(5, 2, 5, 'member', '2025-02-05 16:30:00', '2025-02-05 16:30:00'),
	(6, 2, 6, 'admin', '2025-02-05 17:00:00', '2025-02-05 17:00:00'),
	(7, 3, 7, 'member', '2025-02-10 17:15:00', '2025-02-10 17:15:00'),
	(8, 3, 8, 'member', '2025-02-10 17:45:00', '2025-02-10 17:45:00'),
	(9, 3, 2, 'admin', '2025-02-10 18:15:00', '2025-02-10 18:15:00'),
	(10, 4, 4, 'member', '2025-02-15 19:30:00', '2025-02-15 19:30:00'),
	(11, 4, 5, 'member', '2025-02-15 20:00:00', '2025-02-15 20:00:00'),
	(12, 5, 1, 'member', '2025-02-20 14:00:00', '2025-02-20 14:00:00'),
	(13, 5, 6, 'member', '2025-02-20 14:30:00', '2025-02-20 14:30:00'),
	(14, 5, 7, 'admin', '2025-02-20 15:00:00', '2025-02-20 15:00:00'),
	(15, 6, 3, 'member', '2025-02-25 19:00:00', '2025-02-25 19:00:00'),
	(16, 6, 8, 'member', '2025-02-25 19:30:00', '2025-02-25 19:30:00'),
	(17, 7, 2, 'member', '2025-03-01 15:30:00', '2025-03-01 15:30:00'),
	(18, 7, 4, 'member', '2025-03-01 16:00:00', '2025-03-01 16:00:00'),
	(19, 7, 6, 'admin', '2025-03-01 16:30:00', '2025-03-01 16:30:00');

-- Volcando estructura para tabla projectblue_bd.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pendiente','en_progreso','completado','cancelado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `due_date` date DEFAULT NULL,
  `project_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_project_id_foreign` (`project_id`),
  CONSTRAINT `tasks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla projectblue_bd.tasks: ~31 rows (aproximadamente)
INSERT INTO `tasks` (`id`, `name`, `description`, `status`, `due_date`, `project_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Diseño de base de datos', 'Crear el modelo entidad-relación y diseñar la estructura de tablas para el sistema de inventario.', 'completado', '2025-02-10', 1, '2025-02-01 14:30:00', '2025-02-12 21:00:00', NULL),
	(2, 'Desarrollo de módulo de productos', 'Implementar CRUD completo para gestión de productos con categorías y variantes.', 'completado', '2025-02-20', 1, '2025-02-01 15:00:00', '2025-02-21 19:30:00', NULL),
	(3, 'Sistema de alertas de stock', 'Desarrollar notificaciones automáticas cuando los productos alcancen el stock mínimo.', 'en_progreso', '2025-03-15', 1, '2025-02-01 15:30:00', '2025-03-10 16:00:00', NULL),
	(4, 'Generación de reportes', 'Crear módulo para generar reportes de movimientos, existencias y valorización de inventario.', 'pendiente', '2025-03-25', 1, '2025-02-01 16:00:00', '2025-02-01 16:00:00', NULL),
	(5, 'Integración con código de barras', 'Implementar lectura de códigos de barras para agilizar entrada y salida de productos.', 'pendiente', '2025-04-05', 1, '2025-02-01 16:30:00', '2025-02-01 16:30:00', NULL),
	(6, 'Diseño UI/UX de la app', 'Crear mockups y prototipos interactivos para la interfaz de usuario de la aplicación.', 'completado', '2025-02-15', 2, '2025-02-05 16:00:00', '2025-02-16 22:00:00', NULL),
	(7, 'Desarrollo de autenticación', 'Implementar registro, login y recuperación de contraseña con verificación por email.', 'completado', '2025-02-25', 2, '2025-02-05 16:30:00', '2025-02-26 20:30:00', NULL),
	(8, 'Integración con Google Maps', 'Implementar geolocalización y cálculo de rutas para seguimiento de pedidos en tiempo real.', 'en_progreso', '2025-03-10', 2, '2025-02-05 17:00:00', '2025-03-08 15:00:00', NULL),
	(9, 'Pasarela de pagos', 'Integrar Stripe y PayPal para procesar pagos en línea de forma segura.', 'en_progreso', '2025-03-20', 2, '2025-02-05 17:30:00', '2025-03-12 14:00:00', NULL),
	(10, 'Sistema de notificaciones push', 'Configurar Firebase para enviar notificaciones de estado de pedidos a usuarios.', 'pendiente', '2025-03-30', 2, '2025-02-05 18:00:00', '2025-02-05 18:00:00', NULL),
	(11, 'Arquitectura del sistema', 'Definir arquitectura de microservicios y stack tecnológico de la plataforma.', 'completado', '2025-02-20', 3, '2025-02-10 17:00:00', '2025-02-21 21:00:00', NULL),
	(12, 'Módulo de gestión de cursos', 'Desarrollar funcionalidad para crear, editar y publicar cursos con lecciones y recursos.', 'en_progreso', '2025-03-15', 3, '2025-02-10 17:30:00', '2025-03-11 19:00:00', NULL),
	(13, 'Sistema de evaluaciones', 'Crear herramienta para diseñar exámenes, cuestionarios y autoevaluaciones con calificación automática.', 'pendiente', '2025-03-25', 3, '2025-02-10 18:00:00', '2025-02-10 18:00:00', NULL),
	(14, 'Reproductor de video integrado', 'Implementar reproductor HTML5 con controles personalizados y marcadores de progreso.', 'pendiente', '2025-04-05', 3, '2025-02-10 18:30:00', '2025-02-10 18:30:00', NULL),
	(15, 'Generación de certificados', 'Desarrollar sistema para generar certificados digitales PDF con código de verificación.', 'pendiente', '2025-04-15', 3, '2025-02-10 19:00:00', '2025-02-10 19:00:00', NULL),
	(16, 'Estudio de normativa fiscal', 'Investigar y documentar requisitos legales para facturación electrónica en Colombia.', 'completado', '2025-02-25', 4, '2025-02-15 19:30:00', '2025-02-26 23:00:00', NULL),
	(17, 'Generación de XML DIAN', 'Implementar generación de archivos XML según especificaciones de la DIAN.', 'en_progreso', '2025-03-18', 4, '2025-02-15 20:00:00', '2025-03-13 16:00:00', NULL),
	(18, 'Firma digital de documentos', 'Integrar certificado digital para firmar electrónicamente las facturas.', 'pendiente', '2025-03-28', 4, '2025-02-15 20:30:00', '2025-02-15 20:30:00', NULL),
	(19, 'Portal de clientes', 'Crear portal web para que clientes consulten y descarguen sus facturas electrónicas.', 'pendiente', '2025-04-10', 4, '2025-02-15 21:00:00', '2025-02-15 21:00:00', NULL),
	(20, 'Módulo de gestión de leads', 'Desarrollar funcionalidad para capturar, clasificar y asignar leads al equipo de ventas.', 'completado', '2025-03-05', 5, '2025-02-20 14:00:00', '2025-03-06 22:00:00', NULL),
	(21, 'Pipeline de ventas visual', 'Crear vista Kanban para visualizar y gestionar el proceso de ventas por etapas.', 'en_progreso', '2025-03-20', 5, '2025-02-20 14:30:00', '2025-03-14 15:00:00', NULL),
	(22, 'Sistema de tickets de soporte', 'Implementar mesa de ayuda para gestionar solicitudes y problemas de clientes.', 'pendiente', '2025-04-01', 5, '2025-02-20 15:00:00', '2025-02-20 15:00:00', NULL),
	(23, 'Dashboard ejecutivo', 'Crear panel con KPIs y métricas clave de ventas, conversión y satisfacción del cliente.', 'pendiente', '2025-04-12', 5, '2025-02-20 15:30:00', '2025-02-20 15:30:00', NULL),
	(24, 'Módulo de gestión de empleados', 'Desarrollar base de datos y CRUD para información personal y laboral de empleados.', 'completado', '2025-03-10', 6, '2025-02-25 19:00:00', '2025-03-11 21:00:00', NULL),
	(25, 'Sistema de solicitud de vacaciones', 'Crear flujo de trabajo para solicitar, aprobar y gestionar vacaciones del personal.', 'en_progreso', '2025-03-25', 6, '2025-02-25 19:30:00', '2025-03-15 16:00:00', NULL),
	(26, 'Generación de recibos de nómina', 'Implementar cálculo automático de salarios y generación de recibos de pago en PDF.', 'pendiente', '2025-04-08', 6, '2025-02-25 20:00:00', '2025-02-25 20:00:00', NULL),
	(27, 'Evaluaciones de desempeño', 'Desarrollar herramienta para crear y aplicar evaluaciones periódicas a empleados.', 'pendiente', '2025-04-20', 6, '2025-02-25 20:30:00', '2025-02-25 20:30:00', NULL),
	(28, 'Conexión a fuentes de datos', 'Configurar conexiones a bases de datos SQL, APIs REST y archivos CSV/Excel.', 'completado', '2025-03-12', 7, '2025-03-01 15:30:00', '2025-03-13 20:00:00', NULL),
	(29, 'Diseño de visualizaciones', 'Crear gráficos interactivos: barras, líneas, mapas de calor, tablas dinámicas.', 'en_progreso', '2025-03-22', 7, '2025-03-01 16:00:00', '2025-03-16 17:00:00', NULL),
	(30, 'Sistema de filtros dinámicos', 'Implementar filtros interactivos para segmentar y analizar datos en tiempo real.', 'pendiente', '2025-04-05', 7, '2025-03-01 16:30:00', '2025-03-01 16:30:00', NULL),
	(31, 'Exportación de reportes', 'Permitir exportar dashboards y reportes a PDF, Excel y PowerPoint.', 'pendiente', '2025-04-15', 7, '2025-03-01 17:00:00', '2025-03-01 17:00:00', NULL);

-- Volcando estructura para tabla projectblue_bd.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla projectblue_bd.users: ~8 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Juan Pérez', 'juan.perez@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5QOq.YlWtqfli', '2025-01-15 15:00:00', '2025-01-15 15:00:00'),
	(2, 'María González', 'maria.gonzalez@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5QOq.YlWtqfli', '2025-01-16 16:30:00', '2025-01-16 16:30:00'),
	(3, 'Carlos Rodríguez', 'carlos.rodriguez@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5QOq.YlWtqfli', '2025-01-17 14:15:00', '2025-01-17 14:15:00'),
	(4, 'Ana Martínez', 'ana.martinez@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5QOq.YlWtqfli', '2025-01-18 19:20:00', '2025-01-18 19:20:00'),
	(5, 'Luis Fernández', 'luis.fernandez@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5QOq.YlWtqfli', '2025-01-19 21:45:00', '2025-01-19 21:45:00'),
	(6, 'Laura Sánchez', 'laura.sanchez@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5QOq.YlWtqfli', '2025-01-20 13:30:00', '2025-01-20 13:30:00'),
	(7, 'Pedro López', 'pedro.lopez@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5QOq.YlWtqfli', '2025-01-21 17:00:00', '2025-01-21 17:00:00'),
	(8, 'Sofia Torres', 'sofia.torres@example.com', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/LewY5QOq.YlWtqfli', '2025-01-22 20:30:00', '2025-01-22 20:30:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
