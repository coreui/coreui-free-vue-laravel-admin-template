<template>
  <CRow>
    <CCol col="6" lg="6">
      <CCard>
        <CCardBody>
          <h4>Delete Menu Element</h4>
          <p>Are you sure?</p>
          <CAlert
            :show.sync="dismissCountDown"
            color="primary"
            fade
          >
            ({{dismissCountDown}}) {{ message }}
          </CAlert>

          <CButton color="danger" @click="deleteMenu()">Delete</CButton>
          <CButton color="primary" @click="goBack">Back</CButton>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'
export default {
  name: 'DeleteMenu',
  data: () => {
    return {
        message: '',
        dismissSecs: 7,
        dismissCountDown: 0,
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
    },   
    deleteMenu() {
      let self = this;
      axios.get(  this.$apiAdress + '/api/menu/element/delete?token=' + localStorage.getItem("api_token") + '&id=' + self.$route.params.id, {})
      .then(function (response) {
        self.$router.go(-1)
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
  },
  mounted: function(){
  }
}

</script>