<template>

  <div class="col-md-12">
    <!-- The time line -->
    <div class="timeline" >
      <!-- timeline time label -->
      <div class="time-label">
        <span class="bg-green">Tiempo</span>
      </div>
      <!-- /.timeline-label -->
      <div>
        <i class="fas fa-plus-circle bg-blue"></i>
        <div class="timeline-item">
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
          <!-- <span class="time"><i class="fas fa-clock"></i> {{since(nota.created_at)}}</span> -->
          <h3 class="timeline-header"><a href="#">{{nota.author_id}}</a> agrego una nota</h3>
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
import axios from 'axios'

moment.locale();

export default {
  data() {
    return {
      notas: [],
      newNote: '',
    }
  },
  created: function(){
    this.getNotas();
  },
  // since: function (d) {
  //   return moment(d).fromNow();
  // },
  methods: {
    getNotas: function(){
      var urlNotas = 'notes';

      axios.get(urlNotas).then(response => {
        this.notas = response.data
      });
    },
    createNote: function(e){
      // e.preventDefault();
      var url = 'notesCreate';
      axios.post(url,{
        description: this.newNote,
      }).then(response => {
        this.getNotas();
        this.newNote = '';
        toastr.success('La nota ha sido registrada');
      }).catch(error => {
        toastr.error('Ha ocurrido un error.');
      });
    }
  }
}
</script>
