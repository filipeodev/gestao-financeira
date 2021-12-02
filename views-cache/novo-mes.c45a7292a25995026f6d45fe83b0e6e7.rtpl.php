<?php if(!class_exists('Rain\Tpl')){exit;}?><?php $title="Novo Mês"; ?>


<?php require $this->checkTemplate("header-2");?>



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
                  <form class="form-novo-mes" method="post" action="/novo-mes/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mes</label>
                          <select name="mes" id="mes" class="form-control" required>
                            <option value="Selecione">-</option>
                            <option value="01">Janeiro</option>
                            <option value="02">Fevereiro</option>
                            <option value="03">Março</option>
                            <option value="04">Abril</option>
                            <option value="05">Maio</option>
                            <option value="06">Junho</option>
                            <option value="07">Junlho</option>
                            <option value="08">Agosto</option>
                            <option value="09">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Ano</label>
                          <select name="ano_orc" id="ano_orc" class="form-control" required>
                            <option value="Selecione">-</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                          </select>
                        </div>
                      </div>
                      <!-- <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Vale Alimentação</label>
                          <input type="text" id="alimentacao" name="alimentacao" class="form-control alimentacao">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Primeira parcela</label>
                          <input type="text" id="primeira_parc" name="primeira_parc" class="form-control primeira_parc">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bônus</label>
                          <input type="text" id="bonus" name="bonus" class="form-control bonus">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Segunda parcela</label>
                          <input type="text" id="segunda_parc" name="segunda_parc" class="form-control segunda_parc">
                        </div>
                      </div> -->
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