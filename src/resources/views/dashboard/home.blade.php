@extends('layouts.app')

@section('content')
   <!-- Content -->
            <div class="content">
                <h1 class="page-title">Dashboard Overview</h1>
                <p class="page-subtitle">Bem-vindo de volta! Aqui está o resumo de hoje.</p>

                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">💰</div>
                        </div>
                        <div class="stat-value">R$ 124.5K</div>
                        <div class="stat-label">Receita Total</div>
                        <div class="stat-footer">
                            <div class="stat-change positive">
                                ↑ 12.5%
                            </div>
                            <span style="color: #6b7280;">vs último mês</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">👥</div>
                        </div>
                        <div class="stat-value">8,542</div>
                        <div class="stat-label">Usuários Ativos</div>
                        <div class="stat-footer">
                            <div class="stat-change positive">
                                ↑ 8.2%
                            </div>
                            <span style="color: #6b7280;">vs último mês</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">📦</div>
                        </div>
                        <div class="stat-value">2,845</div>
                        <div class="stat-label">Pedidos</div>
                        <div class="stat-footer">
                            <div class="stat-change negative">
                                ↓ 3.1%
                            </div>
                            <span style="color: #6b7280;">vs último mês</span>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-header">
                            <div class="stat-icon">📊</div>
                        </div>
                        <div class="stat-value">42.8%</div>
                        <div class="stat-label">Taxa de Conversão</div>
                        <div class="stat-footer">
                            <div class="stat-change positive">
                                ↑ 5.4%
                            </div>
                            <span style="color: #6b7280;">vs último mês</span>
                        </div>
                    </div>
                </div>

                <!-- Charts Grid -->
                <div class="charts-grid">
                    <div class="chart-card">
                        <div class="card-header">
                            <h3 class="card-title">Visão Geral de Vendas</h3>
                            <div class="card-actions">
                                <button class="filter-btn active">7D</button>
                                <button class="filter-btn">30D</button>
                                <button class="filter-btn">90D</button>
                                <button class="filter-btn">1A</button>
                            </div>
                        </div>
                        <div class="chart-container">
                            <div class="line-chart">
                                <div class="chart-line">
                                    <div class="chart-bar" style="height: 60%;"></div>
                                    <div class="chart-label">Seg</div>
                                </div>
                                <div class="chart-line">
                                    <div class="chart-bar" style="height: 75%;"></div>
                                    <div class="chart-label">Ter</div>
                                </div>
                                <div class="chart-line">
                                    <div class="chart-bar" style="height: 45%;"></div>
                                    <div class="chart-label">Qua</div>
                                </div>
                                <div class="chart-line">
                                    <div class="chart-bar" style="height: 85%;"></div>
                                    <div class="chart-label">Qui</div>
                                </div>
                                <div class="chart-line">
                                    <div class="chart-bar" style="height: 70%;"></div>
                                    <div class="chart-label">Sex</div>
                                </div>
                                <div class="chart-line">
                                    <div class="chart-bar" style="height: 95%;"></div>
                                    <div class="chart-label">Sáb</div>
                                </div>
                                <div class="chart-line">
                                    <div class="chart-bar" style="height: 80%;"></div>
                                    <div class="chart-label">Dom</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="card-header">
                            <h3 class="card-title">Atividade Recente</h3>
                        </div>
                        <div style="max-height: 300px; overflow-y: auto;">
                            <div class="activity-item">
                                <div class="activity-icon">🛒</div>
                                <div class="activity-content">
                                    <div class="activity-title">Novo Pedido</div>
                                    <div class="activity-desc">Pedido #8471 recebido</div>
                                </div>
                                <div class="activity-time">2 min</div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">👤</div>
                                <div class="activity-content">
                                    <div class="activity-title">Novo Usuário</div>
                                    <div class="activity-desc">Maria Silva se cadastrou</div>
                                </div>
                                <div class="activity-time">15 min</div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">💳</div>
                                <div class="activity-content">
                                    <div class="activity-title">Pagamento</div>
                                    <div class="activity-desc">R$ 2.450,00 recebido</div>
                                </div>
                                <div class="activity-time">1h</div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">📊</div>
                                <div class="activity-content">
                                    <div class="activity-title">Relatório</div>
                                    <div class="activity-desc">Relatório mensal gerado</div>
                                </div>
                                <div class="activity-time">2h</div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon">⚙️</div>
                                <div class="activity-content">
                                    <div class="activity-title">Sistema</div>
                                    <div class="activity-desc">Atualização concluída</div>
                                </div>
                                <div class="activity-time">3h</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-card">
                    <div class="card-header" style="margin-bottom: 20px;">
                        <h3 class="card-title">Pedidos Recentes</h3>
                        <button class="action-btn">Ver Todos</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Pedido ID</th>
                                <th>Data</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Progresso</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="table-user">
                                        <div class="table-avatar">MS</div>
                                        <div>
                                            <div style="font-weight: 600;">Maria Santos</div>
                                            <div style="font-size: 12px; color: #6b7280;">maria@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td>#8471</td>
                                <td>22/10/2025</td>
                                <td>R$ 2.450,00</td>
                                <td><span class="status-badge status-success">Completo</span></td>
                                <td>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 100%;"></div>
                                    </div>
                                </td>
                                <td><button class="action-btn">Detalhes</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table-user">
                                        <div class="table-avatar">CL</div>
                                        <div>
                                            <div style="font-weight: 600;">Carlos Lima</div>
                                            <div style="font-size: 12px; color: #6b7280;">carlos@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td>#8470</td>
                                <td>22/10/2025</td>
                                <td>R$ 1.850,00</td>
                                <td><span class="status-badge status-pending">Pendente</span></td>
                                <td>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 65%;"></div>
                                    </div>
                                </td>
                                <td><button class="action-btn">Detalhes</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table-user">
                                        <div class="table-avatar">AC</div>
                                        <div>
                                            <div style="font-weight: 600;">Ana Costa</div>
                                            <div style="font-size: 12px; color: #6b7280;">ana@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td>#8469</td>
                                <td>21/10/2025</td>
                                <td>R$ 3.200,00</td>
                                <td><span class="status-badge status-success">Completo</span></td>
                                <td>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 100%;"></div>
                                    </div>
                                </td>
                                <td><button class="action-btn">Detalhes</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table-user">
                                        <div class="table-avatar">PO</div>
                                        <div>
                                            <div style="font-weight: 600;">Pedro Oliveira</div>
                                            <div style="font-size: 12px; color: #6b7280;">pedro@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td>#8468</td>
                                <td>21/10/2025</td>
                                <td>R$ 980,00</td>
                                <td><span class="status-badge status-cancelled">Cancelado</span></td>
                                <td>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 0%;"></div>
                                    </div>
                                </td>
                                <td><button class="action-btn">Detalhes</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table-user">
                                        <div class="table-avatar">JF</div>
                                        <div>
                                            <div style="font-weight: 600;">Julia Ferreira</div>
                                            <div style="font-size: 12px; color: #6b7280;">julia@email.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td>#8467</td>
                                <td>20/10/2025</td>
                                <td>R$ 1.450,00</td>
                                <td><span class="status-badge status-success">Completo</span></td>
                                <td>
                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: 100%;"></div>
                                    </div>
                                </td>
                                <td><button class="action-btn">Detalhes</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection