@extends('layouts.app')

@section('content')
<div class="content container-fluid px-3 px-md-5">
    <h1 class="page-title text-center text-md-start">Gerenciamento de Postagens</h1>
    <p class="page-subtitle text-center text-md-start mb-4">Aqui você pode gerenciar as postagens do blog.</p>

    <!-- Card da Tabela -->
    <div class="table-card card shadow-sm">
        <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <h3 class="card-title mb-0">Postagens Recentes</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Criar Serviço
            </button>
        </div>

        <!-- Tabela Responsiva -->
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Título</th>
                        
                        <th>Conteúdo</th>
                        <th>Imagem</th>
                       
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service) 
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                               <!--  <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width:40px;height:40px;">MS</div> -->
                                <div>
                                    <div class="fw-semibold">{{$service->title}}</div>
                                    
                                </div>
                            </div>
                        </td>

                        <td>
                            {{$service->content}}
                        </td>
                   
                        <td>
                         
                        <img src="{{ asset('storage/' . $service->image) }}" alt="Imagem do post" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                        </td>


            


                       
                      <td class="text-nowrap">
    {{-- Ver Post --}}
    <a href="{{ route('site.blog') }}" class="btn btn-sm btn-outline-primary me-1" title="Ver">
        <i class="bi bi-eye"></i>
    </a>

    {{-- Editar Post --}}
    <button 
    class="btn btn-sm btn-outline-success me-1" 
    data-bs-toggle="modal" 
    data-bs-target="#editServiceModal-{{ $service->id }}"
    title="Editar">
    <i class="bi bi-pencil"></i>
</button>

    {{-- Excluir Post --}}
    <form action="{{ route('dashboard.services.destroy', $service->id) }}" method="POST" class="d-inline"
          onsubmit="return confirm('Tens certeza que queres excluir este post?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</td>


                    </tr>
               
                </tbody>
            </table>
        </div>
    </div>
</div>




<!-- editar modal  -->

<div class="modal fade" id="editServiceModal-{{ $service->id }}" tabindex="-1" aria-labelledby="editServiceModalLabel-{{ $service->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editServiceModalLabel-{{ $service->id }}">Editar Serviço</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('dashboard.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Título -->
          <div class="mb-3">
            <label for="title-{{ $service->id }}" class="form-label">Título</label>
            <input type="text" name="title" id="title-{{ $service->id }}" class="form-control" value="{{ $service->title }}" required>
          </div>


     <div class="mb-3">
            <label for="title-{{ $service->id }}" class="form-label">Imagem</label>
            <input type="file" name="image" class="form-control" value="{{ $service->image }}" required>
          </div>

        
             
          


          <!-- Conteúdo -->
          <div class="mb-3">
            <label for="content-{{ $service->id }}" class="form-label">Conteúdo</label>
            <textarea name="content" id="content-{{ $service->id }}" rows="4" class="form-control" required>{{ $service->content }}</textarea>
          </div>

         

         

          <!-- Botão -->
          <div class="text-end">
            <button type="submit" class="btn btn-success">Atualizar Serviço</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

     @endforeach
<!-- Modal cadastro de post -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="createServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createServiceModalLabel">Criar Novo Serviço</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body"> <!-- 🔥 Adicionado para permitir o scroll -->
        <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data" class="p-3">
          @csrf
          <div class="row g-3">
               <div class="col-12">
              <label class="form-label">Título</label>
              <input type="text"
                     name="title"
                     class="form-control @error('title') is-invalid @enderror"
                     value="{{ old('title') }}"
                     required>

              @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

              <div class="col-12">
              <label class="form-label">Conteúdo</label>
              <textarea name="content"
                        rows="3"
                        class="form-control @error('content') is-invalid @enderror"
                        required>{{ old('content') }}</textarea>

              @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            



               {{-- IMAGEM --}}
            <div class="col-md-6">
              <label class="form-label">Imagem de destaque</label>
              <input type="file"
                     name="image"
                     class="form-control @error('image') is-invalid @enderror"
                     accept="image/*"
                    >

              @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              {{-- PREVIEW --}}
             
            </div>



             {{-- ATIVO --}}
            <div class="col-md-6 d-flex align-items-end">
              <div class="form-check">
                <input class="form-check-input"
                       type="checkbox"
                       name="is_active"
                       value="1"
                       checked>
                <label class="form-check-label">
                    Serviço ativo
                </label>
              </div>
            </div>

              
          </div>

          <div class="text-end mt-4">
              <button type="submit" class="btn btn-primary px-4">Salvar Serviço</button>
          </div>
        </form>
      </div> <!-- fim do modal-body -->

    </div>
  </div>
</div>



@endsection
