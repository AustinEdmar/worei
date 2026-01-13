@extends('layouts.site')

@section('content')

    <!-- Hero Section -->
    <section class="hero-section-about ">
        <div class="hero-section-container">
            <div class="row align-items-center ">
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex align-items-center justify-content-center">
                    <h1 class="hero-title">Contacte-nos</h1>
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

    <!-- Contact Form Section -->
    <section class="contact-section">
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-6">
                <div class="contact-badge"></div>
                <span class="about-badge text-white">ENTRE EM CONTATO</span>

                <h2 class="fw-bold" style="font-size: 1.8rem; line-height: 1.3;">
                    É hora de falar<br>
                    sobre <span class="highlight-pink">seu projeto</span>
                </h2>
            </div>

            <div class="col-lg-6">
                <p class="contact-description">
                    O {{ config('app.name') }}, acreditamos no poder de conectar pessoas significativas.
                    Seja para tirar dúvidas, ter uma ideia brilhante ou começar um projeto,
                    estamos aqui e ansiosos para ouvir você.
                </p>

                {{-- Mensagem de sucesso --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Erros --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('contacts.store') }}">
                    @csrf

                    <div class="form-group">
                        <input
                            type="text"
                            name="name"
                            class="form-control underline-input"
                            placeholder="Nome"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <input
                            type="email"
                            name="email"
                            class="form-control underline-input"
                            placeholder="Email"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    {{-- Subject oculto (opcional) --}}
                    <input type="hidden" name="subject" value="Contato via site">

                    <div class="form-group">
                        <textarea
                            name="message"
                            class="form-control underline-input"
                            rows="2"
                            placeholder="Descrição"
                            required
                        >{{ old('message') }}</textarea>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-contacte-send btn-lg">
                            Enviar Mensagem
                            <img src="{{ asset('assets/img/seta.png') }}" alt="" class="ms-2">
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>


      <!-- Stats Section -->
      <section  id="sobre-nos" 
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
        "
      >
        <div class="container">
            <div class="row ">
                <!-- Texto CONTACTO --> 
                <div class="col-12 col-md-7 mb-5 mt-5 stats-section-contact ">
                    <div class="about-badge text-white">CONTACTO</div>
                    <h2 class="contact-info-title fw-bold" style="font-size: 1.8rem; line-height: 1.3;">
                        Sinta-se à vontade<br>
                        para Contactar-nos
                    </h2>
                </div>
            
                <!-- Bloco dos contatos -->
                <div class="col-12 col-md-5 mx-auto text-center text-md-start mb-5 mt-5 stats-section-content">

                    <div class="contact-item">
                        <i class="fas fa-envelope icon-color p-0 m-0"></i>
                        <div class="d-flex w-100 fw-bold">
                            <div class="contact-label">Email</div>
                            <div class="contact-value">support@worei.com</div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-whatsapp icon-color p-0 m-0"></i>
                        <div class="d-flex fw-bold">
                            <div class="contact-label">Whatsapp</div>
                            <div class="contact-value">244 923 90 90 90</div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-telegram icon-color p-0 m-0"></i>
                        <div class="d-flex fw-bold">
                            <div class="contact-label">Telegram</div>
                            <div class="contact-value">@worei</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>


    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="text-center mb-5">
                <div class="faq-badge">PERGUNTAS FREQUENTES</div>
                <h2 class="faq-title">
                    Podes explorar a seção de perguntas<br>
                    frequentes para obter <span class=" highlight-pink">respostas rápidas</span> e<br>
                    úteis às suas dúvidas comuns.
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item ">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <div class="faq-icon">
                                    <i class="fas fa-question"></i>
                                </div>
                                <h5 class="faq-question">Quais serviços a Worei oferece?</h5>
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                              <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                       
                        
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item ">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                <div class="faq-icon">
                                    <i class="fas fa-question"></i>
                                </div>
                                <h5 class="faq-question">Como faço formações ?</h5>
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                              <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                       
                        
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item ">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                <div class="faq-icon">
                                    <i class="fas fa-question"></i>
                                </div>
                                <h5 class="faq-question">Como falar com a equipa de suporte ?</h5>
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                              <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                       
                        
                      </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item ">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                                <div class="faq-icon">
                                    <i class="fas fa-question"></i>
                                </div>
                                <h5 class="faq-question">Aonde estão localizadas as formações?</h5>
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                              <strong>This is the first item’s accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                          </div>
                        </div>
                       
                        
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
