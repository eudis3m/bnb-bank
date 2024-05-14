import './bootstrap';
import Axios from 'axios';

import { client } from 'laravel-precognition-vue';
 
client.axios().defaults.headers.common['Authorization'] = authToken;

window.axios = Axios.create()
window.axios.defaults.headers.common['Authorization'] = authToken;
 
client.use(window.axios)
