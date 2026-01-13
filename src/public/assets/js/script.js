
const links = document.querySelectorAll('.nav-link');
    const currentPage = window.location.pathname;
  
    links.forEach(link => {
      const linkPath = new URL(link.href).pathname;
      if (linkPath === currentPage) {
        link.classList.add('active');
      }
    });

/* 5 - Testemunhos */

class TestimonialCarousel {
  constructor() {
      this.currentSlide = 0;
      this.totalSlides = 3;
      this.track = document.getElementById('carouselTrack');
      this.prevBtn = document.getElementById('prevBtn');
      this.nextBtn = document.getElementById('nextBtn');
      this.indicators = document.querySelectorAll('.indicator');
      this.autoplayInterval = null;
      
      this.init();
  }

  init() {
      this.prevBtn.addEventListener('click', () => this.prevSlide());
      this.nextBtn.addEventListener('click', () => this.nextSlide());
      
      this.indicators.forEach((indicator, index) => {
          indicator.addEventListener('click', () => this.goToSlide(index));
      });

      this.updateButtons();
      this.startAutoplay();
      
      // Pause autoplay on hover
      const section = document.querySelector('.testimonial-section');
      section.addEventListener('mouseenter', () => this.stopAutoplay());
      section.addEventListener('mouseleave', () => this.startAutoplay());
      
      // Touch support for mobile
      this.addTouchSupport();
  }

  goToSlide(slideIndex) {
      this.currentSlide = slideIndex;
      const translateX = -slideIndex * 100;
      this.track.style.transform = `translateX(${translateX}%)`;
      this.updateIndicators();
      this.updateButtons();
  }

  nextSlide() {
      if (this.currentSlide < this.totalSlides - 1) {
          this.goToSlide(this.currentSlide + 1);
      } else {
          this.goToSlide(0); // Loop back to first slide
      }
  }

  prevSlide() {
      if (this.currentSlide > 0) {
          this.goToSlide(this.currentSlide - 1);
      } else {
          this.goToSlide(this.totalSlides - 1); // Loop to last slide
      }
  }

  updateIndicators() {
      this.indicators.forEach((indicator, index) => {
          indicator.classList.toggle('active', index === this.currentSlide);
      });
  }

  updateButtons() {
      // For infinite loop, we don't disable buttons
      this.prevBtn.disabled = false;
      this.nextBtn.disabled = false;
  }

  startAutoplay() {
      this.stopAutoplay();
      this.autoplayInterval = setInterval(() => {
          this.nextSlide();
      }, 5000); // Change slide every 5 seconds
  }

  stopAutoplay() {
      if (this.autoplayInterval) {
          clearInterval(this.autoplayInterval);
          this.autoplayInterval = null;
      }
  }

  addTouchSupport() {
      let startX = 0;
      let currentX = 0;
      let isDragging = false;

      this.track.addEventListener('touchstart', (e) => {
          startX = e.touches[0].clientX;
          isDragging = true;
          this.stopAutoplay();
      });

      this.track.addEventListener('touchmove', (e) => {
          if (!isDragging) return;
          currentX = e.touches[0].clientX;
      });

      this.track.addEventListener('touchend', () => {
          if (!isDragging) return;
          isDragging = false;
          
          const diff = startX - currentX;
          if (Math.abs(diff) > 50) { // Minimum swipe distance
              if (diff > 0) {
                  this.nextSlide();
              } else {
                  this.prevSlide();
              }
          }
          
          this.startAutoplay();
      });
  }
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  new TestimonialCarousel();
});

// ========================================
// 1. SISTEMA DE VÍDEOS INFINITOS
// ========================================
const VideoSystem = {
  videos: [
    "./assets/video/plano-bg-1.mp4",
    "./assets/video/plano-bg-2.mp4", 
    "./assets/video/plano-bg-3.mp4"
  ],
  currentIndex: 0,
  video1: null,
  video2: null,
  activeVideo: null,
  nextVideo: null,
  isTransitioning: false,

  init() {
    this.video1 = document.getElementById('video1');
    this.video2 = document.getElementById('video2');
    
    if (!this.video1 || !this.video2) {
      console.error('Elementos de vídeo não encontrados');
      return;
    }

    this.activeVideo = this.video1;
    this.nextVideo = this.video2;
    
    this.setupErrorHandlers();
    this.setupVisibilityHandler();
    this.initializeVideoSystem();
  },

  preloadVideo(video, src) {
    return new Promise((resolve, reject) => {
      video.src = src;
      video.load();
      
      const onCanPlay = () => {
        video.removeEventListener('canplay', onCanPlay);
        video.removeEventListener('error', onError);
        resolve();
      };
      
      const onError = () => {
        video.removeEventListener('canplay', onCanPlay);
        video.removeEventListener('error', onError);
        reject(new Error('Erro ao carregar vídeo'));
      };
      
      video.addEventListener('canplay', onCanPlay);
      video.addEventListener('error', onError);
      
      setTimeout(() => {
        if (video.readyState >= 2) {
          onCanPlay();
        }
      }, 100);
    });
  },

  async preloadAndPlayNext() {
    if (this.isTransitioning) return;
    this.isTransitioning = true;
    
    try {
      this.currentIndex = (this.currentIndex + 1) % this.videos.length;
      
      await this.preloadVideo(this.nextVideo, this.videos[this.currentIndex]);
      
      this.nextVideo.currentTime = 0;
      await this.nextVideo.play();
      
      requestAnimationFrame(() => {
        this.nextVideo.classList.add('active');
        this.activeVideo.classList.remove('active');
      });
      
      setTimeout(() => {
        [this.activeVideo, this.nextVideo] = [this.nextVideo, this.activeVideo];
        
        this.nextVideo.pause();
        this.nextVideo.currentTime = 0;
        
        this.setupVideoEvents();
        this.isTransitioning = false;
      }, 1000);
      
    } catch (error) {
      console.error('Erro na transição de vídeo:', error);
      this.isTransitioning = false;
      
      setTimeout(() => {
        this.preloadAndPlayNext();
      }, 1000);
    }
  },

  setupVideoEvents() {
    this.activeVideo.removeEventListener('ended', this.preloadAndPlayNext.bind(this));
    this.activeVideo.removeEventListener('timeupdate', this.checkNearEnd.bind(this));
    
    this.activeVideo.addEventListener('ended', this.preloadAndPlayNext.bind(this));
    this.activeVideo.addEventListener('timeupdate', this.checkNearEnd.bind(this));
  },

  checkNearEnd() {
    if (this.activeVideo.duration && this.activeVideo.currentTime) {
      const timeLeft = this.activeVideo.duration - this.activeVideo.currentTime;
      
      if (timeLeft <= 2 && timeLeft > 1.5 && !this.isTransitioning) {
        const nextIndex = (this.currentIndex + 1) % this.videos.length;
        this.preloadVideo(this.nextVideo, this.videos[nextIndex]).catch(console.error);
      }
    }
  },

  async initializeVideoSystem() {
    try {
      await this.preloadVideo(this.activeVideo, this.videos[this.currentIndex]);
      
      this.activeVideo.currentTime = 0;
      await this.activeVideo.play();
      
      this.setupVideoEvents();
      
      console.log('Sistema de vídeo inicializado com sucesso');
      
    } catch (error) {
      console.error('Erro na inicialização:', error);
      setTimeout(() => this.initializeVideoSystem(), 2000);
    }
  },

  setupVisibilityHandler() {
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) {
        this.activeVideo.pause();
      } else {
        if (!this.isTransitioning) {
          this.activeVideo.play().catch(console.error);
        }
      }
    });
  },

  setupErrorHandlers() {
    const handleVideoError = (video, videoName) => {
      video.addEventListener('error', (e) => {
        console.error(`Erro no ${videoName}:`, e);
        setTimeout(() => {
          if (!this.isTransitioning) {
            this.initializeVideoSystem();
          }
        }, 3000);
      });
    };

    handleVideoError(this.video1, 'video1');
    handleVideoError(this.video2, 'video2');
  }
};

// ========================================
// 2. SISTEMA DE NAVBAR TRANSPARENTE
// ========================================
window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
})

// ========================================
// 3. SISTEMA DE SMOOTH SCROLL COM GSAP
// ========================================
const SmoothScrollSystem = {
  init() {
    // Verificar se GSAP está disponível
    if (typeof gsap === 'undefined') {
      console.warn('GSAP não encontrado, usando smooth scroll nativo');
      this.setupNativeScroll();
      return;
    }

    gsap.registerPlugin(ScrollToPlugin);
    this.setupGSAPScroll();
  },

  setupGSAPScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();

        const target = document.querySelector(link.getAttribute("href"));
        if (!target) return;

        // Calcular offset do navbar
        const navbar = document.querySelector('.navbar');
        const navbarHeight = navbar ? navbar.offsetHeight : 80;

        gsap.to(window, {
          duration: 1.2,
          scrollTo: {
            y: target,
            offsetY: navbarHeight
          },
          ease: "power3.inOut"
        });
      });
    });
  },

  setupNativeScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        
        const targetId = link.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        
        if (targetSection) {
          const navbar = document.querySelector('.navbar');
          const navbarHeight = navbar ? navbar.offsetHeight : 80;
          const targetPosition = targetSection.offsetTop - navbarHeight;
          
          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
        }
      });
    });
  }
};

// ========================================
// 4. INICIALIZAÇÃO GERAL
// ========================================
function initializeApp() {
  console.log('Inicializando aplicação...');
  
  // Inicializar sistemas
  VideoSystem.init();
  
  SmoothScrollSystem.init();
  
  console.log('Todos os sistemas inicializados');
}

// Aguardar DOM estar pronto
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initializeApp);
} else {
  initializeApp();
}

// Exportar para debug (opcional)
window.AppSystems = {
  VideoSystem,
  NavbarSystem,
  SmoothScrollSystem
};

  gsap.registerPlugin(ScrollToPlugin);

  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();

      const target = document.querySelector(this.getAttribute("href"));
      if (!target) return;

      gsap.to(window, {
        duration: 1, // Tempo constante: 2 segundos
        scrollTo: {
          y: target,
          offsetY: 0 // Ajuste aqui se quiser parar antes do topo
        },
        ease: "power3.inOut" // <--- aqui está o segredo: sem aceleração, sem desaceleração
      });
    });
  });



  // 3- Sistema de navbar transparente com scroll
// Sistema de navbar transparente com scroll
document.addEventListener('DOMContentLoaded', function() {
  const navbar = document.querySelector('.navbar');
  const heroSection = document.querySelector('.hero-section');
  
  // Função para controlar o navbar baseado no scroll
  function handleNavbarScroll() {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      const heroHeight = heroSection ? heroSection.offsetHeight : window.innerHeight;
      
      // O navbar muda quando começar a rolar (mais responsivo)
      const triggerPoint = 50; // 50px de scroll
      
      if (scrollTop > triggerPoint) {
          navbar.classList.add('scrolled');
      } else {
          navbar.classList.remove('scrolled');
      }
  }
  
  // Throttle function para otimizar performance
  function throttle(func, limit) {
      let inThrottle;
      return function() {
          const args = arguments;
          const context = this;
          if (!inThrottle) {
              func.apply(context, args);
              inThrottle = true;
              setTimeout(() => inThrottle = false, limit);
          }
      }
  }
  
  // Event listener otimizado para scroll
  const throttledScrollHandler = throttle(handleNavbarScroll, 10);
  window.addEventListener('scroll', throttledScrollHandler);
  
  // Verificar posição inicial (caso a página carregue com scroll)
  handleNavbarScroll();
  
  // Smooth scroll para links internos
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const targetId = this.getAttribute('href');
          const targetSection = document.querySelector(targetId);
          
          if (targetSection) {
              // Calcular offset considerando a altura do navbar
              const navbarHeight = navbar.offsetHeight;
              const targetPosition = targetSection.offsetTop - navbarHeight;
              
              window.scrollTo({
                  top: targetPosition,
                  behavior: 'smooth'
              });
          }
      });
  });
  
  // Fechar menu mobile ao clicar em link
  const navLinks = document.querySelectorAll('.nav-link');
  const navbarCollapse = document.querySelector('.navbar-collapse');
  
  navLinks.forEach(link => {
      link.addEventListener('click', () => {
          if (navbarCollapse.classList.contains('show')) {
              const bsCollapse = new bootstrap.Collapse(navbarCollapse);
              bsCollapse.hide();
          }
      });
  });
  
  // Adicionar efeito de hover nos links
  navLinks.forEach(link => {
      link.addEventListener('mouseenter', function() {
          this.style.transform = 'translateY(-2px)';
      });
      
      link.addEventListener('mouseleave', function() {
          this.style.transform = 'translateY(0)';
      });
  });
  
  // Intersection Observer para animações quando elementos entram na viewport
  const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
  };
  
  const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              entry.target.style.opacity = '1';
              entry.target.style.transform = 'translateY(0)';
          }
      });
  }, observerOptions);
  
  // Observar elementos que devem aparecer com animação
  document.querySelectorAll('.hero-content, .saiba-mais').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(el);
  });
  
  // Efeito paralaxe sutil no hero
  window.addEventListener('scroll', throttle(() => {
      const scrolled = window.pageYOffset;
      const heroOverlay = document.querySelector('.hero-overlay');
      
      if (heroOverlay && scrolled < window.innerHeight) {
          const speed = scrolled * 0.5;
          heroOverlay.style.transform = `translateY(${speed}px)`;
      }
  }, 16)); // ~60fps
  
  console.log('Sistema de navbar transparente inicializado');
});


/* 4 - contagem  */

gsap.registerPlugin(ScrollTrigger);

        // Função para animar contadores
        function animateCounters() {
            const numbers = document.querySelectorAll('.stat-number');
            
            numbers.forEach(number => {
                const target = parseInt(number.getAttribute('data-target'));
                const obj = { value: 0 };
                
                gsap.to(obj, {
                    value: target,
                    duration: 2,
                    ease: "power2.out",
                    onUpdate: function() {
                        const currentValue = Math.ceil(obj.value);
                        number.textContent = currentValue + '+';
                    }
                });
            });
        }

        // Ativar contagem no scroll
        ScrollTrigger.create({
            trigger: ".stats-section",
            start: "top 80%",
            onEnter: animateCounters,
            once: true // Executa apenas uma vez
        });

        // Ativar contagem ao carregar/atualizar página (se já estiver visível)
        window.addEventListener('load', () => {
            const section = document.querySelector('.stats-section');
            const rect = section.getBoundingClientRect();
            const isVisible = rect.top < window.innerHeight * 0.8;
            
            if (isVisible) {
                animateCounters();
            }
        });

       

