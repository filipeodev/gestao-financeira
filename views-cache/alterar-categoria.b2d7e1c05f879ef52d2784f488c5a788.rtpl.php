<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header-2");?>



    <?php if( $msE != '' ){ ?>

      <script>
        swal({
          title: "Algo não está certo!",
            text: '<?php echo htmlspecialchars( $msE, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
            icon: "error",
        });
      </script>
    <?php } ?>


    <div class="main-panel">
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Preencha os campos</h4>
                </div>
                <div class="card-body">
                  <form class="form-novo-mes" method="post" action="/alterar-categoria/<?php echo htmlspecialchars( $retornaCategoria["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome da Categoria</label>
                          <input type="text" id="nome_cat" name="nome_cat" class="form-control" value="<?php echo htmlspecialchars( $retornaCategoria["nome_cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required autofocus>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Inserir</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php require $this->checkTemplate("footer-2");?>