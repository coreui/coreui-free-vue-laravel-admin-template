<template>
  <CRow>
    <CCol col="12" lg="6">
      <CCard no-header>
        <CCardBody>
          <h3>Note id:  {{ $route.params.id }}</h3>

          <h4>Author:</h4>
          <p>{{ note.author }}</p>
          <h4>Title:</h4>
          <p>{{ note.title }}</p>
          <h4>Content:</h4> 
          <p>{{ note.content }}</p>
          <h4>Applies to date:</h4> 
          <p>{{ note.applies_to_date }}</p>
          <h4>Status: </h4>
          <p>
              <CBadge :color="note.status_class">{{note.status}}</CBadge>
          </p>
          <h4>Note type:</h4>
          <p>{{ note.note_type }}</p>

          <CButton color="primary" @click="goBack">Back</CButton>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'
export default {
  name: 'User',
  props: {
    caption: {
      type: String,
      default: 'User id'
    },
  },
  data: () => {
    return {
      note: [],
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
      // this.$router.replace({path: '/users'})
    }
  },
  mounted: function(){
    let self = this;
    axios.get(  '/api/notes/' + self.$route.params.id + '?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
      self.note = response.data;
    }).catch(function (error) {
      console.log(error);
      self.$router.push({ path: '/login' });
    });
  }
}


</script>
