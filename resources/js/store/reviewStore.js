import axios from 'axios';
import { defineStore } from 'pinia';

export const reviewStore = defineStore('reviewStore', {
    state: () => {
        return {
          shoesReviewById: {},
        };
      },
    actions: {
        async storeNewReview(data){
            await axios.post('/api/review', data)
        },
        async updateCurrentReview(id, reviewById){
            await axios.patch(`/api/review/${id}/update`, reviewById)
        },
        async destroyByIdReview(id) {
            await axios.post(`/api/review/${id}/destroy`);
        },
        async getShoesReviewById() {
            this.shoesReviewById = await axios
              .get(`/api/review/1`)
              .then((response) => response.data.data);
          },
    },
});