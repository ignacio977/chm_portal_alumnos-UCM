{{-- Modal de cambio de foto --}}
<div id="modal_photo" class="modal">
  <div class="modal-content">
     <form method="POST" action="{{action('HomeController@cambiar_foto')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
        <table class="table">
           <tr>
              <h5>Seleccione nueva foto de perfil</h5>
              <td width="30"><input type="file" name="select_file" /></td>             
              </tr>
              <tr>
              <td><span class="text-muted">Sólo se aceptan jpg, png y gif.</span></td>
              <td width="30%" align="left"></td>               
           </tr>
        </table>
        <input type="submit" name="upload" class="btn btn-primary" value="Agregar">
        </div>
     </form>
  </div>
</div> 