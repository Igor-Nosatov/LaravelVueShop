import axios from 'axios';
import { defineStore } from 'pinia';

export const checkoutStore = defineStore('checkoutStore', {
    state: () => {
        return {
            allCheckoutData:[],
        };
    },
    actions: {
        async fetchAllCheckoutData() {
            this.allCheckoutData = await axios
                .get('/api/checkout')
                .then((response) => response.data.data);
        },
        async storeCheckoutData(data){
            await axios.post('/api/checkout', data)
        },
        async destroyCheckoutData(id) {
            await axios.delete(`/api/checkout/${id}/destroy`);
        },
    },
});