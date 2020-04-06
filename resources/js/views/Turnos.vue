<template>
    <div>
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Crear Turno</li>
        </ol>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col">
                            <button v-if="bolean_index" @click="Bolean_insertar()" class="btn btn-primary waves-effect waves-themed">Crear Turno</button>
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
                    <span class="fw-300"><i>Turno</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th class="center" style="width: 20%">Id</th>
                                <th class="center" style="width: 20%">Descripcion</th>
                                <th class="center" style="width: 20%"><i class="fa fa-pencil"></i></th>
                                <th class="center" style="width: 20%"><i class="fa fa-trash"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in Options" :key="index" >
                                <td class="center">{{item.id}}</td>
                                <td class="center">{{item.descripcion}}</td>
                                <td class="center"><button type="button" @click="Editar(item)" class="btn btn-secondary" ><i class="fa fa-edit"></i></button></td>
                                <td class="center"><button class="btn btn-danger" data-toggle="modal" :data-target="'#ELIM'+item.id" ><i class="fa fa-trash"></i></button></td>
                                <div class="modal modal-alert fade" :id="'ELIM'+item.id" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Eliminar a {{item.description}}</h5>
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
                                                <label class="form-label" for="name">Codigo</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="Turno_model.code" placeholder="Codigo" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Descripcion</label>
                                                <input name="name" type="text" class=" form-control" value="" v-model="Turno_model.description" placeholder="Descripcion" required>
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
                        <form @submit.prevent="BUpdate(Turno_model)" style="width:100%">
                            <div class="row">
                                <div class="col-md-12 mb-15" id="app_ticket">
                                    <div class="row">
                                        <div class="col-sm-12 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Codigo</label>
                                                <input name="descripcion" type="text" class=" form-control" value="" v-model="Turno_model.code" placeholder="Codigo" required>
                                                <div class="invalid-feedback">Este campo es obligatorio</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-15">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Descripcion</label>
                                                <input name="descripcion" type="text" class=" form-control" value="" v-model="Turno_model.description" placeholder="Descripcion" required>
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
                Options: [],
                Turno_model: {id:'',code:'',description:'',legend:''},
                bolean_index: true,
                bolean_insertar: false,
                bolean_edit: false
            }
        },
        created() {
            axios.get("/Consultas").then(res => {
                const consultasCriterias = res.data
                this.Options = consultasCriterias['Turnos']
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
            BDestroy(id, index){
                axios.delete(`/Optioncriterias/${id}`)
                    .then((res)=>{
                        this.Options.splice(index, 1);
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
                this.Turno_model = {id:'',code:'',description:'',legend:''}
                this.bolean_index = false
                this.bolean_crear = false
                this.bolean_edit = true
                this.Turno_model = {id:item.id,code:item.code,description:item.description,legend:item.legend}
            },
            Bstore(){
                $('#dt-basic-example').dataTable()
                let formData = new FormData()
                formData.append('code',this.Turno_model.code)
                formData.append('description',this.Turno_model.description)
                formData.append('legend',this.Turno_model.legend)
                axios.post('/Optioncriterias', formData)
                    .then((res) =>{
                        this.Atras()
                        this.Options.push(res.data)
                    })
            },
            BUpdate(Turno_model){
                let formData = new FormData()
                formData.append("_method", "put")
                formData.append('code',this.Turno_model.code)
                formData.append('description',this.Turno_model.description)
                formData.append('legend',this.Turno_model.legend)
                axios.post(`/Optioncriterias/${Turno_model.id}`, formData)
                    .then((res) =>{
                        this.Atras()
                        const index = this.Options.findIndex(item => item.id === Turno_model.id);
                        this.Options[index] = res.data;
                    })
            },
        }
    }
</script>