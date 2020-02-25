<template>
    <div class="mb-1 mt-1">
        <div v-if="flag">
            <div v-if="column.type == 'checkbox'">
              <CInputCheckbox
                :label="column.name"
                value="true"
                :checked="false"
                v-model="model"
              />
            </div>
            <div v-else-if="column.type == 'radio'">
              <label class="mt-3"> {{ column.name }} </label>
              <CInputRadio
                label="yes"
                type="radio"
                value="true"
                :name="column.column_name"
                :checked="false"
              />
              <CInputRadio
                label="no"
                type="radio"
                value="false"
                :name="column.column_name"
                :checked="false"
              />
            </div>
            <div v-else>
              <CInput 
                :label="column.name" 
                :type="column.type" 
                :placeholder="column.name" 
                v-model="model"
              ></CInput>
            </div>
        </div>
        <div v-else-if="column.type == 'relation_select'">
          <CSelect
            :label="column.name"
            :options="relations['relation_' + column.column_name]"
            :value.sync="model"
          />
        </div>
        <div v-else-if="column.type == 'relation_radio'">
          <label class="mt-3">{{ column.name }}</label>
          <CInputRadio
            v-for="relation in relations['relation_' + column.column_name]"
            :key="relation.value"
            :label="relation.label"
            type="radio"
            :value="relation.value"
            :name="column.column_name"
          />        
        </div>
        <div v-else-if="column.type == 'file' || column.type == 'image'">
          <CInputFile
            :label="column.name" 
            v-on:change="handleFileUpload"
          />
        </div>
        <div v-else-if="column.type == 'text_area'">
          <CTextarea
            :label="column.name"
            :placeholder="column.name"
            rows="9"
            v-model="model"
          />
        </div>
        <div v-else>
          <p>Not recognize field type: {{ column.type }}</p>
        </div>
    </div>
</template>

<script>
export default {
  name: 'CreateResourceField',
  props: {
    column: Object,
    relations: Object,
    options: Array,
    getData: Boolean,
  },
  data: () => {
    return {
        test: 'test',
        model: null,
        file: false,
    }
  },
  computed: {
      flag: function(){
          let flag = false
          for(var i=0; i< this.options.length; i++){
            if(this.options[i]['value'] == this.column.type){
              flag = true
              break
            }
          }
          return flag
      }
  },
  methods:{
    handleFileUpload(files, event){
      this.model = files[0];
      this.file = true;
    },
    getDataFunction(){
          //console.log('getData ' + this.columnName);
      let data = {
        data: this.model,
        file: this.file,
        name: this.column.column_name
      }
      this.$emit('sendData', data)
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