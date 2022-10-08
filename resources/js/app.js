import "./bootstrap";

//import all functionalities
import { createApp } from "vue";
import { createPinia } from "pinia";
import "@fortawesome/fontawesome-free/css/all.css";
import App from "./layouts/App.vue";
import router from "./router/router";

//mount core element of our system
const vue = createApp(App);

vue.use(createPinia());
vue.use(router);
router.isReady().then(() => {
    vue.mount("#app");
});


