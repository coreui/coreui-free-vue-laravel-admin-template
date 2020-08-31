<template>
  <CRow>
    <CCol col="12" xl="6">
      <transition name="slide">
        <CCard>
          <CCardBody>
            <h4>
              Menus
            </h4>
              <CButton color="primary" @click="addElementToMenu()" class="mb-3">Add Element to Menu</CButton>
              <CDataTable
                hover
                :items="items"
                :fields="fields"
                :items-per-page="30"
                pagination
              >
                <template #dropdown="{item}">
                  <td>
                    <CIcon v-if="item.dropdown" :content="$options.arrowIcon"/>
                  </td>
                </template>
                <template #name="{item}">
                  <td>
                    <strong>{{item.name}}</strong>
                  </td>
                </template>
                <template #up="{item}">
                  <td>
                    <CButton color="primary" @click="moveUp( item.id )">Move Up</CButton>
                  </td>
                </template>
                <template #down="{item}">
                  <td>
                    <CButton color="primary" @click="moveDown( item.id )">Move Down</CButton>
                  </td>
                </template>
                <template #show="{item}">
                  <td>
                    <CButton color="primary" @click="showMenu( item.id )">Show</CButton>
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
import { cilArrowThickToRight } from '@coreui/icons'
export default {
  arrowIcon: cilArrowThickToRight,
  name: 'MenuIndex',
  data () {
    return {
      fields: ['dropdown', 'name', 'up', 'down', 'show', 'edit', 'delete'],
      items: [],
      buffor: [],
    }
  },
  methods: {
    addElementToBuffor(data, icon){
      this.buffor.push(
        {
          dropdown: icon,
          name: data['name'],
          id: data['id'],
          slug: data['slug'],
          assigned: data['assigned'],
        }
      );
    },
    innerBuildArrayData(data, deep){
      for(let i=0; i<data.length; i++){
        switch(data[i]['slug']){
          case 'link':
            if(deep > 1){
              this.addElementToBuffor(data[i], true);
            }else{
              this.addElementToBuffor(data[i], false);
            }
          break
          case 'title':
            this.addElementToBuffor(data[i], false);
          break;
          case 'dropdown':
            this.addElementToBuffor(data[i], false);
            this.innerBuildArrayData(data[i]['elements'], deep+1)
          break;
        }
      }
    },
    buildArrayData(data){
      this.buffor = [];
      this.innerBuildArrayData(data, 1);
      return this.buffor;
    },
    addElementToMenu(){
      this.$router.push({path: 'menuelement/create'});
    },
    showMenu(id){
      this.$router.push({path: `menuelement/${id.toString()}`});
    },
    editMenu(id){//:menu/menuelement/:id/edit
      this.$router.push({path: `menuelement/${id.toString()}/edit`});
    },
    deleteMenu(id){
      this.$router.push({path: `menuelement/${id.toString()}/delete`});
    },
    moveUp(id){
      let self = this;
      axios.get(  this.$apiAdress + '/api/menu/element/move-up?token=' + localStorage.getItem("api_token") + '&id=' + id )
      .then(function (response) {
        self.getElements();
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    moveDown(id){
      let self = this;
      axios.get(  this.$apiAdress + '/api/menu/element/move-down?token=' + localStorage.getItem("api_token") + '&id=' + id )
      .then(function (response) {
        self.getElements();
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    getElements() {
      let self = this;
      console.log(self.$route.params.menu)
      axios.get(  this.$apiAdress + '/api/menu/element?token=' + localStorage.getItem("api_token") + '&menu=' + self.$route.params.menu )
      .then(function (response) {
        self.items = self.buildArrayData(response.data.menuToEdit);
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    }
  },
  mounted(){
    this.getElements();
  }
}
</script>
