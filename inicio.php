<?php
session_start();
include("menu.php");

include('funcoes.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - FlexStart Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/Logo (2).png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="inicio.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <h1 class="sitename">
          <div class="logo">
            <?php
            echo ("Bem-vindo(a), " . $_SESSION['nome']);
            ?>
          </div>
        </h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#inicio" class="active">Inicio<br></a></li>
          <li><a href="#jogos">Jogos</a></li>
          <li><a href="#conquistas">Conquistas</a></li>
          <li><a href="#equipe">Equipe</a></li>
          <li><a href="adicionar_perguntas.php">Criar Perguntas</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted flex-md-shrink-0" href="deslogar.php">Deslogar</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="inicio" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">NeuroLearn</h1>
            <p data-aos="fade-up" data-aos-delay="100">Plataforma educativa que utilize métodos eficazes, abordando o
              aprendizado por meio de repetição e reforço positivo.</p>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/Logo (2).png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->


    <!-- Alt Features Section -->
    <section id="alt-features" class="alt-features section">



      <!-- Services Section -->
      <section id="jogos" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Jogos</h2>
          <p>Vamos jogar? Escolha um Quiz!<br></p>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="service-item item-cyan position-relative">
                <i class="bi bi-activity icon"></i>
                <h3>Matemática</h3>
                <p>Questões sobre juros, descontos, prestações e cálculos financeiros simples.
                  Entenda como aplicar conceitos financeiros no seu cotidiano.</p>
                <a href="perguntas.php?msg=Matemática Financeira" class="read-more stretched-link"><span>Iniciar</span>
                  <i class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->


            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="service-item item-orange position-relative">
                <i class="bi bi-code-slash icon"></i>
                <h3>Programação</h3>
                <p>Perguntas sobre conceitos fundamentais, como variáveis, loops e algoritmos.
                  Teste suas habilidades de codificação de forma simples e prática.</p>
                <a href="perguntas.php?msg=Programação" class="read-more stretched-link"><span>Iniciar</span> <i
                    class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="service-item item-teal position-relative">
                <i class="bi bi-lightbulb icon"></i>
                <h3>Lógica</h3>
                <p>Desafios de raciocínio lógico aplicados a situações do dia a dia.
                  Veja como a lógica está presente em problemas simples e decisões cotidianas.</p>
                <a href="perguntas.php?msg=Lógica" class="read-more stretched-link"><span>Iniciar</span> <i
                    class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
              <div class="service-item item-pink position-relative">
                <i class="bi bi-plus icon"></i>
                <h3>Meu quiz</h3>
                <p>Perguntas variadas sobre diversos temas, adaptadas ao seu conhecimento.
                  Aqui você encontra desafios de acordo com seus interesses e curiosidades</p>
                <a href="perguntas.php?msg=Especial" class="read-more stretched-link"><span>Iniciar</span> <i
                    class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->
          </div>
        </div>

        </div>

        <!-- conquistas Section -->
        <section id="conquistas" class="portfolio section">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
            <h2>Conquistas</h2>
            <p>Verifique seu progresso de vitórias</p>
          </div><!-- End Section Title -->

          <div class="container">
            <!-- imprimir as conquistas de matemática -->


            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

              <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">Todos</li>
                <li data-filter=".filter-app">Matemática</li>
                <li data-filter=".filter-product">Programação</li>
                <li data-filter=".filter-branding">Lógica</li>
                <li data-filter=".filter-books">Bônus</li>
              </ul><!-- End Portfolio Filters -->

              <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                <?php
                // Conquistas Matemática
                for ($i = 0; $i < 3; $i++) { // Sempre exibimos 3 imagens
                  $figura = "assets/img/portfolio/silhueta.png"; // Imagem padrão: silhueta
                
                  // Define a imagem conforme a pontuação do usuário
                  if ($conquistas["pontuacao_tema1"] >= 1 && $i == 0) {
                    $figura = "assets/img/portfolio/Bronze.png"; // Primeira silhueta substituída por Bronze
                  }
                  if ($conquistas["pontuacao_tema1"] >= 3 && $i == 1) {
                    $figura = "assets/img/portfolio/Prata.png"; // Segunda silhueta substituída por Prata
                  }
                  if ($conquistas["pontuacao_tema1"] == 5 && $i == 2) {
                    $figura = "assets/img/portfolio/Ouro.png"; // Terceira silhueta substituída por Ouro
                  }
                  ?>
                  <!-- Estrutura HTML da conquista -->
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                      <img src="<?= $figura ?>" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Matemática</h4>
                        <p><?= $conquistasMat[$i] ?></p> <!-- Títulos das funções -->
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->
                  <?php
                }
                ?>

                <?php
                // Conquistas Matemática
                for ($i = 0; $i < 3; $i++) { // Sempre exibimos 3 imagens
                  $figura = "assets/img/portfolio/silhueta.png"; // Imagem padrão: silhueta
                
                  // Define a imagem conforme a pontuação do usuário
                  if ($conquistas["pontuacao_tema2"] >= 1 && $i == 0) {
                    $figura = "assets/img/portfolio/Bronze.png"; // Primeira silhueta substituída por Bronze
                  }
                  if ($conquistas["pontuacao_tema2"] >= 3 && $i == 1) {
                    $figura = "assets/img/portfolio/Prata.png"; // Segunda silhueta substituída por Prata
                  }
                  if ($conquistas["pontuacao_tema2"] == 5 && $i == 2) {
                    $figura = "assets/img/portfolio/Ouro.png"; // Terceira silhueta substituída por Ouro
                  }
                  ?>
                  <!-- Estrutura HTML da conquista -->
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <div class="portfolio-content h-100">
                      <img src="<?= $figura ?>" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Programção</h4>
                        <p><?= $conquistasProg[$i] ?></p> <!-- Títulos das funções -->
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->
                  <?php
                }
                ?>


                <?php
                // Conquistas Matemática
                for ($i = 0; $i < 3; $i++) { // Sempre exibimos 3 imagens
                  $figura = "assets/img/portfolio/silhueta.png"; // Imagem padrão: silhueta
                
                  // Define a imagem conforme a pontuação do usuário
                  if ($conquistas["pontuacao_tema3"] >= 1 && $i == 0) {
                    $figura = "assets/img/portfolio/Bronze.png"; // Primeira silhueta substituída por Bronze
                  }
                  if ($conquistas["pontuacao_tema3"] >= 3 && $i == 1) {
                    $figura = "assets/img/portfolio/Prata.png"; // Segunda silhueta substituída por Prata
                  }
                  if ($conquistas["pontuacao_tema3"] == 5 && $i == 2) {
                    $figura = "assets/img/portfolio/Ouro.png"; // Terceira silhueta substituída por Ouro
                  }
                  ?>
                  <!-- Estrutura HTML da conquista -->
                  <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                    <div class="portfolio-content h-100">
                      <img src="<?= $figura ?>" class="img-fluid" alt="">
                      <div class="portfolio-info">
                        <h4>Lógica</h4>
                        <p><?= $conquistasLog[$i] ?></p> <!-- Títulos das funções -->
                      </div>
                    </div>
                  </div><!-- End Portfolio Item -->
                  <?php
                }
                ?>


                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                  <div class="portfolio-content h-100">

                  </div>
                </div><!-- End Portfolio Item -->

                <?php
                // Verifica se o usuário tem pontuação máxima (5) em todos os temas
                if ($conquistas["pontuacao_tema1"] == 5 && $conquistas["pontuacao_tema2"] == 5 && $conquistas["pontuacao_tema3"] == 5) {
                  // Exibe o troféu Platina após o usuário conquistar todos os outros troféus
                  $figura = "assets/img/portfolio/Platina.png"; // Troféu Platina
                  $descricao = "Mestre dos Mestres";
                } else {
                  // Exibe a silhueta antes do usuário conquistar o Platina
                  $figura = "assets/img/portfolio/silhueta_platina.png"; // Silhueta
                  $descricao = "Conquiste todos os troféus para desbloquear o Platina";
                }
                ?>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                  <div class="portfolio-content h-100">
                    <img src="<?= $figura ?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4>Bônus</h4>
                      <p><?= $descricao ?></p>
                      </a>
                    </div>
                  </div>
                </div><!-- End Portfolio Item -->


              </div>
            </div>
          </div><!-- End Portfolio Item -->

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
            <div class="portfolio-content h-100">
            </div>
          </div><!-- End Portfolio Item -->
          </div><!-- End Portfolio Container -->
          </div>
          </div>
        </section><!-- /Portfolio Section -->
  </main>
  <section id="equipe">
    <div class="container">
      <div class="row gy-4" style="Justify-content:center">
        <div class="container section-title" data-aos="fade-up">
          <h2>Nossa Equipe</h2>
          <p>Conheça quem está atrás do site</p>
        </div><!-- End Section Title -->
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="team-member">
            <div class="member-img">
              <img src="assets/img/team/gledson (1).jpg" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>

              </div>
            </div>
            <div class="member-info">
              <h4>Glêdson Levy</h4>
              <span>Criador do Site</span>
              <p>Programador FullStack com experiência em JavaScript, PHP e SQL. Crio soluções inovadoras e escaláveis,
                sempre focando em performance e experiência do usuário.</p>
            </div>
          </div>
        </div><!-- End Team Member -->

        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="team-member">
            <div class="member-img">
              <img src="assets/img/team/gabriel (1).jpg" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
                <a href=""><i class="bi bi-reddit"></i></a>

              </div>
            </div>
            <div class="member-info">
              <h4>Gabriel Girão </h4>
              <span>Criador do Site</span>
              <p>Desenvolvedor Java com ampla experiência em back-end. Ele também contribuiu na estilização deste site,
                garantindo uma interface moderna e funcional. </p>
            </div>
          </div>
        </div><!-- End Team Member -->

      </div>

    </div>

  </section><!-- /Team Section -->
  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">NeuroLearn</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Morada Nova, CE, 62940-000</p>
            <p class="mt-3"><strong>Telefone:</strong> <span>+55 88 4002-8922</span></p>
            <p><strong>Email:</strong> <span>Neurolearn@gmail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Links Usuais</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#inicio">Inicio</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#jogos">Jogos</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#conquistas">Conquistas</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#equipe">Equipe</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Utilizado para criação</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="https://pt.wikipedia.org/wiki/HTML">HTML</a></li>
            <li><i class="bi bi-chevron-right"></i> <a
                href="https://pt.wikipedia.org/wiki/Cascading_Style_Sheets">CSS</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://pt.wikipedia.org/wiki/PHP">PHP</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://pt.wikipedia.org/wiki/JavaScript">JS</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://pt.wikipedia.org/wiki/SQL">SQL</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Siga a conta oficial do site</h4>
          <p>Plataforma educativa que utilize métodos eficazes, abordando o aprendizado por meio de repetição e reforço
            positivo.</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">NeuroLearn</strong> <span>All Rights Reserved</span></p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>