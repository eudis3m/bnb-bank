import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = false;
axios.defaults.withXSRFToken = false;
window.axios.defaults.headers.withXSRFToken['XSRF-TOKEN'] = 'XSRF-TOKEN';
window.axios.defaults.headers.common['XSRF-TOKEN'] = 'XSRF-TOKEN';
