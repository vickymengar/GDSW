var btnMostrarOcultar = document.getElementById('mostrar-ocultar-contrasena');
        var inputContrasena = document.getElementById('contrasena');
        var iconoOjo = document.getElementById('icono-ojo');
        
        // Mostrar la contraseña al cargar la página
        inputContrasena.type = 'text';
        iconoOjo.classList.remove('bi-eye-slash');
        iconoOjo.classList.add('bi-eye');

        btnMostrarOcultar.addEventListener('click', function() {
            if (inputContrasena.type === 'password') {
                inputContrasena.type = 'text';
                iconoOjo.classList.remove('bi-eye-slash');
                iconoOjo.classList.add('bi-eye');
            } else {
                inputContrasena.type = 'password';
                iconoOjo.classList.remove('bi-eye');
                iconoOjo.classList.add('bi-eye-slash');
            }
        });