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
      show: true,
      buffor: [],
    }
  },
  methods: {
    dropdown(data){
      let result = [
        'CSidebarNavDropdown',
        {
          props: {
            name: data['name'],
            route: data['href'],
            icon: data['icon']
          }
        },
        []
      ];
      for(let i=0; i<data['elements'].length; i++){
        if(data['elements'][i]['slug'] == 'dropdown'){
          result[2].push( this.dropdown(data['elements'][i]) );
        }else{
          result[2].push(
            [
              'CSidebarNavLink',
              {
                 props: {
                   name:   data['elements'][i]['name'],
                   to:     data['elements'][i]['href'],
                   icon:   data['elements'][i]['icon']
                }
              }
            ]
          );
        }
      }
      return result;
    },
    rebuildData(data){
      this.buffor = ['CSidebarNav',[]]
      for(let k=0; k<data.length; k++){
        switch(data[k]['slug']){
          case 'link':
            if(data[k]['href'].indexOf('http') !== -1){
              this.buffor[1].push(
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
              this.buffor[1].push(
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
            this.buffor[1].push(
              [
                'CSidebarNavTitle',
                [data[k]['name']]
              ]
            );
          break;
          case 'dropdown':
            this.buffor[1].push( this.dropdown(data[k]) );
          break;
        }
      }
      return this.buffor;
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
