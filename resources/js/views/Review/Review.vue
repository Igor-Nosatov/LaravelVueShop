<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-md-8 p-1">
      <form @submit.prevent="saveNewReview(shoesReviewById.id)">
        <div class="row g-0">
          <div class="d-flex flex-row justify-content-start">
            <img :src="shoesReviewById.image" class="img-review no-border" />
            <div class="pt-4 ps-2">
              <h5 class="card-title fw-bold text-start">Write a Review</h5>
              <p class="card-text text-start">{{ shoesReviewById.title }}</p>
            </div>
          </div>
        </div>
        <div class="row g-0">
          <div class="col-md-12 g-0 d-flex flex-column">
            <div class="row g-0">
              <div class="col-12 col-md-6  p-1">
                <p class="text-start">
                  <small class="text-start">
                    <span class="required-mark text-start">*</span>Required
                    question</small
                  >
                </p>
                <div class="mb-3 text-start pt-2">
                  <label for="inputHeadline" class="form-label text-start">
                    Review Headline
                    <span class="required-mark">*</span></label
                  >
                  <input
                    type="text"
                    class="no-border form-control"
                    id="inputHeadline"
                    v-model="form.review_headline"
                  />
                </div>
                <div class="mb-3 text-start pt-3">
                  <label for="starRating" class="form-label text-start">
                    Choose you rating<span class="required-mark">*</span></label
                  >
                  <input
                    type="number"
                    min="1"
                    max="5"
                    class="form-control no-border"
                    id="starRating"
                    v-model="form.rating"
                    required
                  />
                </div>
                <div class="mb-3 text-start pt-3">
                  <label for="inputNickname" class="form-label text-start">
                    Nickname <span class="required-mark">*</span></label
                  >
                  <input
                    type="text"
                    class="no-border form-control"
                    id="inputNickname"
                    v-model="form.nickname"
                  />
                </div>
                <div class="mb-3 form-check text-start border-bottom pt-2">
                  <input
                    type="checkbox"
                    class="form-check-input no-border"
                    id="iheck1"
                    v-model="form.policy_agree"
                  />
                  <label class="form-check-label text-start" for="iheck1"
                    >I agree with the terms and privacy policy</label
                  >
                </div>
              </div>
              <div class="col-12 col-md-6 p-1">
                <div class="mb-3 text-start pt-5">
                  <label for="inputLocation" class="form-label text-start">
                    Location <span class="required-mark">*</span></label
                  >
                  <input
                    type="text"
                    class="no-border form-control"
                    id="inputLocation"
                    v-model="form.location"
                  />
                </div>
                <div class="mb-3 text-start pt-3">
                  <label for="inputEmail1" class="form-label text-start">
                    Email address <span class="required-mark">*</span></label
                  >
                  <input
                    type="email"
                    class="no-border form-control"
                    id="inputEmail1"
                    v-model="form.email"
                  />
                </div>
                <div class="form-floating pt-3">
                  <h6 class="text-start pt-1">
                    Comments <span class="required-mark">*</span>
                  </h6>
                  <textarea
                    class="no-border form-control"
                    placeholder="How you use the product. Things that are great about it. Things that aren't great about it."
                    id="floatingTextarea2"
                    style="height: 100px"
                    v-model="form.comment"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <p class="text-start">
          <small
            >By submitting a review, I agree to the New Balance Privacy Policy
            and Terms and Conditions and acknowledge that all submitted
            information, aside from email address, will be included in my review
            on newbalance.com and may display with product reviews on select
            third party retailers.</small
          >
        </p>
        <button type="submit" class="btn btn-danger btn-lg no-border">
          Submit review
        </button>
      </form>
    </div>
    <div class="col-md-2"></div>
  </div>
</template>


<script>
import { onMounted, reactive } from "vue";
import { storeToRefs } from "pinia";
import { reviewStore } from "../../store/reviewStore";
import { useRoute } from "vue-router";

export default {
  setup() {
    const route = useRoute();

    const reviewStoreRef = reviewStore();
    const { shoesReviewById } = storeToRefs(reviewStoreRef);
    const { getShoesReviewById, storeNewReview } = reviewStore();

    const form = reactive({
      review_headline: "",
      nickname: "",
      comment: "",
      rating: "",
      location: "",
      email: "",
      policy_agree: "",
    });

    async function saveNewReview(shoesId) {
      let user_id = JSON.parse(localStorage.getItem("userId"));
      let shoes_id = shoesId;
      await storeNewReview({ ...form, shoes_id, user_id });
    }

    onMounted(() => {
      getShoesReviewById(shoesReviewById);
    });

    return {
      form,
      shoesReviewById,
      saveNewReview,
    };
  },
};
</script>

<style scoped>
.img-review {
  height: 100px;
}
.border-bottom {
  border-bottom: 1px solid #e4e4e4;
  padding-bottom: 10px;
}
.required-mark {
  color: red;
}
.btn-danger {
  width: 200px;
}
.no-border {
  border-radius: 0px;
}
.btn-category {
  width: 100%;
  border-radius: 0px;
  font-weight: bold;
  padding: 10px 20px;
  color: #fff;
  background-color: #000;
  border: 1px solid #000;
}
</style>


