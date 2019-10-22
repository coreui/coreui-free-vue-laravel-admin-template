<template>
  <b-row>
    <b-col cols="12" lg="6">
      <b-card no-header>
        <template slot="header">
          Edit User id:  {{ $route.params.id }}
        </template>
          <b-alert :show="dismissCountDown"
            dismissible
            variant="primary"
            @dismissed="dismissCountdown=0"
            @dismiss-count-down="countDownChanged">
            ({{dismissCountDown}}) {{ message }}
          </b-alert>
          <b-form-group>
            <label for="name">Name</label>
            <b-form-input type="text" id="company" placeholder="Name" v-model="name"></b-form-input>
          </b-form-group>
          <b-form-group>
            <label for="email">Email</label>
            <b-form-input type="text" id="email" placeholder="Email" v-model="email"></b-form-input>
          </b-form-group>
        <template slot="footer">
          <b-button @click="update()">Edit</b-button>
          <b-button @click="goBack">Back</b-button>
        </template>
      </b-card>
    </b-col>
  </b-row>
</template>

<script>
import axios from 'axios'
export default {
  name: 'EditUser',
  props: {
    caption: {
      type: String,
      default: 'User id'
    },
  },
  data: () => {
    return {
        name: '',
        email: '',
        showMessage: false,
        message: '',
        dismissSecs: 7,
        dismissCountDown: 0,
        showDismissibleAlert: false
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
      // this.$router.replace({path: '/users'})
    },
    update() {
        let self = this;
        axios.post('/api/users/' + self.$route.params.id + '?token=' + localStorage.getItem("api_token")),
        {
            _method: 'PUT',
            name: self.name,
            email: self.email
        })
        .then(function (response) {
            self.message = 'Successfully updated user.';
            self.showAlert();
        }).catch(function (error) {
            console.log(error);
            self.$router.push({ path: 'login' });
        });
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
  },
  mounted: function(){
    let self = this;
    axios.get('/api/users/' + self.$route.params.id + '/edit?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
        self.name = response.data.name;
        self.email = response.data.email;
    }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: 'login' });
    });
  }
}

/*
      items: (id) => {
        const user = usersData.find( user => user.id.toString() === id)
        const userDetails = user ? Object.entries(user) : [['id', 'Not found']]
        return userDetails.map(([key, value]) => {return {key: key, value: value}})
      },
*/

</script>
