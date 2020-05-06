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

const routes = [{
    path: "/",
    redirect: "/dashboard",
    name: "Home",
    component: TheContainer,
    meta: {
        requiresAuth: true
    },
    children: [
        {
            path: "dashboard",
            name: "Dashboard",
            component: Dashboard,
            meta: { 
                requiresAuth: true
            }
        },
        {
            path: "users",
            meta: {
                label: "Users",
                requiresAuth: true
            },
            component: {
                render(c) {
                    return c("router-view");
                }
            },
            children: [
                {
                    path: "",
                    component: Users,
                    meta: {
                        requiresAuth: true
                    }
                },
                {
                    path: ":id",
                    name: "User",
                    component: User,
                    meta: {
                        label: "User Details",
                        requiresAuth: true
                    },
                },
                {
                    path: ":id/edit",
                    name: "Edit User",
                    component: EditUser,
                    meta: {
                        label: "Edit User",
                        requiresAuth: true
                    },
                }
            ]
        },
        {
            path: "roles",
            meta: {
                label: "Roles",
                requiresAuth: true
            },
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
                    name: "Create Role",
                    component: CreateRole,
                    meta: {
                        label: "Create Role",
                        requiresAuth: true
                    }
                },
                {
                    path: ":id",
                    name: "Role",
                    component: Role,
                    meta: {
                        label: "Role Details",
                        requiresAuth: true
                    }
                },
                {
                    path: ":id/edit",
                    name: "Edit Role",
                    component: EditRole,
                    meta: {
                        label: "Edit Role",
                        requiresAuth: true
                    }
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
    meta: {
        requiresAuth: false
    },
    children: [
        {
            path: "404",
            name: "Page404",
            component: Page404,
            meta: {
                requiresAuth: false
            }
        },
        {
            path: "500",
            name: "Page500",
            component: Page500,
            meta: {
                requiresAuth: false
            }
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
    meta: {
        requiresAuth: false
    },
    children: [
        {
            path: "login",
            name: "Login",
            component: Login,
            meta: {
                requiresAuth: false
            }
        },
        {
            path: "register",
            name: "Register",
            component: Register,
            meta: {
                requiresAuth: false
            }
        }
    ]
},
{
    path: "*",
    name: "404",
    component: Page404,
    meta: {
        requiresAuth: false
    }
}];

export default routes;