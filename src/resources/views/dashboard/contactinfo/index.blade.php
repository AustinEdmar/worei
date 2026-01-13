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
                        <th>Label </th>
                        <th>Valor</th>
                        <th>Ativo</th>
                        <th>Ações</th>


                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactsinfo as $info) 
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                               <!--  <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width:40px;height:40px;">MS</div> -->
                                <div>
                                    <div class="fw-semibold">{{$info->type}}</div>
                                    
                                </div>
                            </div>
                        </td>
                        <td>{{$info->value}}</td>
                        <td>{{$info->active}}</td>
                       
                        


                     
                      <td class="text-nowrap">
    {{-- Ver Post --}}
    <a href="{{ route('site.blog') }}" class="btn btn-sm btn-outline-primary me-1" title="Ver">
        <i class="bi bi-eye"></i>
    </a>

    {{-- Editar Post --}}
    <button 
    class="btn btn-sm btn-outline-success me-1" 
    data-bs-toggle="modal" 
     data-bs-target="#editPostModal-{{ $info->id }}"
    title="Editar">
    <i class="bi bi-pencil"></i>
</button>

    {{-- Excluir Post --}}
    <form action="{{ route('dashboard.contactinfo.destroy', $info->id) }}" method="POST" class="d-inline"
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

<div class="modal fade" id="editPostModal-{{ $info->id }}" tabindex="-1" aria-labelledby="editPostModalLabel-{{ $info->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPostModalLabel-{{ $info->id }}">Editar Contato Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action=" {{ route('dashboard.contactinfo.update', $info->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          

          <div class="col-md-12 mb-3">
                  <label for="type" class="form-label">Tipo</label>
                  <select name="type" id="type-{{ $info->id }}" class="form-select">
    <option value="email"     {{ $info->type === 'email' ? 'selected' : '' }}>Email</option>
    <option value="whatsapp"  {{ $info->type === 'whatsapp' ? 'selected' : '' }}>Whatsapp</option>
    <option value="facebook"  {{ $info->type === 'facebook' ? 'selected' : '' }}>Facebook</option>
    <option value="instagram" {{ $info->type === 'instagram' ? 'selected' : '' }}>Instagram</option>
    <option value="twitter"   {{ $info->type === 'twitter' ? 'selected' : '' }}>Twitter</option>
    <option value="linkedin"  {{ $info->type === 'linkedin' ? 'selected' : '' }}>Linkedin</option>
    <option value="youtube"   {{ $info->type === 'youtube' ? 'selected' : '' }}>Youtube</option>
    <option value="telegram"  {{ $info->type === 'telegram' ? 'selected' : '' }}>Telegram</option>
</select>

              </div>

              <div class="col-md-12 mb-3">
                 
              <input 
  name="value" 
  value="{{ old('value', $info->value) }}"
  placeholder="email ou numero" 
  required 
  class="form-control"
>

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

  @endforeach
<!-- Modal cadastro de post -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createPostModalLabel">Criar Contato Info</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body"> <!-- 🔥 Adicionado para permitir o scroll -->
        <form action=" {{ route('dashboard.contactinfo.store') }}" method="POST" enctype="multipart/form-data" class="p-3">
          @csrf
          <div class="row g-3">
              

              <div class="col-md-12">
                  <label for="type" class="form-label">Tipo</label>
                  <select name="type" id="type" class="form-select">
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

           

              <div class="col-md-12">
                  <input name="value" placeholder="email ou numero" required class="form-control">

              </div>  

              
          </div>

          <div class="text-end mt-4">
              <button type="submit" class="btn btn-primary px-4">Criar Contato Info</button>
          </div>
        </form>
      </div> <!-- fim do modal-body -->

    </div>
  </div>
</div>







@endsection
