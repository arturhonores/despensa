<?php

session_start();
if (isset($_SESSION['id'])) {
    header('location:views/despensa.php');
    exit;
};
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-4.0.0-rc.1.min.js"></script>
    <!-- Google Fonts - Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/output.css">
</head>
<body class="bg-background-light">
<div class="max-w-3xl mx-auto p-6 flex flex-col gap-8 min-h-dvh justify-center">
    <div class="flex flex-col items-center gap-3">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary shadow-lg shadow-primary/20 mb-2">
            <span class="material-symbols-outlined text-3xl">kitchen</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-negro text-center">
            Mi Despensa
        </h1>
        <div class="flex flex-col gap-1 text-center -mt-2">
            <h2 class="text-xl font-bold text-[#111812]">
                Hola de nuevo
            </h2>
            <p class="text-primary-oscuro text-sm font-medium">
                Ingresa tus credenciales para acceder a tu despensa
            </p>
        </div>
    </div>
    <form class="flex flex-col gap-5" method="post" action="controllers/auth/login-controller.php">
        <label for="email" class="flex flex-col gap-2"> <span class="text-negro text-sm font-semibold leading-normal">Correo Electrónico</span>
            <div class="relative flex w-full items-center">
                <input class="w-full rounded-lg border border-[#dbe6dd] bg-white px-4 py-3.5 text-base text-negro placeholder:text-[#618968] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all"
                        placeholder="ejemplo@correo.com"
                        id="email"
                        type="email"
                        name="email"
                        autocomplete="email"
                        required
                />
                <div class="absolute right-4 text-[#618968]">
                    <span class="material-symbols-outlined text-[20px] hover:text-negro">mail</span>
                </div>
            </div>
        </label> <label for="password" class="flex flex-col gap-2">
            <div class="flex justify-between items-center">
                <span class="text-negro text-sm font-semibold leading-normal">Contraseña</span>
            </div>
            <div class="relative flex w-full items-center">
                <input class="w-full rounded-lg border border-[#dbe6dd]  bg-white px-4 py-3.5 text-base text-negro placeholder:text-[#618968] focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all pr-12"
                        placeholder="Ingresa tu contraseña"
                        type="password"
                        name="password"
                        autocomplete="current-password"
                        required
                />
                <button class="absolute right-0 top-0 bottom-0 px-4 flex items-center justify-center text-[#618968] hover:text-negro transition-colors"
                        type="button">
                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                </button>
            </div>
        </label>
        <div class="flex justify-end">
            <a class="text-sm font-semibold text-negro hover:text-primary transition-colors" href="#">
                ¿Olvidaste tu contraseña?
            </a>
        </div>
        <button type="submit"
                class="group flex w-full items-center justify-center gap-2 rounded-lg bg-primary py-3.5 px-6 text-[#102213] transition-all hover:bg-[#0fd630] active:scale-[0.98] shadow-md shadow-primary/20"
                type="submit">
            <span class="text-base font-bold tracking-wide">Iniciar Sesión</span>
            <span class="material-symbols-outlined text-lg transition-transform group-hover:translate-x-1">login</span>
        </button>
    </form>

</div>

</body>
</html>