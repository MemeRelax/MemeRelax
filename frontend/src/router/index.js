import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Upload from "../views/Upload.vue";
import Login from "../views/Login.vue";
import SignUp from "../views/SignUp.vue";
import ErrorPage from "../views/ErrorPage.vue";

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
  {
    path: "/:pathMatch(.*)*",
    name: "Error page",
    component: ErrorPage,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
