<?php if(!class_exists('Rain\Tpl')){exit;}?><?php $title="Categorias"; ?>


<?php require $this->checkTemplate("header-2");?>


    <?php if( $msS != '' ){ ?>

      <script>
        swal({
          title: '<?php echo htmlspecialchars( $msS, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
            text: ,
            icon: "success",
        });
      </script>
    <?php } ?>



    <div class="main-panel">
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="btn-voltar">
            <a href="/financas" title="Financas">
              <span class="material-icons">
                arrow_back
              </span>
              Voltar
            </a>
          </div>
          <br class="clear">
          <div class="row">
            <?php $counter1=-1;  if( isset($todosOsMeses) && ( is_array($todosOsMeses) || $todosOsMeses instanceof Traversable ) && sizeof($todosOsMeses) ) foreach( $todosOsMeses as $key1 => $value1 ){ $counter1++; ?>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats card-categoria">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <!-- <i class="material-icons">content_copy</i> -->
                    <p><?php echo htmlspecialchars( $value1["mes_orc"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo htmlspecialchars( $value1["ano_orc"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                  </div>
                  <!-- <p class="card-category">Receita</p>
                  <h3 class="card-title saldo-verde">
                    <small>R$ </small><?php if( $value1["receita"] == null ){ ?> 0 <?php }else{ ?> <?php echo htmlspecialchars( $value1["receita"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>

                  </h3>
                  <p class="card-category">Despesa(s)</p>
                  <h3 class="card-title saldo-verde">
                    <small>R$ </small><?php echo htmlspecialchars( $value1["despesa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                  </h3>
                  <p class="card-category">Saldo Total</p>
                  <?php if( $value1["despesa"] < 0 ){ ?>

                  <h3 class="card-title saldo-vermelho">
                    <small>R$ </small><?php echo htmlspecialchars( $value1["despesa"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                  </h3>
                  <?php }else{ ?>

                  <h3 class="card-title saldo-verde">
                    <small>R$ </small><?php echo htmlspecialchars( $value1["saldo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                  </h3>
                  <?php } ?> -->
                </div>
                <div class="card-footer categoria-saiba-mais">
                  <div class="stats saiba-mais-cat">
                    <!-- <i class="material-icons text-warning">warning</i> -->
                    <!-- <a href="" class="edit-icon" title="Alterar Despesa">
                      <span class="material-icons">
                        mode_edit
                      </span>
                    </a> -->
                    <a href="/detalhes/<?php echo htmlspecialchars( $value1["id_conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="warning-link saiba-mais" title="Mais">Mais</a>
                    <a href="/deletar-categoria/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php echo htmlspecialchars( $value1["id_conta"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="delete-icon" title="Deletar Categoria">
                      <span class="material-icons">
                        delete
                      </span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>

      <div class="btn-adicionar">
        <a href="/novo-mes/<?php echo htmlspecialchars( $id_categoria, ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="Novo Mês">
          <span class="material-icons">
            library_add
          </span>
        </a>
      </div>
  <?php require $this->checkTemplate("footer-2");?>