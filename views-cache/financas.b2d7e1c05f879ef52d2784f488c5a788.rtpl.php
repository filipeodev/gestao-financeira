<?php if(!class_exists('Rain\Tpl')){exit;}?><?php $title="Finanças"; ?>


<?php require $this->checkTemplate("header");?>


    <?php if( $msE != '' ){ ?>

      <script>
        swal({
          title: "Algo não está certo!",
            text: '<?php echo htmlspecialchars( $msE, ENT_COMPAT, 'UTF-8', FALSE ); ?>',
            icon: "error",
        });
      </script>
    <?php } ?>

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

          <div class="row">
            <?php $counter1=-1;  if( isset($todasCategorias) && ( is_array($todasCategorias) || $todasCategorias instanceof Traversable ) && sizeof($todasCategorias) ) foreach( $todasCategorias as $key1 => $value1 ){ $counter1++; ?>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon categoria">
                  <p><?php echo htmlspecialchars( $value1["nome_cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
                <div class="card-footer">
                  <div class="stats saiba-mais-cat categoria-icon">
                    <!-- <i class="material-icons text-warning">warning</i> -->
                    <a href="/alterar-categoria/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="edit-icon" title="Alterar Despesa">
                      <span class="material-icons">
                        mode_edit
                      </span>
                    </a>
                    <a href="/categoria/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="warning-link saiba-mais" title="Mais">Mais</a>
                    <a href="/deletar-financa/<?php echo htmlspecialchars( $value1["id_categoria"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="delete-icon" title="Deletar Categoria">
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
        <a href="/criar-categoria" title="Novo Mês">
          <span class="material-icons">
            library_add
          </span>
        </a>
      </div>
  <?php require $this->checkTemplate("footer-2");?>