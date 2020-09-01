<template>
  <CRow>
    <CCol col="12" lg="6">
      <CCard no-header>
        <CCardBody>
          <h3>
            Edit Menu Element
          </h3>
          <CAlert
            :show.sync="dismissCountDown"
            color="primary"
            fade
          >
            ({{dismissCountDown}}) {{ message }}
          </CAlert>
            <CSelect
              label="Menu" 
              :value.sync="menuelement.menu"
              :plain="true"
              :options="menulist"
              @update:value="updateSelectParent()"
            >
            </CSelect>
            <p>Roles</p>
            <div class="m-3">
              <CInputCheckbox
                  v-for="rol in role"
                  :key="rol"
                  :label="rol"
                  name="selectRoles"
                  @update:checked="selectRadioSelectRole(rol)"
                  :checked="fixedmenuroles[rol]"
              />
            </div>
            <CInput label="Name" type="text" placeholder="Name" v-model="menuelement.name"></CInput>
            <CSelect
              label="Type" 
              :value.sync="menuelement.slug"
              :plain="true"
              :options="types"
              @update:value="changeType()"
            >
            </CSelect>
            <p>Other</p>
            <div v-if="divHref">
              <CInput label="Href" type="text" placeholder="Href" v-model="menuelement.href"></CInput>
            </div>
            <div v-if="divDropdownParent">
              <CSelect
                label="Dropdown parent" 
                :value.sync="menuelement.parent_id"
                :plain="true"
                :options="parents"
              >
              </CSelect>
            </div>
            <div v-if="divIcon">
              Icon - Find icon class in: 
              <a 
                href="https://coreui.io/docs/icons/icons-list/#coreui-icons-free-502-icons"
                target="_blank"
              >
                CoreUI icons documentation
              </a>
              <br>
              <CInput type="text" placeholder="CoreUI Icon class - example: cil-bell" v-model="menuelement.icon"></CInput>
            </div>
          <CButton color="primary" @click="save()">Save</CButton>
          <CButton color="primary" @click="goBack">Back</CButton>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import axios from 'axios'
export default {
  name: 'CreateMenuElement',
  data: () => {
    return {
        resultroles: [],
        fixedmenuroles: [],
        menuroles: [],
        role: [],
        menulist: [],
        parents: [],
        types: [
          {label: 'Link', value: 'link'},
          {label: 'Title', value: 'title'},
          {label: 'Dropdown', value: 'dropdown'},
        ],
        menuelement:{
          menu: 0,
          name: '',
          role: [],
          slug: 'link',
          href: '',
          icon: '',
          parent_id: 0,
        },
        message: '',
        dismissSecs: 7,
        dismissCountDown: 0,
        showDismissibleAlert: false,
        divHref: false,
        divDropdownParent: false,
        divIcon: false,
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
      // this.$router.replace({path: '/users'})
    },
    selectRadioSelectRole(role){
      let temp = this.resultroles.indexOf(role); 
      if (temp > -1) {
        this.resultroles.splice(temp, 1);
      }else{
        this.resultroles.push(role);
      }
    },
    changeType(){
      let temp = this.menuelement.slug
      if(temp == 'title'){
        this.divHref = false
        this.divDropdownParent = false
        this.divIcon = false
      }else if(temp == 'link'){
        this.divHref = true
        this.divDropdownParent = true
        this.divIcon = true
      }else{
        this.divHref = false
        this.divDropdownParent = true
        this.divIcon = true
      }
    },
    updateSelectParent(){
        let self = this;
        axios.get(  this.$apiAdress + '/api/menu/element/get-parents?token=' + localStorage.getItem("api_token") + '&menu=' + self.menuelement.menu
        )
        .then(function (response) {
          self.parents = [{label: 'Has no parent', value: 'none'}]
          for(let i = 0; i<response.data.length; i++){
            self.parents.push(response.data[i])
          }
        }).catch(function (error) {
          console.log(error);
          self.$router.push({ path: 'login' }); 
        });
    },
    save() {
        let self = this;
        console.log(self.menuelement)
        axios.post(  this.$apiAdress + '/api/menu/element/update?token=' + localStorage.getItem("api_token"),
          {
            id:     self.$route.params.id,
            menu:   self.menuelement.menu_id,
            role:   self.resultroles,
            type:   self.menuelement.slug,
            icon:   self.menuelement.icon,
            name:   self.menuelement.name,
            href:   self.menuelement.href,
            parent: self.menuelement.parent_id,
          }
        )
        .then(function (response) {
            self.name = '';
            self.message = 'Successfully edited menu element.';
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
    getData() {
      let self = this;
      axios.get(  this.$apiAdress + '/api/menu/element/edit?token=' + localStorage.getItem("api_token") + '&id=' + self.$route.params.id )
      .then(function (response) {
        self.role = response.data.roles
        self.menulist = response.data.menulist
        self.menuelement = response.data.menuElement
        self.menuroles = response.data.menuroles
        let temp = false
        for(let i = 0; i<self.role.length; i++){
          temp = false
          for(let j =0; j<self.menuroles.length; j++){
            if(self.role[i] == self.menuroles[j].role_name){
              temp = true;
              self.resultroles.push(self.role[i])
              break;
            }
          }
          self.fixedmenuroles[self.role[i]] = temp
        }
        self.changeType()
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
  },
  mounted: function(){
    this.getData()
    this.menuelement.menu = this.$route.params.menu
    this.updateSelectParent()
  }
}

</script>
