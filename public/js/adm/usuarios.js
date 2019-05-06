new Vue({
    el: '#crud',
    created: function() {
        this.getUsuarios();  
    },
    data:{
        Usuarios:[],
        newUsuario: {'id': '', 'nivel':'', 'name': '', 'apellido': '', 'cuit':'', 'password': '', 'postal':'', 'social':'', 'username': '', 'email': '', 'direccion': '', 'telefono': '', 'activo': ''},
        fillUsuario: {'id': '', 'nivel':'', 'name': '', 'apellido': '', 'cuit':'', 'password': '', 'postal':'', 'social':'', 'username': '', 'email': '', 'direccion': '', 'telefono': '', 'activo': ''},
        errors:[],
    },
    methods:{
        //index sin paginacion
        getUsuarios: function(){
            var urlUsuarios = 'usuarios';
            axios.get(urlUsuarios).then(response=>{
                this.Usuarios = response.data.usuarios
            });
        },
        createUsuario: function(){
            var url = 'usuarios';
            console.log(this.newUsuario);
            axios.post(url, this.newUsuario).then(response=>{
                this.getUsuarios(); //listamos
                this.Usuarios = response.data.usuarios
                this.newUsuario = {'id': '', 'name': '', 'apellido': '', 'cuit':'', 'password': '', 'postal':'', 'social':'', 'username': '', 'email': '', 'direccion': '', 'telefono': '', 'activo': ''},
                this.errors = [];
                $('#create').modal('close');
                toastr.success('Usuario creado con exito');//mensaje  
            }).catch(error=>{
                this.errors = error.response.data
            });
        },
        editUsuario: function(usuario){//editar
            $('#edit').modal('open'); 
            this.fillUsuario = usuario;
            console.log(this.fillUsuario.nivel);
         },
        updateUsuario: function(id){
            var url = 'usuarios/'+ id;
            axios.put(url, this.fillUsuario).then(response=>{
                this.getUsuarios(); //listamos
                this.fillUsuario = {'id': '', 'nivel':'', 'name': '', 'apellido': '', 'username': '', 'email': '', 'direccion': '', 'telefono': ''},
                this.errors = [];
                $('#edit').modal('close');
                toastr.warning('Datos actualizados con exito');//mensaje  
            }).catch(error=>{
                this.errors = error.response
            });
        },
        //eliminar
        deleteUsuario: function(usuario){//eliminamos
            /* alert(usuario.id); */
            var url = 'usuarios/' + usuario.id;
            if(confirm("Deseas realmente eliminar el usuario?")){
                axios.delete(url).then(response=>{//si todo bien continua
                    this.getUsuarios(); //listamos
                    toastr.error('eliminado correctamente');//mensaje  
                });
            }
        }
    }
});

