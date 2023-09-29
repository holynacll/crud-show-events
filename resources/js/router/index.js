import { createRouter, createWebHistory } from "vue-router";

import ShowEventsIndex from '../components/ShowEventsIndex.vue';
import ShowEventsCreate from '../components/ShowEventsCreate.vue';
import ShowEventsEdit from '../components/ShowEventsEdit.vue';
// import NotFound from '../components/NotFound.vue';

const routes = [
  { path: '/', name: 'home', component: ShowEventsIndex },
  { path: '/show-events', name: 'showevents.index', component: ShowEventsIndex },
  { path: '/show-events/create', name: 'showevents.create', component: ShowEventsCreate },
  { path: '/show-events/:id/edit', name: 'showevents.edit', component: ShowEventsEdit, props: true },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;