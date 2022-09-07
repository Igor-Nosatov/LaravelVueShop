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
            await axios.post('/api/cart', data)
        },
        async updateCart(id, cartById){
            await axios.patch(`/api/cart/${id}/update`, cartById)
        },
        async destroyByIdItemFromCart(id) {
            await axios.delete(`/api/cart/${id}/destroy`);
        },
    },
});