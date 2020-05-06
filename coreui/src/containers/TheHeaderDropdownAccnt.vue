<template>
    <CDropdown
        inNav
        class="c-header-nav-items"
        placement="bottom-end"
        add-menu-classes="pt-0"
    >
        <template #toggler>
            <CHeaderNavLink>
                <div class="c-avatar">
                    <img
                        src="img/avatars/6.jpg"
                        class="c-avatar-img "
                    />
                </div>
            </CHeaderNavLink>
        </template>
        <component
            v-for="item in items"
            v-bind:is="item.component"
            v-bind:key="item.id"
            :tag="item.tag"
            :class="item.class"
            :color="item.color"
            :to="item.href"
        >
            <CIcon v-if="item.slug=='link'" name="cil-bell"/>
            <span v-if="item.slug=='link'">{{item.name}}</span>
            <strong v-if="item.slug=='dropdown'">{{item.name}}</strong>
        </component>
        <CDropdownDivider/>
        <CDropdownItem @click="logout()">
            <CIcon name="cil-lock-locked" /> Logout
        </CDropdownItem>
    </CDropdown>
</template>
<script>
import axios from 'axios'
export default {
    name: 'TheHeaderDropdownAccnt',
    data () {
        return {
            itemsCount: 42,
            items: []
        }
    },
    methods:{
        logout(){
            let self = this;
            axios.post('/api/logout?token=' + localStorage.getItem("api_token"),{})
            .then(function (response) {
                self.$router.push({ path: '/login' });
            }).catch(function (error) {
                console.log(error);
            });
        }
    },
    mounted () {
        let self = this;
        axios.get('/api/menu/2?token=' + localStorage.getItem('jwt')).then((response) => {
            response.data.forEach((item) => {
                switch(item.slug) {
                    case 'dropdown':
                        item.component  = "CDropdownHeader";
                        item.tag        = "div";
                        item.class      = "text-center"
                        item.color      = "light"
                        break;
                    case 'link':
                        item.component = "CDropdownItem";
                        break;
                    case 'separator':
                        item.component = 'CDropdownDivider';
                        break;
                }
            });

            this.items = response.data;
            console.log(self.items);
        }).catch((error) => {
            console.log(error);
            //self.$router.push({path: '/login'});
        })
    }
}
</script>
<style scoped>
.c-icon {
    margin-right: 0.3rem;
}
</style>
