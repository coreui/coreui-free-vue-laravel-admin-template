<template>
  <CRow>
    <CCol col="12" xl="12">
      <transition name="slide">
      <CCard>
        <CCardBody>
            <CButton color="primary" @click="createNote()">Create Note</CButton>
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
              <template #author="{item}">
                <td>
                  <strong>{{item.author}}</strong>
                </td>
              </template>
              <template #title="{item}">
                <td>
                  <strong>{{item.title}}</strong>
                </td>
              </template>
              <template #content="{item}">
                <td>
                  {{item.content}}
                </td>  
              </template>
              <template #applies_to_date="{item}">
                <td>
                  {{item.applies_to_date}}
                </td>
              </template>
              <template #status="{item}">
                <td>
                  <CBadge :color="item.status_class">{{item.status}}</CBadge>
                </td>
              </template>
              <template #note_type="{item}">
                <td>
                  <strong>{{item.note_type}}</strong>
                </td>
              </template>
              <template #show="{item}">
                <td>
                  <CButton color="primary" @click="showNote( item.id )">Show</CButton>
                </td>
              </template>
              <template #edit="{item}">
                <td>
                  <CButton color="primary" @click="editNote( item.id )">Edit</CButton>
                </td>
              </template>
              <template #delete="{item}">
                <td>
                  <CButton v-if="you!=item.id" color="danger" @click="deleteNote( item.id )">Delete</CButton>
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
  name: 'Notes',
  data: () => {
    return {
      items: [],
      /*
      fields: [
        {key: 'author'},
        {key: 'title'},
        {key: 'content'},
        {key: 'applies_to_date'},
        {key: 'status'},
        {key: 'note_type'},
        {key: 'show'},
        {key: 'edit'},
        {key: 'delete'}
      ],
      */
      fields: ['author', 'title', 'content', 'applies_to_date', 'status', 'note_type', 'show', 'edit', 'delete'],
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
    noteLink (id) {
      return `notes/${id.toString()}`
    },
    editLink (id) {
      return `notes/${id.toString()}/edit`
    },
    showNote ( id ) {
      const noteLink = this.noteLink( id );
      this.$router.push({path: noteLink});
    },
    editNote ( id ) {
      const editLink = this.editLink( id );
      this.$router.push({path: editLink});
    },
    deleteNote ( id ) {
      let self = this;
      let noteId = id;
      axios.post(  this.$apiAdress + '/api/notes/' + id + '?token=' + localStorage.getItem("api_token"), {
        _method: 'DELETE'
      })
      .then(function (response) {
          self.message = 'Successfully deleted note.';
          self.showAlert();
          self.getNotes();
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    createNote () {
      this.$router.push({path: 'notes/create'});
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
    getNotes (){
      let self = this;
      axios.get(  this.$apiAdress + '/api/notes?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    }
  },
  mounted: function(){
    this.getNotes();
  }
}
</script>

<style scoped>
.card-body >>> table > tbody > tr > td {
  cursor: pointer;
}
</style>
