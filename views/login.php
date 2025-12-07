
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-4.0.0-rc.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gradient-to-r from-violet-600 to-indigo-600">
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-center font-bold text-4xl text-white mb-10">La Despensa</h1>
    <img src="../assets/images/despensa.svg" class="w-100 h-100 mx-auto" alt="logo">

    <form class="mt-10 max-w-md mx-auto space-y-6" method="post" action="../controllers/auth/login-controller.php">
        <div>
            <label for="email" class="block text-sm/6 font-medium text-white mb-2">Correo</label>
            <input id="email"
                    type="email"
                    name="email"
                    autocomplete="email"
                    required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-zinc-800 sm:text-sm/6"/>
        </div>

        <div>
            <label for="password" class="block text-sm/6 font-medium text-white mb-2">Contraseña</label>
            <input id="password"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    required
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-zinc-800 sm:text-sm/6"/>
        </div>
        <button type="submit" class="w-full rounded-md bg-white px-3 py-2 mt-6 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-50 transition-colors">
            Iniciar sesión
        </button>
    </form>

</div>

</body>
</html>
