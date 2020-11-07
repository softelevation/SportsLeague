require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import PlayerComponent from './components/PlayerComponent.vue';
import createTeamComponent from './components/CreateTeamComponent.vue';
import CreatePlayerComponent from './components/CreatePlayerComponent.vue';
import EditPlayerComponent from './components/EditPlayerComponent.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: HomeComponent
  },
  {
      name: 'player',
      path: '/player/:id',
      component: PlayerComponent
  },
  {
      name: 'createTeam',
      path: '/create-team',
      component: createTeamComponent
  },
  {
      name: 'editTeam',
      path: '/team/:id',
      component: createTeamComponent
  },
  {
      name: 'createplayer',
      path: '/create-player/:id',
      component: CreatePlayerComponent
  },
  {
      name: 'editPlayer',
      path: '/edit-player/:id',
      component: EditPlayerComponent
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');