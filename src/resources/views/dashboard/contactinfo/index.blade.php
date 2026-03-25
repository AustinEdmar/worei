@extends('layouts.app')

@section('content')
  <div class="content container-fluid px-3 px-md-5">
    <h1 class="page-title text-center text-md-start">Gerenciamento de info de contato</h1>
    <p class="page-subtitle text-center text-md-start mb-4">Aqui você pode gerenciar as info de contato.</p>

    <!-- Card da Tabela -->
    <div class="table-card card shadow-sm">
      <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
        <h3 class="card-title mb-0">Info de Contato</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Criar Info de Contato
        </button>
      </div>

      <!-- Tabela -->
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>Label</th>
              <th>Valor</th>
              <th>Ativo</th>
              <th>Ações</th>
            </tr>
          </thead>

          <tbody>


            @foreach ($contactsinfo as $info)


              <tr>
                <td>
                  <div class="fw-semibold">{{ $info->type }}</div>
                </td>

                <td>{{ $info->value }}</td>

                <td>
                  @if($info->is_active == 1)
                    <span class="badge bg-success">Ativo</span>
                  @else
                    <span class="badge bg-secondary">Inativo</span>
                  @endif
                </td>

                <td class="text-nowrap">
                  {{-- Ver --}}
                  <a href="{{ route('site.blog') }}" class="btn btn-sm btn-outline-primary me-1">
                    <i class="bi bi-eye"></i>
                  </a>

                  {{-- Editar --}}
                  <button class="btn btn-sm btn-outline-success me-1" data-bs-toggle="modal"
                    data-bs-target="#editPostModal-{{ $info->id }}">
                    <i class="bi bi-pencil"></i>
                  </button>

                  {{-- Excluir --}}
                  <form action="{{ route('dashboard.contactinfo.destroy', $info->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Tens certeza que queres excluir?')">
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
  @foreach ($contactsinfo as $info)

    <div class="modal fade" id="editPostModal-{{ $info->id }}" tabindex="-1">

      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title">Editar Contato Info</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal">
            </button>
          </div>

          <div class="modal-body">

            <form action="{{ route('dashboard.contactinfo.update', $info->id) }}" method="POST">

              @csrf
              @method('PUT')

              <div class="mb-3">
                <label class="form-label">Tipo</label>

                <select name="type" class="form-select">
                  <option value="email" {{ $info->type == 'email' ? 'selected' : '' }}>Email</option>
                  <option value="whatsapp" {{ $info->type == 'whatsapp' ? 'selected' : '' }}>Whatsapp</option>
                  <option value="facebook" {{ $info->type == 'facebook' ? 'selected' : '' }}>Facebook</option>
                  <option value="instagram" {{ $info->type == 'instagram' ? 'selected' : '' }}>Instagram</option>
                  <option value="twitter" {{ $info->type == 'twitter' ? 'selected' : '' }}>Twitter</option>
                  <option value="linkedin" {{ $info->type == 'linkedin' ? 'selected' : '' }}>Linkedin</option>
                  <option value="youtube" {{ $info->type == 'youtube' ? 'selected' : '' }}>Youtube</option>
                  <option value="telegram" {{ $info->type == 'telegram' ? 'selected' : '' }}>Telegram</option>
                </select>

              </div>

              <div class="mb-3">
                <input name="value" value="{{ $info->value }}" class="form-control" required>
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
  <div class="modal fade" id="staticBackdrop" tabindex="-1">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">
            Criar Contato Info
          </h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal">
          </button>

        </div>

        <div class="modal-body">

          <form action="{{ route('dashboard.contactinfo.store') }}" method="POST">

            @csrf

            <div class="mb-3">
              <label class="form-label">Tipo</label>

              <select name="type" class="form-select">

                <option value="email">Email</option>
                <option value="whatsapp">Whatsapp</option>
                <option value="facebook">Facebook</option>
                <option value="instagram">Instagram</option>
                <option value="twitter">Twitter</option>
                <option value="linkedin">Linkedin</option>
                <option value="youtube">Youtube</option>
                <option value="telegram">Telegram</option>

              </select>

            </div>

            <div class="mb-3">
              <input name="value" class="form-control" required>
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