<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header-3");?>



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
                  <form class="form-novo-mes" method="post" action="/alterar-despesa/<?php echo htmlspecialchars( $id_conta, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $id_despesa, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Produto ou serviço</label>
                          <input type="text" id="despesa" name="despesa" class="form-control" value="<?php echo htmlspecialchars( $retornaDespesa["despesa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required autofocus>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Valor</label>
                          <input type="text" id="valor" name="valor" class="form-control" value="<?php echo htmlspecialchars( $retornaDespesa["valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <!-- <label class="bmd-label-floating">Data</label> -->
                          <input type="date" id="data_compra" name="data_compra" class="form-control" value="<?php echo htmlspecialchars( $retornaDespesa["data_compra"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
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
  <?php require $this->checkTemplate("footer-3");?>