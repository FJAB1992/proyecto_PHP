-- Registros para la tabla `libros`
INSERT INTO `libros` (`titulo`, `autor`, `genero`, `fecha_publicacion`, `disponibilidad`) VALUES
('El alquimista', 'Paulo Coelho', 'Ficción', '1988-01-01', 1),
('Cien años de soledad', 'Gabriel García Márquez', 'Realismo mágico', '1967-05-30', 1),
('1984', 'George Orwell', 'Distopía', '1949-06-08', 1),
('Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Fantasía', '1997-06-26', 1),
('Orgullo y prejuicio', 'Jane Austen', 'Clásico', '1813-01-28', 1),
('Don Quijote de la Mancha', 'Miguel de Cervantes', 'Novela', '1605-01-01', 1),
('Matar a un ruiseñor', 'Harper Lee', 'Ficción', '1960-07-11', 1),
('La metamorfosis', 'Franz Kafka', 'Ficción', '1915-10-15', 1),
('Crimen y castigo', 'Fyodor Dostoevsky', 'Novela', '1866-01-01', 1),
('El principito', 'Antoine de Saint-Exupéry', 'Infantil', '1943-04-06', 1);

-- Registros para la tabla `usuarios`
INSERT INTO `usuarios` (`nombre`, `email`, `contraseña`, `rol`) VALUES
('Admin1', 'admin1@example.com', 'admin123', 'administrador'),
('Admin2', 'admin2@example.com', 'admin456', 'administrador'),
('User1', 'user1@example.com', 'user123', 'usuario'),
('User2', 'user2@example.com', 'user456', 'usuario'),
('User3', 'user3@example.com', 'user789', 'usuario'),
('User4', 'user4@example.com', 'user012', 'usuario'),
('User5', 'user5@example.com', 'user345', 'usuario'),
('User6', 'user6@example.com', 'user678', 'usuario'),
('User7', 'user7@example.com', 'user901', 'usuario'),
('User8', 'user8@example.com', 'user234', 'usuario');
