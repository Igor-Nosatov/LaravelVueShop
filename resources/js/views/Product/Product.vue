<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="row g-0">
        <div class="col-md-3 ps-2">
          <nav aria-label="breadcrum">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">{{ shoesById.gender }}</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Shoes</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                {{ shoesById.category }}
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-md-7 p-1">
          <div class="d-flex flex-row flex-wrap">
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
        <div class="col-md-5 p-1">
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
              class="btn btn-danger btn-lg btn-signup m-2"
              @click="addItemToCart(shoesById.id)"
            >
              Add to cart
            </button>
            <p class="text-start">
              <i class="fa-solid fa-message"></i>
              <a href="" class="text-dark"> Need help?</a>
            </p>
            <p class="text-start">
              <i class="fa-solid fa-heart"></i>
              <a href="" class="text-dark"> Add to wish list</a>
            </p>
            <p class="text-start product-text">
              {{ shoesById.description }}
            </p>
          </div>
        </div>

        <div class="col-md-12 pb-4 pt-4 d-none d-sm-none d-md-none d-lg-block">
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
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <p> {{ shoesById.reviewCount }} Reviews</p>
          </div>
          <div class="d-flex flex-row justify-content-start">
            <router-link
                :to="{ name: 'review', params:shoesById.id }"
                class="btn btn-outline-danger">
                Create now
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
              <div class="d-flex flex-row justify-content-start">

                <i class="fa-solid fa-star" v-for="n in  itemReview.rating" :key="n"></i>
             
                <p>{{ itemReview.review_headline }}</p>
              </div>
              <p class="text-desc">
                {{ itemReview.nickname }}
              </p>
              <p class="text-start fw-bold">
                Was this review helpful to you?
                <i class="fa-solid fa-thumbs-up"></i>
              </p>
            </div>
            <div class="col-md-3 p-1">
              <p class="text-start">
                <span class="fw-bold"> Submitted</span> 2 days ago
              </p>
              <p class="text-start">
                <span class="fw-bold">By </span> {{ itemReview.nickname }}
              </p>
              <p class="text-start"><span class="fw-bold">From {{ itemReview.email }} </span> </p>
            </div>
          </div>
        </div>
        <div class="col-md-12 p-1 text-start pt-3">
          <a href="" class="text-dark text-start fw-bold">Back to top</a>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
    {{ shoesById.id }}
  </div>
</template>


<script>
import { onMounted, reactive } from "vue";
import { storeToRefs } from "pinia";
import { shopStore } from "../../store/shopStore";
import { cartStore } from "../../store/cartStore";
import { homeStore } from "../../store/homeStore";
import { useRoute } from "vue-router";

export default {
  setup() {
    const route = useRoute();

    const storeRef = shopStore();
    const { shoesById } = storeToRefs(storeRef);
    const { getShoesById } = shopStore();

    const homeStoreData = homeStore();
    const { menShoesData } = storeToRefs(homeStoreData);

    const { storeToCart } = cartStore();

    const cartForm = reactive({
      width_id: "",
      size_id: "",
    });

    async function addItemToCart(shoesId) {
      if (JSON.parse(localStorage.getItem("userId"))) {
        let user_id = JSON.parse(localStorage.getItem("userId"));
        let shoes_id = shoesId;
        let shipped_days = "3";
        let quantity = parseInt("1");
        await storeToCart({ ...cartForm ,shoes_id, user_id, shipped_days, quantity });
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
      cartForm
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
</style>