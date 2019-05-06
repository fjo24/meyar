<form method="put" v-on:submit.prevent="updateDato(fillDato.id)">
    <div class="modal" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                    <h4>Editar datos de la empresa</h4>
                    <div class="row">
                        <div class="col s12">
                            <div class="col s6">
                                <label for="dato">Email</label>
                                <input type="text" name="email" class="form-control" v-model="fillDato.email">
                                <span v-for="error in errors" data-error="wrong" class="helper-text red-text">@{{ error.email }}</span>
                            </div>
                            <div class="col s6">
                                <label for="dato">Telefono</label>
                                <input type="text" name="telefono" class="form-control" v-model="fillDato.telefono">
                                <span v-for="error in errors" data-error="wrong" class="helper-text red-text">@{{ error.telefono }}</span>
                            </div>
                            <div class="col s12">
                                <label for="dato">Dirección</label>
                                <input type="text" name="dirección" class="form-control" v-model="fillDato.direccion">
                                <span v-for="error in errors" data-error="wrong" class="helper-text red-text">@{{ error.direccion }}</span>
                            </div>
                        </div>
                    </div>
                    {{-- <span v-for="error in errors" class="text-danger">@{{ error.dato }}</span> --}}
                <div class="modal-footer">
                    <input type="submit" value="Guardar" class="boton btn">
                </div>
            </div>
        </div>
    </div>
</form>

