<template>
  <b-row>
    <b-col cols="12" lg="6">
      <b-card no-header>
        <template slot="header">
          Create Note
        </template>
          <b-alert :show="dismissCountDown"
            dismissible
            variant="primary"
            @dismissed="dismissCountdown=0"
            @dismiss-count-down="countDownChanged">
            ({{dismissCountDown}}) {{ message }}
          </b-alert>
          <b-form-group>
            <label for="title">Title</label>
            <b-form-input type="text" id="title" placeholder="Title" v-model="note.title"></b-form-input>
          </b-form-group>
          <b-form-group>
            <label for="content">Content</label>
            <b-form-textarea id="content" :rows="9" placeholder="Content.." v-model="note.content"></b-form-textarea>
          </b-form-group>
          <b-form-group>
            <label for="applies_to_date">Applies to date</label>
            <b-form-input type="date" id="applies_to_date" v-model="note.applies_to_date"></b-form-input>
          </b-form-group>
          <b-form-group>
            <label for="status_id">Status</label>
            <b-form-select id="status_id" 
              v-model="note.status_id"
              :plain="true"
              :options="statuses"
            >
            </b-form-select>
          </b-form-group>
          <b-form-group>
            <label for="note_type">Note type</label>
            <b-form-input type="text" id="note_type" v-model="note.note_type"></b-form-input>
          </b-form-group>
        <template slot="footer">
          <b-button @click="store()">Create</b-button>
          <b-button @click="goBack">Back</b-button>
        </template>
      </b-card>
    </b-col>
  </b-row>
</template>

<script>
import axios from 'axios'
export default {
  name: 'EditUser',
  props: {
    caption: {
      type: String,
      default: 'User id'
    },
  },
  data: () => {
    return {
        note: {
          title: '',
          content: '',
          applies_to_date: '',
          status_id: null,
          note_type: '',
        },
        statuses: [],
        message: '',
        dismissSecs: 7,
        dismissCountDown: 0,
        showDismissibleAlert: false
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
      // this.$router.replace({path: '/users'})
    },
    store() {
        let self = this;
        axios.post('/api/notes?token=' + localStorage.getItem("api_token"),
          self.note
        )
        .then(function (response) {
            self.note = {
              title: '',
              content: '',
              applies_to_date: '',
              status_id: null,
              note_type: '',
            };
            self.message = 'Successfully created note.';
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
              self.$router.push({ path: 'login' }); 
            }
        });
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
  },
  mounted: function(){
    let self = this;
    axios.get('/api/notes/create?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
        self.statuses = response.data;
    }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: 'login' });
    });
  }
}

</script>
