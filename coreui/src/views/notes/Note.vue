<template>
  <b-row>
    <b-col cols="12" lg="6">
      <b-card no-header>
        <template slot="header">
          Note id:  {{ $route.params.id }}
        </template>

        <h4>Author:</h4>
        <p>{{ note.author }}</p>
        <h4>Title:</h4>
        <p>{{ note.title }}</p>
        <h4>Content:</h4> 
        <p>{{ note.content }}</p>
        <h4>Applies to date:</h4> 
        <p>{{ note.applies_to_date }}</p>
        <h4>Status: </h4>
        <p>
            <b-badge :variant="note.status_class">{{note.status}}</b-badge>
        </p>
        <h4>Note type:</h4>
        <p>{{ note.note_type }}</p>

        <template slot="footer">
          <b-button @click="goBack">Back</b-button>
        </template>
      </b-card>
    </b-col>
  </b-row>
</template>

<script>
import axios from 'axios'
export default {
  name: 'User',
  props: {
    caption: {
      type: String,
      default: 'User id'
    },
  },
  data: () => {
    return {
      note: [],
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
      // this.$router.replace({path: '/users'})
    }
  },
  mounted: function(){
    let self = this;
    axios.get('/api/notes/' + self.$route.params.id + '?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
      console.log(response.data);
      self.note = response.data;
    }).catch(function (error) {
      console.log(error);
      self.$router.push({ path: 'login' });
    });
  }
}


</script>
