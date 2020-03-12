@if (Auth::user() && (Auth::user()->rol_id==1))
{{-- En caso que haya iniciado sesión y sea administrador --}}
<div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background: #1D3E5C;">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Detalles Del Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-4">
          <i class="fas fa-id-card"></i>
          {{-- Input del documento --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">Documento</label>
          <input type="number"  id="documento_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-id-card"></i>
          {{-- Input del tipo de documento --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">Tipo De Documento</label>
          <select class="form-control validate" id="tipoDocumento_user_d" name="select_tipoDocumento_d">
            <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
            <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
            <option value="Cédula De Extranjenría">Cédula de Extranjería</option>
          </select> 
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          {{-- Input de los nombres --}}
          <label data-error="wrong" data-success="right" for="orangeForm-email">Nombres</label>
          <input type="text" id="nombres_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          {{-- Input de los apellidos  --}}
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Apellidos</label>
          <input type="text" id="apellidos_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          {{-- Input del correo --}}
            <i class="fas fa-envelope prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Correo</label>
            <input type="email" id="email_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-hospital"></i>
          {{-- Input de eps --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">EPS</label>
          <select class="form-control validate" id="eps_user_d" name="select_eps_d">
              <option value="EPS Sura">EPS Sura</option>
              <option value="Aliansalud">Aliansalud</option>
              <option value="Sanitas">Sanitas</option>
              <option value="Compensar EPS">Compensar EPS</option>
              <option value="Salud Tota">Salud Total</option>
              <option value="Nueva EPS">Nueva EPS</option>
              <option value="Coomeva EPS">Coomeva EPS</option>
              <option value="Famisanar">Famisanar</option>
              <option value="Servicio Occidental de Salud">Servicio Occidental de Salud</option>
              <option value="Comfenalco Valle">Comfenalco Valle</option>
              <option value="Salud Vida">Salud Vida</option>
          </select> 
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-hospital"></i>
          {{-- Grupo de sangre --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">Tipo de Sangre</label>
          <select class="form-control validate" id="sangre_user_d" name="select_sangre_d">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            <option value="O">O</option>
          </select> 
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-hospital"></i>
          {{-- Input de rh --}}
          <label data-error="wrong" data-success="right" for="orangeForm-name">RH</label>
          <select class="form-control validate" id="rh_user_d" name="select_rh_d">
            <option value="Positivo">Positivo</option>
            <option value="Negativo">Negativo</option>
          </select> 
        </div>
        <div class="md-form mb-4">
            <i class="fas fa-phone"></i>
            {{-- Input del telefono --}}
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Teléfono</label>
            <input type="number" id="telefono_user_d" class="form-control validate">
          </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-secondary" id="update">Editar</button>
      </div>
    </div>
  </div>
</div>
@else
{{-- Usuario promedio; para no editar informacion --}}
<div class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background: #1D3E5C;">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Detalles Del Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-4">
          <i class="fas fa-id-card"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Documento</label>
          <input type="text" readonly="readonly" id="documento_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-id-card"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Tipo De Documento</label>
          <input type="text" readonly="readonly" id="tipoDocumento_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Nombres</label>
          <input type="text" readonly="readonly" id="nombres_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-user"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Apellidos</label>
          <input type="text" readonly="readonly" id="apellidos_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
            <i class="fas fa-envelope prefix grey-text"></i>
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Correo</label>
            <input type="text" readonly="readonly" id="email_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-hospital"></i>
          <label data-error="wrong" data-success="right" for="orangeForm-pass">EPS</label>
          <input type="text" readonly="readonly" id="eps_user_d" class="form-control validate">
        </div>
        <div class="md-form mb-4">
            <i class="fas fa-phone"></i>
            <label data-error="wrong" data-success="right" for="orangeForm-pass">Teléfono</label>
            <input type="text" readonly="readonly "id="telefono_user_d" class="form-control validate">
          </div>
      </div> 
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endif
<script>
    $(document).ready(function (){
          $('.documento_user').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
        });
</script>