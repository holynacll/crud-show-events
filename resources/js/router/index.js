import { createRouter, createWebHistory } from "vue-router";
import ShowEventsIndex from '../components/ShowEventsIndex.vue';
import ShowEventsCreate from '../components/ShowEventsCreate.vue';
import NotFound from '../components/NotFound.vue';

const routes = [
  { path: '/', name: 'showevents.index', component: ShowEventsIndex },
  { path: '/create', name: 'showevents.create', component: ShowEventsCreate },
  { path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFound }

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});
export default router;