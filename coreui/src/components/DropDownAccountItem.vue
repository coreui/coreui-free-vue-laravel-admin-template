<template>
    <CDropdownItem v-if="type='link'">
      <CIcon name="cil-comment-square" /> {{content}}
      <CBadge color="warning" class="ml-auto">{{ itemsCount }}</CBadge>
    </CDropdownItem>
    <CDropdownHeader v-else-if="type='header'" tag="div" class="text-center" color="light">
      <strong>{{content}}</strong>
    </CDropdownHeader>
</template>
<script>
export default {
    name: 'DropDownAccountItem',
    props: ['type','content']
}
</script>