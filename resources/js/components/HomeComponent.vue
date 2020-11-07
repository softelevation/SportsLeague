<template>
  <div>
      <h1><img class="logo-image" src="assets/images/logo.png"> Welcome To Sports Premier League</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'createTeam' }" class="btn btn-primary">Create Team</router-link>
          </div>
		  
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(team,index) in teams" :key="index">
                    <td>{{ index+1 }}</td>
                    <td><router-link :to="{name: 'player', params: { id: team.id }}">{{ team.name }}</router-link></td>
                    <td>{{ team.created_at }}</td>
                    <td>{{ team.updated_at }}</td>
                    <td>
						<router-link :to="{name: 'editTeam', params: { id: team.id }}" class="btn btn-primary">Edit</router-link>
						<button class="btn btn-danger" @click = "deletePost(team.id)">Delete</button>
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
          teams: []
        }
      },
      created() {
      let uri = 'api/teams';
      this.axios.get(uri).then(response => {
        this.teams = response.data;
      });
    },
    methods: {
      deletePost(id)
      {
		if(confirm('Are you sure to delete this record ..?')){
			let uri = `api/team/${id}`;
			this.axios.delete(uri).then(response => {
					this.teams.splice(this.teams.findIndex(x => x.id ===id), 1);
			});
		}
      }
    }
  }
</script>

<style>
    .logo-image {
		width: 190px;
	}
</style>