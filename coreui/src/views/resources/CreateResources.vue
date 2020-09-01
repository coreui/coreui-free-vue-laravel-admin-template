<template>
  <CRow>
    <CCol col="12" xl="6">
      <transition name="slide">
      <CCard>
        <CCardBody>
            <h3>
              Create {{ form.name }}
            </h3>
            <CAlert
              :show.sync="dismissCountDown"
              color="primary"
              fade
            >
              ({{dismissCountDown}}) {{ message }}
            </CAlert>

            <CreateResourceField
              v-for="column in columns"
              v-bind:key="column.id"
              :column="column"
              :relations="relations"
              :options="inputOptions"

              @sendData="receiveDataFormField"
              :getData="getData"
            >
            </CreateResourceField>

            <CButton class="mt-2" color="primary" @click="storeFirstStep()">Create</CButton>
            <CButton class="mt-2" color="primary" @click="goBack">Back</CButton>            

        </CCardBody>
      </CCard>
      </transition>
    </CCol>
  </CRow>
</template>

<script>
import CreateResourceField from './CreateResourceField'
import axios from 'axios'

export default {
  name: 'CreateResources',
  components:{
     'CreateResourceField': CreateResourceField
  },
  data: () => {
    return {
      message: '',
      dismissSecs: 7,
      dismissCountDown: 0,
      form: {},
      columns: [],
      relations: [],
      inputOptions: [],
      receiveFormFields: [],
      getData: false,
    }
  },
  watch: {
    activePage(){
      this.getResources();
    },
  },
  computed: {
  },
  methods: {
    goBack() {
      this.$router.go(-1)
    },
    storeFirstStep(){
      this.getData = true
    },
    receiveDataFormField(data){
      let self = this;
      self.receiveFormFields.push(data);
      if(self.receiveFormFields.length == self.columns.length){
        self.store();
      }
    },
    preparePostDataForStore(){
      let formData = new FormData();
      for(let i=0; i<this.receiveFormFields.length; i++){
        formData.append(this.receiveFormFields[i].name, this.receiveFormFields[i].data)
      }
      return formData
    },
    store(files, event){
      let self = this;
      let postData = self.preparePostDataForStore();
      axios.post(   this.$apiAdress + '/api/resource/' + self.$route.params.bread + '/resource?token=' + localStorage.getItem("api_token"),
        postData,
        { headers: {
            'Content-Type': 'multipart/form-data'
        }}
      ).then(function(){
        self.$router.go(-1)
        self.message = 'Successfully added to ' + self.form.name
        self.showAlert();
      })
      .catch(function(error){
        console.log(error)
        self.$router.push({ path: '/login' })
      });
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
    getFields (){
      let self = this;
      axios.get(  this.$apiAdress + '/api/resource/' + self.$route.params.bread + '/resource/create?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.form = response.data.form
        self.columns = response.data.columns
        self.relations = response.data.relations
        self.inputOptions = response.data.inputOptions



      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' })
      });
    },
  },
  mounted: function(){
    this.getFields();
  }
}
</script>

<style scoped>

</style>
