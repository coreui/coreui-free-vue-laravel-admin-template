<template>
  <CRow>
    <CCol col="6" lg="6">
      <CCard>
        <CCardBody>
          <h3>
            Edit Bread
          </h3>
          <CAlert
            :show.sync="dismissCountDown"
            color="primary"
            fade
          >
            ({{dismissCountDown}}) {{ message }}
          </CAlert>

          <CInput 
            label="Form name" 
            type="text" 
            placeholder="Form name" 
            required
            v-model="form.name"
          ></CInput>
          <CInput 
            label="Records on one page of table" 
            type="number" 
            placeholder="Records on one page of table" 
            required
            v-model="form.pagination"
          ></CInput>
          <CInputCheckbox
            label="Enable Show button in table"
            value="true"
            :checked="true"
            v-model="form.read"
          />
          <CInputCheckbox
            label="Enable Edit button in table"
            value="true"
            :checked="true"
            v-model="form.edit"
          />
          <CInputCheckbox
            label="Enable Add button in table"
            value="true"
            :checked="true"
            v-model="form.add"
          />
          <CInputCheckbox
            label="Enable Delete button in table"
            value="true"
            :checked="true"
            v-model="form.delete"
            class="mb-2"
          />
        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="6" lg="6">
      <CCard>
        <CCardBody>
            <h4>Assign to roles:</h4>
              <CInputCheckbox
                v-for="role in roles"
                v-bind:key="role"
                :label="role"
                value="true"
                :checked="rolesArray[role]"
                @update:checked="checkRoleCheckbox(role)"
              />

        </CCardBody>
      </CCard>
    </CCol>
    <CCol col="6" lg="6">
      <CCard>
        <CCardBody>

          <EditBreadFieldCard 
            v-for="formField in formFields" 
            v-bind:key="formField.id"
            @sendData="receiveDataFormField"
            :getData="getData"
            :options="options"
            :data="formField"
          />

          <CAlert
            :show.sync="dismissCountDown"
            color="primary"
            fade
          >
            ({{dismissCountDown}}) {{ message }}
          </CAlert>

          <CButton color="primary" @click="updateFirstStep()">Save</CButton>
          <CButton color="primary" @click="goBack">Back</CButton>
        </CCardBody>
      </CCard>
    </CCol>
  </CRow>
</template>

<script>
import EditBreadFieldCard from './EditBreadFieldCard'
import axios from 'axios'
export default {
  name: 'EditBread',
  components:{
     'EditBreadFieldCard': EditBreadFieldCard
  },
  data: () => {
    return {
        form: [],
        formFields: [],
        options: [],
        roles: [],
        formRoles: [],
        getData: false,
        receiveFormFields: [],
        rolesArray: [],

        message: '',
        dismissSecs: 7,
        dismissCountDown: 0,
    }
  },
  methods: {
    goBack() {
      this.$router.go(-1)
    },
    checkRoleCheckbox(role){
      if(this.rolesArray[role] == true){
        this.rolesArray[role] = false;
      }else{
        this.rolesArray[role] = true;
      } 
    },
    updateFirstStep(){
      this.getData = true
    },
    receiveDataFormField(data){
      let self = this
      self.receiveFormFields.push(data)
      if(self.receiveFormFields.length == self.formFields.length){
        self.update();
      }
    },
    createPostDataForUpdate(){
      let self = this
      let result = {
        _method: 'PUT',
        name: self.form.name,
        pagination: self.form.pagination,
        read: self.form.read,
        edit: self.form.edit,
        add: self.form.add,
        delete: self.form.delete
      }
      for(let i = 0; i<self.receiveFormFields.length; i++){
        if(self.receiveFormFields[i].column_name != 'id'){
          result[self.receiveFormFields[i].id + '_name'] = self.receiveFormFields[i].name
          result[self.receiveFormFields[i].id + '_field_type'] = self.receiveFormFields[i].type
          result[self.receiveFormFields[i].id + '_relation_table'] = self.receiveFormFields[i].relation_table
          result[self.receiveFormFields[i].id + '_relation_column'] = self.receiveFormFields[i].relation_column
          if(self.receiveFormFields[i].browse == true){
            result[self.receiveFormFields[i].id + '_browse'] = self.receiveFormFields[i].browse
          }
          if(self.receiveFormFields[i].read == true){
            result[self.receiveFormFields[i].id + '_read'] = self.receiveFormFields[i].read
          }
          if(self.receiveFormFields[i].edit == true){
            result[self.receiveFormFields[i].id + '_edit'] = self.receiveFormFields[i].edit
          }
          if(self.receiveFormFields[i].add == true){
            result[self.receiveFormFields[i].id + '_add'] = self.receiveFormFields[i].add
          }
        }
      } 
      for(var i=0; i<self.roles.length; i++){
        if(self.rolesArray[self.roles[i]] == true){
          result['_role_' + self.roles[i]] = 'true';
        }
      }
      return result;
    },    
    update() {
        let self = this
        let postData = this.createPostDataForUpdate()
        axios.post(  '/api/bread/' + self.$route.params.id + '?token=' + localStorage.getItem("api_token"), postData )
        .then(function (response) {
            self.message = 'Successfully updated BREAD.'
            self.showAlert()
            self.getData = false
            self.receiveFormFields = []
        }).catch(function (error) {
            if(error.response.data.message == 'The given data was invalid.'){
              self.message = ''
              for (let key in error.response.data.errors) {
                if (error.response.data.errors.hasOwnProperty(key)) {
                  self.message += error.response.data.errors[key][0] + '  '
                }
              }
              self.showAlert()
            }else{
              console.log(error); 
              self.$router.push({ path: '/login' })
            }
        });
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
  },
  mounted: function(){
    let self = this
    axios.get(  '/api/bread/' + self.$route.params.id + '/edit?token=' + localStorage.getItem("api_token"))
    .then(function (response) {
        self.form       = response.data.form
        self.formFields = response.data.formFields
        self.options    = response.data.options
        self.roles      = response.data.roles
        self.formRoles  = response.data.formRoles
        self.rolesArray = [];
        for(let i=0; i<self.roles.length; i++){
          if(self.formRoles.indexOf( self.roles[i] ) != -1){
            self.rolesArray[self.roles[i]] = true
          }else{
            self.rolesArray[self.roles[i]] = false
          }
        }

    }).catch(function (error) {
        console.log(error)
        self.$router.push({ path: '/login' })
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
