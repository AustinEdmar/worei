@extends('layouts.site')

@section('content')
  <!-- Hero Section -->
  <section class="hero-section-about ">
    <div class="hero-section-container">
      <div class="row align-items-center ">
        <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
          <h1 class="hero-title">Sobre nos</h1>
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

  <!-- About Section -->
  <section class="about-section" id="sobre">
    <div class="container">
      <div class="row mb-4">
        <div class="col-lg-2 ">
          <span class="about-badge">Sobre nós</span>

        </div>
        <div class="col-lg-10">
          <h2 class="about-title">
            A Worei é dedicada a fornecer apoio sobre os direitos das mulheres para atender às
            <span class="highlight-pink">necessidades</span> exclusivas da causa
          </h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <p class="about-text">É só você ter determinado algoritmo respeitar nosso discurso, validade sequência trabalho
            aceitei ser assunto político.</p>
          <p class="about-text">É só você ter determinado algoritmo respeitar nosso discurso, validade sequência trabalho
            aceitei ser assunto político.</p>
        </div>
        <div class="col-md-6 mb-4">
          <p class="about-text">É só você ter determinado algoritmo respeitar nosso discurso, validade sequência trabalho
            aceitei ser assunto político.</p>
          <p class="about-text">É só você ter determinado algoritmo respeitar nosso discurso, validade sequência trabalho
            aceitei ser assunto político.</p>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          <p class="about-text">É só você ter determinado algoritmo respeitar nosso discurso, validade sequência trabalho
            aceitei ser assunto político.</p>
          <p class="about-text">É só você ter determinado algoritmo respeitar nosso discurso, validade sequência trabalho
            aceitei ser assunto político.</p>
        </div>
        <div class="col-md-6 mb-4">
          <p class="about-text">É só você ter determinado algoritmo respeitar nosso discurso, validade sequência trabalho
            aceitei ser assunto político.</p>
          <p class="about-text">É só você ter determinado algoritmo respeitar nosso discurso, validade sequência trabalho
            aceitei ser assunto político.</p>
        </div>

      </div>


    </div>
  </section>



  <!-- Activities Section -->
  <section class="activities-section py-5">
    <div class="container">
      <!-- Cabeçalho -->
      <div class="row mb-5 align-items-center">
        <div class="col-lg-2 ">
          <span class="about-badge text-white">NOSSAS SOLUÇÕES</span>

        </div>
        <div class="col-lg-10">
          <h2 class="fw-bold" style="font-size: 1.8rem; line-height: 1.3;">
            Nossas <span style="background: #FF00B4; color: white; padding: 0 6px;">soluções exclusivas</span> são
            adaptadas aos seus
            objetivos específicos, para que você possa dominar sua concorrência e deixar uma
            <span style="background: #FF00B4; color: white; padding: 0 6px;">impressão</span>
          </h2>
        </div>
      </div>

      <!-- Cards -->
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
            <img src="assets/img/pic-didi-sentada.jpg" alt="Visitas de Pessoas" class="w-100"
              style="height: 250px; object-fit: cover;">
            <div class="card-body text-center">
              <button class="btn btn-lg text-white w-100" style="background: #FF00B4; border-radius: 8px;">
                Visitas de Pessoas
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
            <img src="assets/img/pic-didi-sentada.jpg" alt="Oferta de Comida" class="w-100"
              style="height: 250px; object-fit: cover;">
            <div class="card-body text-center">
              <button class="btn btn-lg text-white w-100" style="background: #FF00B4; border-radius: 8px;">
                Oferta de Comida
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
            <img src="assets/img/pic-didi-sentada.jpg" alt="Doação de Sopa" class="w-100"
              style="height: 250px; object-fit: cover;">
            <div class="card-body text-center">
              <button class="btn btn-lg text-white w-100" style="background: #FF00B4; border-radius: 8px;">
                Doação de Sopa
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->


  <section class=" py-5" style="
            background-image: linear-gradient(
                rgba(154, 24, 246, 0.8),
                rgba(154, 24, 246, 0.8)
            ), url('/assets/img/Consulta-bg.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            font-family: 'Space Grotesk', sans-serif;
            padding: 80px 0;
            ">
    <div class="container">
      <!-- Cabeçalho -->
      <div class="row mb-5 align-items-center">
        <div class="col-lg-2 ">
          <span class="about-badge text-white">NOSSA EQUIPE</span>

        </div>
        <div class="col-lg-10">
          <h2 class="fw-bold" style="font-size: 1.8rem; line-height: 1.3;">
            Conheça todo o grupo de apoio à Worei, <span class="highlight-pink-text">composto por mulheres
              empoderadas</span>
          </h2>
        </div>
      </div>

      <!-- Cards -->
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
            <img
              src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
              class="w-100" style="height: 250px; object-fit: cover;">
            <div class="card-body text-center">
              <h4 class="fw-semibold mb-0">Diolinda Rodrigues</h4>
              <p class="text-secondary">CEO Unitel</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
            <img
              src="https://images.unsplash.com/photo-1531123897727-8f129e1688ce?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
              class="w-100" style="height: 250px; object-fit: cover;">
            <div class="card-body text-center">
              <h4 class="fw-semibold mb-0">Luis Santiago</h4>
              <p class="text-secondary">Gestora Bancaria</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 12px;">
            <img
              src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
              class="w-100" style="height: 250px; object-fit: cover;">
            <div class="card-body text-center ">
              <h4 class="fw-semibold mb-0">Maria da Penha</h4>
              <p class="text-secondary">Advogada de direito</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Partners Section -->
  <section class="partners-section">
    <div class="container text-center">
      <p class="partners-subtitle">Confiável para mais de</p>
      <h3 class="partners-title">150 empresas desde 2012</h3>
      <div class="row align-items-center justify-content-center">
        <div class="col-6 col-md-2 mb-4">
          <img src="assets/img/chevron.png" class="partner-logo" alt="Partner">
        </div>
        <div class="col-6 col-md-2 mb-4">
          <img src="assets/img/AfricellLogo.png" class="partner-logo" alt="Partner">
        </div>
        <div class="col-6 col-md-2 mb-4">
          <img src="assets/img/movicel.jpg" class="partner-logo" alt="Partner">
        </div>
        <div class="col-6 col-md-2 mb-4">
          <img src="assets/img/total_7.png" class="partner-logo" alt="Partner">
        </div>
        <div class="col-6 col-md-2 mb-4">
          <img src="assets/img/sonangol.png" class="partner-logo" alt="Partner">
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section style="
          background-image: 
            linear-gradient(rgba(218, 0, 123, 0.8), rgba(218, 0, 123, 0.8)),
            url('./assets/img/Consulta-bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 80px 0;
        color: white;
        ">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="cta-title">Vamos</h1>
          <h1 class="cta-title">Começar</h1>

        </div>
        <div class="col-lg-6 text-start ">
          <p class="mb-4" style="opacity: 0.9;">Junte-se a nós na construção de um futuro mais justo para todas as
            mulheres.</p>
          <button class="btn btn-cta">
            Consulta Gratuita <i class="fas fa-arrow-right ms-2"></i>
          </button>
        </div>
      </div>
    </div>
  </section>
@endsection