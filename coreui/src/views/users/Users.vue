<template>
  <b-row>
    <b-col cols="12" xl="8">
      <transition name="slide">
      <b-card>
        <div slot="header" v-html="caption"></div>
          <b-alert :show="dismissCountDown"
            dismissible
            variant="primary"
            @dismissed="dismissCountdown=0"
            @dismiss-count-down="countDownChanged">
            ({{dismissCountDown}}) {{ message }}
          </b-alert>
          <b-table :hover="hover" :striped="striped" :bordered="bordered" :small="small" :fixed="fixed" responsive="md" :items="items" :fields="fields" :current-page="currentPage" :per-page="perPage">
            <template slot="id" slot-scope="data">
              <strong>{{data.item.id}}</strong>
            </template>
            <template slot="name" slot-scope="data">
              <strong>{{data.item.name}}</strong>
            </template>
            <template slot="status" slot-scope="data">
              <b-badge :variant="getBadge(data.item.status)">{{data.item.status}}</b-badge>
            </template>
            <template slot="show" slot-scope="data">
              <b-button variant="primary" @click="showUser( data.item.id )">Show</b-button>
            </template>
            <template slot="edit" slot-scope="data">
              <b-button variant="primary" @click="editUser( data.item.id )">Edit</b-button>
            </template>
            <template slot="delete" slot-scope="data">
              <b-button v-if="you!=data.item.id" variant="danger" @click="deleteUser( data.item.id )">Delete</b-button>
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
  name: 'Users',
  props: {
    caption: {
      type: String,
      default: 'Users'
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
        {key: 'id'},
        {key: 'name'},
        {key: 'registered'},
        {key: 'roles'},
        {key: 'status'},
        {key: 'show'},
        {key: 'edit'},
        {key: 'delete'}
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
    getBadge (status) {
      return status === 'Active' ? 'success'
        : status === 'Inactive' ? 'secondary'
          : status === 'Pending' ? 'warning'
            : status === 'Banned' ? 'danger' : 'primary'
    },
    getRowCount (items) {
      return items.length
    },
    userLink (id) {
      return `users/${id.toString()}`
    },
    editLink (id) {
      return `users/${id.toString()}/edit`
    },
    showUser ( id ) {
      const userLink = this.userLink( id );
      this.$router.push({path: userLink});
    },
    editUser ( id ) {
      const editLink = this.editLink( id );
      this.$router.push({path: editLink});
    },
    deleteUser ( id ) {
      let self = this;
      let userId = id;
      axios.post('/api/users/' + id + '?token=' + localStorage.getItem("api_token"), {
        _method: 'DELETE'
      })
      .then(function (response) {
          self.message = 'Successfully deleted user.';
          self.showAlert();
          self.getUsers();
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: 'login' });
      });
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
    getUsers (){
      let self = this;
      axios.get('/api/users?token=' + localStorage.getItem("api_token"))
      .then(function (response) {
        self.items = response.data.users;
        self.you = response.data.you;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: 'login' });
      });
    }
  },
  mounted: function(){
    this.getUsers();
  }
}
</script>
