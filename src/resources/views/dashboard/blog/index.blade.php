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
                Criar Postagem
            </button>
        </div>

        <!-- Tabela Responsiva -->
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Título</th>
                        <th>Categoria</th>
                        <th>Conteúdo</th>
                        <th>Imagem Destaque</th>
                        <th>Author</th>
                        <th>Destaque</th>
                       <!--  <th>Imagens</th> -->
                        <th>Data de Publicação</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post) 
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                               <!--  <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width:40px;height:40px;">MS</div> -->
                                <div>
                                    <div class="fw-semibold">{{$post->title}}</div>
                                    
                                </div>
                            </div>
                        </td>
                        <td>{{$post->category->name}}</td>
                       <td>{{ Str::limit($post->content, 50, '...') }}</td>
                        <td>
    @if ($post->featured_image)
        <img src="{{ asset('storage/' . $post->featured_image) }}"
             alt="Imagem de destaque"
             width="30" height="30"
             style="object-fit: cover; border-radius: 6px;">
    @else
        <span class="text-muted">Sem imagem</span>
    @endif
</td>


                        
                        <td>{{$post->author->name}}</td>
                        <td>{{$post->is_featured}}</td>
                        <!-- <td>
    @if ($post->images->count() > 0)
        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            @foreach ($post->images as $image)
                <img src="{{ asset('storage/' . $image->image_path) }}" 
                     alt="Imagem do post"
                     width="30" height="30"
                     style="object-fit: cover; border-radius: 6px;">
            @endforeach
        </div>
    @else
        <span class="text-muted">Sem imagens</span>
    @endif
</td> -->

                        <td>{{$post->created_at}}</td>
                        <td>{{$post->views}}</td>
                        <td>{{$post->status}}</td>
                      <td class="text-nowrap">
    {{-- Ver Post --}}
    <a href="{{ route('site.blog') }}" class="btn btn-sm btn-outline-primary me-1" title="Ver">
        <i class="bi bi-eye"></i>
    </a>

    {{-- Editar Post --}}
    <button 
    class="btn btn-sm btn-outline-success me-1" 
    data-bs-toggle="modal" 
    data-bs-target="#editPostModal-{{ $post->id }}"
    title="Editar">
    <i class="bi bi-pencil"></i>
</button>

    {{-- Excluir Post --}}
    <form action="{{ route('dashboard.blog.destroy', $post->id) }}" method="POST" class="d-inline"
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

<div class="modal fade" id="editPostModal-{{ $post->id }}" tabindex="-1" aria-labelledby="editPostModalLabel-{{ $post->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPostModalLabel-{{ $post->id }}">Editar Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('dashboard.blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Título -->
          <div class="mb-3">
            <label for="title-{{ $post->id }}" class="form-label">Título</label>
            <input type="text" name="title" id="title-{{ $post->id }}" class="form-control" value="{{ $post->title }}" required>
          </div>

          <!-- Conteúdo -->
          <div class="mb-3">
            <label for="content-{{ $post->id }}" class="form-label">Conteúdo</label>
            <textarea name="content" id="content-{{ $post->id }}" rows="4" class="form-control" required>{{ $post->content }}</textarea>
          </div>

          <!-- Categoria -->
          <div class="mb-3">
            <label for="category_id-{{ $post->id }}" class="form-label">Categoria</label>
            <select name="category_id" id="category_id-{{ $post->id }}" class="form-select" required>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}
                </option>
              @endforeach
            </select>
          </div>

          <!-- Status -->
          <div class="mb-3">
            <label for="status-{{ $post->id }}" class="form-label">Status</label>
            <select name="status" id="status-{{ $post->id }}" class="form-select">
              <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Rascunho</option>
              <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Publicado</option>
              <option value="archived" {{ $post->status == 'archived' ? 'selected' : '' }}>Arquivado</option>
            </select>
          </div>

          <!-- Imagem de destaque -->
          <div class="mb-3">
            <label for="featured_image-{{ $post->id }}" class="form-label">Imagem de destaque</label>
            <input type="file" name="featured_image" id="featured_image-{{ $post->id }}" class="form-control">
            @if($post->featured_image)
              <img src="{{ asset('storage/'.$post->featured_image) }}" class="img-thumbnail mt-2" style="max-height: 100px;">
            @endif
          </div>

          <!-- Outras imagens -->
          <div class="mb-3">
            <label for="images-{{ $post->id }}" class="form-label">Outras imagens</label>
            <div id="removed-images-container-{{ $post->id }}"></div> <!-- input hidden para IDs removidos -->
            <input type="file" name="images[]" id="images-{{ $post->id }}" class="form-control" multiple accept="image/*">
            <div id="preview-{{ $post->id }}" class="d-flex flex-wrap gap-2 mt-2"></div>
          </div>

          <!-- Botão -->
          <div class="text-end">
            <button type="submit" class="btn btn-success">Atualizar Post</button>
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
        <h1 class="modal-title fs-5" id="createPostModalLabel">Criar Novo Post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body"> <!-- 🔥 Adicionado para permitir o scroll -->
        <form action="{{ route('dashboard.blog.store') }}" method="POST" enctype="multipart/form-data" class="p-3">
          @csrf
          <div class="row g-3">
              <div class="col-12">
                  <label for="title" class="form-label">Título</label>
                  <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
              </div>

              <div class="col-12">
                  <label for="content" class="form-label">Conteúdo</label>
                  <textarea name="content" id="content" rows="2" class="form-control" required>{{ old('content') }}</textarea>
              </div>

              <div class="col-md-6">
                  <label for="category_id" class="form-label">Categoria</label>
                  <select name="category_id" id="category_id" class="form-select" required>
                      <option value="">Selecione uma categoria</option>
                      @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="col-md-6">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" id="status" class="form-select">
                      <option value="draft">Rascunho</option>
                      <option value="published">Publicado</option>
                      <option value="archived">Arquivado</option>
                  </select>
              </div>

              <div class="col-md-6">
                  <label for="featured_image" class="form-label">Imagem de destaque</label>
                  <input type="file" name="featured_image" id="featured_image" class="form-control">
              </div>

              <div class="col-md-6">
                  <label for="images" class="form-label">Outras imagens</label>
                  <input type="file" name="images[]" id="images" class="form-control" multiple accept="image/*">
                  <div id="preview" class="d-flex flex-wrap gap-2 mt-2"></div>
              </div>
          </div>

          <div class="text-end mt-4">
              <button type="submit" class="btn btn-primary px-4">Salvar Post</button>
          </div>
        </form>
      </div> <!-- fim do modal-body -->

    </div>
  </div>
</div>

{{-- Preview de imagens cumulativo com opção de remover --}}
<script>
const input = document.getElementById('images');
const preview = document.getElementById('preview');

// Cria uma lista para armazenar as imagens selecionadas
let selectedFiles = [];

input.addEventListener('change', function (e) {
    const newFiles = Array.from(e.target.files);

    // Adiciona novos arquivos à lista existente
    selectedFiles = selectedFiles.concat(newFiles);

    // Atualiza o input com todos os arquivos
    const dt = new DataTransfer();
    selectedFiles.forEach(file => dt.items.add(file));
    input.files = dt.files;

    // Atualiza o preview visual
    renderPreview();
});

function renderPreview() {
    preview.innerHTML = '';

    selectedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (ev) {
            const container = document.createElement('div');
            container.classList.add('position-relative');
            container.style.width = '80px';
            container.style.height = '80px';

            const img = document.createElement('img');
            img.src = ev.target.result;
            img.classList.add('rounded', 'shadow-sm', 'w-100', 'h-100');
            img.style.objectFit = 'cover';

            const removeBtn = document.createElement('button');
            removeBtn.innerHTML = '×';
            removeBtn.classList.add('btn', 'btn-sm', 'btn-danger', 'position-absolute');
            removeBtn.style.top = '-8px';
            removeBtn.style.right = '-8px';
            removeBtn.style.borderRadius = '50%';
            removeBtn.style.width = '22px';
            removeBtn.style.height = '22px';
            removeBtn.style.padding = '0';
            removeBtn.style.lineHeight = '18px';
            removeBtn.style.fontWeight = 'bold';
            removeBtn.style.cursor = 'pointer';

            removeBtn.addEventListener('click', function () {
                // Remove da lista
                selectedFiles.splice(index, 1);

                // Atualiza input e preview
                const dt = new DataTransfer();
                selectedFiles.forEach(file => dt.items.add(file));
                input.files = dt.files;
                renderPreview();
            });

            container.appendChild(img);
            container.appendChild(removeBtn);
            preview.appendChild(container);
        };
        reader.readAsDataURL(file);
    });
}
</script>

<!-- modal edit -->
 <script>
function initImagePreview(postId, existingImages = []) {
    const input = document.getElementById(`images-${postId}`);
    const preview = document.getElementById(`preview-${postId}`);
    const removedContainer = document.getElementById(`removed-images-container-${postId}`);

    let selectedFiles = [];
    let currentExisting = existingImages.map(img => ({ ...img }));

    function renderPreview() {
        preview.innerHTML = '';
        removedContainer.innerHTML = '';

        // imagens existentes
        currentExisting.forEach((img, index) => {
            const container = document.createElement('div');
            container.classList.add('position-relative');
            container.style.width = '80px';
            container.style.height = '80px';

            const imageEl = document.createElement('img');
            imageEl.src = img.url;
            imageEl.classList.add('rounded', 'shadow-sm', 'w-100', 'h-100');
            imageEl.style.objectFit = 'cover';

            const removeBtn = document.createElement('button');
            removeBtn.innerHTML = '×';
            removeBtn.classList.add('btn', 'btn-sm', 'btn-danger', 'position-absolute');
            removeBtn.style.top = '-8px';
            removeBtn.style.right = '-8px';
            removeBtn.style.borderRadius = '50%';
            removeBtn.style.width = '22px';
            removeBtn.style.height = '22px';
            removeBtn.style.padding = '0';
            removeBtn.style.lineHeight = '18px';
            removeBtn.style.fontWeight = 'bold';
            removeBtn.style.cursor = 'pointer';

            removeBtn.addEventListener('click', function () {
                // adiciona input hidden para deletar no backend
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'remove_images[]';
                hiddenInput.value = img.id;
                removedContainer.appendChild(hiddenInput);

                currentExisting.splice(index, 1);
                renderPreview();
            });

            container.appendChild(imageEl);
            container.appendChild(removeBtn);
            preview.appendChild(container);
        });

        // novas imagens
        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (ev) {
                const container = document.createElement('div');
                container.classList.add('position-relative');
                container.style.width = '80px';
                container.style.height = '80px';

                const img = document.createElement('img');
                img.src = ev.target.result;
                img.classList.add('rounded', 'shadow-sm', 'w-100', 'h-100');
                img.style.objectFit = 'cover';

                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '×';
                removeBtn.classList.add('btn', 'btn-sm', 'btn-danger', 'position-absolute');
                removeBtn.style.top = '-8px';
                removeBtn.style.right = '-8px';
                removeBtn.style.borderRadius = '50%';
                removeBtn.style.width = '22px';
                removeBtn.style.height = '22px';
                removeBtn.style.padding = '0';
                removeBtn.style.lineHeight = '18px';
                removeBtn.style.fontWeight = 'bold';
                removeBtn.style.cursor = 'pointer';

                removeBtn.addEventListener('click', function () {
                    selectedFiles.splice(index, 1);
                    updateInputFiles();
                    renderPreview();
                });

                container.appendChild(img);
                container.appendChild(removeBtn);
                preview.appendChild(container);
            };
            reader.readAsDataURL(file);
        });
    }

    function updateInputFiles() {
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        input.files = dt.files;
    }

    input.addEventListener('change', function (e) {
        const newFiles = Array.from(e.target.files);
        selectedFiles = selectedFiles.concat(newFiles);
        updateInputFiles();
        renderPreview();
    });

    renderPreview();
}

// Inicializando para cada post
@foreach($posts as $post)
initImagePreview('{{ $post->id }}', [
    @foreach($post->images as $image)
    { id: '{{ $image->id }}', url: '{{ asset("storage/".$image->image_path) }}' },
    @endforeach
]);
@endforeach



</script>




@endsection
