<template>
  <div>
      <h1>Players</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'createplayer', params: { id: player_id }}" class="btn btn-primary">Create Player</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(player,index) in players" :key="index">
                    <td>{{ index+1 }}</td>
                    <td>{{ player.first_name }}</td>
                    <td>{{ player.last_name }}</td>
                    <td>{{ player.created_at }}</td>
                    <td>{{ player.updated_at }}</td>
                    <td>
						<router-link :to="{name: 'editPlayer', params: { id: player.id }}" class="btn btn-primary">Edit</router-link>
						<button class="btn btn-danger" @click = "deletePost(player.id)">Delete</button>
					</td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      data() {
        return {
          players: [],
		  player_id: this.$route.params.id
        }
      },
      created() {
      let uri = `./../api/player/${this.$route.params.id}`;
      this.axios.get(uri).then(response => {
        this.players = response.data.player;
      });
    },
    methods: {
      deletePost(id)
      {
        if(confirm('Are you sure to delete this record ..?')){
			let uri = `./../api/delete-player/${id}`;
			this.axios.delete(uri).then(response => {
					this.players.splice(this.players.findIndex(x => x.id ===id), 1);
			});
		}
      }
    }
  }
</script>
