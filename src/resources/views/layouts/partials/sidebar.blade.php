<aside class="sidebar" id="sidebar">
    <div class="logo">
        <a href="{{ route('site.index') }}" class="text-decoration-none text-gray">
            <span>⚡</span> DashPro
        </a>
    </div>

    <nav class="mt-3">
        <div class="nav-section">
            <div class="nav-title">Principal</div>

            <div class="nav-item active">
                <a href="{{ route('dashboard.home') }}" class="text-decoration-none text-gray">
                    <span class="nav-icon">📊</span>
                    <span>Dashboard</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.about.index') }}" class="text-decoration-none text-gray">
                    <span class="nav-icon">📈</span>
                    <span>Sobre</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('dashboard.blog.index') }}" class="text-decoration-none text-gray">
                    <span class="nav-icon">📈</span>
                    <span>Blog</span>
                </a>
            </div>


            <div class="nav-item">
                <a href="{{ route('dashboard.team.index') }}" class="text-decoration-none text-gray">
                    <span class="nav-icon">👥</span>
                    <span>Equipe</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.partners.index') }}" class="text-decoration-none text-gray">
                    <span class="nav-icon">👥</span>
                    <span>Parceiros</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('dashboard.contactinfo.index') }}" class="text-decoration-none text-gray">
                    <span class="nav-icon">📞</span>
                    <span>Contatos info</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('dashboard.faq.index') }}" class="text-decoration-none text-gray">
                    <span class="nav-icon">❓</span>
                    <span>Perguntas Frequentes</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('dashboard.services.index') }}" class="text-decoration-none text-gray">
                    <span class="nav-icon">🛠️</span>
                    <span>Serviços</span>
                </a>
            </div>


        </div>

        <div class="nav-section mt-4">
            <div class="nav-title">Gerenciar</div>
            <div class="nav-item"><span class="nav-icon">👥</span><span>Usuários</span></div>

        </div>

        <div class="nav-section mt-4">
            <div class="nav-title">Outros</div>
            <div class="nav-item"><span class="nav-icon">⚙️</span><span>Configurações</span></div>
            <div class="nav-item"><span class="nav-icon">❓</span><span>Ajuda</span></div>
        </div>
    </nav>

    <div class="sidebar-footer mt-auto pt-4 border-top">
        <div class="user-profile">
            <div class="user-avatar bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center"
                style="width: 40px; height: 40px;">
                {{ strtoupper(substr(Auth::user()->name ?? 'JS', 0, 2)) }}
            </div>
            <div class="user-info">
                <h6 class="mb-0">{{ Auth::user()->name ?? 'João Silva' }}</h6>
                <small class="text-muted">{{ Auth::user()->role ?? 'Admin' }}</small>
            </div>
        </div>

        <div class="logout px-2 mt-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="btn btn-outline-danger bg-danger w-100 d-flex align-items-center justify-content-center gap-3 border-0 py-2">
                    <i class="bi bi-box-arrow-right text-white fs-4 mb-1"></i>

                    <h5 class="text-white">Sair</h5>
                </button>
            </form>
        </div>
    </div>
</aside>