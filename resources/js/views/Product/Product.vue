<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="row g-0">
        <div class="col-12 col-sm-12  col-md-7 p-2 d-none d-sm-none  d-md-block d-lg-block d-xl-block">
          <div class="d-flex flex-row flex-wrap" id="top-page">
            <img
              v-for="item in shoesById.images"
              :key="item.index"
              :src="item.image_url"
              alt="item.title"
              class="p-1 product-image"
            />
          </div>
          <div class="d-flex flex-row justify-content-start">
            <ul class="list-group list-group-flush pt-3">
              <li class="list-group-item fw-bold text-start">Features:</li>
              <li
                class="list-group-item text-start"
                v-for="item in shoesById.features"
                :key="item.id"
              >
                {{ item.name }}
              </li>
            </ul>
          </div>
        </div>



        <div class="col-12 col-sm-12 col-md-5 p-2">
          <div class="product-card d-flex flex-column">
            <p class="text-start product-category">
              Category: {{ shoesById.category }}
            </p>
            <h2 class="text-start product-title fw-bold">
              {{ shoesById.title }}
            </h2>
            <h4 class="text-start product-title fw-bold">
              ${{ shoesById.price }}
            </h4>
            <p class="text-start product-title fw-bold">
              Color:{{ shoesById.color }}
            </p>
            <a href="" class="text-start product-title fw-bold">
              <img
                src="../../../../public/img/product1.webp"
                alt=""
                width="150px"
                class="p-2"
            />
          </a>
          <p class="text-start fw-bold">Select Shoes Size</p>
          <div class="d-flex flex-row">
            <div  v-for="item in shoesById.sizes"
            :key="item.id">
              <input type="radio" :id="item.id" :value="item.id" v-model="cartForm.size_id"  class="form-check-input mt-2"/>
              <label :for="item.id"  class="form-check-label p-1"> {{ item.name }} cm</label>
            </div>
          </div>


            <p class="text-start fw-bold">Select width</p>
            <div class="d-flex flex-row">
              <div   v-for="item in shoesById.width"
              :key="item.id">
                <input type="radio" :id="item.id" :value="item.id" v-model="cartForm.width_id"   class="form-check-input mt-2"/>
                <label :for="item.id"   class="form-check-label p-1"> {{ item.name }}</label>
              </div>
            </div>

            <button
              class="btn btn-danger btn-lg btn-signup m-2 rounded-0"
              @click="addItemToCart(shoesById.id)"
            >
              Add to cart
            </button>
            <p class="text-start">
              <i class="fa-solid fa-message"></i>
              <a href="" class="text-dark"> Need help?</a>
            </p>
            <p class="text-start wishlist">
              <i class="fa-solid fa-heart"></i>
              <a class="text-dark"  @click="addToWishList(shoesById.id)"> Add to wish list</a>
            </p>
            <p class="text-start product-text">
              {{ shoesById.description }}
            </p>
          </div>
        </div>
        <div class="col-12 col-sm-12  col-md-7 p-2 d-block d-sm-none d-md-none d-lg-none">
          <div class="d-flex flex-row flex-wrap" id="top-page">
            <img
              v-for="item in shoesById.images"
              :key="item.index"
              :src="item.image_url"
              alt="item.title"
              class="p-1 product-image"
            />
          </div>
          <div class="d-flex flex-row justify-content-start">
            <ul class="list-group list-group-flush pt-3">
              <li class="list-group-item fw-bold text-start">Features:</li>
              <li
                class="list-group-item text-start"
                v-for="item in shoesById.features"
                :key="item.id"
              >
                {{ item.name }}
              </li>
            </ul>
          </div>
        </div>


        <div class="col-md-12 pb-4 pt-4 d-none d-sm-block d-md-none d-lg-block d-xl-none">
          <h3 class="text-start text-dark">You May Also Like</h3>
          <div
            id="carouselExampleControls"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row g-0">
                  <div
                    class="col-md-3 p-1"
                    v-for="item in menShoesData"
                    :key="item.index"
                  >
                    <div class="card" style="width: 100%">
                      <img :src="item.image_url" class="card-img-top" />
                      <div class="card-body">
                        <p class="card-text">
                          <span class="product-title text-start">
                            {{ item.title }}
                          </span>
                          <span class="product-price text-end"
                            >$ {{ item.price }}</span
                          >
                        </p>
                        <small class="product-category">{{
                          item.gender
                        }}</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row g-0">
                  <div
                    class="col-md-3 p-1"
                    v-for="item in menShoesData"
                    :key="item.index"
                  >
                    <div class="card" style="width: 100%">
                      <img :src="item.image_url" class="card-img-top" />
                      <div class="card-body">
                        <p class="card-text">
                          <span class="product-title text-start">
                            {{ item.title }}
                          </span>
                          <span class="product-price text-end"
                            >$ {{ item.price }}</span
                          >
                        </p>
                        <small class="product-category">{{
                          item.gender
                        }}</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleControls"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleControls"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-md-12 pb-4 pt-4 ps-2">
          <h3 class="text-start fw-bold">Customer Reviews</h3>
        
          <div class="d-flex flex-row justify-content-start">
            <router-link
                :to="{ name: 'review', params:shoesById.id }"
                class="btn btn-outline-secondary  rounded-0">
                Add your review
            </router-link>
          </div>
        </div>
        <div class="col-md-12 count-block-reviews">
          <p class="text-start fw-bold pt-3 ps-3">Reviewed by {{ shoesById.reviewCount }} customers</p>
        </div>
        <div class="col-md-12">
          <div
            class="row g-0 border-bottom border-dark pt-5 pb-5"
            v-for="itemReview in shoesById.reviews"
            :key="itemReview.index"
          >
            <div class="col-md-9 p-1">
              <div class="d-flex flex-c justify-content-start">
                <div >
                  <i class="fa-solid fa-star" v-for="n in  itemReview.rating" :key="n"></i>
                </div>
              </div>
              <p class="text-start">Headline: {{ itemReview.review_headline }}</p>
              <p class="text-desc">
               Nickname: {{ itemReview.nickname }}
              </p>
              <p  class="text-desc">
                Comment: {{ itemReview.comment }}
              </p>
            </div>
            <div class="col-md-3 p-1">
              <p class="text-start">
                <span class="fw-bold"> Submitted: </span>  {{ itemReview.created_at }}
              </p>
              <p class="text-start"><span class="fw-bold">From: {{ itemReview.email }} </span> </p>
              <p class="text-desc">
               Location: {{ itemReview.location }}
               </p>
              <p  class="text-start">
                <button type="button" 
                class="btn btn-outline-danger m-2  rounded-0"  
                @click="deleteMessage(itemReview.id, shoesById.id)">
                Delete
              </button>
             
              <router-link
                :to="{ 
                  name: 'reviewUpdate', 
                  params:{ review:itemReview.id }}"
                type="button" class="btn btn-outline-dark  m-2  rounded-0">
                Edit
              </router-link>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-12 p-1 text-start pt-3">
          <a href="#top-page" class="text-dark text-start fw-bold">Back to top</a>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</template>


<script>
import { onMounted, reactive } from "vue";
import { storeToRefs } from "pinia";
import { shopStore } from "../../store/shopStore";
import { cartStore } from "../../store/cartStore";
import { homeStore } from "../../store/homeStore";
import { reviewStore } from "../../store/reviewStore";
import { favouriteStore } from "../../store/favouriteStore";
import { useRoute } from "vue-router"; 
import { useRouter } from "vue-router";

export default {
  setup() {
    const route = useRoute();
    const router = useRouter();

    const storeRef = shopStore();
    const { shoesById } = storeToRefs(storeRef);
    const { getShoesById } = shopStore();

    const homeStoreData = homeStore();
    const { menShoesData } = storeToRefs(homeStoreData);

    const { storeToCart } = cartStore();

    const { destroyByIdReview } = reviewStore();
    const { storeNewFavourite } = favouriteStore();
    const cartForm = reactive({
      width_id: "",
      size_id: "",
    });

    async function addItemToCart(shoesId) {
      if (JSON.parse(localStorage.getItem("userId"))) {
        let user_id = JSON.parse(localStorage.getItem("userId"));
        let shoes_id = shoesId;
        let shipped_days = "3";
        await storeToCart({ ...cartForm ,shoes_id, user_id, shipped_days });
        await router.push({ name: "cart" });
      } else {
        await router.push({ name: "login" });
      }
    }

    async function deleteMessage (id){
      await destroyByIdReview(id);
      await getShoesById(route.params.id)
    };

    async function addToWishList(shoesId)
    {
      if (JSON.parse(localStorage.getItem("userId"))) {
        let user_id = JSON.parse(localStorage.getItem("userId"));
        let shoes_id = shoesId;
        await storeNewFavourite({ shoes_id, user_id });
        await router.push({ name: "account" });
      } else {
        await router.push({ name: "login" });
      }
    }

    const { fetchMenShoesData } = homeStore();

    onMounted(() => {
      getShoesById(route.params.id), fetchMenShoesData();
    });

    return {
      shoesById,
      addItemToCart,
      menShoesData,
      cartForm,
      deleteMessage,
      addToWishList
    };
  },
};
</script>

<style scoped>
.product-image {
  width: 200px;
}
.product-text {
  font-size: 13px;
}

.btn-signup {
  border-radius: 0px !important;
  height: 60px;
  width: 80%;
  float: left;
}
.btn-dark {
  width: 200px;
  border-radius: 0px !important;
}
.count-block-reviews {
  background-color: #f6f6f6;
  height: 60px;
}
.text-desc {
  font-size: 12px;
  text-align: start;
}

.border-none {
  border-radius: 0px !important;
}
.wishlist{
cursor: pointer;
}
</style>