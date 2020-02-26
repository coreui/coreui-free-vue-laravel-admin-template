<template>
  <CRow>
    <CCol col="12" xl="12">
      <transition name="slide">
        <CCard>
          <CCardBody>
            <h4>Show {{ form.name }}</h4>
            <CButton color="primary" @click="goBack">Back</CButton>
            <div 
              v-for="column in columns"
              v-bind:key="column.id"
            >
              <div v-if="column.type == 'default'">
                {{ column.name }}: <strong>{{ column.value }}</strong>
              </div>
              <div v-else-if="column.type == 'file'">
                <a :href="column.value" class="btn btn-primary" target="_blank">Open file</a>
              </div>
              <div v-else>
                <img :src="column.value" class="img-mini">
              </div>
            </div>
            <CButton color="primary" @click="goBack">Back</CButton>           
          </CCardBody>  
        </CCard>
      </transition>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'

export default {
  name: 'ResourceDetails',
  data: () => {
    return {
      form: {},
      columns: [],
    }
  },
  watch: {

  },
  computed: {

  },
  methods: {
    goBack() {
      this.$router.go(-1)
    },
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
    getResource (){
      let self = this;
      axios.get(  '/api/resource/' + self.$route.params.bread + '/resource/' + self.$route.params.id + '?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.form = response.data.form
        self.columns = response.data.columns
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' })
      });
    }
  },
  mounted: function(){
    this.getResource();
  }
}
</script>

<style scoped>
.img-mini{
  max-width:200px;
  max-height:200px;
}
</style>
