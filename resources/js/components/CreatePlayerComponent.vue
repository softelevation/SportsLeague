<template>
  <div>
    <h1>{{create_team}}</h1>
    <form @submit.prevent="addPost">
      <div class="row">
			<div class="col-md-6">
			  <div class="form-group">
				<label>First name:</label>
				<input type="text" class="form-control" v-model="player.first_name">
			  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
			  <div class="form-group">
				<label>Last name:</label>
				<input type="text" class="form-control" v-model="player.last_name">
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
          player:{},
		  create_team: "Create Player",
		  create_button: "Create"
        }
    },
	created() {
    },
    methods: {
      addPost(){
			let uri = `http://127.0.0.1:8000/api/create-player/${this.$route.params.id}`;
			this.axios.post(uri, this.player).then((response) => {
			  this.$router.push({name: 'player', params: { id: this.$route.params.id }});
			});
      }
    }
  }
</script>
