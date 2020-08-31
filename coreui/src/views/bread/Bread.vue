<template>
  <CRow>
    <CCol col="12" lg="6">
      <CCard no-header>
        <CCardBody>
          <h3>Single BREAD</h3>
          
          <CButton color="primary" @click="goBack">Back</CButton>
            <p class="mt-2">Form name: <strong>{{ form.name }}</strong></p>
            <p>Database table name: <strong>{{ form.table_name }}</strong></p>
            <p>Records on one page of table: <strong>{{ form.pagination }}</strong></p>
            <p>Enable Show button in table: {{ form.read }}</p>
            <p>Enable Edit button in table: {{ form.edit }}</p>
            <p>Enable Add button in table: {{ form.add }}</p>
            <p>Enable Delete button in table: {{ form.delete }}</p>

            <ShowBreadFieldCard 
                v-for="formField in formFields" 
                v-bind:key="formField.id"
                :formField="formField"
            />

          <CButton color="primary" @click="goBack">Back</CButton>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import ShowBreadFieldCard from './ShowBreadFieldCard'
import axios from 'axios'
export default {
  name: 'Bread',
  components:{
     'ShowBreadFieldCard': ShowBreadFieldCard
   },
  data: () => {
    return {
      form: {
        name: '',
        table_name: '',
        pagination: '',
        read: '',
        edit: '',
        add: '',
        delete: '',
      },
      formFields: [],
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
    }
  },
  mounted: function(){
    let self = this;
    axios.get(  this.$apiAdress + '/api/bread/' + self.$route.params.id + '?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
      self.form = response.data.form
      self.formFields = response.data.formFields
    }).catch(function (error) {
      console.log(error);
      self.$router.push({ path: '/login' })
    });
  }
}


</script>
