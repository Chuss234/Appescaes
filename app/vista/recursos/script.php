
<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/vendor/jquery-slim.min.js"><\/script>')</script>

<!-- Tipo de estilo AdminTLE-3.0, con Bootstrap4-->
<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/dist/js/adminlte.min.js"></script>




<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/vendor/popper.min.js"></script>

<!-- Bootstrap4-->
<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/bootstrap.min.js"></script>

<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/datatables/datatables.min.js"></script>

<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/blockui/jquery.blockUI.js"></script>

<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/jasny-bootstrap.min.js"></script>

<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/plugins.js"></script>
<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/bootstrap-confirmation.min.js"></script>

<script type="text/javascript" src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/gritter/js/jquery.gritter.js"></script>

<script type="text/javascript" src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/gritter-conf.js"></script>



<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/jquery-ui-1.12.1/jquery-ui.min.js"></script>

<script src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/js/moment.min.js"></script>


<!-- Bloquea la pagina mientras carga los registros, de la DB-->
<script type="text/javascript">
  function blockDiv(el,state) {
        if (state==1) {
            $(el).block({
                    //  message: '<h2><i class="fas fa-sync-alt"></i> Cargando</h2>',
                     message: '<h2><img src="<?php echo controlador::$rutaAPP; ?>app/vista/libs/images/load.gif" style="width:100px; height:100px;"></h2>',
                      css: {
                        border: 'none',
                        padding: '15px',
                        background: 'none'
                      },
                      overlayCSS: { backgroundColor: '#FFF' }
            });
        } else {
            $(el).unblock();
        }
    }
    function mostrarMensaje(titulo,texto) {
      var unique_id= $.gritter.add({
        title:titulo,
        text:texto,
        sticky:true,
        time: '5',
        class_name:'my-sticky-class'
      });
      setTimeout(function(){
        $.gritter.remove(unique_id,{
          fade:true,
          speed:'slow'
        });
      },6000);
    }
</script>


















