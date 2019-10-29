<template>
  <CContainer class="min-vh-100 d-flex align-items-center">
    <CRow class="w-100 justify-content-center">
      <CCol md="6" sm="8">
        <CCard class="mx-4 mb-0">
          <CCardBody class="p-4">
            <CForm @submit.prevent="register" method="POST">
              <h1>Register</h1>
              <p class="text-muted">Create your account</p>
              <CInput
                placeholder="Username"
                prependHtml="<i class='cui-user'></i>"
                autocomplete="username"
                v-model="name"
              />
              <CInput
                placeholder="Email"
                prepend-html="@"
                autocomplete="email"
                v-model="email"
              />
              <CInput
                placeholder="Password"
                type="password"
                prependHtml="<i class='cui-lock-locked'></i>"
                autocomplete="new-password"
                v-model="password"
              />
              <CInput
                placeholder="Repeat password"
                type="password"
                prependHtml="<i class='cui-lock-locked'></i>"
                autocomplete="new-password"
                class="mb-4"
                v-model="password_confirmation"
              />
              <CButton type="submit" color="success" block>Create Account</CButton>
            </CForm>
          </CCardBody>
          <CCardFooter class="p-4">
            <CRow>
              <CCol col="6">
                <CButton block color="facebook">
                  Facebook
                </CButton>
              </CCol>
              <CCol col="6">
                <CButton block color="twitter">
                  Twitter
                </CButton>
              </CCol>
            </CRow>
          </CCardFooter>
        </CCard>
      </CCol>
    </CRow>
  </CContainer>
</template>

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
            self.$router.push({ path: '/login' });
          })
          .catch(function (error) {
            console.log(error);
          });
  
        }
      }
    }
  
  </script>
