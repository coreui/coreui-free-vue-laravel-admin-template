<template>
  <div>
    <CCard>
      <CCardHeader>
        <i class="cui-pencil"></i>CoreUI Icons
        <CBadge color="info">New</CBadge>
        <div class="card-header-actions">
          <a
            href="https://github.com/coreui/coreui-icons"
            rel="noreferrer noopener"
            target="_blank"
            class="card-header-action"
          >
            <small class="text-muted">Github</small>
          </a>
        </div>
      </CCardHeader>
      <CCardBody>
        <CRow class="text-center">
          <template v-for="(icon, iconName) in $options.freeSet">
            <CCol
              class="mb-5"
              col="3"
              sm="2"
              :key="iconName"
            >
              <CIcon :height="42" :content="icon"/>
              <div>{{iconName}}</div>
            </CCol>
          </template>
        </CRow>
      </CCardBody>
    </CCard>
  </div>
</template>
<script>
// import { iconSet } from '@coreui/icons'
// const iconNames = Object.keys(iconSet)

import { freeSet } from '@coreui/icons'
export default {
  name: 'CoreUIIcons',
  freeSet
}
</script>
