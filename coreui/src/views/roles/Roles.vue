<template>
  <CRow>
    <CCol col="12" xl="12">
      <transition name="slide">
      <CCard>
        <CCardBody>
            <h4>Roles</h4>
            <CButton color="primary" @click="createRole()">Create Role</CButton>
            <CAlert
              :show.sync="dismissCountDown"
              color="primary"
              fade
            >
              ({{dismissCountDown}}) {{ message }}
            </CAlert>
            <CDataTable
              hover
              :items="items"
              :fields="fields"
              :items-per-page="10"
              pagination
            >
              <template #name="{item}">
                <td>
                  <strong>{{item.name}}</strong>
                </td>
              </template>
              <template #hierarchy="{item}">
                <td>
                  <strong>{{item.hierarchy}}</strong>
                </td>
              </template>
              <template #move-up="{item}">
                <td>
                  <CButton color="primary" @click="moveUp( item.id )">Move Up</CButton>
                </td>
              </template>
              <template #move-down="{item}">
                <td>
                  <CButton color="primary" @click="moveDown( item.id )">Move Down</CButton>
                </td>
              </template>
              <template #show="{item}">
                <td>
                  <CButton color="primary" @click="showRole( item.id )">Show</CButton>
                </td>
              </template>
              <template #edit="{item}">
                <td>
                  <CButton color="primary" @click="editRole( item.id )">Edit</CButton>
                </td>
              </template>
              <template #delete="{item}">
                <td>
                  <CButton color="danger" @click="deleteRole( item.id )">Delete</CButton>
                </td>
              </template>
            </CDataTable>
        </CCardBody>  
      </CCard>
      </transition>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Roles',
  data: () => {
    return {
      items: [],
      fields: ['name', 'hierarchy', 'move-up', 'move-down', 'show', 'edit', 'delete'],
      currentPage: 1,
      perPage: 5,
      totalRows: 0,
      you: null,
      message: '',
      showMessage: false,
      dismissSecs: 7,
      dismissCountDown: 0,
      showDismissibleAlert: false
    }
  },
  computed: {
  },
  methods: {
    getRowCount (items) {
      return items.length
    },
    roleLink (id) {
      return `roles/${id.toString()}`
    },
    editLink (id) {
      return `roles/${id.toString()}/edit`
    },
    showRole ( id ) {
      const roleLink = this.roleLink( id );
      this.$router.push({path: roleLink});
    },
    editRole ( id ) {
      const editLink = this.editLink( id );
      this.$router.push({path: editLink});
    },
    deleteRole ( id ) {
      let self = this;
      let noteId = id;
      axios.post(  this.$apiAdress + '/api/roles/' + id + '?token=' + localStorage.getItem("api_token"), {
        _method: 'DELETE'
      })
      .then(function (response) {
        if(response.data.status === 'success'){
            self.message = 'Successfully deleted role.';
            self.showAlert();
            self.getRoles();
        }else if(response.data.status === 'rejected'){
            self.message = "Can't delete. Role has assigned one or more menu elements.";
            self.showAlert();
        }
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    moveUp( id ){
      let self = this;
      axios.get(  this.$apiAdress + '/api/roles/move/move-up?id=' + id + '&token=' + localStorage.getItem("api_token"))
      .then(function (response) {
          self.message = 'Successfully move role.';
          self.showAlert();
          self.getRoles();
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    moveDown( id ){
      let self = this;
      axios.get(  this.$apiAdress + '/api/roles/move/move-down?id=' + id + '&token=' + localStorage.getItem("api_token"))
      .then(function (response) {
          self.message = 'Successfully move role.';
          self.showAlert();
          self.getRoles();
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    createRole () {
      this.$router.push({path: 'roles/create'});
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
    getRoles (){
      let self = this;
      axios.get(  this.$apiAdress + '/api/roles?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    }
  },
  mounted: function(){
    this.getRoles();
  }
}
</script>

<style scoped>
.card-body >>> table > tbody > tr > td {
  cursor: pointer;
}
</style>
