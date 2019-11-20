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
        <!-- <CRow class="text-center mb-5">
          <template v-for="(name, key) in $options.iconNames">
            <CCol :key="key" col="6" sm="4" md="3" xl="2">
              <CIcon :name="name" width="24" class="mt-4"/>
              <div>{{name}}</div>
            </CCol>
          </template>
        </CRow>
         -->
        <CRow class="text-center ">
                  <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-3d"></i>
                      <div>cil-3d</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-4k"></i>
                      <div>cil-4k</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-account-logout"></i>
                      <div>cil-account-logout</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-action-redo"></i>
                      <div>cil-action-redo</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-action-undo"></i>
                      <div>cil-action-undo</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-address-book"></i>
                      <div>cil-address-book</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-airplane-mode"></i>
                      <div>cil-airplane-mode</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-airplane-mode-off"></i>
                      <div>cil-airplane-mode-off</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-airplay"></i>
                      <div>cil-airplay</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-alarm"></i>
                      <div>cil-alarm</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-album"></i>
                      <div>cil-album</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-align-center"></i>
                      <div>cil-align-center</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-align-left"></i>
                      <div>cil-align-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-align-right"></i>
                      <div>cil-align-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-american-football"></i>
                      <div>cil-american-football</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-animal"></i>
                      <div>cil-animal</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-aperture"></i>
                      <div>cil-aperture</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-apple"></i>
                      <div>cil-apple</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-applications"></i>
                      <div>cil-applications</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-applications-settings"></i>
                      <div>cil-applications-settings</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-apps"></i>
                      <div>cil-apps</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-apps-settings"></i>
                      <div>cil-apps-settings</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-bottom"></i>
                      <div>cil-arrow-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-circle-bottom"></i>
                      <div>cil-arrow-circle-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-circle-left"></i>
                      <div>cil-arrow-circle-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-circle-right"></i>
                      <div>cil-arrow-circle-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-circle-top"></i>
                      <div>cil-arrow-circle-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-left"></i>
                      <div>cil-arrow-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-right"></i>
                      <div>cil-arrow-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-bottom"></i>
                      <div>cil-arrow-thick-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-from-bottom"></i>
                      <div>cil-arrow-thick-from-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-from-left"></i>
                      <div>cil-arrow-thick-from-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-from-right"></i>
                      <div>cil-arrow-thick-from-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-from-top"></i>
                      <div>cil-arrow-thick-from-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-left"></i>
                      <div>cil-arrow-thick-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-right"></i>
                      <div>cil-arrow-thick-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-to-bottom"></i>
                      <div>cil-arrow-thick-to-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-to-left"></i>
                      <div>cil-arrow-thick-to-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-to-right"></i>
                      <div>cil-arrow-thick-to-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-to-top"></i>
                      <div>cil-arrow-thick-to-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-thick-top"></i>
                      <div>cil-arrow-thick-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-arrow-top"></i>
                      <div>cil-arrow-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-assistive-listening-system"></i>
                      <div>cil-assistive-listening-system</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-asterisk"></i>
                      <div>cil-asterisk</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-asterisk-circle"></i>
                      <div>cil-asterisk-circle</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-at"></i>
                      <div>cil-at</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-audio"></i>
                      <div>cil-audio</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-audio-description"></i>
                      <div>cil-audio-description</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-audio-spectrum"></i>
                      <div>cil-audio-spectrum</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-av-timer"></i>
                      <div>cil-av-timer</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-baby"></i>
                      <div>cil-baby</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-baby-carriage"></i>
                      <div>cil-baby-carriage</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-backspace"></i>
                      <div>cil-backspace</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-badge"></i>
                      <div>cil-badge</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-balance-scale"></i>
                      <div>cil-balance-scale</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-ban"></i>
                      <div>cil-ban</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bank"></i>
                      <div>cil-bank</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bar-chart"></i>
                      <div>cil-bar-chart</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-barcode"></i>
                      <div>cil-barcode</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-baseball"></i>
                      <div>cil-baseball</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-basket"></i>
                      <div>cil-basket</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-basketball"></i>
                      <div>cil-basketball</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bath"></i>
                      <div>cil-bath</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bathroom"></i>
                      <div>cil-bathroom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-battery-0"></i>
                      <div>cil-battery-0</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-battery-3"></i>
                      <div>cil-battery-3</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-battery-5"></i>
                      <div>cil-battery-5</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-battery-alert"></i>
                      <div>cil-battery-alert</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-battery-empty"></i>
                      <div>cil-battery-empty</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-battery-full"></i>
                      <div>cil-battery-full</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-battery-slash"></i>
                      <div>cil-battery-slash</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-beach-access"></i>
                      <div>cil-beach-access</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-beaker"></i>
                      <div>cil-beaker</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bed"></i>
                      <div>cil-bed</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bell"></i>
                      <div>cil-bell</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bike"></i>
                      <div>cil-bike</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-birthday-cake"></i>
                      <div>cil-birthday-cake</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-blind"></i>
                      <div>cil-blind</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bluetooth"></i>
                      <div>cil-bluetooth</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-blur"></i>
                      <div>cil-blur</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-blur-circular"></i>
                      <div>cil-blur-circular</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-blur-linear"></i>
                      <div>cil-blur-linear</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-boat-alt"></i>
                      <div>cil-boat-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bold"></i>
                      <div>cil-bold</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bolt"></i>
                      <div>cil-bolt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-book"></i>
                      <div>cil-book</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bookmark"></i>
                      <div>cil-bookmark</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-all"></i>
                      <div>cil-border-all</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-bottom"></i>
                      <div>cil-border-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-clear"></i>
                      <div>cil-border-clear</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-horizontal"></i>
                      <div>cil-border-horizontal</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-inner"></i>
                      <div>cil-border-inner</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-left"></i>
                      <div>cil-border-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-outer"></i>
                      <div>cil-border-outer</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-right"></i>
                      <div>cil-border-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-style"></i>
                      <div>cil-border-style</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-top"></i>
                      <div>cil-border-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-border-vertical"></i>
                      <div>cil-border-vertical</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bowling"></i>
                      <div>cil-bowling</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-braille"></i>
                      <div>cil-braille</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-briefcase"></i>
                      <div>cil-briefcase</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-brightness"></i>
                      <div>cil-brightness</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-british-pound"></i>
                      <div>cil-british-pound</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-browser"></i>
                      <div>cil-browser</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-brush"></i>
                      <div>cil-brush</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-brush-alt"></i>
                      <div>cil-brush-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bug"></i>
                      <div>cil-bug</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-building"></i>
                      <div>cil-building</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bullhorn"></i>
                      <div>cil-bullhorn</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-burger"></i>
                      <div>cil-burger</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-bus-alt"></i>
                      <div>cil-bus-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-calculator"></i>
                      <div>cil-calculator</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-calendar"></i>
                      <div>cil-calendar</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-calendar-check"></i>
                      <div>cil-calendar-check</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-camera"></i>
                      <div>cil-camera</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-camera-control"></i>
                      <div>cil-camera-control</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-camera-roll"></i>
                      <div>cil-camera-roll</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-car-alt"></i>
                      <div>cil-car-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-caret-bottom"></i>
                      <div>cil-caret-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-caret-left"></i>
                      <div>cil-caret-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-caret-right"></i>
                      <div>cil-caret-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-caret-top"></i>
                      <div>cil-caret-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cart"></i>
                      <div>cil-cart</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cash"></i>
                      <div>cil-cash</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-casino"></i>
                      <div>cil-casino</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cast"></i>
                      <div>cil-cast</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cat"></i>
                      <div>cil-cat</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cc"></i>
                      <div>cil-cc</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-center-focus"></i>
                      <div>cil-center-focus</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chart"></i>
                      <div>cil-chart</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chart-line"></i>
                      <div>cil-chart-line</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chart-pie"></i>
                      <div>cil-chart-pie</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chat-bubble"></i>
                      <div>cil-chat-bubble</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-check"></i>
                      <div>cil-check</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-check-alt"></i>
                      <div>cil-check-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-bottom"></i>
                      <div>cil-chevron-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-circle-down-alt"></i>
                      <div>cil-chevron-circle-down-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-circle-left-alt"></i>
                      <div>cil-chevron-circle-left-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-circle-right-alt"></i>
                      <div>cil-chevron-circle-right-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-circle-up-alt"></i>
                      <div>cil-chevron-circle-up-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-double-down"></i>
                      <div>cil-chevron-double-down</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-double-left"></i>
                      <div>cil-chevron-double-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-double-right"></i>
                      <div>cil-chevron-double-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-double-up"></i>
                      <div>cil-chevron-double-up</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-double-up-alt"></i>
                      <div>cil-chevron-double-up-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-left"></i>
                      <div>cil-chevron-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-right"></i>
                      <div>cil-chevron-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-chevron-top"></i>
                      <div>cil-chevron-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-child"></i>
                      <div>cil-child</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-child-friendly"></i>
                      <div>cil-child-friendly</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-circle"></i>
                      <div>cil-circle</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-clear-all"></i>
                      <div>cil-clear-all</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-clipboard"></i>
                      <div>cil-clipboard</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-clock"></i>
                      <div>cil-clock</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-clone"></i>
                      <div>cil-clone</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-closed-captioning"></i>
                      <div>cil-closed-captioning</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cloud"></i>
                      <div>cil-cloud</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cloud-download"></i>
                      <div>cil-cloud-download</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cloud-upload"></i>
                      <div>cil-cloud-upload</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cloudy"></i>
                      <div>cil-cloudy</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-code"></i>
                      <div>cil-code</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-coffee"></i>
                      <div>cil-coffee</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cog"></i>
                      <div>cil-cog</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-color-border"></i>
                      <div>cil-color-border</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-color-fill"></i>
                      <div>cil-color-fill</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-color-palette"></i>
                      <div>cil-color-palette</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-columns"></i>
                      <div>cil-columns</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-comment-bubble"></i>
                      <div>cil-comment-bubble</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-comment-square"></i>
                      <div>cil-comment-square</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-compass"></i>
                      <div>cil-compass</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-compress"></i>
                      <div>cil-compress</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-contact"></i>
                      <div>cil-contact</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-contrast"></i>
                      <div>cil-contrast</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-control"></i>
                      <div>cil-control</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-copy"></i>
                      <div>cil-copy</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-couch"></i>
                      <div>cil-couch</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-credit-card"></i>
                      <div>cil-credit-card</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-crop"></i>
                      <div>cil-crop</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-crop-rotate"></i>
                      <div>cil-crop-rotate</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cursor"></i>
                      <div>cil-cursor</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cursor-move"></i>
                      <div>cil-cursor-move</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-cut"></i>
                      <div>cil-cut</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-data-transfer-down"></i>
                      <div>cil-data-transfer-down</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-data-transfer-up"></i>
                      <div>cil-data-transfer-up</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-deaf"></i>
                      <div>cil-deaf</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-delete"></i>
                      <div>cil-delete</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-description"></i>
                      <div>cil-description</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-devices"></i>
                      <div>cil-devices</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-dialpad"></i>
                      <div>cil-dialpad</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-diamond"></i>
                      <div>cil-diamond</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-dinner"></i>
                      <div>cil-dinner</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-disabled"></i>
                      <div>cil-disabled</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-dog"></i>
                      <div>cil-dog</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-dollar"></i>
                      <div>cil-dollar</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-door"></i>
                      <div>cil-door</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-double-quote-sans-left"></i>
                      <div>cil-double-quote-sans-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-double-quote-sans-right"></i>
                      <div>cil-double-quote-sans-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-drink"></i>
                      <div>cil-drink</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-drink-alcohol"></i>
                      <div>cil-drink-alcohol</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-drop"></i>
                      <div>cil-drop</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-drop1"></i>
                      <div>cil-drop1</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-eco"></i>
                      <div>cil-eco</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-education"></i>
                      <div>cil-education</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-elevator"></i>
                      <div>cil-elevator</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-ellipses"></i>
                      <div>cil-ellipses</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-ellipsis"></i>
                      <div>cil-ellipsis</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-envelope-closed"></i>
                      <div>cil-envelope-closed</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-envelope-letter"></i>
                      <div>cil-envelope-letter</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-envelope-open"></i>
                      <div>cil-envelope-open</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-equalizer"></i>
                      <div>cil-equalizer</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-ethernet"></i>
                      <div>cil-ethernet</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-euro"></i>
                      <div>cil-euro</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-excerpt"></i>
                      <div>cil-excerpt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-exit-to-app"></i>
                      <div>cil-exit-to-app</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-expand-down"></i>
                      <div>cil-expand-down</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-expand-left"></i>
                      <div>cil-expand-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-expand-right"></i>
                      <div>cil-expand-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-expand-up"></i>
                      <div>cil-expand-up</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-exposure"></i>
                      <div>cil-exposure</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-external-link"></i>
                      <div>cil-external-link</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-eyedropper"></i>
                      <div>cil-eyedropper</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-face"></i>
                      <div>cil-face</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-face-dead"></i>
                      <div>cil-face-dead</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-factory"></i>
                      <div>cil-factory</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-factory-slash"></i>
                      <div>cil-factory-slash</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-fastfood"></i>
                      <div>cil-fastfood</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-fax"></i>
                      <div>cil-fax</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-featured-playlist"></i>
                      <div>cil-featured-playlist</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-file"></i>
                      <div>cil-file</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-filter"></i>
                      <div>cil-filter</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-filter-frames"></i>
                      <div>cil-filter-frames</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-filter-photo"></i>
                      <div>cil-filter-photo</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-find-in-page"></i>
                      <div>cil-find-in-page</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-fingerprint"></i>
                      <div>cil-fingerprint</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-fire"></i>
                      <div>cil-fire</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-flag-alt"></i>
                      <div>cil-flag-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-flight-takeoff"></i>
                      <div>cil-flight-takeoff</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-flip"></i>
                      <div>cil-flip</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-flip-to-back"></i>
                      <div>cil-flip-to-back</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-flip-to-front"></i>
                      <div>cil-flip-to-front</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-flower"></i>
                      <div>cil-flower</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-folder"></i>
                      <div>cil-folder</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-folder-open"></i>
                      <div>cil-folder-open</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-font"></i>
                      <div>cil-font</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-football"></i>
                      <div>cil-football</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-fork"></i>
                      <div>cil-fork</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-fridge"></i>
                      <div>cil-fridge</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-frown"></i>
                      <div>cil-frown</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-fullscreen"></i>
                      <div>cil-fullscreen</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-fullscreen-exit"></i>
                      <div>cil-fullscreen-exit</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-functions"></i>
                      <div>cil-functions</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-functions-alt"></i>
                      <div>cil-functions-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-gamepad"></i>
                      <div>cil-gamepad</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-garage"></i>
                      <div>cil-garage</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-gauge"></i>
                      <div>cil-gauge</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-gem"></i>
                      <div>cil-gem</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-gif"></i>
                      <div>cil-gif</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-gift"></i>
                      <div>cil-gift</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-globe-alt"></i>
                      <div>cil-globe-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-golf"></i>
                      <div>cil-golf</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-golf-alt"></i>
                      <div>cil-golf-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-gradient"></i>
                      <div>cil-gradient</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-grain"></i>
                      <div>cil-grain</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-graph"></i>
                      <div>cil-graph</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-grid"></i>
                      <div>cil-grid</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-grid-slash"></i>
                      <div>cil-grid-slash</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hamburger-menu"></i>
                      <div>cil-hamburger-menu</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hand-point-down"></i>
                      <div>cil-hand-point-down</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hand-point-left"></i>
                      <div>cil-hand-point-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hand-point-right"></i>
                      <div>cil-hand-point-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hand-point-up"></i>
                      <div>cil-hand-point-up</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-happy"></i>
                      <div>cil-happy</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hd"></i>
                      <div>cil-hd</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hdr"></i>
                      <div>cil-hdr</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-header"></i>
                      <div>cil-header</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-headphones"></i>
                      <div>cil-headphones</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-healing"></i>
                      <div>cil-healing</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-heart"></i>
                      <div>cil-heart</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-highlighter"></i>
                      <div>cil-highlighter</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-highligt"></i>
                      <div>cil-highligt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-history"></i>
                      <div>cil-history</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-home"></i>
                      <div>cil-home</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hospital"></i>
                      <div>cil-hospital</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-hot-tub"></i>
                      <div>cil-hot-tub</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-house"></i>
                      <div>cil-house</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-https"></i>
                      <div>cil-https</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-image-broken"></i>
                      <div>cil-image-broken</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-image-plus"></i>
                      <div>cil-image-plus</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-image1"></i>
                      <div>cil-image1</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-inbox"></i>
                      <div>cil-inbox</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-indent-decrease"></i>
                      <div>cil-indent-decrease</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-indent-increase"></i>
                      <div>cil-indent-increase</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-industry"></i>
                      <div>cil-industry</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-industry-slash"></i>
                      <div>cil-industry-slash</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-infinity"></i>
                      <div>cil-infinity</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-info"></i>
                      <div>cil-info</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-input"></i>
                      <div>cil-input</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-input-hdmi"></i>
                      <div>cil-input-hdmi</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-input-power"></i>
                      <div>cil-input-power</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-institution"></i>
                      <div>cil-institution</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-italic"></i>
                      <div>cil-italic</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-justify-center"></i>
                      <div>cil-justify-center</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-justify-left"></i>
                      <div>cil-justify-left</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-justify-right"></i>
                      <div>cil-justify-right</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-keyboard"></i>
                      <div>cil-keyboard</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-lan"></i>
                      <div>cil-lan</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-language"></i>
                      <div>cil-language</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-laptop"></i>
                      <div>cil-laptop</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-layers"></i>
                      <div>cil-layers</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-leaf"></i>
                      <div>cil-leaf</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-lemon"></i>
                      <div>cil-lemon</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-level-down"></i>
                      <div>cil-level-down</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-level-up"></i>
                      <div>cil-level-up</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-library"></i>
                      <div>cil-library</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-library-add"></i>
                      <div>cil-library-add</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-library-building"></i>
                      <div>cil-library-building</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-life-ring"></i>
                      <div>cil-life-ring</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-lightbulb"></i>
                      <div>cil-lightbulb</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-line-spacing"></i>
                      <div>cil-line-spacing</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-line-style"></i>
                      <div>cil-line-style</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-line-weight"></i>
                      <div>cil-line-weight</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-link"></i>
                      <div>cil-link</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-link-alt"></i>
                      <div>cil-link-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-link-broken"></i>
                      <div>cil-link-broken</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-list"></i>
                      <div>cil-list</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-list-filter"></i>
                      <div>cil-list-filter</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-list-high-priority"></i>
                      <div>cil-list-high-priority</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-list-low-priority"></i>
                      <div>cil-list-low-priority</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-list-numbered"></i>
                      <div>cil-list-numbered</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-list-rich"></i>
                      <div>cil-list-rich</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-location-pin"></i>
                      <div>cil-location-pin</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-lock-locked"></i>
                      <div>cil-lock-locked</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-lock-unlocked"></i>
                      <div>cil-lock-unlocked</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-locomotive"></i>
                      <div>cil-locomotive</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-loop"></i>
                      <div>cil-loop</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-loop-1"></i>
                      <div>cil-loop-1</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-loop-circular"></i>
                      <div>cil-loop-circular</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-low-vision"></i>
                      <div>cil-low-vision</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-magnifying-glass"></i>
                      <div>cil-magnifying-glass</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-map"></i>
                      <div>cil-map</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-eject"></i>
                      <div>cil-media-eject</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-pause"></i>
                      <div>cil-media-pause</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-play"></i>
                      <div>cil-media-play</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-record"></i>
                      <div>cil-media-record</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-skip-backward"></i>
                      <div>cil-media-skip-backward</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-skip-forward"></i>
                      <div>cil-media-skip-forward</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-step-backward"></i>
                      <div>cil-media-step-backward</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-step-forward"></i>
                      <div>cil-media-step-forward</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-media-stop"></i>
                      <div>cil-media-stop</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-medical-cross"></i>
                      <div>cil-medical-cross</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-meh"></i>
                      <div>cil-meh</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-memory"></i>
                      <div>cil-memory</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-menu"></i>
                      <div>cil-menu</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mic"></i>
                      <div>cil-mic</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-microphone"></i>
                      <div>cil-microphone</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-minus"></i>
                      <div>cil-minus</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mobile"></i>
                      <div>cil-mobile</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mobile-landscape"></i>
                      <div>cil-mobile-landscape</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-money"></i>
                      <div>cil-money</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-monitor"></i>
                      <div>cil-monitor</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mood-bad"></i>
                      <div>cil-mood-bad</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mood-good"></i>
                      <div>cil-mood-good</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mood-very-bad"></i>
                      <div>cil-mood-very-bad</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mood-very-good"></i>
                      <div>cil-mood-very-good</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-moon"></i>
                      <div>cil-moon</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mouse"></i>
                      <div>cil-mouse</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mouth-slash"></i>
                      <div>cil-mouth-slash</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-move"></i>
                      <div>cil-move</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-movie"></i>
                      <div>cil-movie</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mug"></i>
                      <div>cil-mug</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-mug-tea"></i>
                      <div>cil-mug-tea</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-music-note"></i>
                      <div>cil-music-note</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-newspaper"></i>
                      <div>cil-newspaper</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-notes"></i>
                      <div>cil-notes</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-object-group"></i>
                      <div>cil-object-group</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-object-ungroup"></i>
                      <div>cil-object-ungroup</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-opacity"></i>
                      <div>cil-opacity</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-options"></i>
                      <div>cil-options</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-options-horizontal"></i>
                      <div>cil-options-horizontal</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-paint"></i>
                      <div>cil-paint</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-paint-bucket"></i>
                      <div>cil-paint-bucket</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-paper-plane"></i>
                      <div>cil-paper-plane</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-paperclip"></i>
                      <div>cil-paperclip</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-paragraph"></i>
                      <div>cil-paragraph</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-paw"></i>
                      <div>cil-paw</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-pen-alt"></i>
                      <div>cil-pen-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-pen-nib"></i>
                      <div>cil-pen-nib</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-pencil"></i>
                      <div>cil-pencil</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-people"></i>
                      <div>cil-people</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-phone"></i>
                      <div>cil-phone</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-pin"></i>
                      <div>cil-pin</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-pizza"></i>
                      <div>cil-pizza</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-plant"></i>
                      <div>cil-plant</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-playlist-add"></i>
                      <div>cil-playlist-add</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-plus"></i>
                      <div>cil-plus</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-pool"></i>
                      <div>cil-pool</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-power-standby"></i>
                      <div>cil-power-standby</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-pregnant"></i>
                      <div>cil-pregnant</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-print"></i>
                      <div>cil-print</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-pushchair"></i>
                      <div>cil-pushchair</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-puzzle"></i>
                      <div>cil-puzzle</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-qr-code"></i>
                      <div>cil-qr-code</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-rain"></i>
                      <div>cil-rain</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-rectangle"></i>
                      <div>cil-rectangle</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-reload"></i>
                      <div>cil-reload</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-resize-both"></i>
                      <div>cil-resize-both</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-resize-height"></i>
                      <div>cil-resize-height</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-resize-width"></i>
                      <div>cil-resize-width</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-restaurant"></i>
                      <div>cil-restaurant</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-room"></i>
                      <div>cil-room</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-rowing"></i>
                      <div>cil-rowing</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-rss"></i>
                      <div>cil-rss</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-running"></i>
                      <div>cil-running</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sad"></i>
                      <div>cil-sad</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-satelite"></i>
                      <div>cil-satelite</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-save"></i>
                      <div>cil-save</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-school"></i>
                      <div>cil-school</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-screen-desktop"></i>
                      <div>cil-screen-desktop</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-screen-smartphone"></i>
                      <div>cil-screen-smartphone</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-scrubber"></i>
                      <div>cil-scrubber</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-search"></i>
                      <div>cil-search</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-send"></i>
                      <div>cil-send</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-settings"></i>
                      <div>cil-settings</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-share"></i>
                      <div>cil-share</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-share-all"></i>
                      <div>cil-share-all</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-share-alt"></i>
                      <div>cil-share-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-share-boxed"></i>
                      <div>cil-share-boxed</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-shield-alt"></i>
                      <div>cil-shield-alt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-short-text"></i>
                      <div>cil-short-text</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-shower"></i>
                      <div>cil-shower</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sign-language"></i>
                      <div>cil-sign-language</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-signal-cellular-0"></i>
                      <div>cil-signal-cellular-0</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-signal-cellular-3"></i>
                      <div>cil-signal-cellular-3</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-signal-cellular-4"></i>
                      <div>cil-signal-cellular-4</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sim"></i>
                      <div>cil-sim</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sitemap"></i>
                      <div>cil-sitemap</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-smile"></i>
                      <div>cil-smile</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-smile-plus"></i>
                      <div>cil-smile-plus</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-smoke"></i>
                      <div>cil-smoke</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-smoke-free"></i>
                      <div>cil-smoke-free</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-smoke-slash"></i>
                      <div>cil-smoke-slash</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-smoking-room"></i>
                      <div>cil-smoking-room</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-snowflake"></i>
                      <div>cil-snowflake</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-soccer"></i>
                      <div>cil-soccer</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sofa"></i>
                      <div>cil-sofa</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-alpha-down"></i>
                      <div>cil-sort-alpha-down</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-alpha-up"></i>
                      <div>cil-sort-alpha-up</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-ascending"></i>
                      <div>cil-sort-ascending</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-descending"></i>
                      <div>cil-sort-descending</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-numeric-down"></i>
                      <div>cil-sort-numeric-down</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sort-numeric-up"></i>
                      <div>cil-sort-numeric-up</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-spa"></i>
                      <div>cil-spa</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-space-bar"></i>
                      <div>cil-space-bar</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-speaker"></i>
                      <div>cil-speaker</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-speech"></i>
                      <div>cil-speech</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-speedometer"></i>
                      <div>cil-speedometer</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-spreadsheet"></i>
                      <div>cil-spreadsheet</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-square"></i>
                      <div>cil-square</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-star"></i>
                      <div>cil-star</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-star-half"></i>
                      <div>cil-star-half</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-storage"></i>
                      <div>cil-storage</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-stream"></i>
                      <div>cil-stream</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-strikethrough"></i>
                      <div>cil-strikethrough</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sun"></i>
                      <div>cil-sun</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-swap-horizontal"></i>
                      <div>cil-swap-horizontal</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-swap-vertical"></i>
                      <div>cil-swap-vertical</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-swimming"></i>
                      <div>cil-swimming</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-sync"></i>
                      <div>cil-sync</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-tablet"></i>
                      <div>cil-tablet</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-tag"></i>
                      <div>cil-tag</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-tags"></i>
                      <div>cil-tags</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-task"></i>
                      <div>cil-task</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-taxi"></i>
                      <div>cil-taxi</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-tennis"></i>
                      <div>cil-tennis</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-tennis-ball"></i>
                      <div>cil-tennis-ball</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-terminal"></i>
                      <div>cil-terminal</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-terrain"></i>
                      <div>cil-terrain</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-text"></i>
                      <div>cil-text</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-text-shapes"></i>
                      <div>cil-text-shapes</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-text-size"></i>
                      <div>cil-text-size</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-text-square"></i>
                      <div>cil-text-square</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-text-strike"></i>
                      <div>cil-text-strike</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-thumb-down"></i>
                      <div>cil-thumb-down</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-thumb-up"></i>
                      <div>cil-thumb-up</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-toggle-off"></i>
                      <div>cil-toggle-off</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-toilet"></i>
                      <div>cil-toilet</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-touch-app"></i>
                      <div>cil-touch-app</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-transfer"></i>
                      <div>cil-transfer</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-translate"></i>
                      <div>cil-translate</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-trash"></i>
                      <div>cil-trash</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-triangle"></i>
                      <div>cil-triangle</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-truck"></i>
                      <div>cil-truck</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-tv"></i>
                      <div>cil-tv</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-underline"></i>
                      <div>cil-underline</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-user"></i>
                      <div>cil-user</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-user-female"></i>
                      <div>cil-user-female</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-user-follow"></i>
                      <div>cil-user-follow</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-user-unfollow"></i>
                      <div>cil-user-unfollow</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-vector"></i>
                      <div>cil-vector</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-vertical-align-bottom"></i>
                      <div>cil-vertical-align-bottom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-vertical-align-bottom1"></i>
                      <div>cil-vertical-align-bottom1</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-vertical-align-center"></i>
                      <div>cil-vertical-align-center</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-vertical-align-center1"></i>
                      <div>cil-vertical-align-center1</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-vertical-align-top"></i>
                      <div>cil-vertical-align-top</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-vertical-align-top1"></i>
                      <div>cil-vertical-align-top1</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-video"></i>
                      <div>cil-video</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-view-column"></i>
                      <div>cil-view-column</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-view-module"></i>
                      <div>cil-view-module</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-view-quilt"></i>
                      <div>cil-view-quilt</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-view-stream"></i>
                      <div>cil-view-stream</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-voice-over-record"></i>
                      <div>cil-voice-over-record</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-volume-high"></i>
                      <div>cil-volume-high</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-volume-low"></i>
                      <div>cil-volume-low</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-volume-off"></i>
                      <div>cil-volume-off</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-walk"></i>
                      <div>cil-walk</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wallet"></i>
                      <div>cil-wallet</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wallpaper"></i>
                      <div>cil-wallpaper</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-warning"></i>
                      <div>cil-warning</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-watch"></i>
                      <div>cil-watch</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wc"></i>
                      <div>cil-wc</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-weightlifitng"></i>
                      <div>cil-weightlifitng</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wheelchair"></i>
                      <div>cil-wheelchair</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wifi-signal-0"></i>
                      <div>cil-wifi-signal-0</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wifi-signal-1"></i>
                      <div>cil-wifi-signal-1</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wifi-signal-2"></i>
                      <div>cil-wifi-signal-2</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wifi-signal-4"></i>
                      <div>cil-wifi-signal-4</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wifi-signal-off"></i>
                      <div>cil-wifi-signal-off</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-window"></i>
                      <div>cil-window</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-window-maximize"></i>
                      <div>cil-window-maximize</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-window-minimize"></i>
                      <div>cil-window-minimize</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-window-restore"></i>
                      <div>cil-window-restore</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-wrap-text"></i>
                      <div>cil-wrap-text</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-x"></i>
                      <div>cil-x</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-x-circle"></i>
                      <div>cil-x-circle</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-yen"></i>
                      <div>cil-yen</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-zoom"></i>
                      <div>cil-zoom</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-zoom-in"></i>
                      <div>cil-zoom-in</div>
                    </CCol>
                    <CCol col="6" sm="4" md="3" xl="2"><i class="c-icon c-icon-2xl mt-5 mb-2 cil-zoom-out"></i>
                      <div>cil-zoom-out</div>
                    </CCol>
        </CRow>
      </CCardBody>
    </CCard>
  </div>
</template>
<script>
// import { iconSet } from '@coreui/icons'
// const iconNames = Object.keys(iconSet)

export default {
  name: 'CoreUIIcons',
  // iconNames,
}
</script>
