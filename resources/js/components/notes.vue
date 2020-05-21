<template>
  <div>
    <i class="fas fa-comments bg-yellow"></i>
  <div class="timeline-item" v-for="nota in notas">
    <span class="time"><i class="fas fa-clock"></i> {{since(nota.created_at)}}</span>
    <h3 class="timeline-header"><a href="#">{{nota.author_id}}</a> agrego una nota</h3>
    <div class="timeline-body">
      {{nota.description}}
    </div>
  </div>
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
        since: function (d) {
          return moment(d).fromNow();
        },
        methods: {
          getNotas: function(){
            var urlNotas = 'notes';

            axios.get(urlNotas).then(response => {
              this.notas = response.data
            });
          },
          createNote: function(){
            var url = 'notes-create';
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
