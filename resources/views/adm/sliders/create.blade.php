<form method="post" v-on:submit.prevent="createSlider">
        <div class="modal" id="create">
                <div class="modal-content">
                    <h4>Crear nuevo Slider</h4>
                    <div class="row">
                        <div class="col s12">
                            <div class="col s6">
                                <label for="dato">Texto 1</label>
                                <input type="text" name="texto" class="form-control" v-model="newSlider.texto">
                                {{-- <span v-for="error in errors" data-error="wrong"
                                    class="helper-text red-text">@{{ error.email }}</span> --}}
                            </div>
                            <div class="col s6">
                                <label for="dato">Texto 2</label>
                                <input type="text" name="texto2" class="form-control" v-model="newSlider.texto2">
                                {{-- <span v-for="error in errors" data-error="wrong"
                                    class="helper-text red-text">@{{ error.telefono }}</span> --}}
                            </div>
                            <div class="col s6">
                                <label for="dato">Link</label>
                                <input type="text" name="link" class="form-control" v-model="newSlider.link">
                                {{-- <span v-for="error in errors" data-error="wrong"
                                    class="helper-text red-text">@{{ error.email }}</span> --}}
                            </div>
                            <div class="col s6">
                                <label for="dato">Orden</label>
                                <input type="text" name="orden" class="form-control" v-model="newSlider.orden">
                                {{-- <span v-for="error in errors" data-error="wrong"
                                    class="helper-text red-text">@{{ error.telefono }}</span> --}}
                            </div>
                            <div class="col s6">
                                <label for="seccion">Sección</label>
                                <select name="seccion" v-model="newSlider.seccion" class="form-control">
                                    <option disabled>Seleccione</option>
                                    <option value="home" selected>Home</option>
                                </select>
                                <span v-for="error in errors" data-error="wrong"
                                    class="helper-text red-text">@{{ error.seccion }}</span>
                            </div>
                            <div class="col s6">
                                <label for="imagen">imagen</label>
                                <input type="file" @change="onFileSelected" name="imagen" class="form-control">
                                {{-- <span v-for="error in errors" data-error="wrong"
                                    class="helper-text red-text">@{{ error.email }}</span> --}}
                            </div>
                            <form enctype="multipart/form-data">
                                <input type="file" accept="image/*" @change="onFileChanged($event)">
                              </form>
                              
                        </div>
                    </div>
                    {{-- <span v-for="error in errors" class="text-danger">@{{ error.dato }}</span> --}}
                    <div class="modal-footer">
                        <input type="submit" value="Guardar" class="boton btn">
                    </div>
                </div>
            </div>
    </form>