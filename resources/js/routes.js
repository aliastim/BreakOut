import VueRouter from 'vue-router';
// Vues
import Home from './components/Home.vue'
import Shop from './components/Shop';
import Rooms from "./components/Rooms";

//Vue utilisateur
import Account from './components/parameters/Account';
import Avatar from './components/parameters/Avatar';
import Inventory from './components/parameters/Inventory';
import Myrooms from './components/parameters/Myrooms';
import Gemclicker from './components/hidden/Gemclicker';
import Room404 from './components/rooms/room404';
import InfiniteCristal from './components/rooms/infiniteCristal';

//Vue utilisateur
import Admin_dashboard from './components/admin/Dashboard';

//Vue d'erreurs
import PageNotFound from './components/errors/PageNotFound'

const router = new VueRouter({
    mode: 'history',
    routes : [
        { path: '/', component: Home},
        { path: '/home', component: Home},
        { path: '/admin', component: Admin_dashboard},
        { path: '/rooms', component: Rooms},
        { path: '/shop', component: Shop},
        { path: '/account', component: Account},
        { path: '/avatar', component: Avatar},
        { path: '/inventory', component: Inventory},
        { path: '/myrooms', component: Myrooms},
        { path: '/gemclicker', component: Gemclicker},

        { path: '/rooms/room404', component: Room404},
        { path: '/rooms/room404/play', component: Room404},

        { path: '/rooms/infinitecristal', component: InfiniteCristal},
        { path: '/rooms/infinitecristal/play', component: InfiniteCristal},

        /*{ path: '*', component: PageNotFound},*/
        { path: '*', component: Room404},

    ]
});

export default router
