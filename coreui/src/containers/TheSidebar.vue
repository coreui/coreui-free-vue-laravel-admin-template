<template>
  <CSidebar 
    fixed 
    :minimize="minimize"
    :show="show"
  >
    <CSidebarBrand
      :imgFull="{ width: 118, height: 46, alt: 'Logo', src: 'img/brand/coreui-base-white.svg'}"
      :imgMinimized="{ width: 118, height: 46, alt: 'Logo', src: 'img/brand/coreui-signet-white.svg'}"
      :wrappedInLink="{ href: 'https://coreui.io/', target: '_blank'}"
    />
    <!-- <CSidebarHeader/> -->
    <!-- <CSidebarForm/> -->
    <CRenderFunction :contentToRender="nav"/>
    <!-- <CSidebarFooter/> -->
    <CSidebarMinimizer 
      class="d-md-down-none"
      @click.native="minimize = !minimize"
    />
  </CSidebar>
</template>

<script>
import axios from 'axios'
export default {
  name: 'TheSidebar',
  data () {
    return {
      minimize: false,
      nav: [],
      show: true
    }
  },
  methods: {
    rebuildData(data){
      let result = ['CSidebarNav',[]]
      for(let k=0; k<data.length; k++){
        switch(data[k]['slug']){
          case 'link':
            if(data[k]['href'].indexOf('http') !== -1){
              result[1].push(
                [
                  'CSidebarNavLink',
                  {
                    props: {
                      name: data[k]['name'],
                      href: data[k]['href'],
                      icon: data[k]['icon'],
                      target: '_blank'
                    }
                  }
                ]
              );
            }else{
              result[1].push(
                [
                  'CSidebarNavLink',
                  {
                    props: {
                      name: data[k]['name'],
                      to:   data[k]['href'],
                      icon: data[k]['icon'],
                    }
                  }
                ]
              );
            }
          break;
          case 'title':
            result[1].push(
              [
                'CSidebarNavTitle',
                [data[k]['name']]
              ]
            );
          break;
          case 'dropdown':
            result[1].push(
              [
                'CSidebarNavDropdown',
                {
                  props: {
                    name: data[k]['name'],
                    route: data[k]['href'],
                    icon: data[k]['icon']
                  }
                },
                []
              ]
            );
            for(let i=0; i<data[k]['elements'].length; i++){
              result[1][k][2].push(
                [
                  'CSidebarNavLink',
                  {
                    props: {
                      name:   data[k]['elements'][i]['name'],
                      to:     data[k]['elements'][i]['href'],
                      icon:   data[k]['elements'][i]['icon']
                    }
                  }
                ]
              );
            }
          break;
        }
      }
      return result;
    }
  },
  mounted () {
    this.$root.$on('toggle-sidebar', () => this.show = !this.show)
    let self = this;
    axios.get('/api/menu?token=' + localStorage.getItem("api_token") )
    .then(function (response) {
      self.nav = self.rebuildData(response.data);
    }).catch(function (error) {
      console.log(error);
      self.$router.push({ path: '/login' });
    });

  }
}
</script>
