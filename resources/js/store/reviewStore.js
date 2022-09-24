import axios from 'axios';
import { defineStore } from 'pinia';

export const reviewStore = defineStore('reviewStore', {
    state: () => {
        return {
          shoesReviewById: {},
          reviewById: {},
        };
      },
    actions: {
        async storeNewReview(data){
            await axios.post('/api/review', data)
        },

        async updateCurrentReview(id, reviewById){
            const form = {
                review_headline: reviewById.value.review_headline,
                nickname: reviewById.value.nickname,
                comment: reviewById.value. comment,
                rating: reviewById.value.rating,
                location: reviewById.value.location,
                email: reviewById.value.email,
                policy_agree: reviewById.value.policy_agree,
              };
            await axios.post(`/api/review/${id}/update`, form)
        },

        async getReviewForUpdate(id){
            this.reviewById = await axios
            .get(`/api/review/${id}/show`)
            .then((response) => response.data.data);
        },

        async destroyByIdReview(id) {
            await axios.post(`/api/review/${id}/destroy`);
        },

        async getShoesReviewById(id) {
            this.shoesReviewById = await axios
              .get(`/api/review/${id}`)
              .then((response) => response.data.data);
          },
    },
});