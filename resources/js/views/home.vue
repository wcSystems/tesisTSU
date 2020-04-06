<template>
  <div>
    <ol class="breadcrumb page-breadcrumb">
      <li class="breadcrumb-item">Home</li>
    </ol>
    <div class="col-xl-6">
        <div id="panel-12" class="panel">
            <div class="panel-hdr">
                <h2>
                    <span class="fw-300"><i>Utilidad porcentual promedio del dia</i></span>
                </h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div id="chart06">
                        <canvas style="width:100%; height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      Bview_alumno_grado: []
    };
  },
  created() {
    axios.get("/Consultas").then(res => {
        this.Bview_alumno_grado = res.data.view_alumno_grado
        console.log(this.Bview_alumno_grado)
        this.Grafica01()
    })
    
  },
  methods: {
    Grafica01(){
      let config = {type: 'doughnut',data:{datasets: [
                    {data: [1,2],backgroundColor: [ myapp_get_color.success_200,myapp_get_color.success_400,],label: 'My dataset'}],labels: ["UTILIDAD %","PROCENTUAL %",] },};
      new Chart($("#chart06 > canvas").get(0).getContext("2d"), config);
    }
            
  }
};
</script>
