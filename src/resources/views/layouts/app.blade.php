<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <title>Dashboard Premium</title>
</head>
<body>

   <!-- Overlay para fechar sidebar no mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>
    
    <div class="dashboard-container">
        <!-- Sidebar -->
       @include('layouts.partials.sidebar')

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Header -->
            @include('layouts.partials.header')

           @yield('content')
        </main>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Estado da sidebar
        let sidebarState = 'hidden'; // hidden, show, collapsed

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebarState === 'hidden') {
                // Abrir sidebar completa
                sidebar.classList.add('show');
                sidebar.classList.remove('collapsed');
                overlay.classList.add('active');
                sidebarState = 'show';
            } else if (sidebarState === 'show') {
                // Colapsar sidebar (apenas em desktop)
                if (window.innerWidth > 968) {
                    sidebar.classList.add('collapsed');
                    sidebar.classList.add('show');
                    overlay.classList.remove('active');
                    sidebarState = 'collapsed';
                } else {
                    // No mobile, fechar completamente
                    closeSidebar();
                }
            } else if (sidebarState === 'collapsed') {
                // Fechar completamente
                closeSidebar();
            }
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.remove('show', 'collapsed');
            overlay.classList.remove('active');
            sidebarState = 'hidden';
        }

        // Navegação ativa
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                // Fechar sidebar no mobile ao clicar em um item
                if (window.innerWidth <= 968) {
                    closeSidebar();
                }
            });
        });

        // Filtros do gráfico
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Ajustar ao redimensionar
        window.addEventListener('resize', function() {
            // Resetar estado ao mudar de tamanho
            if (window.innerWidth <= 968 && sidebarState === 'collapsed') {
                closeSidebar();
            }
        });

        // Tecla ESC para fechar
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebarState !== 'hidden') {
                closeSidebar();
            }
        });
    </script>
</body>
</html>