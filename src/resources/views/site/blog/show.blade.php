@extends('layouts.site')

@section('content')
       <!-- Hero Section -->
       <section class="hero-section-about ">
        <div class="hero-section-container">
            <div class="row align-items-center ">
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                    <h1 class="hero-title">Detalhes</h1>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 hero-section-container-image">
                <div class="hand-sobre"  style="background-image: url('{{ asset('assets/img/Hand1.jpg') }}');
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

   
   <div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Título --}}
            <h1 class="mb-3 fw-bold">{{ $post->title }}</h1>

            {{-- Imagem destacada (se houver) --}}
            @if ($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}"
                     class="img-fluid mb-4"
                     alt="{{ $post->title }}"
                     style="border-radius: 6px;">
            @endif

            {{-- Conteúdo --}}
            <div class="post-content" style="font-size: 1.1rem;">
                {!! nl2br(e($post->content)) !!}
            </div>

            
@if ($post->images->count() > 0)
    

    <div class="row g-4 mt-3">
        @foreach ($post->images as $image)
            <div class="col-12 col-md-6">
                <img src="{{ asset('storage/' . $image->image_path) }}"
                     class="img-fluid w-100"
                     style="border-radius: 8px; object-fit: cover;">
            </div>
        @endforeach
    </div>
@endif




            {{-- Botão de Compartilhar --}}
            <div class="mt-4">
                <button class="btn btn-primary">
                    <i class="fas fa-share-alt"></i> Compartilhar
                </button>
            </div>

        </div>
    </div>
</div>

   
     <section 
    style="
      background-image: 
        linear-gradient(rgba(218, 0, 123, 0.8), rgba(218, 0, 123, 0.8)),
        url('{{ asset('assets/img/Consulta-bg.png') }}');
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







