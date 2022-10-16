<template>
  <div class="row g-0 bottom-border pt-2 pb-2">
    <div class="col-1"></div>
    <div class="col-10">
      <div class="row g-0">
        <div class="col-sm-6 col-md-2 pt-3">
          <p class="text-dark fw-bold top-header-font-1">
            <i class="fa-solid fa-phone"></i> + 9(999)999-99-09
          </p>
        </div>
        <div class="col-sm-6 col-md-2 offset-md-3 pt-3">
          <p class="text-dark fw-bold top-header-font-1">
            Free delivery from 250$
          </p>
        </div>
        <div class="col-sm-6 offset-md-3 col-md-2 pt-3">
          <router-link 
            :to="{ name: 'account' }" 
            class="text-dark top-header-font-1 ps-2"
            >Account
          </router-link>
          <a href="" class="text-dark top-header-font-1 ps-2">Contact</a>
          <a href="" class="text-dark top-header-font-1 ps-2"> Help </a>
        </div>
      </div>
    </div>
    <div class="col-1"></div>
  </div>
  <div class="row g-0 bottom-border">
    <div class="col-1 menu-height"></div>
    <div class="col-10 menu-height">
      <nav class="navbar navbar-expand-lg bg-light menu-height">
        <div class="container-fluid">
          <router-link :to="{ name: 'home' }" class="navbar-brand">
            <img
              src="../../../public/img/logo.png"
              alt="new balance logo"
              class="logo"
            />
          </router-link>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
              <li
                class="nav-item pe-1 ps-1 d-flex flex-row"
                @click="headerNavigation(1)"
              >
                <div>
                  <a class="nav-link text-dark top-header-font-2" href="#"
                    >Men</a
                  >
                </div>
                <div>
                  <img
                    src="../../../public/img/man_sneakers.png"
                    class="link_img"
                    @click="headerNavigation(1)"
                  />
                </div>
              </li>

              <li
                class="nav-item pe-1 ps-1 d-flex flex-row"
                @click="headerNavigation(2)"
              >
                <div>
                  <a class="nav-link text-dark top-header-font-2" href="#"
                    >Women</a
                  >
                </div>
                <div>
                  <img
                    src="../../../public/img/women_sneakers.png"
                    class="link_img"
                    @click="headerNavigation(1)"
                  />
                </div>
              </li>

              <li
                class="nav-item pe-1 ps-1 d-flex flex-row"
                @click="headerNavigation(3)"
              >
                <div>
                  <a class="nav-link text-dark top-header-font-2" href="#"
                    >Kids
                  </a>
                </div>
                <div>
                  <img
                    src="../../../public/img/kid_sneakers.png"
                    class="link_img1"
                    @click="headerNavigation(1)"
                  />
                </div>
              </li>
            </ul>
            <form
              class="justify-content-center mt-2 pe-5"
              role="search"
              @submit.prevent="searchShoes"
            >
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control rounded-0 form-size"
                  placeholder="Shoes Name..."
                  aria-label="Shoes Name..."
                  aria-describedby="basic-addon1"
                  v-model="form.search"
                  required
                />
                <span
                  class="input-group-text rounded-0"
                  id="basic-addon1"
                  type="submit"
                >
                  <i class="fa-solid fa-magnifying-glass"></i
                ></span>
              </div>
            </form>
            <div v-if="userName" class="flex-row d-flex">


              <div class="mt-2">
               <h6 class="pt-1 fw-bold">Welcome {{userName}}</h6>
              </div>


              <div class="ps-2 mt-2"><span>|</span></div>
              <div>
                <button
                  type="button"
                  class="btn btn-light text-decoration-underline rounded-0"
                  @click="userLogout"
                >
                  Logout
                </button>
              </div>
            </div>
            <div v-else class="flex-row d-flex">
              <div>
                <router-link
                  :to="{ name: 'login' }"
                  class="pe-2 fw-bold text-dark"
                  >Log in</router-link
                >
              </div>
              <div><span>|</span></div>
              <div>
                <router-link
                  :to="{ name: 'register' }"
                  class="pe-5 ps-2 fw-bold text-dark"
                  >Join</router-link
                >
              </div>
            </div>

            <router-link
              :to="{ name: 'cart' }"
              class="pe-1 fw-bold text-dark text-start pt-1 d-flex flex-row text-decoration-none"
            >
              <div class="total-count text-decoration-none" v-if="getCartCount"><span class="text-count">{{ getCartCount }}</span></div>
              <div class="total-count text-decoration-none"  v-else><span class="text-count">0</span> </div>
              <img
                src="../../../public/img/shop_bag.png"
                class="link_img ms-2"
              />
            </router-link>
           <router-link
              :to="{ name: 'account' }"
              class="pe-5 fw-bold text-dark text-start pt-1 d-flex flex-row text-decoration-none"
            >
            <div class="total-count text-decoration-none" v-if="getFavouriteCount"><span class="text-count">{{ getFavouriteCount }}</span></div>
            <div class="total-count text-decoration-none" v-else><span class="text-count">0</span>  </div>
              <img
                src="../../../public/img/wishlist.png"
                class="link_img ms-2"
              />
            </router-link>
          </div>
        </div>
      </nav>
    </div>
    <div class="col-1 menu-height"></div>
  </div>
</template>

<script>
import { authStore } from "../store/authStore";
import { shopStore } from "../store/shopStore";
import { onMounted, reactive } from "vue";
import { storeToRefs } from "pinia";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";
import { cartStore } from "../store/cartStore";
import { favouriteStore } from "../store/favouriteStore";

export default {
  setup() {
    const router = useRouter();
    const route = useRoute();
    const store = authStore();

    const cartStoreData = cartStore();
    const favouriteStoreData = favouriteStore();

    const { userName } = storeToRefs(store);
    const { getCartCount } = storeToRefs(cartStoreData);

    const { getFavouriteCount } = storeToRefs(favouriteStoreData);


    const { getUserData, logout } = authStore();
    const { fetchShoesData } = shopStore();
    const { fetchGetCartCount} = cartStore();
    const { fetchGetFavouriteCount} = favouriteStore();

    const form = reactive({
      search: "",
    });

    const userLogout = async () => {
      await logout();
      await getUserData();
      await router.push({ name: "home" });
    };
    async function headerNavigation(genderId) {
      router.push({ path: "/shop", query: { gender: genderId } });

      let queryDefaultPage = "page" + "=" + "1";
      let queryFilterParam = "gender" + "=" + genderId;
      let urlParam = queryDefaultPage + "&" + queryFilterParam;

      fetchShoesData(urlParam);
    }

    async function searchShoes() {
      router.push({ path: "/shop", query: { title: form.search } });

      let queryDefaultPage = "page" + "=" + "1";
      let querySearchParam = "title" + "=" + form.search;
      let urlParam = queryDefaultPage + "&" + querySearchParam;

      fetchShoesData(urlParam);
    }

    onMounted(() => {
      getUserData(), fetchGetCartCount(),fetchGetFavouriteCount()
    });

    return {
      userName,
      userLogout,
      headerNavigation,
      form,
      searchShoes,
      getCartCount,
      getFavouriteCount,
      
    };
  },
};
</script>

<style scoped>
.bottom-border {
  border-bottom: 1px solid #e3e1e1;
}

.logo {
  height: 80px;
  width: 100%;
}

.form-control-width {
  width: 250px;
}
.form-control-search {
  border-radius: 0px;
  background-color: #e9ecef;
  border: 1px solid #d1d4d6;
}

.input-group-text {
  background-color: #e9ecef;
  border: 1px solid #d1d4d6;
  cursor: pointer;
}

.fa-bag-shopping,
.fa-user {
  font-size: 30px;
  color: #000;
}
.fa-magnifying-glass {
  position: relative;
  left: -30px;
  top: 10px;
}
.user_name {
  width: 50px;
}

@media (min-width: 76px) and (max-width: 400px) {
  .fa-magnifying-glass {
    display: none;
  }
}

.top-header-font-1 {
  font-size: 16px;
}

.top-header-font-2 {
  font-size: 18px !important;
}

.link_img {
  height: 40px;
  cursor: pointer;
}

.link_img1 {
  margin-top: 3px;
  height: 35px;
  cursor: pointer;
}

.fa-magnifying-glass {
  position: relative;
  position: relative;
  top: -1px;
  left: 1px;
}

.form-size {
  height: 50px;
}

.btn-light{
  margin-top: 2px;
}
.total-count{
  position: relative;
  background-color: #d7d1f1;
  height: 20px;
  width: 20px;
  left: 20px;
  border-radius: 100%;
  text-decoration: none !important;
}
.text-count{
  text-decoration: none !important;
  position: relative;
  left: 6px;
}
</style>

