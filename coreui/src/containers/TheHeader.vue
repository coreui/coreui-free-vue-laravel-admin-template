<template>
  <CHeader fixed with-subheader light>
    <CToggler
      in-header
      class="ml-3 d-lg-none"
      @click="$store.commit('toggleSidebarMobile')"
    />
    <CToggler
      in-header
      class="ml-3 d-md-down-none"
      @click="$store.commit('toggleSidebarDesktop')"
    />
    <CHeaderBrand class="mx-auto d-lg-none" to="/">
      <CIcon name="logo" height="48" alt="Logo"/>
    </CHeaderBrand>
    <CHeaderNav class="d-md-down-none mr-auto">
      <CHeaderNavItem>
        <CDropdown
          color="link"
          :caret="false"
        >
          <template #toggler-content>
            <a class="c-header-nav-link">
              Pages
            </a>
          </template>
          <CDropdownItem href="#/notes">Notes</CDropdownItem>
          <CDropdownItem href="#/users">Users</CDropdownItem>
        </CDropdown>
      </CHeaderNavItem>
      <CHeaderNavItem>
        <CDropdown
          color="link"
          :caret="false"
        >
          <template #toggler-content>
            <a class="c-header-nav-link">
              Settings
            </a>
          </template>
          <CDropdownItem href="#/media">Media</CDropdownItem>
          <CDropdownItem href="#/menu">Menu</CDropdownItem>
          <CDropdownItem href="#/bread">Bread</CDropdownItem>
        </CDropdown>
      </CHeaderNavItem>
    </CHeaderNav>
    <CHeaderNav class="mr-4">
      <CHeaderNavItem class="d-md-down-none mx-2">
        <CHeaderNavLink>
          <CIcon name="cil-bell"/>
        </CHeaderNavLink>
      </CHeaderNavItem>
      <CHeaderNavItem class="d-md-down-none mx-2">
        <CHeaderNavLink>
          <CIcon name="cil-list"/>
        </CHeaderNavLink>
      </CHeaderNavItem>
      <CHeaderNavItem class="d-md-down-none mx-2">
        <CHeaderNavLink>
          <CIcon name="cil-envelope-open"/>
        </CHeaderNavLink>
      </CHeaderNavItem>
      <TheHeaderDropdownAccnt/>
    </CHeaderNav>
    <CSubheader class="px-3">
      <CBreadcrumbRouter class="border-0 mb-0"/>
    </CSubheader>
  </CHeader>
</template>

<script>
import TheHeaderDropdownAccnt from './TheHeaderDropdownAccnt'

export default {
  name: 'TheHeader',
  components: {
    TheHeaderDropdownAccnt
  }
}
</script>
