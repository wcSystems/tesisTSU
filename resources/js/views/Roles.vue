<template>
    <div>
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Crear criterio</li>
        </ol>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col">
                            <button v-if="bolean_index" @click="Bolean_insertar()" class="btn btn-primary waves-effect waves-themed">Crear Rol</button>
                            <button v-if="bolean_insertar" @click="Atras()" class="btn btn-primary waves-effect waves-themed">Atras</button>
                            <button v-if="bolean_edit" @click="Atras()" class="btn btn-primary waves-effect waves-themed">Atras</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="bolean_index" id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    <span class="fw-300"><i>Roles</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="center" style="width: 25%">Id</th>
                                <th class="center" style="width: 25%">Descripcion</th>
                                <th class="center" style="width: 25%"><i class="fa fa-pencil"></i></th>
                                <th class="center" style="width: 25%"><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in Roles" :key="index" >
                                <td class="center">{{item.id}}</td>
                                <td class="center">{{item.name}}</td>
                                <td class="center"><button type="button" @click="Editar(item)" class="btn btn-secondary" ><i class="fa fa-edit"></i></button></td>
                                <td class="center"><button class="btn btn-danger" data-toggle="modal" :data-target="'#ELIM'+item.id" ><i class="fa fa-trash"></i></button></td>
                                <div class="modal modal-alert fade" :id="'ELIM'+item.id" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar a {{item.name}}</h5>
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
        <div v-if="bolean_insertar" id="panel-1" class="panel col-md-6">
            <div class="panel-hdr">
                <h2>
                    <span class="fw-300"><i>Crear</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <form @submit.prevent="Bstore()" style="width:100%">
                            <div class="row">
                                <div class="col-md-12 mb-15" id="app_ticket">
                                    <div class="row">
                                        <div class="col-12 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Descripcion</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="rol_model.name" placeholder="Descripcion" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="bolean_edit" id="panel-1" class="panel col-md-6">
            <div class="panel-hdr">
                <h2>
                    <span class="fw-300"><i>Editar</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <form @submit.prevent="BUpdate(rol_model)" style="width:100%">
                            <div class="row">
                                <div class="col-md-12 mb-15" id="app_ticket">
                                    <div class="row">
                                        <div class="col-sm-12 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Descripcion</label>
                                                <input name="descripcion" type="text" class=" form-control" value="" v-model="rol_model.name" placeholder="Descripcion" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary float-right">Guardar</button>
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
                Roles: [],
                rol_model: {id:'',name:''},
                bolean_index: true,
                bolean_insertar: false,
                bolean_edit: false
            }
        },
        created() {
            axios.get("/Consultas").then(res => {
                const consultasRol = res.data
                this.Roles = consultasRol['Roles']
            });
        },
        methods: {
            Bolean_insertar(){
                this.bolean_insertar = true,
                this.bolean_index = false
            },
            BDestroy(id, index){
                axios.delete(`/Roles/${id}`)
                    .then((res)=>{
                        this.Roles.splice(index, 1);
                        $('#ELIM'+id).click()
                    })
            },
            Atras(){
                this.bolean_index = true,
                this.bolean_insertar = false,
                this.bolean_edit = false
            },
            Editar(item){
                this.rol_model = {id:'',name:''}
                this.bolean_index = false
                this.bolean_crear = false
                this.bolean_edit = true
                this.rol_model = {id:item.id,name:item.name}
            },
            Bstore(){
                let formData = new FormData()
                formData.append('name',this.rol_model.name)
                axios.post('/Roles', formData)
                    .then((res) =>{
                        this.Atras()
                        this.Roles.push(res.data)
                    })
            },
            BUpdate(rol_model){
                let formData = new FormData()
                formData.append("_method", "put")
                formData.append('name',this.rol_model.name)
                axios.post(`/Roles/${rol_model.id}`, formData)
                    .then((res) =>{
                        this.Atras()
                        const index = this.Roles.findIndex(item => item.id === rol_model.id);
                        this.Roles[index] = res.data;
                    })
            },
        }
    }
</script>