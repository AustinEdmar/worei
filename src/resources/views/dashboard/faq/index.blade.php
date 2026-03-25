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

      <!-- Tabela Responsiva -->
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead class="table-light">
            <tr>
              <th>Pergunta </th>
              <th>Resposta</th>
              <th>Ativo</th>
              <th>Ações</th>



            </tr>
          </thead>
          <tbody>

            @foreach ($faqs as $faq)
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <div>
                      <div class="fw-semibold">{{ $faq->question }}</div>
                    </div>
                  </div>
                </td>

                <td>{{ $faq->answer }}</td>

                <td class="text-nowrap">
                  {{-- Ver --}}
                  <a href="#" class="btn btn-sm btn-outline-primary me-1" title="Ver">
                    <i class="bi bi-eye"></i>
                  </a>

                  {{-- Editar --}}
                  <button class="btn btn-sm btn-outline-success me-1" data-bs-toggle="modal"
                    data-bs-target="#editFaqModal-{{ $faq->id }}" title="Editar">
                    <i class="bi bi-pencil"></i>
                  </button>

                  {{-- Excluir --}}
                  <form action="{{ route('dashboard.faq.destroy', $faq->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Tens certeza que queres excluir este post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir">
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




  <!-- editar modal  -->

  <div class="modal fade" id="editFaqModal-{{ $faq->id }}" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="editFaqModalLabel-{{ $faq->id }}" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editFaqModalLabel-{{ $faq->id }}">Editar Faqs</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form action=" {{ route('dashboard.faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')



            <div class="col-md-12 mb-3">
              <label for="question" class="form-label">Pergunta</label>
              <input name="question" value="{{ old('question', $faq->question) }}" placeholder="pergunta" required
                class="form-control">

            </div>

            <div class="col-md-12 mb-3">

              <input name="answer" value="{{ old('answer', $faq->answer) }}" placeholder="resposta" required
                class="form-control">

            </div>
            <!-- Botão -->
            <div class="text-end">
              <button type="submit" class="btn btn-success">Atualizar Contato Info</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal cadastro de post -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createPostModalLabel">Criar Contato Info</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>

        <div class="modal-body"> <!-- 🔥 Adicionado para permitir o scroll -->
          <form action=" {{ route('dashboard.faq.store') }}" method="POST" enctype="multipart/form-data" class="p-3">
            @csrf
            <div class="row g-3">


              <div class="col-md-12">
                <label for="question" class="form-label">Pergunta</label>
                <input name="question" placeholder="pergunta" required class="form-control">
              </div>



              <div class="col-md-12">
                <label for="answer" class="form-label">Resposta</label>
                <input name="answer" placeholder="resposta" required class="form-control">
              </div>


            </div>

            <div class="text-end mt-4">
              <button type="submit" class="btn btn-primary px-4">Criar Faqs</button>
            </div>
          </form>
        </div> <!-- fim do modal-body -->

      </div>
    </div>
  </div>



@endsection