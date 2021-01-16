import { createRouter, createWebHashHistory } from "vue-router";
import Home from "../views/Home.vue";
import Upload from "../views/Upload.vue";
import Login from "../views/Login.vue";
import SignUp from "../views/SignUp.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/upload",
    name: "Upload",
    component: Upload,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/sign-up",
    name: "Sign up",
    component: SignUp,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
