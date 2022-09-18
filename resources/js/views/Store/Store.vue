<template>
  <div class="row g-0 pt-5 pb-5">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="row g-0">
        <div class="col-md-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Men</a></li>
              <li class="breadcrumb-item"><a href="#">Shoes</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Lifestyle
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row g-0">
        <div class="col-md-3 p-2">
          <div class="category1 pt-2">
            <div
              class="d-flex justify-content-between category-border-bottom pb-2"
            >
              <div class="text-start">
                <a
                  data-bs-toggle="collapse"
                  href="#Category"
                  role="button"
                  aria-expanded="false"
                  aria-controls="Category"
                  class="collapse-menu"
                >
                  Category
                </a>
              </div>
              <div class="text-end">
                <a
                  data-bs-toggle="collapse"
                  href="#Category"
                  role="button"
                  aria-expanded="false"
                  aria-controls="Category"
                  class="collapse-menu"
                >
                  <i class="fa-solid fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="collapse" id="Category">
              <div class="card card-body">
                <ul class="nav flex-column text-start">
                  <li
                    class="nav-item"
                    v-for="item in optionsData.categories"
                    :key="item.index"
                  >
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="category"
                      />
                      <label class="form-check-label" for="category">{{
                        item.name
                      }}</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="category1 pt-2">
            <div
              class="d-flex justify-content-between category-border-bottom pb-2"
            >
              <div class="text-start">
                <a
                  data-bs-toggle="collapse"
                  href="#SupportTypes"
                  role="button"
                  aria-expanded="false"
                  aria-controls="SupportTypes"
                  class="collapse-menu"
                >
                  Support Types
                </a>
              </div>
              <div class="text-end">
                <a
                  data-bs-toggle="collapse"
                  href="#SupportTypes"
                  role="button"
                  aria-expanded="false"
                  aria-controls="SupportTypes"
                  class="collapse-menu"
                >
                  <i class="fa-solid fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="collapse" id="SupportTypes">
              <div class="card card-body">
                <ul class="nav flex-column text-start">
                  <li
                    class="nav-item"
                    v-for="item in optionsData.support_types"
                    :key="item.index"
                  >
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="supportTypes"
                      />
                      <label class="form-check-label" for="supportTypes">{{
                        item.name
                      }}</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="category1 pt-2">
            <div
              class="d-flex justify-content-between category-border-bottom pb-2"
            >
              <div class="text-start">
                <a
                  data-bs-toggle="collapse"
                  href="#width"
                  role="button"
                  aria-expanded="false"
                  aria-controls="width"
                  class="collapse-menu"
                >
                  Width
                </a>
              </div>
              <div class="text-end">
                <a
                  data-bs-toggle="collapse"
                  href="#width"
                  role="button"
                  aria-expanded="false"
                  aria-controls="width"
                  class="collapse-menu"
                >
                  <i class="fa-solid fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="collapse" id="width">
              <div class="card card-body">
                <ul class="nav flex-column text-start">
                  <li
                    class="nav-item"
                    v-for="item in optionsData.width"
                    :key="item.index"
                  >
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="width"
                      />
                      <label class="form-check-label" for="width">{{
                        item.name
                      }}</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="category1 pt-2">
            <div
              class="d-flex justify-content-between category-border-bottom pb-2"
            >
              <div class="text-start">
                <a
                  data-bs-toggle="collapse"
                  href="#models"
                  role="button"
                  aria-expanded="false"
                  aria-controls="models"
                  class="collapse-menu"
                >
                  Models
                </a>
              </div>
              <div class="text-end">
                <a
                  data-bs-toggle="collapse"
                  href="#models"
                  role="button"
                  aria-expanded="false"
                  aria-controls="models"
                  class="collapse-menu"
                >
                  <i class="fa-solid fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="collapse" id="models">
              <div class="card card-body">
                <ul class="nav flex-column text-start">
                  <li
                    class="nav-item"
                    v-for="item in optionsData.models"
                    :key="item.index"
                  >
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="models"
                      />
                      <label class="form-check-label" for="models"
                        >#{{ item.name }}</label
                      >
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="category2 pt-2">
            <div
              class="d-flex justify-content-between category-border-bottom pb-2"
            >
              <div class="text-start">
                <a
                  data-bs-toggle="collapse"
                  href="#size"
                  role="button"
                  aria-expanded="false"
                  aria-controls="size"
                  class="collapse-menu"
                >
                  Size
                </a>
              </div>
              <div class="text-end">
                <a
                  data-bs-toggle="collapse"
                  href="#size"
                  role="button"
                  aria-expanded="false"
                  aria-controls="size"
                  class="collapse-menu"
                >
                  <i class="fa-solid fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="collapse" id="size">
              <div class="card card-body flex-row flex-wrap">
                <div
                  class="check-btn p-1"
                  v-for="item in optionsData.foot_wear_sizes"
                  :key="item.index"
                >
                  <input
                    type="checkbox"
                    class="btn-check"
                    id="btn-check-2"
                    name="1"
                    value="2"
                  />
                  <label
                    class="btn btn-primary btn-category"
                    for="btn-check-2"
                    >{{ item.name }}</label
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="category3 pt-2">
            <div
              class="d-flex justify-content-between category-border-bottom pb-2"
            >
              <div class="text-start">
                <a
                  data-bs-toggle="collapse"
                  href="#color"
                  role="button"
                  aria-expanded="false"
                  aria-controls="color"
                  class="collapse-menu"
                >
                  Color
                </a>
              </div>
              <div class="text-end">
                <a
                  data-bs-toggle="collapse"
                  href="#color"
                  role="button"
                  aria-expanded="false"
                  aria-controls="color"
                  class="collapse-menu"
                >
                  <i class="fa-solid fa-plus"></i>
                </a>
              </div>
            </div>
            <div class="collapse" id="color">
              <div class="card card-body flex-row flex-wrap">
                <div
                  class="col-4"
                  v-for="item in optionsData.colors"
                  :key="item.index"
                >
                  <div class="check-btn p-1">
                    <input
                      type="checkbox"
                      class="checkbox-round"
                      :style="{ 'background-color': item.name }"
                    />
                    {{ item.name }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 pt-2 pb-2">
          <div class="row g-0">
            <div
              class="col-md-4 p-1"
              v-for="item in shoesData"
              :key="item.index"
            >
              <div class="card" style="width: 100%">
                <a
                  href=""
                  class="relative-icon"
                  @click="favouriteItems(item.id)"
                >
                  <i class="fa-solid fa-heart fa-2x"></i>
                </a>
                <img
                  :src="item.image_url"
                  class="card-img-top img-fluid no-border"
                  :alt="item.title"
                />

                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h5 class="card-title Category-start fw-bold">
                      <router-link
                        :to="{ name: 'product', params: { id: item.id }}"
                        class="Category-dark fw-bold"
                      >
                        {{ item.title }}
                      </router-link>
                    </h5>
                    <p class="card-title Category-start fw-bold">
                      ${{ item.price }}
                    </p>
                  </div>

                  <p class="text-start">Category: {{ item.category.name }}</p>
                  <div class="d-flex flex-row justify-content-start">
                    <i
                      class="fa-solid fa-star star-yellow"
                      v-for="n in item.average_rating"
                      :key="n"
                    ></i>
                    <i
                      class="fa-solid fa-star"
                      v-for="n in item.count_empty_star"
                      :key="n"
                    ></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-0 pt-5 pb-5">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-1">
              <div class="d-flex flex-column justify-content-center">
                <p>You have viewed 24 of 499 items</p>
                <button class="btn btn-danger btn-lg no-border fw-bold">
                  Load 24 more
                </button>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</template>


<script>
import { onMounted } from "vue";
import { storeToRefs } from "pinia";
import { shopStore } from "../../store/shopStore";
import { favouriteStore } from "../../store/favouriteStore";
import { useRouter } from "vue-router";

export default {
  setup() {
    const store = shopStore();
    const router = useRouter();

    const { shoesData, optionsData } = storeToRefs(store);
    const { fetchShoesData, fetchOptionsData } = shopStore();
    
    const { storeNewFavourite } = favouriteStore();

    async function favouriteItems(shoesId) {
      if (JSON.parse(localStorage.getItem("userId"))) {
        let user_id = JSON.parse(localStorage.getItem("userId"));
        let shoes_id = shoesId;
        await storeNewFavourite({ shoes_id, user_id });
      } else {
        await router.push({ name: "login" });
      }
    }

    onMounted(() => {
      fetchShoesData(), fetchOptionsData();
    });

    return {
      shoesData,
      optionsData,
      favouriteItems,
    };
  },
};
</script>

<style scoped>
.card {
  border: none !important;
  border-radius: 0px !important;
}
.card-title {
  font-size: 14px;
}
.category-title {
  font-size: 12px;
}

.relative-icon {
  position: relative;
  top: 55px;
  left: 100px;
  color: #9b3b3b;
}
.fa-heart:hover {
  color: #9b3b3b;
}
.fa-heart:hover {
  color: #e93939;
}

.collapse-menu {
  width: 100%;
  text-decoration: none !important;
  color: #171717;
  padding-bottom: 20px;
}
.category-border-bottom {
  border-bottom: 1px solid rgb(214, 208, 208);
}

.btn-category {
  width: 48px !important;
  padding: 10px 0px;
}

.checkbox-round {
  width: 1.3em;
  height: 1.3em;
  border-radius: 50%;
  vertical-align: middle;
  border: 0.5px solid #777777;
  appearance: none;
  -webkit-appearance: none;
  outline: none;
  cursor: pointer;
}

.checkbox-round:checked {
  border: 1px solid #1d1c1c;
}

.no-border {
  border-radius: 0px;
}
.star-yellow {
  color: #f3f35a;
}
</style>