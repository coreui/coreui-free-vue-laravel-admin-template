<template>
  <CRow>
    <CCol cols="12" lg="6">
      <CCard no-header>
        <template slot="header">
          User id:  {{ $route.params.id }}
        </template>
        <CTable 
          striped 
          small 
          fixed
          :items="items" 
          :fields="fields"
        >
          <template slot="value" slot-scope="data">
            <strong>{{data.item.value}}</strong>
          </template>
        </CTable>
        
          <CButton color="primary" @click="goBack">Back</CButton>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'
export default {
  name: 'User',
  data: () => {
    return {
      items: [],
      fields: [
        {key: 'key'},
        {key: 'value'},
      ],
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
    axios.get('/api/users/' + self.$route.params.id + '?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
      //const items = response.data.users;
      const items = Object.entries(response.data);
      self.items = items.map(([key, value]) => {return {key: key, value: value}});
    }).catch(function (error) {
      console.log(error);
      self.$router.push({ path: 'login' });
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
