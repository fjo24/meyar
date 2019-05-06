<form method="put" v-on:submit.prevent="updateUsuario(fillUsuario.id)">
    <div class="modal" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
{{--                     <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button> --}}
                    <h4>Editar datos de usuario</h4>
                    <div class="row">
                            <div class="col s12">
                                <div class="col s6">
                                    <label for="dato">Nombre</label>
                                    <input type="text" name="name" class="form-control" v-model="fillUsuario.name">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.email }}</span> --}}
                                </div>
                                <div class="col s6">
                                    <label for="dato">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" v-model="fillUsuario.apellido">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.telefono }}</span> --}}
                                </div>
                                <div class="col s6">
                                    <label for="dato">Nombre de usuario</label>
                                    <input type="text" name="username" class="form-control" v-model="fillUsuario.username">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.email }}</span> --}}
                                </div>
                                <div class="col s6">
                                    <label for="dato">Password</label>
                                    <input type="password" name="password" class="form-control" v-model="fillUsuario.password">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.telefono }}</span> --}}
                                </div>
                                <div class="col s6">
                                    <label for="dato">Cuit</label>
                                    <input type="text" name="cuit" class="form-control" v-model="fillUsuario.cuit">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.email }}</span> --}}
                                </div>
                                <div class="col s6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" v-model="fillUsuario.email">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.email }}</span> --}}
                                </div>
                                <div class="col s6">
                                    <label for="dato">Telefono</label>
                                    <input type="text" name="telefono" class="form-control" v-model="fillUsuario.telefono">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.telefono }}</span> --}}
                                </div>
                                <div class="col s6">
                                    <label for="dato">Codigo postal</label>
                                    <input type="text" name="postal" class="form-control" v-model="fillUsuario.postal">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.email }}</span> --}}
                                </div>

                                <div class="col s6">
                                    <label for="activo">Estado del usuario</label>
                                    <select name="nivel" v-model="fillUsuario.activo" class="form-control">
                                        <option selected disabled>Seleccione</option>
                                        <option value="1">Activo</option>
                                        {{-- <option value="obra_social" v-if="fillUsuario.nivel == 'obra_social'" selected><span>Obra social</ span></option>--}}
                                        <option value="0">Inactivo</option></option>
                                    </select>
                                    <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.activo }}</span>
                                </div>
                                <div class="col s6">
                                    <label for="nivel">Tipo de usuario</label>
                                    <select name="nivel" v-model="fillUsuario.nivel" class="form-control">
                                        <option selected disabled>Seleccione</option>
                                        {{-- <option value="particular" v-if="fillUsuario.nivel == 'particular'" selected>Particular</option> --}}
                                        <option value="particular">Particular</option>
                                        {{-- <option value="ortopedia" v-if="fillUsuario.nivel == 'ortopedia'" selected>Ortopedia</option> --}}
                                        <option value="ortopedia">Ortopedia</option>
                                        {{-- <option value="obra_social" v-if="fillUsuario.nivel == 'obra_social'" selected><span>Obra social</ span></option>--}}
                                        <option value="obra_social">Obra social</option></option>
                                    </select>
                                    <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.nivel }}</span>
                                </div>
                                
                                <div class="col s6">
                                    <label for="dato">Razón social</label>
                                    <input type="text" name="social" class="form-control" v-model="fillUsuario.social">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.telefono }}</span> --}}
                                </div>
                                <div class="col s6">
                                    <label for="dato">Dirección</label>
                                    <input type="text" name="direccion" class="form-control" v-model="fillUsuario.direccion">
                                    {{-- <span v-for="error in errors" data-error="wrong"
                                        class="helper-text red-text">@{{ error.direccion }}</span> --}}
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

