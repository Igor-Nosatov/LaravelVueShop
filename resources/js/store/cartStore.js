import axios from 'axios';
import { defineStore } from 'pinia';

export const cartStore = defineStore('cartStore',{
    state: () => {
        return {
            getCartData:[],
            getCartCount:null,
        };
    },
    actions: {
        async fetchGetCartData() {
            this.getCartData = await axios
                .get('/api/cart')
                .then((response) => response.data.data);
        },
        async storeToCart(data){
            console.log(data);
            await axios.post('/api/cart', data)
        },

        async destroyByIdItemFromCart(id) {
            await axios.post(`/api/cart/${id}/destroy`);
        },

        async fetchGetCartCount() {
            this.getCartCount = await axios
                .get('/api/cart/data-count')
                .then((response) => response.data.data.total); 
        },
    },
});