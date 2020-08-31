<template>
  <CRow>
    <CCol col="12" lg="6">
      <CCard>
        <CCardBody>
          <h3>
            Edit Menu
          </h3>
          <CAlert
            :show.sync="dismissCountDown"
            color="primary"
            fade
          >
            ({{dismissCountDown}}) {{ message }}
          </CAlert>
          <CInput label="Name" type="text" placeholder="Name" v-model="name"></CInput>
          <CButton color="primary" @click="update()">Save</CButton>
          <CButton color="primary" @click="goBack">Back</CButton>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'
export default {
  name: 'EditMenu',
  data: () => {
    return {
        name: '',
        message: '',
        dismissSecs: 7,
        dismissCountDown: 0,
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
    },
    update() {
        let self = this;
        axios.post(  this.$apiAdress + '/api/menu/menu/update' + '?token=' + localStorage.getItem("api_token"),
        {
            name: self.name,
            id: self.$route.params.id,
        })
        .then(function (response) {
            self.message = 'Successfully updated note.';
            self.showAlert();
        }).catch(function (error) {
            if(error.response.data.message == 'The given data was invalid.'){
              self.message = '';
              for (let key in error.response.data.errors) {
                if (error.response.data.errors.hasOwnProperty(key)) {
                  self.message += error.response.data.errors[key][0] + '  ';
                }
              }
              self.showAlert();
            }else{
              console.log(error); 
              self.$router.push({ path: '/login' }); 
            }
        });
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
  },
  mounted: function(){
    let self = this;
    axios.get(  this.$apiAdress + '/api/menu/menu/edit?token=' + localStorage.getItem("api_token") + '&id=' + self.$route.params.id)
    .then(function (response) {
        self.name = response.data.menulist.name;
    }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
    });
  }
}


</script>
