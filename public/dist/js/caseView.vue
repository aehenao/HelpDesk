
Vue.component('notes', {
  template: //html `

  <div class="timeline-item">
    <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
    <div class="timeline-body">
      {{notas}}
    </div>
    <div class="timeline-footer">
      <a class="btn btn-warning btn-sm">View comment</a>
    </div>
  </div>

  `,

  data(){
    return {
      notas: [],
    }
  }
});



const app = new Vue({
  el: '#app',
  created: function(){
    this.getNotas();
  },
  methods:{
    getNotas: function(){
      var urlNotas = '/notes/{note}';

      axios.get(urlNotas).then(response => {
        this.notas = response.data
      });
    }
  }

});
