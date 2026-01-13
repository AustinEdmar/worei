@extends('layouts.site')

@section('content')

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center position-relative">
        <!-- Vídeos em camadas -->
        <video id="video1" class="hero-video active" autoplay muted playsinline></video>
        <video id="video2" class="hero-video" muted playsinline></video>
      
        <!-- Gradiente sobreposto -->
        <div class="hero-overlay"></div>
      
        <!-- Conteúdo -->
        <div class="container position-relative z-2">
          <div class="row">
            <div class="col-lg-12">
              
              <div class="hero-content text-center">
                <div class="star text-start">
                    <!-- Botão circular -->
    <a href="#seu-alvo">
       <!--  <img src="{{ asset('assets/img/Star 3.png') }}" alt=""> -->
      </a>
    </div>
                <h1 class="hero-title">
                  Seja ouvida. Seja livre.<br>
                  <span class="highlight-pink">Seja</span> dona da sua<br>
                  própria
                  <span class="highlight-pink"> história.</span>
                </h1>
               
              </div>
            </div>
<div class="position-absolute top-50 start-50 translate-middle d-flex justify-content-end align-items-end stroke-slide">
                <!-- Botão circular -->
<a href="#seu-alvo" class="circle-button">
   <!--  <img src="{{ asset('assets/img/arrow.png') }}" alt=""> -->
  </a>
</div>
  
          </div>
          <div class="saiba-mais d-flex align-items-center justify-content-center ">
            <a href="#sobre-nos" class="btn saiba-mais-btn">
                Saiba Mais
                <span class="scroll-icon ms-2">
                  <span class="scroll-dot"></span>
                </span>
              </a> 
          </div>
          
        </div>
      </section>

    <!-- Stats Section -->
    <section
   
    id="sobre-nos"
    style="
        background-image: linear-gradient(
            rgba(154, 24, 246, 0.8),
            rgba(154, 24, 246, 0.8)
        ), url('/assets/img/Consulta-bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        font-family: 'Space Grotesk', sans-serif;
        ">
    
    <div class="container">
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <div class="stat-number" data-target="10">30+</div>
                    <div class="stat-text">Eventos Promovidos</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <div class="stat-number" data-target="10">10+</div>
                    <div class="stat-text">Parceiras</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <div class="stat-number" data-target="150">150+</div>
                    <div class="stat-text">Mulheres orientadas</div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="stat-item">
                    <div class="stat-number" data-target="10">10+</div>
                    <div class="stat-text">Jovens transformadas</div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- About Section -->
    <section  class="about-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-2 ">
                    <span class="about-badge">Sobre nós</span>
                  
                </div>
                <div class="col-lg-10 ">
                    <h2 class="about-title">
                        A <span class="highlight-pink">WOREI</span> é uma associação sem fins lucrativos, 
                        virada para a defesa dos <span class="highlight-pink">direitos e dignidade das mulheres</span>
                    </h2>
                </div>
               
            </div>
            <div class="row">
                <div class="col-md-8  ">
                            <div class="img-1 ">
                                <img src="assets/img/moca.jpg" alt="Ação social" class="img-fluid sobre-img-1" > 
                            </div>
                </div>
                <div class="col-md-4  ">
                   <div class="img-2 sobre-img-2">
                    <img src="assets/img/woman-shoulder.jpg" alt="Ação social" class="img-fluid sobre-img-2">
                   </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicos" 
    style="
        background-image: linear-gradient(
            rgba(154, 24, 246, 0.8),
            rgba(154, 24, 246, 0.8)
        ), url('/assets/img/Consulta-bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        font-family: 'Space Grotesk', sans-serif;
        font-family: 'Space Grotesk', sans-serif;
        padding: 80px 0;
        ">
    
        <div class="container">
            <div class="col-lg-2 ">
                <span class="about-badge">Formações</span>  
            </div>
            <h2 class="services-title">Worei luta por equidade de <span class="highlight-pink">gênero e direitos humanos</span> </h2>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="service-card">
                        <div class="service-icons">
                          <img src="assets/img/curso.png" alt="" class="img-fluid">
                        </div>
                        <h3 class="service-title">Branding Design</h3>
                        <p class="text-secondary">Desenvolvemos identidades visuais que representam e fortalecem a presença feminina em diversos contextos sociais.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card">
                        <div class="service-icons">
                            <img src="assets/img/curso.png" alt="" class="img-fluid">
                        </div>
                        <h3 class="service-title">Marketing</h3>
                        <p class="text-secondary">Criamos campanhas que amplificam vozes femininas e promovem mudanças sociais significativas na comunidade.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card">
                        <div class="service-icons">
                            <img src="assets/img/curso.png" alt="" class="img-fluid">
                        </div>
                        <h3 class="service-title">Produção</h3>
                        <p class="text-secondary">Organizamos eventos e produções que celebram e fortalecem o papel da mulher na sociedade contemporânea.</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="./services.html" class="btn btn-more btn-lg">
                    Saiba mais 
                    <i class="fa-solid fa-circle-chevron-down ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="activities-section">
        <div class="container">
            <div class="col-lg-2 ">
                <span class="activities-badge">Nossas Atividades</span>
            </div>
            <div class="text-center">
              
                <h2 class="activities-title">
                    Acompanhe os <span class="highlight-pink">projetos</span> sobre as<br>
                    mais variadas atividades do<span class="highlight-pink"> WOREI</span>
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="activity-card">
                        <div class="activity-image">
                            <img src="assets/img/pic-didi-sentada.jpg" alt="" class="img-fluid " style="width: 100%; height: 100% !important; ">
                        </div>
                        <div class="activity-content text-center">
                           
                            <h4 class="activity-title">Visitas de Pessoas</h4>
                            <p class="text-secondary">Visitas regulares a comunidades 
                                locais para oferecer suporte e orientação
                                 personalizada.</p>
                                 <div class="text-center ">
                                    <button class="btn btn-activity  btn-lg">Ver mais  <img src="assets/img/seta.png" alt="" class="ms-2"></button>
                                </div>
                                
                        </div>
                       
                        
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="activity-card">
                        <div class="activity-image">
                            <img src="assets/img/pic-didi-sentada.jpg" alt="" class="img-fluid " style="width: 100%; height: 100% !important; ">
                        </div>
                        <div class="activity-content text-center">
                            <h4 class="activity-title">Oferta de Comida</h4>
                            <p class="text-secondary">Programas de distribuição 
                                de alimentos para mulheres e
                                 famílias em situação de 
                                 vulnerabilidade.</p>
                            <div class="text-center">
                                <button class="btn btn-activity btn-lg">Ver mais <img src="assets/img/seta.png" alt="" class="ms-2"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="activity-card">
                        <div class="activity-image">
                            <img src="assets/img/pic-didi-sentada.jpg" alt="" class="img-fluid " style="width: 100%; height: 100% !important; ">
                        </div>
                        <div class="activity-content text-center">
                            <h4 class="activity-title">Doação de Sopa</h4>
                            <p class="text-secondary">Distribuição de refeições quentes em comunidades carentes, priorizando mães e crianças.</p>
                            <div class="text-center">
                                <button class="btn btn-activity btn-lg">Ver mais <img src="assets/img/seta.png" alt="" class="ms-2"></button>
                            </div>
                        </div>
                       
                    </div>
                </div>
             
            </div>
             <div class="text-center mt-5">
                <a href="./blog.html" class="btn btn-more btn-lg">
                    Saiba mais 
                    <i class="fa-solid fa-circle-chevron-down ms-2"></i>
                </a>
            </div> 
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial-section cta-section">
        <div class="container">
            <div style="text-align: center; margin-bottom: 50px;">
                <span class="testimonial-badge">Testemunhos</span>
                <h2 style="font-size: 2.5rem; margin-bottom: 20px; font-weight: 300;">O que dizem sobre nós</h2>
                <p style="font-size: 1.1rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">Histórias reais de pessoas que transformaram suas vidas através dos nossos serviços</p>
           
            </div>

            <div class="carousel-container">
                <div class="carousel-wrapper">
                    <div class="carousel-track" id="carouselTrack">
                        <!-- Testemunho 1 -->
                        <div class="testimonial-slide">
                            <div class="star-rating">
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                            </div>
                            <blockquote class="testimonial-text">
                                O apoio que recebi mudou completamente a minha vida. Hoje tenho uma nova perspectiva e ferramentas para enfrentar os desafios diários com mais confiança e determinação.
                            </blockquote>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">MA</div>
                                <div class="author-info">
                                    <h5>Miralena Armando</h5>
                                    <small>Beneficiária há 2 anos</small>
                                </div>
                            </div>
                        </div>

                        <!-- Testemunho 2 -->
                        <div class="testimonial-slide">
                            <div class="star-rating">
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                            </div>
                            <blockquote class="testimonial-text">
                                Profissionais excepcionais e um atendimento humanizado que fez toda a diferença. Recomendo a todos que precisam de apoio e orientação.
                            </blockquote>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">JS</div>
                                <div class="author-info">
                                    <h5>João Silva</h5>
                                    <small>Beneficiário há 1 ano</small>
                                </div>
                            </div>
                        </div>

                        <!-- Testemunho 3 -->
                        <div class="testimonial-slide">
                            <div class="star-rating">
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                                <i class="fas fa-star star"></i>
                            </div>
                            <blockquote class="testimonial-text">
                                Encontrei aqui não apenas serviços, mas uma verdadeira família. O cuidado e a dedicação de toda a equipe são inspiradores e transformadores.
                            </blockquote>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">AF</div>
                                <div class="author-info">
                                    <h5>Ana Fernandes</h5>
                                    <small>Beneficiária há 3 anos</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-controls ">
                    <button class="carousel-btn  px-4" id="prevBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    
                    <div class="carousel-indicators" id="indicators">
                        <div class="indicator active" data-slide="0"></div>
                        <div class="indicator" data-slide="1"></div>
                        <div class="indicator" data-slide="2"></div>
                    </div>
                    
                    <button class="carousel-btn" id="nextBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
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

