import Vue from "vue";
import Router from "vue-router";

// Containers
const TheContainer = () => import("@/containers/TheContainer");

// Views
const Dashboard = () => import("@/views/Dashboard");

// Views - Pages
const Page404 = () => import("@/views/core/Page404");
const Page500 = () => import("@/views/core/Page500");
const Login = () => import("@/views/core/Login");
const Register = () => import("@/views/core/Register");

// Users
const Users = () => import("@/views/users/Users");
const User = () => import("@/views/users/User");
const EditUser = () => import("@/views/users/EditUser");

//Roles
const Roles = () => import("@/views/roles/Roles");
const Role = () => import("@/views/roles/Role");
const EditRole = () => import("@/views/roles/EditRole");
const CreateRole = () => import("@/views/roles/CreateRole");

Vue.use(Router);

export default new Router({
    mode: "history", // https://router.vuejs.org/api/#mode
    linkActiveClass: "active",
    scrollBehavior: () => ({ y: 0 }),
    routes: configRoutes()
});

function configRoutes() {
    return [
        {
            path: "/",
            redirect: "/dashboard",
            name: "Home",
            component: TheContainer,
            children: [
                {
                    path: "dashboard",
                    name: "Dashboard",
                    component: Dashboard
                },
                {
                    path: "users",
                    meta: { label: "Users" },
                    component: {
                        render(c) {
                            return c("router-view");
                        }
                    },
                    children: [
                        {
                            path: "",
                            component: Users
                        },
                        {
                            path: ":id",
                            meta: { label: "User Details" },
                            name: "User",
                            component: User
                        },
                        {
                            path: ":id/edit",
                            meta: { label: "Edit User" },
                            name: "Edit User",
                            component: EditUser
                        }
                    ]
                },
                {
                    path: "roles",
                    meta: { label: "Roles" },
                    component: {
                        render(c) {
                            return c("router-view");
                        }
                    },
                    children: [
                        {
                            path: "",
                            component: Roles
                        },
                        {
                            path: "create",
                            meta: { label: "Create Role" },
                            name: "Create Role",
                            component: CreateRole
                        },
                        {
                            path: ":id",
                            meta: { label: "Role Details" },
                            name: "Role",
                            component: Role
                        },
                        {
                            path: ":id/edit",
                            meta: { label: "Edit Role" },
                            name: "Edit Role",
                            component: EditRole
                        }
                    ]
                }
            ]
        },
        {
            path: "/pages",
            redirect: "/pages/404",
            name: "Pages",
            component: {
                render(c) {
                    return c("router-view");
                }
            },
            children: [
                {
                    path: "404",
                    name: "Page404",
                    component: Page404
                },
                {
                    path: "500",
                    name: "Page500",
                    component: Page500
                }
            ]
        },
        {
            path: "/",
            redirect: "/login",
            name: "Auth",
            component: {
                render(c) {
                    return c("router-view");
                }
            },
            children: [
                {
                    path: "login",
                    name: "Login",
                    component: Login
                },
                {
                    path: "register",
                    name: "Register",
                    component: Register
                }
            ]
        },
        {
            path: "*",
            name: "404",
            component: Page404
        }
    ];
}
