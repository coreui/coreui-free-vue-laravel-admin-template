<template>
  <CRow>
    <CCol col="12" xl="6">
      <transition name="slide">
        <CCard>
          <CCardBody>
            <h4>
              Menus
            </h4>
              <CButton color="primary" @click="addMenu()" class="mb-3">Add Menu</CButton>
              <CDataTable
                hover
                :items="items"
                :fields="fields"
                :items-per-page="10"
                pagination
              >
                <template #name="{item}">
                  <td>
                    <strong>{{item.name}}</strong>
                  </td>
                </template>
                <template #menu_elements="{item}">
                  <td>
                    <CButton color="primary" @click="menuElements( item.id )">Menu Elements</CButton>
                  </td>
                </template>
                <template #edit="{item}">
                  <td>
                    <CButton color="primary" @click="editMenu( item.id )">Edit</CButton>
                  </td>
                </template>
                <template #delete="{item}">
                  <td>
                    <CButton color="danger" @click="deleteMenu( item.id )">Delete</CButton>
                  </td>
                </template>
              </CDataTable>
          </CCardBody>  
        </CCard>
      </transition>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'
export default {
  name: 'MenuIndex',
  data () {
    return {
      fields: ['name', 'menu_elements', 'edit', 'delete'],
      items: [],
    }
  },
  methods: {
    menuElements(id){
      this.$router.push({path: `menuelement/${id.toString()}/menuelement`});
    },
    addMenu(){
      this.$router.push({path: 'create'});
    },
    editMenu(id){
      this.$router.push({path: `menu/${id.toString()}/edit`});
    },
    deleteMenu(id){
      this.$router.push({path: `menu/${id.toString()}/delete`});
    },
    getMenus () {
      let self = this;
      axios.get(  this.$apiAdress + '/api/menu/menu?token=' + localStorage.getItem("api_token") )
      .then(function (response) {
        self.items = response.data.menulist;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    }
  },
  mounted(){
    this.getMenus();
  }
}
</script>
