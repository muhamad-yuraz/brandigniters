<?php $page_session = session(); ?>

<div class="container col-xxl-8 px-4 py-5 pb-3 mb-3 mt-5">
  <div class="row g-5 py-5 pb-5">
    
    <div class="col-12 col-xxl-6 text mb-3">
      <h1 class="main-text-bi-hero mb-4 hnd-l mt-2">Contactos rápidos</h1>
      <hr class="yellow-under-tittle-line" />
      <p class="bi-black-color t22-px hnd-l mb-4">Mande-nos uma mensagem pelo <span class="hnd-b">WhatsApp </span>e terá uma resposta
      ainda mais <span class="hnd-b">flexível </span> da nossa equipe.</p>

      
      <div class="d-grid gap-2">
        <a href="https://wa.link/1juftd" target="_blank" class="btn btn-whatsapp icon-container text-end"><i class="fa-brands fa-whatsapp fs-5"></i>WhatsApp</a>
        <p class="bi-black-color t22-px hnd-l mt-4 mb-2">Encontre-nos também nas seguintes plataformas..</p>
        <a href="https://www.instagram.com/brandigniters/" target="_blank" class="btn btn-instagram icon-container text-end"><i class="fa-brands fa-instagram fs-5"></i>Instagram</a>
        <a href="https://www.facebook.com/brandigniters" target="_blank" class="btn btn-facebook icon-container text-end"><i class="fa-brands fa-facebook-f fs-5"></i>Facebook</a>
        <a href="https://www.behance.net/brandigniters" target="_blank" class="btn btn-behance icon-container text-end"><i class="fa-brands fa-behance fs-5"></i>Behance</a>
      </div>

      <div class="row mt-5">
        <div class="col-12 col-xl-6 text-md-start text-center">
          <p class="fs-2 bi-yellow-color mb-0"><i class="fa-solid fa-envelope-dot"></i></p>
          <h4 class="mb-2 hnd-m mt-0">E-mails</h4>
          <p class="bi-black-color t18-px hnd-l mb-0">info@brandigniters.tech</p>
          <p class="bi-black-color t18-px hnd-l">comercial@brandigniters.tech</p>
        </div>

        <div class="col-12 col-xl-6 text-md-start text-center">
          <p class="fs-2 bi-yellow-color mb-0"><i class="fa-solid fa-phone"></i></p>
          <h4 class="mb-2 hnd-m mt-0">Contactos</h4>
          <p class="bi-black-color t18-px hnd-l mb-0">( +258 ) 84 92 15 457</p>
          <p class="bi-black-color t18-px hnd-l">( +258 ) 82 25 39 686</p>
        </div>
      </div>
      
    </div>

    <div class="col-12 col-xxl-6 text mb-3">
      <h1 class="main-text-bi-hero mb-4 hnd-l mt-2">Entre em <span class="hnd-b">contacto!</span></h1>
      <hr class="yellow-under-tittle-line" />
      <p class="bi-black-color t22-px hnd-l mb-4">Mande-nos uma mensagem e nós lhe retornaremos assim que recebermos o seu pre cioso contacto!</p>

      <?php if($page_session->getTempdata('success')){ ?>
        <div class="alert alert-success" role="alert">
          <p><?php echo $page_session->getTempdata('success'); ?></p>
        </div>

        <div class="modal fade" id="exampleModalSu" tabindex="-1" aria-labelledby="exampleModalSuLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title text-success fs-3 hnd-bl" id="exampleModalSuLabel"> <i class="fa-solid fa-envelope-circle-check"></i> Obrigado!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><?php echo $page_session->getTempdata('success'); ?></p>
              </div>
              <div class="modal-footer">
                <div class="col-12">
                  <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success ms-2 hnd-b ls-075px" data-bs-dismiss="modal">PERCEBI</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Modal JS Script Modal Email Success -->
        <script type="text/javascript">
            window.onload = () => {
                $('#exampleModalSu').modal('show');
            }
        </script>
      <?php } ?>

      <?php if($page_session->getTempdata('error')){ ?>
        <div class="alert alert-danger" role="alert">
          <?php echo $page_session->getTempdata('error'); ?>
        </div>

        <div class="modal fade" id="exampleModalEr" tabindex="-1" aria-labelledby="exampleModalErLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title text-danger fs-3 hnd-bl" id="exampleModalErLabel"> <i class="fa-solid fa-xmark-to-slot"></i> Erro!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p><?php echo $page_session->getTempdata('error'); ?></p>
              </div>
              <div class="modal-footer">
                <div class="col-12">
                  <div class="d-grid gap-2">
                    <button type="button" class="btn btn-danger ms-2 hnd-b ls-075px" data-bs-dismiss="modal">PERCEBI</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Modal JS Script Modal Email Error -->
        <script type="text/javascript">
            window.onload = () => {
                $('#exampleModalEr').modal('show');
            }
        </script>
      <?php } ?>

      <?= form_open('/contactos'); ?>
            <div class="row gy-3">
              <div class="col-12">
                <input type="text" placeholder="Nome*" class="form-control" id="nomeID" name="nome" minlength="3" maxlength="30" value="" required>
              </div>
              <div class="col-12">
                <input type="text" placeholder="Empresa (opcional)" class="form-control" id="empresaID" name="empresa" maxlength="50" value="">
              </div>
              <div class="col-12">
                <input type="email" placeholder="E-mail*" class="form-control" id="emailID" name="email" maxlength="50" value="">
              </div>
              <div class="col-12">
                <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" placeholder="Contacto*" class="form-control" id="contactoID" name="contacto" maxlength="9" value="" required>
              </div>
              <div class="col-12">
                <textarea class="form-control" placeholder="Mensagem*" id="mensagemID" name="mensagem" rows="5" required></textarea>
              </div>
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn btn-bi-yellow btn-lg" type="submit">ENVIAR</button>
                </div>
              </div>

            </div>
      <?= form_close(); ?>

      <?php if(isset($validation)){ ?>
        
        <!-- Modal mal insiridos -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-3 hnd-bl" id="exampleModalLabel"> <i class="fa-solid fa-triangle-exclamation bi-yellow-color"></i> Atenção!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Por favor, verifique os dados colocados no formulário! Abaixo do formulário vai encontrar quais dados não foram inseridos correctamente!</p>
              </div>
              <div class="modal-footer">
                <div class="col-12">
                  <div class="d-grid gap-2">
                    <button type="button" class="btn btn-warning ms-2 hnd-b ls-075px" data-bs-dismiss="modal">PERCEBI</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?= $validation->listErrors(); ?>
      <?php } ?>  
    </div>

  </div>
</div>

<!-- Avoid Page Data Resubmission On Refresh -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>