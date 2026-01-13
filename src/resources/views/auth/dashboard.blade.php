@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-file-earmark-text"></i> Relatórios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-people"></i> Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-graph-up"></i> Análises
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-gear"></i> Configurações
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-calendar"></i> Esta semana
                    </button>
                </div>
            </div>

            <!-- Cards de Estatísticas -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Vendas (Mensal)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">R$ 40.000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-currency-dollar fs-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Receita (Anual)
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">R$ 215.000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-graph-up fs-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Tarefas
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-clipboard-data fs-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Novas Solicitações
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-envelope fs-2 text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos e Tabelas -->
            <div class="row">
                <!-- Gráfico -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Visão Geral de Vendas</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart" height="80"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Donut Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Fontes de Receita</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="bi bi-circle-fill text-primary"></i> Direto
                                </span>
                                <span class="mr-2">
                                    <i class="bi bi-circle-fill text-success"></i> Social
                                </span>
                                <span class="mr-2">
                                    <i class="bi bi-circle-fill text-info"></i> Referência
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabela de Projetos -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projetos Recentes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Projeto</th>
                                    <th>Cliente</th>
                                    <th>Status</th>
                                    <th>Progresso</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Website Redesign</td>
                                    <td>Empresa ABC</td>
                                    <td><span class="badge bg-success">Completo</span></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width: 100%">100%</div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Ver</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>App Mobile</td>
                                    <td>Startup XYZ</td>
                                    <td><span class="badge bg-warning">Em Progresso</span></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 65%">65%</div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Ver</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sistema ERP</td>
                                    <td>Indústria 123</td>
                                    <td><span class="badge bg-info">Iniciado</span></td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" style="width: 30%">30%</div>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Ver</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<style>
    .sidebar {
        position: fixed;
        top: 56px;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 48px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
        padding: 10px 15px;
    }

    .sidebar .nav-link.active {
        color: #007bff;
        background-color: rgba(0, 123, 255, .1);
    }

    .sidebar .nav-link:hover {
        color: #007bff;
    }

    .border-left-primary {
        border-left: 4px solid #4e73df !important;
    }

    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }

    .border-left-info {
        border-left: 4px solid #36b9cc !important;
    }

    .border-left-warning {
        border-left: 4px solid #f6c23e !important;
    }

    .text-gray-300 {
        color: #dddfeb !important;
    }

    .text-gray-800 {
        color: #5a5c69 !important;
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
        }
    }

    main {
        padding-top: 56px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Área
    const ctxArea = document.getElementById('myAreaChart');
    if (ctxArea) {
        new Chart(ctxArea, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [{
                    label: 'Vendas',
                    data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 32000, 35000, 38000, 42000, 45000],
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    // Gráfico de Pizza
    const ctxPie = document.getElementById('myPieChart');
    if (ctxPie) {
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Direto', 'Social', 'Referência'],
                datasets: [{
                    data: [55, 30, 15],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });
    }

    // Toggle Sidebar em Mobile
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarToggle = document.querySelector('[data-bs-toggle="collapse"]');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                document.querySelector('#sidebar').classList.toggle('show');
            });
        }
    });
</script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection