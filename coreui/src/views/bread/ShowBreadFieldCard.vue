<template>
    <CCard>
        <CCardHeader>
            <h4>{{ formField.name }}</h4>
        </CCardHeader>
        <CCardBody>
            <p>Field type:  <strong>{{ formField.type }}</strong></p>
            <p>Optional relation table name: <strong>{{ formField.relation_table }}</strong></p>
            <p>Optional column name to print in relation table: <strong>{{ formField.relation_column }}</strong></p>
            <p>Browse:      {{ formField.browse }}</p>
            <p>Read:        {{ formField.read }}</p>
            <p>Edit:        {{ formField.edit }}</p>
            <p>Add:         {{ formField.add }}</p>
        </CCardBody>
    </CCard>
</template>

<script>
export default {
  name: 'ShowBreadFieldCard',
  props: {
    formField: Object,
  },
  computed: {

  }
}
</script>
