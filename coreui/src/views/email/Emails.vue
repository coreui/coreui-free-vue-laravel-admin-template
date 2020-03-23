<template>
  <CRow>
    <CCol col="12" xl="12">
      <transition name="slide">
      <CCard>
        <CCardBody>
            <h4>Email Templates</h4>
            <CButton class="m-3" color="primary" @click="createTemplate()">Create Template</CButton>
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
              <template #subject="{item}">
                <td>
                  <strong>{{item.subject}}</strong>
                </td>
              </template>
              <template #send="{item}">
                <td>
                  <CButton color="warning" @click="sendEmail( item.id )">Send</CButton>
                </td>
              </template>
              <template #show="{item}">
                <td>
                  <CButton color="primary" @click="showEmail( item.id )">Show</CButton>
                </td>
              </template>
              <template #edit="{item}">
                <td>
                  <CButton color="primary" @click="editEmail( item.id )">Edit</CButton>
                </td>
              </template>
              <template #delete="{item}">
                <td>
                  <CButton color="danger" @click="deleteEmail( item.id )">Delete</CButton>
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
  name: 'Emails',
  data: () => {
    return {
      items: [],
      fields: ['name', 'subject', 'send', 'show', 'edit', 'delete'],
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
    getRowCount (items) {
      return items.length
    },
    noteLink (id) {
      return `email/${id.toString()}`
    },
    editLink (id) {
      return `email/${id.toString()}/edit`
    },
    showEmail ( id ) {
      const noteLink = this.noteLink( id );
      this.$router.push({path: noteLink});
    },
    editEmail ( id ) {
      const editLink = this.editLink( id );
      this.$router.push({path: editLink});
    },
    sendEmail ( id ){
        this.$router.push({path: `email/${id.toString()}/sendEmail`});
    },
    deleteEmail ( id ) {
      let self = this;
      let noteId = id;
      axios.post(  '/api/mail/' + id + '?token=' + localStorage.getItem("api_token"), {
        _method: 'DELETE'
      })
      .then(function (response) {
          self.message = 'Successfully deleted Email Template.';
          self.showAlert();
          self.getTemplates();
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    createTemplate () {
      this.$router.push({path: 'email/create'});
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
    getTemplates (){
      let self = this;
      axios.get(  '/api/mail?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    }
  },
  mounted: function(){
    this.getTemplates();
  }
}
</script>

<style scoped>
.card-body >>> table > tbody > tr > td {
  cursor: pointer;
}
</style>