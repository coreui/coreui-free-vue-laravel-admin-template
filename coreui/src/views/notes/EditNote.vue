<template>
  <CRow>
    <CCol col="12" lg="6">
      <CCard>
        <CCardBody>
          <h3>
            Edit Note id:  {{ $route.params.id }}
          </h3>
          <CAlert
            :show.sync="dismissCountDown"
            color="primary"
            fade
          >
            ({{dismissCountDown}}) {{ message }}
          </CAlert>
            <CInput label="Title" type="text" placeholder="Title" v-model="note.title"/>
            <CInput
              label="Content"
              placeholder="Content.."
              
              textarea="true"
              rows="9"
              v-model="note.content"
            />
            <CInput label="Applies to date" type="date" v-model="note.applies_to_date"/>
            <CSelect 
              :value.sync="note.status_id"
              :options="statuses"
              label="Status"
            />
            <CInput label="Note type" type="text" v-model="note.note_type"/>
          <CButton color="primary" @click="update()">Save</CButton>
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
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
      // this.$router.replace({path: '/users'})
    },
    update() {
        let self = this;
        axios.post(  '/api/notes/' + self.$route.params.id + '?token=' + localStorage.getItem("api_token"),
        {
            _method: 'PUT',
            title:            self.note.title,
            content:          self.note.content,
            applies_to_date:  self.note.applies_to_date,
            status_id:        self.note.status_id,
            note_type:        self.note.note_type
        })
        .then(function (response) {
            self.message = 'Successfully updated note.';
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
              self.$router.push({ path: '/login' }); 
            }
        });
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
  },
  mounted: function(){
    let self = this;
    axios.get(  '/api/notes/' + self.$route.params.id + '/edit?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
        self.note = response.data.note;
        self.statuses = response.data.statuses;
    }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
    });
  }
}

/*
      items: (id) => {
        const user = usersData.find( user => user.id.toString() === id)
        const userDetails = user ? Object.entries(user) : [['id', 'Not found']]
        return userDetails.map(([key, value]) => {return {key: key, value: value}})
      },
*/

</script>
