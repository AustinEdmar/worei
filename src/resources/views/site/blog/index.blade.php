@extends('layouts.site')

@section('content')
       <!-- Hero Section -->
       <section class="hero-section-about ">
        <div class="hero-section-container">
            <div class="row align-items-center ">
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                    <h1 class="hero-title">Blog</h1>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 hero-section-container-image">
                <div class="hand-sobre" style="background-image: url('assets/img/Hand1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 50vh;
    width: 120vh;">
                    
                  </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="search-container">
        <div class="container">
            <div class="row g-3 d-flex justify-content-end"">
                <!-- <div class="col-md-3">
                    <select class="form-select search-select">
                        <option>Todos</option>
                    </select>
                </div> -->
                <!-- <div class="col-md-3">
                    <select class="form-select search-select">
                        <option>Tipo</option>
                    </select>
                </div> -->
               <div class="col-md-4">
    <div class="search-wrapper position-relative">
        <input type="text" class="form-control search-input pr-3" placeholder="procurar">

        <button class="btn search-btn position-absolute end-0 top-50 translate-middle-y me-2 p-0" style="border: none; background: transparent;">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>

            </div>
        </div>
    </section>

    <!-- Projects -->
    <section class="projects-section">
        <div class="container">
            <div class="row">
                <!-- Project A -->
                   @if ($posts->isEmpty())
                        <tr>
                            <td colspan="10" class="text-center">
                                <div class="alert alert-info">
                                    Nenhuma postagem encontrada.
                                </div>
                            </td>
                        </tr>
                    @endif
         @foreach ($posts as $post)
<div class="col-lg-4">
    <a href="{{ route('site.blog.show', $post->id) }}" style="text-decoration: none; color: inherit;">
        <div class="card project-card">
            <div class="project-visual">
                @if ($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}"
                     class="img-fluid"
                     alt="Imagem de destaque"
                     style="object-fit: cover; border-radius: 6px;">
                @else
                    <span class="text-muted">Sem imagem</span>
                @endif
            </div>

            <div class="project-content">
                <span class="project-tag">Branding</span>
                <h3 class="project-title">{{ $post->title }}</h3>
                <p class="project-desc">{{ Str::limit($post->content, 50, '...') }}</p>
            </div>
        </div>
    </a>
</div>
@endforeach


           

                
                </div>
            </div>

            <div class="container">
                <div class=" mt-5 text-center">
                   @if ($posts->hasPages())
    <nav aria-label="Navegação de páginas" >
        <ul class="pagination justify-content-center pagination-sm">
            {{-- Botão Anterior --}}
            @if ($posts->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link"><i class="fas fa-angle-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $posts->previousPageUrl() }}" rel="prev">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
            @endif

            {{-- Números das páginas --}}
            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $posts->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            {{-- Botão Próximo --}}
            @if ($posts->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $posts->nextPageUrl() }}" rel="next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li> 
            @else
                <li class="page-item disabled">
                    <span class="page-link"><i class="fas fa-angle-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif

                    
                </div>
            </div>
        </div>
    </section>

     <!-- CTA Section -->
     <section 
    style="
      background-image: 
        linear-gradient(rgba(218, 0, 123, 0.8), rgba(218, 0, 123, 0.8)),
        url('./assets/img/Consulta-bg.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 80px 0;
    color: white;
    "
    >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="cta-title">Vamos</h1>
                    <h1 class="cta-title">Começar</h1>
                    
                </div>
                <div class="col-lg-6 text-start ">
                    <p class="mb-4" style="opacity: 0.9;">Junte-se a nós na construção de um futuro mais justo para todas as mulheres.</p>
                    <button class="btn btn-cta">
                        Consulta Gratuita <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection







