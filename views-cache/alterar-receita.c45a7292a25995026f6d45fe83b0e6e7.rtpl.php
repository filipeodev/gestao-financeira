<?php if(!class_exists('Rain\Tpl')){exit;}?><?php $title="Alterar Receira"; ?>


<?php require $this->checkTemplate("header-4");?>



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
                  <form class="form-novo-mes" method="post" action="/alterar-receita/<?php echo htmlspecialchars( $id_conta, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $id_receita, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Primeira parcela</label>
                          <input type="text" id="primeira_parc" name="primeira_parc" class="form-control" value="<?php echo htmlspecialchars( $retornaReceita["primeira_parc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Segunda parcela</label>
                          <input type="text" id="segunda_parc" name="segunda_parc" class="form-control" value="<?php echo htmlspecialchars( $retornaReceita["segunda_parc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Vale Alimentação</label>
                          <input type="text" id="alimentacao" name="alimentacao" class="form-control" value="<?php echo htmlspecialchars( $retornaReceita["alimentacao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bônus</label>
                          <input type="text" id="bonus" name="bonus" class="form-control bonus" value="<?php echo htmlspecialchars( $retornaReceita["bonus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Alterar</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php require $this->checkTemplate("footer-4");?>