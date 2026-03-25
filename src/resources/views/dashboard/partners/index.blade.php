@extends('layouts.app')

@section('content')

    <div class="content container-fluid px-3 px-md-5">

        <h1 class="page-title text-center text-md-start">
            Gerenciamento de Parceiros
        </h1>

        <p class="page-subtitle text-center text-md-start mb-4">
            Aqui você pode gerenciar os parceiros.
        </p>


        <div class="table-card card shadow-sm">

            <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">

                <h3 class="card-title mb-0">
                    Parceiros
                </h3>

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPartnerModal">

                    Criar Parceiro

                </button>

            </div>


            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>Logo</th>
                            <th>Nome</th>
                            <th>Website</th>
                            <th>Status</th>
                            <th>Ações</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach ($partners as $partner)

                            <tr>

                                <td>

                                    @if($partner->logo)

                                        <img src="{{ asset('storage/' . $partner->logo) }}" width="40" height="40"
                                            style="object-fit:cover;border-radius:6px">

                                    @endif

                                </td>


                                <td>

                                    <div class="fw-semibold">
                                        {{ $partner->name }}
                                    </div>

                                </td>


                                <td>

                                    @if($partner->website)

                                        <a href="{{ $partner->website }}" target="_blank">

                                            {{ $partner->website }}

                                        </a>

                                    @endif

                                </td>


                                <td>

                                    @if($partner->is_active)

                                        <span class="badge bg-success">
                                            Ativo
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Inativo
                                        </span>

                                    @endif

                                </td>


                                <td class="text-nowrap">

                                    <button class="btn btn-sm btn-outline-success me-1" data-bs-toggle="modal"
                                        data-bs-target="#editPartnerModal-{{ $partner->id }}">

                                        <i class="bi bi-pencil"></i>

                                    </button>


                                    <form action="{{ route('dashboard.partners.destroy', $partner->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Tem certeza que quer excluir?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-outline-danger">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>



    {{-- MODAIS EDITAR --}}
    @foreach ($partners as $partner)

        <div class="modal fade" id="editPartnerModal-{{ $partner->id }}" tabindex="-1">

            <div class="modal-dialog modal-lg modal-dialog-scrollable">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title">
                            Editar Parceiro
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal">

                        </button>

                    </div>


                    <div class="modal-body">

                        <form action="{{ route('dashboard.partners.update', $partner->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')


                            <div class="mb-3">

                                <label class="form-label">
                                    Nome
                                </label>

                                <input name="name" value="{{ $partner->name }}" class="form-control" required>

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Website
                                </label>

                                <input name="website" value="{{ $partner->website }}" class="form-control">

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Logo
                                </label>

                                <input type="file" name="logo" class="form-control">

                                @if($partner->logo)

                                    <img src="{{ asset('storage/' . $partner->logo) }}" class="img-thumbnail mt-2"
                                        style="max-height:80px">

                                @endif

                            </div>


                            <div class="form-check mb-3">

                                <input class="form-check-input" type="checkbox" name="is_active" {{ $partner->is_active ? 'checked' : '' }}>

                                <label class="form-check-label">

                                    Ativo

                                </label>

                            </div>


                            <div class="text-end">

                                <button class="btn btn-success">

                                    Atualizar

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    @endforeach




    {{-- MODAL CRIAR --}}
    <div class="modal fade" id="createPartnerModal" tabindex="-1">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">

                        Criar Parceiro

                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">

                    </button>

                </div>


                <div class="modal-body">

                    <form action="{{ route('dashboard.partners.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf


                        <div class="mb-3">

                            <label class="form-label">

                                Nome

                            </label>

                            <input name="name" class="form-control" required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">

                                Website

                            </label>

                            <input name="website" class="form-control">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">

                                Logo

                            </label>

                            <input type="file" name="logo" class="form-control" required>

                        </div>


                        <div class="form-check mb-3">

                            <input class="form-check-input" type="checkbox" name="is_active" checked>

                            <label class="form-check-label">

                                Ativo

                            </label>

                        </div>


                        <div class="text-end">

                            <button class="btn btn-primary">

                                Criar

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection