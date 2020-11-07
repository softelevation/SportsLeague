<template>
  <div>
    <h1>{{create_team}}</h1>
    <form @submit.prevent="addPost">
      <div class="row">
			<div class="col-md-6">
			  <div class="form-group">
				<label>Name:</label>
				<input type="text" class="form-control" v-model="post.name">
			  </div>
			</div>
        </div>
        <div class="form-group">
          <button class="btn btn-primary">{{create_button}}</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          post:{},
		  create_team: (this.$route.params.id) ? "Update Team" : "Create A Team",
		  create_button: (this.$route.params.id) ? "Update" : "Create"
        }
    },
	created() {
      let uri = `./../api/team/${this.$route.params.id}`;
      this.axios.get(uri).then(response => {
			this.post = {name: response.data.name};
        // this.players = response.data.player;
      });
    },
    methods: {
      addPost(){
		if(this.$route.params.id){
			let uri = `./../api/create-team/${this.$route.params.id}`;
			this.axios.post(uri, this.post).then((response) => {
			  this.$router.push({name: 'home'});
			});
		}else{
			let uri = './../api/create-team';
			this.axios.post(uri, this.post).then((response) => {
			  this.$router.push({name: 'home'});
			});
		}
      }
    }
  }
</script>
