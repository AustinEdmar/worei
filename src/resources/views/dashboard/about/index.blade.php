@extends('layouts.app')

@section('content')

  <div class="content container-fluid px-3 px-md-5">

    <h1 class="page-title">Gerenciamento Sobre</h1>
    <p class="page-subtitle mb-4">Gerencie as informações da página Sobre.</p>

    <div class="card shadow-sm">

      <div class="card-header d-flex justify-content-between align-items-center">

        <h3 class="mb-0">Sobre</h3>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAboutModal">

          Criar Sobre

        </button>

      </div>

      <div class="table-responsive">

        <table class="table align-middle mb-0">

          <thead class="table-light">

            <tr>

              <th>Título</th>
              <th>Descrição</th>
              <th>Imagem</th>
              <th>Data</th>
              <th>Ação</th>

            </tr>

          </thead>

          <tbody>

            @foreach ($abouts as $about)

              <tr>

                <td class="fw-semibold">

                  {{ $about->title }}

                </td>

                <td>

                  {{ Str::limit($about->description, 50) }}

                </td>

                <td>

                  @if ($about->image)

                    <img src="{{ asset('storage/' . $about->image) }}" width="40" height="40"
                      style="object-fit:cover;border-radius:6px">

                  @else

                    <span class="text-muted">Sem imagem</span>

                  @endif

                </td>

                <td>

                  {{ $about->created_at->format('d/m/Y') }}

                </td>

                <td class="text-nowrap">

                  <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                    data-bs-target="#editAboutModal-{{$about->id}}">

                    <i class="bi bi-pencil"></i>

                  </button>

                  <form action="{{ route('dashboard.about.destroy', $about->id) }}" method="POST" class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-outline-danger">

                      <i class="bi bi-trash"></i>

                    </button>

                  </form>

                </td>

              </tr>

              <!-- Modal Edit -->

              <div class="modal fade" id="editAboutModal-{{$about->id}}" tabindex="-1">

                <div class="modal-dialog">

                  <div class="modal-content">

                    <div class="modal-header">

                      <h5 class="modal-title">Editar Sobre</h5>

                      <button type="button" class="btn-close" data-bs-dismiss="modal">

                      </button>

                    </div>

                    <div class="modal-body">

                      <form action="{{ route('dashboard.about.update', $about->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                          <label>Título</label>

                          <input type="text" name="title" class="form-control" value="{{ $about->title }}">

                        </div>

                        <div class="mb-3">

                          <label>Conteúdo</label>

                          <textarea name="description" class="form-control">

                          {{ $about->description }}

                          </textarea>

                        </div>

                        <div class="mb-3">

                          <label>Imagem</label>

                          <input type="file" name="image" class="form-control">

                          @if($about->image)

                            <img src="{{ asset('storage/' . $about->image) }}" class="img-thumbnail mt-2"
                              style="max-height:100px">

                          @endif

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

          </tbody>

        </table>

      </div>

    </div>

  </div>

  <!-- Modal Create -->

  <div class="modal fade" id="createAboutModal" tabindex="-1">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title">

            Criar Sobre

          </h5>

          <button class="btn-close" data-bs-dismiss="modal">

          </button>

        </div>

        <div class="modal-body">

          <form action="{{ route('dashboard.about.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

              <label>Título</label>

              <input type="text" name="title" class="form-control">

            </div>

            <div class="mb-3">

              <label>Conteúdo</label>

              <textarea name="description" class="form-control">

        </textarea>

            </div>

            <div class="mb-3">

              <label>Imagem</label>

              <input type="file" name="image" class="form-control">

            </div>

            <div class="text-end">

              <button class="btn btn-primary">

                Salvar

              </button>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

@endsection