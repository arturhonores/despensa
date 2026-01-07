<nav class="w-full sticky top-0 bg-background-light h-auto flex items-center">
    <button class="cursor-pointer h-auto bg-yellow-200 flex" id="navbar-toggler">
        <span class="material-symbols-outlined text-primary">menu</span>
    </button>
</nav>
<!--sidebar-->
<div id="sidebar" class="bg-red-200 fixed z-10 top-0 left-0 h-dvh w-72 flex-col hidden">
    <!-- 1. HEADER-->
    <div class="p-4 border-b border-gray-200">
        <button id="sidebar-close" class="absolute top-4 right-4 cursor-pointer">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div class="flex items-center gap-3">
            <img src="../../assets/images/account_circle_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" class="w-12 h-12 rounded-full">
            <div>
                <h3 class="font-semibold">Hola</h3>
                <p class="text-sm text-gray-600">Familia Honores Agapito</p>
            </div>
        </div>
    </div>
    <!-- 2. MENÚ PRINCIPAL (crece para ocupar espacio disponible) -->
    <nav class="flex-1 overflow-y-auto p-4">
        <ul class="space-y-2">
            <li>Stock</li>
            <li>Lista de la compra</li>
            <li>Dashboard</li>
        </ul>
    </nav>
    <!-- 3. FOOTER-->
    <div class="p-4 border-t border-gray-200 w-full self-end">
        <button class="w-full text-red-500 flex justify-center items-center gap-2">
            <span class="material-symbols-outlined">logout</span> Cerrar Sesión
        </button>
<!--        <p class="text-xs text-gray-400 text-center mt-2">Versión 2.4.0</p>-->
    </div>
</div>