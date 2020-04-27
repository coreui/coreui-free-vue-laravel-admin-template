<template>
  <CRow>
    <CCol col="12" lg="6">
      <CCard no-header>
        <CCardBody>
          <h3>
            Show Menu Element
          </h3>
          <CAlert
            :show.sync="dismissCountDown"
            color="primary"
            fade
          >
            ({{dismissCountDown}}) {{ message }}
          </CAlert>
          <h4>Menu</h4>
          {{ menuelement.menu_name }}
          <h4>User Roles</h4>
          {{ roles }}
          <h4>Name</h4>
          {{ menuelement.name }}
          <h4>Type</h4>
          {{ menuelement.slug }}
          <h4>Href</h4>
          {{ menuelement.href }}
          <h4>Dropdown parent</h4>
          {{ menuelement.parent_name }}
          <h4>Icon</h4>
          {{ menuelement.icon }}
          <br><br>
          <CButton color="primary" @click="goBack">Back</CButton>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'
export default {
  name: 'CreateMenuElement',
  data: () => {
    return {
        roles: '',
        menuroles: [],
        menuelement: [],
        message: '',
        dismissSecs: 7,
        dismissCountDown: 0,
        showDismissibleAlert: false,
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
      // this.$router.replace({path: '/users'})
    },
    getData() {
      let self = this;
      axios.get(  '/api/menu/element/show?token=' + localStorage.getItem("api_token") + '&id=' + self.$route.params.id )
      .then(function (response) {
        self.menuelement = response.data.menuElement
        self.menuroles = response.data.menuroles
        self.roles = ''
        for(let i = 0; i<self.menuroles.length; i++){
          if(i > 0){
            self.roles += ', '
          }
          self.roles += self.menuroles[i].role_name
        }
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
  },
  mounted: function(){
    this.getData()
  }
}

</script>
