<template>
  <b-row>
    <b-col cols="12" xl="12">
      <transition name="slide">
      <b-card>
        <div slot="header" v-html="caption"></div>
          <b-button variant="primary" @click="createNote()">Create Note</b-button>
          <b-alert :show="dismissCountDown"
            dismissible
            variant="primary"
            @dismissed="dismissCountdown=0"
            @dismiss-count-down="countDownChanged">
            ({{dismissCountDown}}) {{ message }}
          </b-alert>
          <b-table :hover="hover" :striped="striped" :bordered="bordered" :small="small" :fixed="fixed" responsive="lg" :items="items" :fields="fields" :current-page="currentPage" :per-page="perPage">
            <template slot="author" slot-scope="data">
              <strong>{{data.item.author}}</strong>
            </template>
            <template slot="title" slot-scope="data">
              <strong>{{data.item.title}}</strong>
            </template>
            <template slot="content" slot-scope="data">
              {{data.item.content}}
            </template>
            <template slot="applies_to_date" slot-scope="data">
              {{data.item.applies_to_date}}
            </template>
            <template slot="status" slot-scope="data">
              <b-badge :variant="data.item.status_class">{{data.item.status}}</b-badge>
            </template>
            <template slot="note_type" slot-scope="data">
              <strong>{{data.item.note_type}}</strong>
            </template>
 
            <template slot="Show" slot-scope="data">
              <b-button variant="primary" @click="showNote( data.item.id )">Show</b-button>
            </template>
            <template slot="Edit" slot-scope="data">
              <b-button variant="primary" @click="editNote( data.item.id )">Edit</b-button>
            </template>
            <template slot="Delete" slot-scope="data">
              <b-button v-if="you!=data.item.id" variant="danger" @click="deleteNote( data.item.id )">Delete</b-button>
            </template>

          </b-table>
        <nav>
          <b-pagination size="sm" :total-rows="getRowCount(items)" :per-page="perPage" v-model="currentPage" prev-text="Prev" next-text="Next" hide-goto-end-buttons/>
        </nav>
      </b-card>
      </transition>
    </b-col>
  </b-row>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Notes',
  props: {
    caption: {
      type: String,
      default: 'Notes'
    },
    hover: {
      type: Boolean,
      default: true
    },
    striped: {
      type: Boolean,
      default: true
    },
    bordered: {
      type: Boolean,
      default: false
    },
    small: {
      type: Boolean,
      default: false
    },
    fixed: {
      type: Boolean,
      default: false
    }
  },
  data: () => {
    return {
      items: [],
      fields: [
        {key: 'author'},
        {key: 'title'},
        {key: 'content'},
        {key: 'applies_to_date'},
        {key: 'status'},
        {key: 'note_type'},
        {key: 'Show'},
        {key: 'Edit'},
        {key: 'Delete'}
      ],
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
      axios.post('/api/notes/' + id + '?token=' + localStorage.getItem("api_token"), {
        _method: 'DELETE'
      })
      .then(function (response) {
          self.message = 'Successfully deleted note.';
          self.showAlert();
          self.getNotes();
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: 'login' });
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
      axios.get('/api/notes?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: 'login' });
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
