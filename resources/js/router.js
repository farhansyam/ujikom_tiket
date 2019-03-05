
// 1. Define route components.
// These can be imported from other files
// import DashboardIndex from './components/dashboard/DashboardIndex.vue';
import UserIndex from './components/User/UserIndex.vue';
import UserCreate from './components/User/UserCreate.vue';
import UserEdit from './components/User/UserEdit.vue';


// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    { path: '/user', component: UserIndex, name: 'IndexUser' },
    { path: '/user/create', component: UserCreate, name: 'CreateUser' },
    { path: '/user/edit/:id', component: UserEdit, name: 'EditUser' },
    // { path: '/*', component: Page404 },
]

export default routes;
