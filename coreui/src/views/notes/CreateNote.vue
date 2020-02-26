<template>
  <CRow>
    <CCol col="12" lg="6">
      <CCard no-header>
        <CCardBody>
          <h3>
            Create Note
          </h3>
          <CAlert
            :show.sync="dismissCountDown"
            color="primary"
            fade
          >
            ({{dismissCountDown}}) {{ message }}
          </CAlert>

            <CInput label="Title" type="text" placeholder="Title" v-model="note.title"></CInput>

            <CInput textarea="true" label="Content" :rows="9" placeholder="Content.." v-model="note.content"></CInput>

            <CInput label="Applies to date" type="date" v-model="note.applies_to_date"></CInput>

            <CSelect
              label="Status" 
              :value.sync="note.status_id"
              :plain="true"
              :options="statuses"
            >
            </CSelect>
            <CInput label="Note type" type="text" v-model="note.note_type"></CInput>

          <CButton color="primary" @click="store()">Create</CButton>
          <CButton color="primary" @click="goBack">Back</CButton>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
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
        axios.post(  '/api/notes?token=' + localStorage.getItem("api_token"),
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
    axios.get(  '/api/notes/create?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
        self.statuses = response.data;
    }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: 'login' });
    });
  }
}

</script>
