<template>
    <div>
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Nuevo usuario</li>
        </ol>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col">
                            <button v-if="bolean_index" @click="Bolean_insertar()" class="btn btn-primary waves-effect waves-themed">Nuevo Usuario</button>
                            <button v-if="bolean_insertar" @click="Atras()" class="btn btn-primary waves-effect waves-themed">Atras</button>
                            <button v-if="bolean_edit" @click="Atras()" class="btn btn-primary waves-effect waves-themed">Atras</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="bolean_index" id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th class="center" style="width: 20%">Foto</th>
                                <th class="center" style="width: 35%">Nombre y Apellido </th>
                                <th class="center" style="width: 35%">Email</th>
                                <th class="center" style="width: 10%"><i class="fa fa-pencil"></i></th>
                                <th class="center" style="width: 10%"><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in usuarios" :key="index" >
                                <td class="center"><img :src="item.profile" class="img-responsive rounded-circle" height="50" width="50" /></td>
                                <td class="center">{{item.firstname}} {{item.lastname}}</td>
                                <td class="center">{{item.correo}}</td>
                                <td class="center"><button type="button" @click="Editar(item)" class="btn btn-secondary" ><i class="fa fa-edit"></i></button></td>
                                <td class="center"><button class="btn btn-danger" data-toggle="modal" :data-target="'#ELIM'+item.id" ><i class="fa fa-trash"></i></button></td>
                                <div class="modal modal-alert fade" :id="'ELIM'+item.id" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar a {{item.firstname}} {{item.lastname}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Esta accion no se puede deshacer
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" @click="BDestroy(item.id,index)" class="btn btn-primary">Continuar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div v-if="bolean_insertar" id="panel-1" class="panel col-md-12">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <form class="needs-validation" novalidate @submit.prevent="Insertar_usuario" enctype="multipart/form-data" style="width:100%">
                            <div class="row">
                                <div class="col-md-12 mb-15" id="app_ticket">
                                    <div class="row">
                                        <div class="col-12 mb-15">
                                            <div class="form-group" id="preview">
                                                <img v-if="url" :src="url" class="img-responsive rounded-circle"  height="100" width="100" />
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Nombre</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="usuario_model.firstname" placeholder="Nombre" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Apellido</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="usuario_model.lastname" placeholder="Apellido" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Username</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="usuario_model.username" placeholder="Username" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Password</label>
                                                <input name="name" type="password" class=" form-control" value="" v-model="usuario_model.password" placeholder="Password" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Documento</label>
                                                <input name="name" type="number" class=" form-control" value="" v-model="usuario_model.doc" placeholder="Documento" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Correo</label>
                                                <input name="name" type="email" class=" form-control" value="" v-model="usuario_model.correo" placeholder="Correo" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="">Rol</label>
                                                <select name="" class="form-control" v-model="usuario_model.rol">
                                                    <option selected disabled  value="">Seleccione una opcion</option>
                                                    <option v-for="(item, index) in roles" :key="index" v-bind:value="item.id">{{item.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="image">Imagen</label>
                                                <input name="image"  class="form-control-file" id="image" type="file"  placeholder="Imagen asociada" @change="onFileChange"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="bolean_edit" id="panel-1" class="panel col-md-12">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <form class="needs-validation" novalidate @submit.prevent="BUpdate(usuario_model)" enctype="multipart/form-data" style="width:100%">
                            <div class="row">
                                <div class="col-md-12 mb-15" id="app_ticket">
                                    <div class="row">
                                        <div class="col-12 mb-15">
                                            <div class="form-group" id="preview">
                                                <img v-if="url" :src="url" class="img-responsive rounded-circle"  height="100" width="100" />
                                                <img v-else :src="usuario_model.profile" class="img-responsive rounded-circle"  height="100" width="100" />
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Nombre</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="usuario_model.firstname" placeholder="Nombre" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Apellido</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="usuario_model.lastname" placeholder="Apellido" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Username</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="usuario_model.username" placeholder="Username" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Password</label>
                                                <input name="name" type="password" class=" form-control" value="" v-model="usuario_model.password" placeholder="Password" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Documento</label>
                                                <input name="name" type="number" class=" form-control" value="" v-model="usuario_model.doc" placeholder="Documento" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Correo</label>
                                                <input name="name" type="email" class=" form-control" value="" v-model="usuario_model.correo" placeholder="Correo" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="">Rol</label>
                                                <select name="" class="form-control" v-model="usuario_model.rol">
                                                    <option selected disabled  value="">Seleccione una opcion</option>
                                                    <option v-for="(item, index) in roles" :key="index" v-bind:value="item.id">{{item.name}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="image">Imagen</label>
                                                <input name="image"  class="form-control-file" id="image" type="file"  placeholder="Imagen asociada" @change="onFileChange"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return{
                url: null,
                image: '',

                usuario_model:{firstname:'',lastname:'',username:'',password:'',doc:'',correo:'',rol:'',profile:''},

                usuarios: [],
                roles: [],

                bolean_index: true,
                bolean_insertar: false,
                bolean_edit: false
            }
        },
        created() {
            axios.get("/Consultas").then(res => {
                const consultasUsuarios = res.data
                this.usuarios = consultasUsuarios['Usuarios']
                this.roles = consultasUsuarios['Roles']
                this.Tabla()
            });
        },
        methods: {
            Tabla(){
                $(document).ready(function() {
                    $("#dt-basic-example").dataTable({ responsive: true });
                    $(".js-thead-colors a").on("click", function() {
                        var theadColor = $(this).attr("data-bg");
                        $("#dt-basic-example thead")
                        .removeClassPrefix("bg-")
                        .addClass(theadColor);
                    });
                    $(".js-tbody-colors a").on("click", function() {
                        var theadColor = $(this).attr("data-bg");
                        $("#dt-basic-example")
                        .removeClassPrefix("bg-")
                        .addClass(theadColor);
                    });
                });
            },
            Bolean_insertar(){
                $('#dt-basic-example').dataTable().fnDestroy();
                this.bolean_insertar = true,
                this.bolean_index = false
            },
            onFileChange: function(e) {
                this.image = e.target.files[0];
                this.url = URL.createObjectURL(this.image);
            },
            BDestroy(id, index){
                axios.delete(`/users/${id}`)
                    .then((res)=>{
                        this.usuarios.splice(index, 1);
                        $('#ELIM'+id).click()
                    })
            },
           Atras(){
               this.Tabla()
                this.url = null
                this.bolean_index = true,
                this.bolean_insertar = false,
                this.bolean_edit = false
            },
            Editar(item){
                $('#dt-basic-example').dataTable().fnDestroy();
                this.usuario_model = {id:'',firstname:'',lastname:'',username:'',password:'',doc:'',correo:'',rol:'',profile:''},
                this.bolean_index = false
                this.bolean_crear = false
                this.bolean_edit = true
                this.usuario_model = {id:item.id,firstname:item.firstname,lastname:item.lastname,username:item.email,password:item.password,doc:item.doc,correo:item.correo,rol:item.role_id,profile:item.profile}
            },
            Insertar_usuario(){
                $('#dt-basic-example').dataTable()
                let formData = new FormData()
                formData.append('firstname',this.usuario_model.firstname)
                formData.append('lastname',this.usuario_model.lastname)
                formData.append('username',this.usuario_model.username)
                formData.append('password',this.usuario_model.password)
                formData.append('doc',this.usuario_model.doc)
                formData.append('correo',this.usuario_model.correo)
                formData.append('rol',this.usuario_model.rol)
                formData.append('profile',this.image)
                axios.post('/users', formData)
                    .then((res) =>{
                        this.Atras()
                        this.usuarios.push(res.data)
                    })
            },
            BUpdate(usuario_model){
                let formData = new FormData()
                formData.append("_method", "put")
                formData.append('firstname',this.usuario_model.firstname)
                formData.append('lastname',this.usuario_model.lastname)
                formData.append('username',this.usuario_model.username)
                formData.append('password',this.usuario_model.password)
                formData.append('doc',this.usuario_model.doc)
                formData.append('correo',this.usuario_model.correo)
                formData.append('rol',this.usuario_model.rol)
                formData.append('profile',this.image)
                axios.post(`/users/${usuario_model.id}`, formData)
                    .then((res) =>{
                        this.Atras()
                        const index = this.usuarios.findIndex(item => item.id === usuario_model.id);
                        this.usuarios[index] = res.data;
                    })
            },
        }
    }
</script>