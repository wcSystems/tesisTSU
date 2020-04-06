<template>
    <div>
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Crear Alumno</li>
        </ol>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col">
                            <button v-if="bolean_index" @click="Bolean_insertar()" class="btn btn-primary waves-effect waves-themed">Crear Alumno</button>
                            <button v-if="bolean_insertar" @click="Atras()" class="btn btn-primary waves-effect waves-themed">Atras</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="bolean_index" id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    <span class="fw-300"><i>Alumno</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th class="center" style="width: 20%">Id</th>
                                <th class="center" style="width: 20%">Nombre y Apellido</th>
                                <th class="center" style="width: 20%">Grado</th>
                                <th class="center" style="width: 20%">Seccion</th>
                                <th class="center" style="width: 20%">Turno</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in Bview_alumno_grado" :key="index" >
                                <td class="center">{{item.alumno_id}}</td>
                                <td class="center">{{item.alumno_nombre}} {{item.alumno_apellido}}</td>
                                <td class="center">{{item.alumno_grado}}</td>
                                <td class="center">{{item.alumno_seccion}}</td>
                                <td class="center">{{item.alumno_turno}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div v-if="bolean_insertar" id="panel-1" class="panel col-md-12">
            <div class="panel-hdr">
                <h2>
                    <span class="fw-300"><i>Crear Alumno</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <form @submit.prevent="Bstore()" style="width:100%">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="mb-15 col">Datos Personales</h3>
                            <div class="row col">
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="cedula_escolar">Cedula escolar</label>
                                    <input name="cedula_escolar" type="number" class="form-control" value="" v-model="Alumno.cedulaEscolarAlumno" placeholder="Cedula escolar   " >
                                    <div class="invalid-feedback">Este campo es obligatorio</div>
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="cedula_alumno">Cedula</label>
                                    <input name="cedula_alumno" type="number" class="form-control" value="" v-model="Alumno.cedulaAlumno" placeholder="Cedula del Alumno" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre_alumno">Nombres</label>
                                    <input name="nombre_alumno" type="text" class=" form-control" value="" v-model="Alumno.nombreAlumno" placeholder="Nombres del Alumno" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="apellido_alumno">Apellidos</label>
                                    <input name="apellido_alumno" type="text" class="form-control" value="" v-model="Alumno.apellidoAlumno" placeholder="Apellidos del Alumno" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="sexo_alumno">Sexo</label>
                                    <select name="sexo_alumno" type="text" class=" form-control" value="" v-model="Alumno.sexoAlumno" placeholder="Sexo" >
                                        <option selected value="" disabled>Elija un sexo</option>
                                        <option v-for="(item, index) in BSexos" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="telefono_alumno">Telefono</label>
                                    <input name="telefono_alumno" type="text" class="form-control" value="" v-model="Alumno.telefonoAlumno" placeholder="Telefono" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="deporte_alumno">Deportes</label>
                                    <div v-for="(item, index) in BDeportes" :key="index" class="mb-10">
                                        <div class="custom-control custom-checkbox">
                                            <input name="" type="checkbox" class="custom-control-input" v-model="Alumno.deporteAlumno" v-bind:value="item.id" :id="'AD'+item.id+''" >
                                            <label class="custom-control-label" :for="'AD'+item.id+''">{{item.descripcion}}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="fecha_nacimiento_alumno">Fecha de nacimiento</label>
                                    <input name="fecha_nacimiento_alumno" type="date" class="form-control" value="" v-model="Alumno.fechaNacimientoAlumno" placeholder="Fecha de nacimiento" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="direccion_alumno">Direccion</label>
                                    <input name="direccion_alumno" type="text" class="form-control" value="" v-model="Alumno.direccionAlumno" placeholder="Direccion" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre">Redes sociales</label>
                                    <div v-for="(item, index) in BSocials" :key="index" class="mb-10">
                                        <div class="custom-control custom-checkbox">
                                            <input name="" type="checkbox" class="custom-control-input" v-model="Alumno.redesSocialesAlumno" v-bind:value="item.id" :id="'AS'+item.id+''" >
                                            <label class="custom-control-label" :for="'AS'+item.id+''">{{item.descripcion}}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h3 class="mb-15 col">Representante</h3>
                            <div class="row col">
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="cedula">Cedula</label>
                                    <input name="cedula" type="number" class="form-control" value="" v-model="Representante.cedulaRepresentante" placeholder="Cedula" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre">Nombres</label>
                                    <input name="nombre" type="text" class="form-control" value="" v-model="Representante.nombreRepresentante" placeholder="Nombres" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="apellido">Apellidos</label>
                                    <input name="apellido" type="text" class="form-control" value="" v-model="Representante.apellidoRepresentante" placeholder="Apellidos" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="sexo">Sexo</label>
                                    <select name="sexo" type="text" class="form-control" value="" v-model="Representante.sexoRepresentante" placeholder="Sexo" >
                                        <option selected value="" disabled>Elija un sexo</option>
                                        <option v-for="(item, index) in BSexos" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre">Telefono</label>
                                    <input name="nombre" type="text" class="form-control" value="" v-model="Representante.telefonoRepresentante" placeholder="Telefono" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre">Fecha de nacimiento</label>
                                    <input name="nombre" type="date" class="form-control" value="" v-model="Representante.fechaNacimientoRepresentante" placeholder="Fecha de nacimiento" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre">Direccion</label>
                                    <input name="nombre" type="text" class="form-control" value="" v-model="Representante.direccionRepresentante" placeholder="Direccion" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre">Trabajo</label>
                                    <select name="nombre" type="text" class="form-control" value="" v-model="Representante.trabajoRepresentante" >
                                        <option selected value="" disabled>Elija un opcion</option>
                                        <option v-for="(item, index) in BTrabajos" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre">Parentesco</label>
                                    <select name="nombre" type="text" class="form-control" value="" v-model="Representante.parentescoRepresentante" >
                                        <option selected value="" disabled>Elija un opcion</option>
                                        <option v-for="(item, index) in BParentescos" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="nombre">Redes sociales</label>
                                    <div v-for="(item, index) in BSocials" :key="index" class="mb-10">
                                        <div class="custom-control custom-checkbox">
                                            <input name="" type="checkbox" class="custom-control-input" v-model="Representante.redesSocialesRepresentante" v-bind:value="item.id" :id="'RS'+item.id+''" >
                                            <label class="custom-control-label" :for="'RS'+item.id+''">{{item.descripcion}}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h3 class="mb-15 col">Datos Academicos</h3>
                            <div class="row col">
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="grado">Grado/Año</label>
                                    <select name="grado" type="text" class="form-control" value="" v-model="Academico.gradoAlumno" placeholder="Grado" >
                                        <option selected value="" disabled>Elija un grado</option>
                                        <option v-for="(item, index) in BGrados" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="seccion">Seccion</label>
                                    <select name="seccion" type="text" class="form-control" value="" v-model="Academico.seccionAlumno" placeholder="Seccion" >
                                        <option selected value="" disabled>Elija una seccion</option>
                                        <option v-for="(item, index) in BSeccions" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 col-sm-4 mb-15">
                                    <label class="form-label" for="turno">Turno</label>
                                    <select name="turno" type="text" class="form-control" value="" v-model="Academico.turnoAlumno" placeholder="Turno" >
                                        <option selected value="" disabled>Elija un turno</option>
                                        <option v-for="(item, index) in BTurnos" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h3 class="mb-15 col">Visual</h3>
                            <div class="row col">
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="lentes_alumno">Usa lentes</label>
                                    <select name="lentes_alumno" type="text" class="form-control" value="" v-model="Visual.lentesAlumno" >
                                        <option selected value="" disabled>Elija un opcion</option>
                                        <option v-for="(item, index) in BBooleans" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="ojo_derecho_alumno">Ojo derecho</label>
                                    <select name="ojo_derecho_alumno" type="text" class="form-control" value="" v-model="Visual.ojoDerechoAlumno" >
                                        <option selected value="" disabled>Elija un opcion</option>
                                        <option v-for="(item, index) in BVisions" :key="index" v-bind:value="item.id">{{item.code}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="ojo_izquierdo_alumno">Ojo izquierdo</label>
                                    <select name="ojo_izquierdo_alumno" type="text" class="form-control" value="" v-model="Visual.ojoIzquierdoAlumno" >
                                        <option selected value="" disabled>Elija un opcion</option>
                                        <option v-for="(item, index) in BVisions" :key="index" v-bind:value="item.id">{{item.code}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="estrabismo_alumno">Estrabismo</label>
                                    <select name="estrabismo_alumno" type="text" class="form-control" value="" v-model="Visual.estrabismoAlumno" >
                                        <option selected value="" disabled>Elija un opcion</option>
                                        <option v-for="(item, index) in BBooleans" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="seguimiento_alumno">Seguimiento</label>
                                    <select name="seguimiento_alumno" type="text" class="form-control" value="" v-model="Visual.seguimientoAlumno" >
                                        <option selected value="" disabled>Elija un opcion</option>
                                        <option v-for="(item, index) in BBooleans" :key="index" v-bind:value="item.id">{{item.descripcion}}</option>
                                    </select>
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="observacion_alumno_visual">Observaciones</label>
                                    <input name="observacion_alumno_visual" type="text" class="form-control" value="" v-model="Visual.observacionesAlumno" placeholder="Observaciones" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h3 class="mb-15 col">Amtropometria</h3>
                            <div class="row col">
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="talla_alumno">Talla</label>
                                    <input name="talla_alumno" type="text" class="form-control" value="" v-model="Amtropometria.tallaAlumno" placeholder="Talla" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="peso_alumno">Peso</label>
                                    <input name="peso_alumno" type="text" class="form-control" value="" v-model="Amtropometria.pesoAlumno" placeholder="Peso" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                                <div class="form-group col-sm-4 mb-15">
                                    <label class="form-label" for="observacion_alumno_amtropometria">Observaciones</label>
                                    <input name="observacion_alumno_amtropometria" type="text" class="form-control" value="" v-model="Amtropometria.observacionesAlumno" placeholder="Observaciones" >
                                    <div class="invalid-feedback">Este campo es obligatorio</div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button  type="submit" class="btn btn-primary float-right">Guardar alumno</button>
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
                BSexos: [],
                BGrados: [],
                BSeccions: [],
                BTurnos: [],
                BBooleans: [],
                BDeportes: [],
                BParentescos: [],
                BSocials: [],
                BTrabajos: [],
                BVisions: [],
                BAlumnos: [],
                Bview_alumno_grado: [],

                Alumno: {cedulaEscolarAlumno:'',cedulaAlumno:'',nombreAlumno:'',apellidoAlumno:'',sexoAlumno:'',telefonoAlumno:'',deporteAlumno:[],fechaNacimientoAlumno:'',direccionAlumno:'',redesSocialesAlumno:[]},
                Representante: {cedulaRepresentante:'',nombreRepresentante:'',apellidoRepresentante:'',sexoRepresentante:'',telefonoRepresentante:'',fechaNacimientoRepresentante:'',direccionRepresentante:'',trabajoRepresentante:'',parentescoRepresentante:'',redesSocialesRepresentante:[]},
                Academico: {gradoAlumno:'',seccionAlumno:'',turnoAlumno:''},
                Visual: {lentesAlumno:'',ojoDerechoAlumno:'',ojoIzquierdoAlumno:'',estrabismoAlumno:'',seguimientoAlumno:'',observacionesAlumno:''},
                Amtropometria: {tallaAlumno:'',pesoAlumno:'',observacionesAlumno:''},

                registrarAlumno: {Alumno:'',Representante:'',Academico:'',Visual:'',Amtropometria:''},
                
                bolean_index: true,
                bolean_insertar: false,
                bolean_edit: false
            }
        },
        created() {
            axios.get("/Consultas").then(res => {
                this.BSexos = res.data.Sexos
                this.BGrados = res.data.Grados
                this.BSeccions = res.data.Seccions
                this.BTurnos = res.data.Turnos
                this.BBooleans = res.data.Booleans
                this.BDeportes = res.data.Deportes
                this.BParentescos = res.data.Parentescos
                this.BSocials = res.data.Socials
                this.BTrabajos = res.data.Trabajos
                this.BVisions = res.data.Visions
                this.BAlumnos = res.data.Alumnos
                this.Bview_alumno_grado = res.data.view_alumno_grado
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
            Atras(){
                this.Tabla()
                this.bolean_index = true,
                this.bolean_insertar = false
            },
            Bstore(){
                $('#dt-basic-example').dataTable()
                this.registrarAlumno = {Alumno:this.Alumno,Representante:this.Representante,Academico:this.Academico,Visual:this.Visual,Amtropometria:this.Amtropometria}
                axios.post("/alumnoNuevo",this.registrarAlumno).then(res => {
                    axios.get("/Consultas").then(res => {
                        this.Bview_alumno_grado = res.data.view_alumno_grado
                        toastr["success"]("Alumno registrado") 
                        
                    });  
                    this.bolean_insertar = false
                    this.bolean_index = true
                    this.Alumno = {cedulaEscolarAlumno:'',cedulaAlumno:'',nombreAlumno:'',apellidoAlumno:'',sexoAlumno:'',telefonoAlumno:'',deporteAlumno:[],fechaNacimientoAlumno:'',direccionAlumno:'',redesSocialesAlumno:[]}
                    this.Representante = {cedulaRepresentante:'',nombreRepresentante:'',apellidoRepresentante:'',sexoRepresentante:'',telefonoRepresentante:'',fechaNacimientoRepresentante:'',direccionRepresentante:'',trabajoRepresentante:'',parentescoRepresentante:'',redesSocialesRepresentante:[]}
                    this.Academico = {gradoAlumno:'',seccionAlumno:'',turnoAlumno:''}
                    this.Visual = {lentesAlumno:'',ojoDerechoAlumno:'',ojoIzquierdoAlumno:'',estrabismoAlumno:'',seguimientoAlumno:'',observacionesAlumno:''}
                    this.Amtropometria = {tallaAlumno:'',pesoAlumno:'',observacionesAlumno:''}
                    this.registrarAlumno = {Alumno:'',Representante:'',Academico:'',Visual:'',Amtropometria:''}
                });
            },
        }
    }
</script>