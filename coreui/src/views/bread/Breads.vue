<template>
  <CRow>
    <CCol col="12" xl="12">
      <transition name="slide">
      <CCard>
        <CCardBody>
            <h4>Breads</h4>
            <CButton color="primary" @click="createBread()">Create Bread</CButton>
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
              <template #goto="{item}">
                <td>
                  <CButton color="primary" @click="goto( item.id )">Go to resources</CButton>
                </td>
              </template>
              <template #show="{item}">
                <td>
                  <CButton color="primary" @click="showBread( item.id )">Show</CButton>
                </td>
              </template>
              <template #edit="{item}">
                <td>
                  <CButton color="primary" @click="editBread( item.id )">Edit</CButton>
                </td>
              </template>
              <template #delete="{item}">
                <td>
                  <CButton color="danger" @click="deleteBread( item.id )">Delete</CButton>
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
  name: 'Breads',
  data: () => {
    return {
      items: [],
      fields: ['name', 'goto', 'show', 'edit', 'delete'],
      currentPage: 1,
      perPage: 5,
      totalRows: 0,
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
    goto( id){
      this.$router.push({path: `resource/${id.toString()}/resource`})
    },
    breadLink (id) {
      return `bread/${id.toString()}`
    },
    editLink (id) {
      return `bread/${id.toString()}/edit`
    },
    showBread ( id ) {
      const breadLink = this.breadLink( id )
      this.$router.push({path: breadLink})
    },
    editBread ( id ) {
      const editLink = this.editLink( id )
      this.$router.push({path: editLink})
    },
    deleteBread ( id ) {
      const deleteLink = `bread/${id.toString()}/delete`
      this.$router.push({path: deleteLink})
    },
    createBread () {
      this.$router.push({path: 'bread/create'})
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
    getBreads (){
      let self = this;
      axios.get(  '/api/bread?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    }
  },
  mounted: function(){
    this.getBreads();
  }
}
</script>

<style scoped>
.card-body >>> table > tbody > tr > td {
  cursor: pointer;
}
</style>
