import axios from 'axios';
import { defineStore } from 'pinia';

export const reviewStore = defineStore('reviewStore', {
    actions: {
        async storeNewReview(data){
            await axios.post('/api/review', data)
        },
        async updateCurrentReview(id, reviewById){
            await axios.patch(`/api/review/${id}/update`, reviewById)
        },
        async destroyByIdReview(id) {
            await axios.delete(`/api/review/${id}/destroy`);
        },
    },
});