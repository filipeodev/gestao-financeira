<?php if(!class_exists('Rain\Tpl')){exit;}?>		<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../res/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../res/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../res/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../res/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard-dark" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard-dark/docs/2.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard/tree/dark-edition" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
		<footer class="footer footer-page">
			<script src="../../res/bootstrap/js/bootstrap.min.js"></script>
			<script src="../../res/js/all.js"></script>
			<script src="../../res/js/jquery.min.js"></script>
			<script src="../../res/js/popper.min.js"></script>
      <script type="text/javascript" src="../../res/bootstrap/js/jquery.js"></script>
			<script src="../../res/js/bootstrap-material-design.min.js"></script>
			<!-- <script src="../../res/js/events.js"></script> -->
  		<script src="https://unpkg.com/default-passive-events"></script>
			<script src="../../res/js/perfect-scrollbar.jquery.min.js"></script>
			<!-- Place this tag in your head or just before your close body tag. -->
			<!-- <script async defer src="../../res/js/buttons.js"></script> -->
  		<script async defer src="https://buttons.github.io/buttons.js"></script>
			<!--  Google Maps Plugin    -->
			<!-- Chartist JS -->
			<script src="../../res/js/chartist.min.js"></script>
			<!--  Notifications Plugin    -->
			<script src="../../res/js/bootstrap-notify.js"></script>
			<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
			<script src="../../res/js/material-dashboard.js?v=2.1.0"></script>
			<!-- Material Dashboard DEMO methods, don't include it in your project! -->
			<script src="../../res/js/demo.js"></script>
      <script src="../../res/js/jquery.mask.js"></script>
      <script src="../../res/js/jquery.mask.test.js"></script>
      <script src="../../res/js/maskinput.js"></script>
		</footer>

    <script>
      // $(document).ready(function(){
      //   $('.tel').mask('(00) 00000-0000');
      // });
      var atual2 = document.querySelector('.alimentacao');
      atual2.addEventListener("blur", function() {
        var valoralimentacao = parseInt(this.value);
        var valoralimentacao2 = valoralimentacao.toLocaleString("pt-br", {
          style: "currency",
          currency: "BRL"
        });
        atual2.value = valoralimentacao2;
      });
      var atual = document.querySelector('.bonus');
      atual.addEventListener("blur", function() {
        var valorbonus = parseInt(this.value);
        var valorbonus2 = valorbonus.toLocaleString("pt-br", {
          style: "currency",
          currency: "BRL"
        });
        atual.value = valorbonus2;
      });
      var atual3 = document.querySelector('.primeira_parc');
      atual3.addEventListener("blur", function() {
        var valorprimeira_parc = parseInt(this.value);
        var valorprimeira_parc2 = valorprimeira_parc.toLocaleString("pt-br", {
          style: "currency",
          currency: "BRL"
        });
        atual3.value = valorprimeira_parc2;
      });
      var atual4 = document.querySelector('.segunda_parc');
      atual4.addEventListener("blur", function() {
        var valorsegunda_parc = parseInt(this.value);
        var valorsegunda_parc2 = valorsegunda_parc.toLocaleString("pt-br", {
          style: "currency",
          currency: "BRL"
        });
        atual4.value = valorsegunda_parc2;
      });
      var atual5 = document.querySelector('.valor');
      atual5.addEventListener("blur", function() {
        var valor = parseInt(this.value);
        var valor = valor.toLocaleString("pt-br", {
          style: "currency",
          currency: "BRL"
        });
        atual5.value = valor;
      });
    </script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
    <script>
      const x = new Date().getFullYear();
      let date = document.getElementById('date');
      date.innerHTML = '&copy; ' + x + date.innerHTML;
      
      function textPass() {
        var idSenha = document.getElementById("senha").type;
        if(idSenha == 'password'){
          document.getElementById("senha").type = 'text';
        }else{
          document.getElementById("senha").type = 'password';
        }
      }
    </script>
    </div>
  </div>
	</body>
</html>