import "./bootstrap";

import { createApp } from "vue";

import App from "../components/App.vue";
import router from "./routes.js";

import { provideEventBus } from "./eventBus";

const app = createApp(App);

provideEventBus(app);

app.use(router);
app.mount("#app");
