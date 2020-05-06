import Vue from "vue";
import Router from "vue-router";
import routes from "./routes.js";

Vue.use(Router);

const router = new Router({
    mode: "history", // https://router.vuejs.org/api/#mode
    linkActiveClass: "active",
    scrollBehavior: () => ({ y: 0 }),
    routes: routes
});

router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('jwt') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            })
        } else {
            let user = JSON.parse(localStorage.getItem('u'))
            if(to.matched.some(record => record.meta.is_admin)) {
                if(user.is_admin == 1){
                    next()
                }
                else{
                    next({ name: 'dashboard'})
                }ls

            }else {
                next()
            }
        }
    } else if(to.matched.some(record => record.meta.guest)) {
        if(localStorage.getItem('jwt') == null){
            next()
        }
        else{
            next({ name: 'dashboard'})
        }
    }else {
        next() 
    }
})


export default router;