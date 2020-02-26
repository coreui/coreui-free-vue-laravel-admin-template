<template>
  <div>
    <CRow v-if="marker">
      <CCol col="6" lg="6">
        <CCard no-header>
          <CCardBody>
            <h3>
              Create Bread
            </h3>
            <CAlert
              :show.sync="dismissCountDown"
              color="primary"
              fade
            >
              ({{dismissCountDown}}) {{ message }}
            </CAlert>
            <div>
              <CInput label="Table name in database" type="text" placeholder="Table name in database" v-model="tableNameInDatabase"></CInput>

              <CButton color="primary" @click="choiceTableInDatabase()">Select</CButton>
              <CButton color="primary" @click="goBack">Back</CButton>

            </div>
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
    <CRow v-else>
      <CCol col="6" lg="6">
        <CCard no-header>
          <CCardBody>
              <h3>
                Create Bread
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
                v-model="bread.name"
              ></CInput>
              <CInput 
                label="Records on one page of table" 
                type="number" 
                placeholder="Records on one page of table" 
                required
                v-model="bread.pagination"
              ></CInput>
              <CInputCheckbox
                label="Enable Show button in table"
                value="true"
                :checked="true"
                v-model="bread.read"
              />
              <CInputCheckbox
                label="Enable Edit button in table"
                value="true"
                :checked="true"
                v-model="bread.edit"
              />
              <CInputCheckbox
                label="Enable Add button in table"
                value="true"
                :checked="true"
                v-model="bread.add"
              />
              <CInputCheckbox
                label="Enable Delete button in table"
                value="true"
                :checked="true"
                v-model="bread.delete"
                class="mb-2"
              />

          </CCardBody>
        </CCard>
      </CCol>
      <CCol col="6" lg="6">
        <CCard no-header>
          <CCardBody>
            <h4>Assign to roles:</h4>
              <CInputCheckbox
                v-for="role in roles"
                v-bind:key="role"
                :label="role"
                value="true"
                :checked="true"
                @update:checked="checkRoleCheckbox(role)"
              />
          </CCardBody>
        </CCard>
      </CCol>
      <CCol col="6" lg="6">  
        <CCard no-header>
          <CCardBody>
              <CreateBreadFieldCard 
                  v-for="formField in formFields" 
                  v-bind:key="formField.id"
                  @sendData="receiveDataFormField"
                  :getData="getData"
                  :options="options"
                  :columnName="formField"
                  :visibleName="formField"
              />

              <CButton class="mt-2" color="primary" @click="storeFirstStep()">Create</CButton>
              <CButton class="mt-2" color="primary" @click="marker=true">Back</CButton>
            
          </CCardBody>
        </CCard>
      </CCol>
    </CRow>
  </div>
</template>

<script>
import CreateBreadFieldCard from './CreateBreadFieldCard'
import axios from 'axios'
export default {
  name: 'CreateBread',
  components:{
     'CreateBreadFieldCard': CreateBreadFieldCard
  },
  data: () => {
    return {
        message: '',
        dismissSecs: 7,
        dismissCountDown: 0,
        showDismissibleAlert: false,
        tableNameInDatabase: '',
        marker: true,
        bread: {
          name: '',
          pagination: 5,
          read: true,
          edit: true,
          add: true,
          delete: true,
        },
        formFields: [],
        receiveFormFields: [],
        options: [],
        getData: false,
        rolesArray: [],
        roles: [],
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
    choiceTableInDatabase(){
        let self = this
        axios.post(  '/api/bread?token=' + localStorage.getItem("api_token"),
          {
            marker: 'selectModel',
            model: self.tableNameInDatabase,
          }
        )
        .then(function (response) {
          if(response.data.status == 'lackcolumns'){
            self.message = 'Table not detected, or there is no columns in table'
            self.showAlert()
            self.tableNameInDatabase = ''
            self.receiveFormFields = []
            
          }else{
            self.marker = false
            self.formFields = response.data.columns
            self.options = response.data.options
            self.roles = response.data.roles
            self.rolesArray = [];
            for(let i=0; i<self.roles.length; i++){
              self.rolesArray[self.roles[i]] = true;
            }
          }
        }).catch(function (error) {
            console.log(error);
            self.$router.push({ path: 'login' }); 
        });
    },
    storeFirstStep(){
      this.getData = true
    },
    createPostDataForStore(){
      let self = this
      let result = {
        marker: 'createForm',
        model: self.tableNameInDatabase,
        name: self.bread.name,
        pagination: self.bread.pagination,
        read: self.bread.read,
        edit: self.bread.edit,
        add: self.bread.add,
        delete: self.bread.delete
      }
      for(let i = 0; i<self.receiveFormFields.length; i++){
        if(self.receiveFormFields[i].columnName != 'id'){
          result[self.receiveFormFields[i].columnName + '_name'] = self.receiveFormFields[i].visibleName
          result[self.receiveFormFields[i].columnName + '_field_type'] = self.receiveFormFields[i].type
          result[self.receiveFormFields[i].columnName + '_relation_table'] = self.receiveFormFields[i].relationTable
          result[self.receiveFormFields[i].columnName + '_relation_column'] = self.receiveFormFields[i].relationColumn
          result[self.receiveFormFields[i].columnName + '_browse'] = self.receiveFormFields[i].browse
          result[self.receiveFormFields[i].columnName + '_read'] = self.receiveFormFields[i].read
          result[self.receiveFormFields[i].columnName + '_edit'] = self.receiveFormFields[i].edit
          result[self.receiveFormFields[i].columnName + '_add'] = self.receiveFormFields[i].add
        }
      } 
      for(var i=0; i<self.roles.length; i++){
        if(self.rolesArray[self.roles[i]] == true){
          result['_role_' + self.roles[i]] = 'true';
        }
      }
      return result;
    },
    receiveDataFormField(data){
      let self = this;
      self.receiveFormFields.push(data);
      if(self.receiveFormFields.length == self.formFields.length){
        self.store();
      }
    },
    store(){
        let self = this;
        let postData = self.createPostDataForStore();
        axios.post(  '/api/bread?token=' + localStorage.getItem("api_token"),
            postData
        )
        .then(function (response) {
            self.marker = false
            self.$router.push({ path: '' + response.data.id });

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
    countDownChanged (dismissCountDown) {
      this.dismissCountDown = dismissCountDown
    },
    showAlert () {
      this.dismissCountDown = this.dismissSecs
    },
  }
}

</script>
