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
                  <form class="form-novo-mes" method="post" action="/editar-novo-mes/<?php echo htmlspecialchars( $id_capital, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Vale Alimentação</label>
                          <input type="text" id="alimentacao" name="alimentacao" value="<?php echo htmlspecialchars( $alimentacao, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control alimentacao">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Primeira parcela</label>
                          <input type="text" id="primeira_parc" name="primeira_parc" value="<?php echo htmlspecialchars( $primeira_parc, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control primeira_parc">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bônus</label>
                          <input type="text" id="bonus" name="bonus" value="<?php echo htmlspecialchars( $bonus, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control bonus">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Segunda parcela</label>
                          <input type="text" id="segunda_parc" name="segunda_parc" value="<?php echo htmlspecialchars( $segunda_parc, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control segunda_parc">
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