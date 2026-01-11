<nav class="w-full sticky top-0 bg-background-light h-auto flex items-center">
    <button class="cursor-pointer h-auto flex" id="navbar-toggler">
        <span class="material-symbols-outlined text-primary">menu</span>
    </button>
</nav>
<!--sidebar-->
<div id="sidebar" class="bg-white fixed z-10 top-0 left-0 h-dvh w-72 flex flex-col -translate-x-full transition-transform duration-300">
    <!-- 1. HEADER-->
    <div class="p-4 border-b border-gray-200">
        <button id="sidebar-close" class="absolute top-4 right-4 cursor-pointer">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div class="flex items-center gap-3">
            <img src="<?=BASE_PATH?>/assets/images/avatar.svg" class="w-12 h-12 rounded-full">
            <div>
                <h3 class="font-semibold">Hola</h3>
                <p class="text-sm text-gray-600">Familia Honores Agapito</p>
            </div>
        </div>
    </div>
    <!-- 2. MENÚ PRINCIPAL (crece para ocupar espacio disponible) -->
    <nav class="flex-1 overflow-y-auto p-4">
        <ul class="space-y-4">
            <li>
                <a href="<?=BASE_PATH?>/views/stock.php">Stock</a>
            </li>
            <li>Lista de la compra</li>
            <li>
                <a href="<?=BASE_PATH?>/views/dashboard.php">Dashboard</a>
            </li>
        </ul>
    </nav>
    <!-- 3. FOOTER-->
    <form class="p-4 border-t border-gray-200 w-full self-end" method="post" action="<?=BASE_PATH?>/controllers/auth/logout-controller.php">
        <button class="w-full text-red-500 flex justify-center items-center gap-2 cursor-pointer">
            <span class="material-symbols-outlined">logout</span> Cerrar Sesión
        </button>
    </form>
</div>