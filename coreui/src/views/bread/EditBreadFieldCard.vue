<template>
    <CCard v-if="data.column_name != 'id'">
        <CCardHeader>
            <h5>{{ data.column_name }}</h5>
        </CCardHeader>
        <CCardBody>
            <CInput 
              label="Visible name" 
              type="text" 
              placeholder="Visible name" 
              required
              v-model="data.name"
            ></CInput>
            <CSelect
              label="Field type"
              :options="options"
              :value.sync="data.type"
            />
            <CInput 
              label="Optional relation table name" 
              type="text" 
              placeholder="Optional relation table name" 
              v-model="data.relation_table"
            ></CInput>
            <CInput 
              label="Optional column name in relation table - to print" 
              type="text" 
              placeholder="Optional column name in relation table - to print" 
              v-model="data.relation_column"
            ></CInput>
            <CInputCheckbox
              label="Browse"
              value="true"
              :checked="data.browse == 1 ? true : false"
              class="mb-2"
              @update:checked="selectCheckbox('browse')"
            />
            <CInputCheckbox
              label="Read"
              value="true"
              :checked="data.read == 1 ? true : false"
              class="mb-2"
              @update:checked="selectCheckbox('read')"
            />
            <CInputCheckbox
              label="Edit"
              value="true"
              :checked="data.edit == 1 ? true : false"
              class="mb-2"
              @update:checked="selectCheckbox('edit')"
            />
            <CInputCheckbox
              label="Add"
              value="true"
              :checked="data.add == 1 ? true : false"
              class="mb-2"
              @update:checked="selectCheckbox('add')"
            />


        </CCardBody>
    </CCard>
</template>

<script>
export default {
  name: 'CreateBreadFieldCard',
  props: {
    data: Object,
    getData: Boolean,
    options: Array,
  },
  data: () => {
    return {
        type: 'text',
        relationTable: '',
        relationColumn: '',
    }
  },
  computed: {

  },
  methods:{
    selectCheckbox(slug){
      switch(slug){
        case 'browse':
          if(this.data.browse == true){
            this.data.browse = false
          }else{
            this.data.browse = true
          }
        break;
        case 'read':
          if(this.data.read == true){
            this.data.read = false
          }else{
            this.data.read = true
          }
        break;
        case 'edit':
          if(this.data.edit == true){
            this.data.edit = false
          }else{
            this.data.edit = true
          }
        break;
        case 'add':
          if(this.data.add == true){
            this.data.add = false
          }else{
            this.data.add = true
          }
        break;
      }
    },
    getDataFunction(){
        this.$emit('sendData', this.data)
    }
  },
  watch:{
      'getData': function(){
          if(this.getData === true){
            this.getDataFunction()
          }
      }
  }
}
</script>