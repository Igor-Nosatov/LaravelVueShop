import axios from 'axios';

const auth = {
    init: function() {
        const token = this.loggedIn();
        if (token) {
            axios.defaults.headers.common = { 'Authorization': `Bearer ${token}` };
        }
    },
    loggedIn: function() {
        if (!localStorage) return null;
        return localStorage.getItem('token');
    },

};

export default auth;