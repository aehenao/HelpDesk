<template>

  <div class="col-md-12">
    <!-- The time line -->
    <div class="timeline" >
      <!-- /.timeline-label -->
      <div v-if="infoCase != 'close'">
        <i class="fas fa-plus-circle bg-blue"></i>
        <div class="timeline-item" >
          <h3 class="timeline-header"><a href="#">Agregar Nota</a> </h3>

          <form @submit.prevent="createNote">

            <div class="timeline-body">
              <textarea  v-model="newNote" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
            </div>

            <div class="timeline-footer">
              <button type="submit" id="save" class="btn btn-primary btn-sm">Publicar</button>
            </div>

          </form>


        </div>
      </div>

      <!-- timeline item -->
      <div v-for="nota in notas">
        <i class="fas fa-comments bg-yellow"></i>
        <div class="timeline-item" >
          <span class="time"><i class="fas fa-clock"></i> {{since(nota.created_at)}}</span>
          <h3 class="timeline-header"><a href="#" v-for="autor in nota.name">{{autor}}</a> agrego una nota</h3>
          <div class="timeline-body">
            {{nota.description}}
          </div>
        </div>
      </div>

      <!-- END timeline item -->

      <!-- timeline item -->


      <!-- END timeline item -->

      <div>
        <i class="fas fa-clock bg-gray"></i>
      </div>
    </div>
    <!-- The time line -->

  </div>

</template>

<script>


let user = document.head.querySelector('meta[name="user"]');
let dataCase = document.head.querySelector('meta[name="case"]');


moment.locale();

export default {
  data() {
    return {
      notas: [],
      newNote: '',
    }
  },
  computed: {
    infoUser(){
        return JSON.parse(user.content);
    },
    infoCase(){
      return dataCase.content;
    }
  },
  created: function(){
    this.getNotas();
  },
  methods: {
    getNotas: function(id){
      //var urlNotas = '/views/' + id + 'notes';
      var urlNotas = 'notes';
      axios.get(urlNotas).then(response => {
        this.notas = response.data
      });
    },
    createNote: function(){
      // e.preventDefault();
      var url = 'notesCreate';
      axios.post(url,{
        description: this.newNote,
        author: this.infoUser.id,
      }).then(response => {
        this.getNotas();
        this.newNote = '';
        toastr.success('La nota ha sido registrada');
      }).catch(error => {
        toastr.error('Ha ocurrido un error.');
      });
    },
    since: function (d) {
      return moment(d).fromNow();
    },
  }
}
</script>
