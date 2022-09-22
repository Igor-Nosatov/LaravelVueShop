import axios from 'axios';
import { defineStore } from 'pinia';

export const cartStore = defineStore('cartStore',{
    state: () => {
        return {
            getCartData:[],
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
    },
});