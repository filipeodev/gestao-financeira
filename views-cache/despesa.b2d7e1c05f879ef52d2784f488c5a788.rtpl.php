<?php if(!class_exists('Rain\Tpl')){exit;}?><?php $title="Nova Despesa"; ?>


<?php require $this->checkTemplate("header-3");?>



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
                  <form class="form-novo-mes" method="post" action="/despesa/<?php echo htmlspecialchars( $id_conta, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Produto ou serviço</label>
                          <input type="text" id="despesa" name="despesa" class="form-control" required autofocus>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Valor</label>
                          <input type="text" id="valor" name="valor" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <!-- <label class="bmd-label-floating">Data</label> -->
                          <input type="date" id="data_compra" name="data_compra" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group paga-ou-nao">
                          <label>Paga (sim/não)</label>
                          <select name="paga_s_n" id="paga_s_n">
                            <option value="">Selecione</option>
                            <option value="s">Sim</option>
                            <option value="n">Não</option>
                        </select>
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