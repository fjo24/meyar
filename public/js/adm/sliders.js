new Vue({
    el: '#crud',
    created: function() {
        this.getSliders();  
    },
    data:{
        sliders:[],
        newSlider: {'id': '', 'texto': '', 'texto2': '', 'link':'', 'orden': '', 'seccion':'', 'imagen':''},
        /* fillDato: {'id': '', 'email': '', 'direccion': '', 'telefono': ''}, */
        errors:[],
        selectedFile: null
    },
    methods:{
        //index sin paginacion
        getSliders: function(){
            var urlSliders = 'sliders';
            axios.get(urlSliders).then(response=>{
                this.sliders = response.data.sliders
            });
        },
        createSlider: function(){
            var url = 'sliders';
         /*    this.sliders.imagen = newSlider.target.files[0] */
           /*  console.log(this.sliders.imagen); */
/*            console.log(this.newSlider.imagen);
           console.log("act");*/
           console.log(this.newSlider); 
           console.log("act");
           console.log(this.newSlider.imagen); 
            axios.post(url, this.newSlider).then(response=>{
                this.getSliders(); //listamos
                this.sliders = response.data.sliders
                this.newSlider = {'id': '', 'texto': '', 'texto2': '', 'link':'', 'orden': '', 'seccion':'', 'imagen':''},
                this.errors = [];
                $('#create').modal('close');
                toastr.success('Slider creado con exito');//mensaje  
            }).catch(error=>{
                this.errors = error.response
            });
        },
        onFileSelected(event){
            var file = event.target.files[0];
            /* this.newSlider.imagen = event */
            let reader = new FileReader(); //El objeto FileReader permite que las aplicaciones web lean ficheros
            reader.onload = (event) => { // Este evento se activa cada vez que la operación de lectura se ha completado satisfactoriamente.
                this.newSlider.imagen = event.target.result
            };
            reader.readAsDataURL(file); 
            /* this.newSlider.imagen = event */
            console.log("archivo adjuntado")
            console.log(this.newSlider.imagen)
        },

        onFileChanged: function(event) {
            var file = event.target.files[0]; // Se obtiene la imagen desde el evento.
            var fileSize = event.target.files[0].size // Se obtiene el tamaño de la imagen.
            // Se valida que el tamaño de la imagen sea el admitido.
            if (fileSize > 1001024) {
                this.companyLogoError = "La imagen no debe pesar mas de 1MB, por favor introduzca una nueva";
                this.data.logo = null;
            } else { // Si el tamaño es valido, seguimos.
                this.companyLogoError = "" // No se muestra el mensaje de error
          
                let reader = new FileReader(); //El objeto FileReader permite que las aplicaciones web lean ficheros
                reader.onload = (event) => { // Este evento se activa cada vez que la operación de lectura se ha completado satisfactoriamente.
                  this.data.logo = event.target.result
                };
/*                 console.log(this.data.logo); */
                reader.readAsDataURL(file); // Comienza la lectura del contenido del objeto Blob
            }
          }
        //index con paginacion
        /* getSliders: function(page){
            var urlSliders = 'tasks?page='+page;
            axios.get(urlSliders).then(response=>{
                this.Sliders = response.data.tasks.data
                this.pagination = response.data.pagination
            });
        }, */
        //precargar Sliders para editar
        /*  editDato: function(dato){//editar
            $('#edit').modal('open'); 
            this.fillDato.id = dato.id;
            this.fillDato.email = dato.email;
            this.fillDato.direccion = dato.direccion;
            this.fillDato.telefono = dato.telefono; */
/*             $('#edit').openModal();  */
          /*   $('#modalTrigger').on('click', function() {
                $('#edit').modal('open');
            }); */
          /*   $('#edit').open(); */
           /*  $('#myModal').modal('show'); */
/*             $('#edit').modal('show'); */
        /*  },

        updateDato: function(id){
            var url = 'Sliders/'+ id;
            axios.put(url, this.fillDato).then(response=>{
                this.getSliders(); //listamos
                this.fillDato = {'id': '', 'email': '', 'direccion': '', 'telefono': ''};
                this.errors = [];
                $('#edit').modal('close');
                toastr.warning('Sliders actualizados con exito');//mensaje  
            }).catch(error=>{
                this.errors = error.response.data
            });
        } */
    }
});

