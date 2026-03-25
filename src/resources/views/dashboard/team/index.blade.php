@extends('layouts.app')

@section('content')

<div class="content container-fluid px-3 px-md-5">

    <h1 class="page-title">Team Members</h1>
    <p class="page-subtitle mb-4">Gerencie os membros da equipe.</p>

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Equipe</h3>

            <button
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#createMemberModal">

                Novo Membro
            </button>
        </div>

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Função</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Ordem</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($members as $member)

                    <tr>

                        <td>
                            @if($member->photo)
                                <img
                                    src="{{ asset('storage/'.$member->photo) }}"
                                    width="40"
                                    height="40"
                                    style="object-fit:cover;border-radius:50%;">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>

                        <td class="fw-semibold">
                            {{ $member->name }}
                        </td>

                        <td>
                            {{ $member->role }}
                        </td>

                        <td>
                            {{ $member->email ?? '-' }}
                        </td>

                        <td>
                            @if($member->is_active)
                                <span class="badge bg-success">Ativo</span>
                            @else
                                <span class="badge bg-secondary">Inativo</span>
                            @endif
                        </td>

                        <td>
                            {{ $member->order }}
                        </td>

                        <td class="text-nowrap">

                            <button
                                class="btn btn-sm btn-outline-success"
                                data-bs-toggle="modal"
                                data-bs-target="#editMemberModal-{{$member->id}}">

                                <i class="bi bi-pencil"></i>
                            </button>

                            <form
                                action="{{ route('dashboard.team.destroy',$member->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Excluir membro?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>


                    {{-- MODAL EDITAR MEMBRO --}}
                    <div
                        class="modal fade"
                        id="editMemberModal-{{$member->id}}"
                        tabindex="-1">

                        <div class="modal-dialog">

                            <form
                                method="POST"
                                action="{{ route('dashboard.team.update',$member->id) }}"
                                enctype="multipart/form-data">

                                @csrf
                                @method('PUT')

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar membro</h5>

                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal">
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="mb-2">
                                            <label>Nome</label>
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                value="{{ $member->name }}">
                                        </div>

                                        <div class="mb-2">
                                            <label>Função</label>
                                            <input
                                                type="text"
                                                name="role"
                                                class="form-control"
                                                value="{{ $member->role }}">
                                        </div>

                                        <div class="mb-2">
                                            <label>Bio</label>
                                            <textarea
                                                name="bio"
                                                class="form-control">{{ $member->bio }}</textarea>
                                        </div>

                                        <div class="mb-2">
                                            <label>Email</label>
                                            <input
                                                type="email"
                                                name="email"
                                                class="form-control"
                                                value="{{ $member->email }}">
                                        </div>

                                        <div class="mb-2">
                                            <label>Linkedin</label>
                                            <input
                                                type="text"
                                                name="linkedin"
                                                class="form-control"
                                                value="{{ $member->linkedin }}">
                                        </div>

                                        <div class="mb-2">
                                            <label>Twitter</label>
                                            <input
                                                type="text"
                                                name="twitter"
                                                class="form-control"
                                                value="{{ $member->twitter }}">
                                        </div>

                                        <div class="mb-2">
                                            <label>Ordem</label>
                                            <input
                                                type="number"
                                                name="order"
                                                class="form-control"
                                                value="{{ $member->order }}">
                                        </div>

                                        <div class="mb-2">
                                            <label>Foto</label>

                                            <input
                                                type="file"
                                                name="photo"
                                                class="form-control">

                                            @if($member->photo)
                                                <img
                                                    src="{{ asset('storage/'.$member->photo) }}"
                                                    class="img-thumbnail mt-2"
                                                    style="max-height:80px">
                                            @endif
                                        </div>

                                        <div class="form-check mt-2">
                                            <input
                                                type="checkbox"
                                                name="is_active"
                                                class="form-check-input"
                                                {{ $member->is_active ? 'checked' : '' }}>

                                            <label class="form-check-label">
                                                Ativo
                                            </label>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-success">
                                            Atualizar
                                        </button>
                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>



{{-- MODAL CRIAR MEMBRO --}}
<div
    class="modal fade"
    id="createMemberModal"
    tabindex="-1">

    <div class="modal-dialog">

        <form
            method="POST"
            action="{{ route('dashboard.team.store') }}"
            enctype="multipart/form-data">

            @csrf

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Novo membro</h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <div class="mb-2">
                        <label>Nome</label>
                        <input
                            name="name"
                            class="form-control">
                    </div>

                    <div class="mb-2">
                        <label>Função</label>
                        <input
                            name="role"
                            class="form-control">
                    </div>

                    <div class="mb-2">
                        <label>Bio</label>
                        <textarea
                            name="bio"
                            class="form-control"></textarea>
                    </div>

                    <div class="mb-2">
                        <label>Email</label>
                        <input
                            name="email"
                            class="form-control">
                    </div>

                    <div class="mb-2">
                        <label>Linkedin</label>
                        <input
                            name="linkedin"
                            class="form-control">
                    </div>

                    <div class="mb-2">
                        <label>Twitter</label>
                        <input
                            name="twitter"
                            class="form-control">
                    </div>

                    <div class="mb-2">
                        <label>Ordem</label>
                        <input
                            type="number"
                            name="order"
                            class="form-control">
                    </div>

                    <div class="mb-2">
                        <label>Foto</label>
                        <input
                            type="file"
                            name="photo"
                            class="form-control">
                    </div>

                    <div class="form-check mt-2">
                        <input
                            type="checkbox"
                            name="is_active"
                            class="form-check-input"
                            checked>

                        <label class="form-check-label">
                            Ativo
                        </label>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">
                        Salvar
                    </button>
                </div>

            </div>

        </form>

    </div>

</div>

@endsection