@extends('layouts.site')

@section('content')
       <!-- Hero Section -->
       <section class="hero-section-about ">
        <div class="hero-section-container">
            <div class="row align-items-center ">
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                    <h1 class="hero-title">Eventos</h1>
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
                    <input type="text" class="form-control search-input" placeholder="procurar">
                </div>
                <div class="col-md-2">
                    <button class="btn search-btn w-100">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects -->
    <section class="projects-section">
        <div class="container">
            <div class="row">
                <!-- Project A -->
                <div class="col-lg-4">
                    <div class="card project-card">
                        <div class="project-visual">
                            <img src="assets/img/moca.jpg" alt="" class="img-fluid">
                           
                        </div>
                        <div class="project-content">
                            <span class="project-tag">Branding</span>
                            <h3 class="project-title ">Projecto A</h3>
                            <p class="project-desc ">Becoming the market leader for beauty product through personalized marketing</p>
                        </div>
                    </div>
                </div>

                <!-- Project B -->
                <div class="col-lg-4">
                    <div class="card project-card">
                        <div class="project-visual">
                            <img src="assets/img/moca.jpg" alt="" class="img-fluid">
                           
                        </div>
                        <div class="project-content">
                            <span class="project-tag">Branding</span>
                            <h3 class="project-title">Projecto B</h3>
                            <p class="project-desc">Becoming the market leader for beauty product through personalized marketing</p>
                        </div>
                    </div>
                </div>

                <!-- Project C -->
                <div class="col-lg-4">
                    <div class="card project-card">
                        <div class="project-visual">
                            <img src="assets/img/moca.jpg" alt="" class="img-fluid">
                            </div>
                        <div class="project-content">
                            <span class="project-tag">Branding</span>
                            <h3 class="project-title">Projecto C</h3>
                            <p class="project-desc">Becoming the market leader for beauty product through personalized marketing</p>
                        </div>
                    </div>
                
                    
                </div>

                
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-5 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                          <li class="page-item disabled">
                            <a class="page-link">Anterior</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Proximo</a>
                          </li>
                        </ul>
                      </nav>
                    
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




