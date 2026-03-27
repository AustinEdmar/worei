@extends('layouts.app')

@section('content')
  <div class="content container-fluid px-3 px-md-5">

    <h1 class="page-title text-center text-md-start">Gerenciamento de FAQ</h1>
    <p class="page-subtitle text-center text-md-start mb-4">
      Aqui você pode gerenciar as perguntas frequentes.
    </p>

    <div class="table-card card shadow-sm">

      <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">

        <h3 class="card-title mb-0">FAQs</h3>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createFaqModal">

          Criar FAQ

        </button>

      </div>


      <div class="table-responsive">

        <table class="table align-middle mb-0">

          <thead class="table-light">

            <tr>

              <th>Pergunta</th>
              <th>Resposta</th>
              <th>Ações</th>

            </tr>

          </thead>

          <tbody>

            @forelse ($faqs as $faq)

              <tr>

                <td>
                  <div class="fw-semibold">{{ $faq->question }}</div>
                </td>

                <td>{{ $faq->answer }}</td>

                <td class="text-nowrap">

                  <button class="btn btn-sm btn-outline-success me-1" data-bs-toggle="modal"
                    data-bs-target="#editFaqModal-{{ $faq->id }}">

                    <i class="bi bi-pencil"></i>

                  </button>

                  <form action="{{ route('dashboard.faq.destroy', $faq->id) }}" method="POST" class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-outline-danger">

                      <i class="bi bi-trash"></i>

                    </button>

                  </form>

                </td>

              </tr>


              {{-- MODAL EDITAR --}}
              <div class="modal fade" id="editFaqModal-{{ $faq->id }}" tabindex="-1">

                <div class="modal-dialog modal-lg">

                  <div class="modal-content">

                    <div class="modal-header">

                      <h5 class="modal-title">
                        Editar FAQ
                      </h5>

                      <button type="button" class="btn-close" data-bs-dismiss="modal">

                      </button>

                    </div>


                    <div class="modal-body">

                      <form action="{{ route('dashboard.faq.update', $faq->id) }}" method="POST">

                        @csrf
                        @method('PUT')


                        <div class="mb-3">

                          <label>Pergunta</label>

                          <input name="question" value="{{ $faq->question }}" class="form-control">

                        </div>


                        <div class="mb-3">

                          <label>Resposta</label>

                          <input name="answer" value="{{ $faq->answer }}" class="form-control">

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

            @empty

              <tr>

                <td colspan="3" class="text-center py-4">

                  <div class="text-muted">
                    Nenhum FAQ cadastrado
                  </div>

                </td>

              </tr>

            @endforelse

          </tbody>

        </table>

      </div>

    </div>

  </div>


  {{-- MODAL CRIAR --}}
  <div class="modal fade" id="createFaqModal" tabindex="-1">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title">

            Criar FAQ

          </h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal">

          </button>

        </div>


        <div class="modal-body">

          <form action="{{ route('dashboard.faq.store') }}" method="POST">

            @csrf


            <div class="mb-3">

              <label>Pergunta</label>

              <input name="question" class="form-control" required>

            </div>


            <div class="mb-3">

              <label>Resposta</label>

              <input name="answer" class="form-control" required>

            </div>


            <div class="text-end">

              <button class="btn btn-primary">

                Criar FAQ

              </button>

            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

@endsection