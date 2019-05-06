new Vue({
    el: '#crud',
    created: function() {
        this.getDatos();  
    },
    data:{
        Datos:[],
        fillDato: {'id': '', 'email': '', 'direccion': '', 'telefono': ''},
        errors:[],
    },
    methods:{
        //index sin paginacion
        getDatos: function(){
            var urlDatos = 'datos';
            axios.get(urlDatos).then(response=>{
                this.Datos = response.data.datos
            });
        },
        //index con paginacion
        /* getDatos: function(page){
            var urlDatos = 'tasks?page='+page;
            axios.get(urlDatos).then(response=>{
                this.Datos = response.data.tasks.data
                this.pagination = response.data.pagination
            });
        }, */
        //precargar datos para editar
         editDato: function(dato){//editar
            $('#edit').modal('open'); 
            this.fillDato.id = dato.id;
            this.fillDato.email = dato.email;
            this.fillDato.direccion = dato.direccion;
            this.fillDato.telefono = dato.telefono;
/*             $('#edit').openModal();  */
          /*   $('#modalTrigger').on('click', function() {
                $('#edit').modal('open');
            }); */
          /*   $('#edit').open(); */
           /*  $('#myModal').modal('show'); */
/*             $('#edit').modal('show'); */
         },

        updateDato: function(id){
            var url = 'datos/'+ id;
            axios.put(url, this.fillDato).then(response=>{
                this.getDatos(); //listamos
                this.fillDato = {'id': '', 'email': '', 'direccion': '', 'telefono': ''};
                this.errors = [];
                $('#edit').modal('close');
                toastr.warning('Datos actualizados con exito');//mensaje  
            }).catch(error=>{
                this.errors = error.response.data
            });
        }
    }
});

