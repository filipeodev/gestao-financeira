<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("header-2");?>



    <?php if( $msS != '' ){ ?>

      <script>
        swal({
          title: "<?php echo htmlspecialchars( $msS, ENT_COMPAT, 'UTF-8', FALSE ); ?>",
            text: '',
            icon: "success",
        });
      </script>
    <?php } ?>


    <div class="main-panel">
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Capital</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th class="text-center">Mes / Ano Orçamento</th>
                      <th class="text-center">Editar / Alterar</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center"><?php echo htmlspecialchars( $mes["mes_orc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo htmlspecialchars( $mes["ano_orc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td class="td-actions text-center">
                          <a href="/editar-novo-mes/<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="Alterar capital">
                            <i class="material-icons">edit</i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Gastos</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th class="text-center">Produto</th>
                      <th class="text-center">Valor</th>
                      <th class="text-center">Data da compra</th>
                      <th class="text-center">Editar</th>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($produtos) && ( is_array($produtos) || $produtos instanceof Traversable ) && sizeof($produtos) ) foreach( $produtos as $key1 => $value1 ){ $counter1++; ?>

                        <tr>
                          <td class="text-center"><?php echo htmlspecialchars( $value1["produto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td class="text-center">R$ <?php echo htmlspecialchars( $value1["valor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                          <td class="text-center"><?php echo formatDate($value1["data_compra"]); ?></td>
                          <td class="td-actions text-center">
                            <a href="/editarproduto" title="Alterar produto">
                              <i class="material-icons">edit</i>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="btn-adicionar">
        <a href="/novo-produto/<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="Novo Mês">
          <span class="material-icons">
            library_add
          </span>
        </a>
      </div>
  <?php require $this->checkTemplate("footer-2");?>