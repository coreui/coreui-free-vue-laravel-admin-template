<template>
    <div class="app flex-row align-items-center">
      <div class="container">
        <b-row class="justify-content-center">
          <b-col md="6" sm="8">
            <b-card no-body class="mx-4">
              <b-card-body class="p-4">
                <b-form>
                  <h1>Register</h1>
                  <p class="text-muted">Create your account</p>
  
                    <form @submit.prevent="register" method="POST">
  
                        <b-input-group class="mb-3">
                          <b-input-group-prepend>
                            <b-input-group-text><i class="icon-user"></i></b-input-group-text>
                          </b-input-group-prepend>
                          <b-form-input type="text" class="form-control" placeholder="Username" autocomplete="username" v-model="name"/>
                        </b-input-group>
  
                        <b-input-group class="mb-3">
                          <b-input-group-prepend>
                            <b-input-group-text>@</b-input-group-text>
                          </b-input-group-prepend>
                          <b-form-input type="text" class="form-control" placeholder="Email" autocomplete="email" v-model="email"/>
                        </b-input-group>
  
                        <b-input-group class="mb-3">
                          <b-input-group-prepend>
                            <b-input-group-text><i class="icon-lock"></i></b-input-group-text>
                          </b-input-group-prepend>
                          <b-form-input type="password" class="form-control" placeholder="Password" autocomplete="new-password" v-model="password"/>
                        </b-input-group>
  
                        <b-input-group class="mb-4">
                          <b-input-group-prepend>
                            <b-input-group-text><i class="icon-lock"></i></b-input-group-text>
                          </b-input-group-prepend>
                          <b-form-input type="password" class="form-control" placeholder="Repeat password" autocomplete="new-password" v-model="password_confirmation"/>
                        </b-input-group>
  
                        <b-button variant="success" block type="submit">Create Account</b-button>
                    </form>
  
                </b-form>
              </b-card-body>
              <b-card-footer class="p-4">
                <b-row>
                  <b-col cols="6">
                    <b-button block class="btn btn-facebook"><span>facebook</span></b-button>
                  </b-col>
                  <b-col cols="6">
                    <b-button block class="btn btn-twitter" type="button"><span>twitter</span></b-button>
                  </b-col>
                </b-row>
              </b-card-footer>
            </b-card>
          </b-col>
        </b-row>
      </div>
    </div>
  </template>
  
  <script>
  /* 
  export default {
    name: 'Register'
  }
  */
  </script>
  <script>
    import axios from 'axios'

    export default {
      data() {
        return {
          name: '',
          email: '',
          password: '',
          password_confirmation: ''
        }
      },    
      methods: {
        register() {
          var self = this;
          axios.post('/api/register', {
            name: self.name,
            email: self.email,
            password: self.password,
            password_confirmation: self.password_confirmation
          }).then(function (response) {
            self.name = '';
            self.email = '';
            self.password = '';
            self.password_confirmation = '';

            console.log(response);

            //self.$router.push('Login');
          })
          .catch(function (error) {
            console.log(error);
          });
  
        }
      }
    }
  
  </script>
  