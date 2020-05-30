<template>
  <div class="card">

    <div class="card-header">
      <h3 class="card-title">Vista de Casos</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>

    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">

      <table id="tableInfo" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Caso #</th>
            <th>Asunto</th>
            <th>Cliente</th>
            <th>Estado</th>
            <th>Tiempo de Solucion</th>
            <th>Tipo</th>
            <th>Categoria</th>
          </tr>
        </thead>
        <tbody id="contenido">
          <tr v-for="caso in cases.data">
            <td>{{ caso.id }}</td>
            <td><a :href="'/openCase/' + caso.id + '/edit'" >{{ caso.title }}</a>
            </td>
            <td>{{ caso.nameUser }}</td>
            <td>

              <span class="badge bg-warning" v-if="caso.status == 'register'" style="font-size: 14px; display: block; background-color:#fcff43;">
                Registrado
              </span>

              <span class="badge bg-danger" v-else-if="caso.status == 'stop'" style="font-size: 14px; display: block;">En pausa</span>

              <span class="badge bg-primary" v-else-if="caso.status == 'process'" style="font-size: 14px; display: block;">En proceso</span>

              <span class="badge " v-else style="font-size: 14px; display: block; color: #ffffff!important; background-color: #0a0a0a!important;">Cerrado</span>
            </td>
            <td>{{ caso.solution_time }}</td>
            <td>
              <b style="color: #07c116" v-if="caso.type == 'request'" >Requerimiento</b>

              <b style="color: #fb6228" v-else>Incidente</b>
            </td>
            <td>{{ caso.nameCategory }}</td>

          </tr>

        </tbody>

      </table>
      <div class="card-body">

        <pagination :data="cases" @pagination-change-page="getCases"></pagination>
        <!-- {{ $cases->links() }} -->
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</template>

<script>

let user = document.head.querySelector('meta[name="user"]');

export default {
  data(){
    return {
      cases: {},
    }
  },
  
  computed:{
    infoUser(){
      return JSON.parse(user.content);
    }
  },

  created: function () {
    this.getCases();
  },

  methods: {
    getCases: function(page = 1) {
      var url = '/inbox/cases/' + this.infoUser.id + '?page=' + page;

      axios.get(url).then(response => {
        this.cases = response.data
      });
    },
  }

}
</script>
<style lang="scss" scoped>
</style>
