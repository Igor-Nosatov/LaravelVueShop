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
                        name="category[]"
                        @click="selectFilters('category', item.name, item.id)"
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
                        @click="selectFilters('type', item.name, item.id)"
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
                        @click="selectFilters('width', item.name, item.id)"
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
                        id="sampler"
                        @click="selectFilters('sampler', item.name, item.id)"
                      />
                      <label class="form-check-label" for="sampler"
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
                <ul class="nav flex-column text-start">
                  <li
                    class="nav-item"
                    v-for="item in optionsData.foot_wear_sizes"
                    :key="item.index"
                  >
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="foot_wear_sizes"
                        @click="selectFilters('size', item.name, item.id)"
                      />
                      <label class="form-check-label" for="foot_wear_sizes"
                        >#{{ item.name }}</label
                      >
                    </div>
                  </li>
                </ul>
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
                <ul class="nav flex-column text-start">
                  <li
                    class="nav-item"
                    v-for="item in optionsData.colors"
                    :key="item.index"
                  >
                    <div class="mb-3 form-check">
                      <input
                        type="checkbox"
                        class="form-check-input"
                        id="colors"
                        @click="selectFilters('color', item.name, item.id)"
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
        </div>
        <div class="col-md-9 pt-2 pb-2">
          <div class="row g-0">
            <div class="col-12 col-md-8"></div>
            <div class="col-12 col-md-4">
              <span>Order by: </span>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="inlineRadioOptions"
                  id="inlineRadio1"
                  @click="selectFilters('price', 'asc')"
                />
                <label class="form-check-label" for="inlineRadio1"
                  >Low price</label
                >
              </div>
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="inlineRadioOptions"
                  id="inlineRadio2"
                  @click="selectFilters('price', 'desc')"
                />
                <label class="form-check-label" for="inlineRadio2"
                  >High price</label
                >
              </div>
            </div>
          </div>
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
                        :to="{ name: 'product', params: { id: item.id } }"
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
          <nav aria-label="Page navigation" class=" mt-5">
            <ul class="pagination  pagination-lg rounded-0 justify-content-center ">
              <li class="page-item rounded-0">
                <a class="page-link rounded-0" tabindex="-1" @click="onClickPreviousPage(metaData.current_page)">Previous</a>
              </li>
              <li class="page-item rounded-0"   
              @click="onClickPage(metaData.current_page)" 
             >
           <a class="page-link rounded-0">{{ metaData.current_page }}</a>
         </li>
              <div v-for="page in  metaData.total_pages" :key="page">
               
                <li class="page-item rounded-0"   
                     @click="onClickPage(page)" 
                     v-if="(metaData.current_page + 6) > page && (metaData.current_page) < page" >
                  <a class="page-link rounded-0">{{ page }}</a>
                </li>
              </div>
            
              <li class="page-item rounded-0">
                <a class="page-link rounded-0"  @click="onClickNextPage(metaData.current_page,metaData.total_pages)">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</template>


<script>
import { onMounted, computed} from "vue";
import { storeToRefs } from "pinia";
import { shopStore } from "../../store/shopStore";
import { favouriteStore } from "../../store/favouriteStore";
import { useRouter } from "vue-router";
import { useRoute } from "vue-router";

export default {
  setup() {
    const store = shopStore();
    const router = useRouter();
    const route = useRoute();
    let { shoesData, optionsData, metaData } = storeToRefs(store);
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
    const selected = {
      category: [],
      color: [],
      type: [],
      sampler: [],
      width: [],
      size: []
    };

    const selectedOrder = {
      order_by_name: [],
      order_flow: [],
    };

    const pagination = {
      page:[]
    }

    //generate params for api 
    async function urlParamGenerate()
    {
      let queryPageNumber = Object.entries(pagination)
        .map((s) => s[1].map((e) => `${s[0]}=${e.pageNumber}`))
        .flat()
        .join("&");

      let queryString = Object.entries(selected)
        .map((s) => s[1].map((e) => `${s[0] + "[]"}=${e.id}`))
        .flat()
        .join("&");

      let queryStringOrder = Object.entries(selectedOrder)
        .map((s) => s[1].map((e) => `${s[0]}=${e.id}`))
        .flat()
        .join("&");

      let fullUrlParams =
        (queryPageNumber ? queryPageNumber : 'page=1') +
        (queryStringOrder|| queryString? "&" : "") +
        (queryString ? queryString : "") +
        (queryStringOrder&& queryString? "&" : "") +
        (queryStringOrder ? queryStringOrder : "");
        console.log( fullUrlParams);
      fetchShoesData(fullUrlParams);
    }

    async function selectFilters(filter, name, id) {

       const checkFilterName = (obj) => obj.name === name;
       const checkFilterOrderBy = (obj) => obj.id === filter;

      if (filter === "price") {
        if (selectedOrder.order_by_name.some(checkFilterOrderBy) === true) {
          const findIndex1 = selectedOrder.order_by_name.findIndex(
            (a) => a.id === filter
          );
          selectedOrder.order_by_name.splice(findIndex1, 1);
          const findIndex2 = selectedOrder.order_flow.findIndex(
            (a) => a.id === name
          );
          selectedOrder.order_flow.splice(findIndex2, 1);
          selectedOrder.order_by_name.push({ id: filter });
          selectedOrder.order_flow.push({ id: name });
        } else {
          selectedOrder.order_by_name.push({ id: filter });
          selectedOrder.order_flow.push({ id: name });
        }
      }

      if (filter === "category") {
        if (selected.category.some(checkFilterName) === true) {
          const findIndex = selected.category.findIndex((a) => a.id === id);
          selected.category.splice(findIndex, 1);
        } else {
          selected.category.push({ id: id, name: name });
        }
      }

      if (filter === "color") {
        if (selected.color.some(checkFilterName) === true) {
          const findIndex = selected.color.findIndex((a) => a.id === id);
          selected.color.splice(findIndex, 1);
        } else {
          selected.color.push({ id: id, name: name });
        }
      }

      if (filter === "type") {
        if (selected.type.some(checkFilterName) === true) {
          const findIndex = selected.type.findIndex(
            (a) => a.id === id
          );
          selected.type.splice(findIndex, 1);
        } else {
          selected.type.push({ id: id, name: name });
        }
      }

      if (filter === "sampler") {
        if (selected.sampler.some(checkFilterName) === true) {
          const findIndex = selected.sampler.findIndex((a) => a.id === id);
          selected.sampler.splice(findIndex, 1);
        } else {
          selected.sampler.push({ id: id, name: name });
        }
      }

      if (filter === "width") {
        if (selected.width.some(checkFilterName) === true) {
          const findIndex = selected.width.findIndex((a) => a.id === id);
          selected.width.splice(findIndex, 1);
        } else {
          selected.width.push({ id: id, name: name });
        }
      }

      if (filter === "size") {
        if (selected.size.some(checkFilterName) === true) {
          const findIndex = selected.size.findIndex(
            (a) => a.id === id
          );
          selected.size.splice(findIndex, 1);
        } else {
          selected.size.push({ id: id, name: name });
        }
      }

      this.urlParamGenerate();
    }

    async function onClickPage(pageNumber) {
      if(pagination.page.length !== 0){
        pagination.page.splice(pagination.page['0'], 1);
        pagination.page.push({ pageNumber: pageNumber });
      }else{
        pagination.page.push({ pageNumber: pageNumber });
      }

      this.urlParamGenerate();
    }

    async function onClickNextPage(currentPage,total_pages) {
      if(currentPage === total_pages){
        pagination.page.splice(pagination.page['0'], 1);
        pagination.page.push({ pageNumber: total_pages });
      }
      else if (pagination.page.length !== 0){
        pagination.page.splice(pagination.page['0'], 1);
        pagination.page.push({ pageNumber: currentPage+1 });
      }else{
        pagination.page.push({ pageNumber: currentPage+1 });
      }

      this.urlParamGenerate();
    }

    async function onClickPreviousPage(currentPage) {
      if(currentPage === 1){
        pagination.page.splice(pagination.page['0'], 1);
        pagination.page.push({ pageNumber: currentPage });
      }
      else if (pagination.page.length !== 0){
        pagination.page.splice(pagination.page['0'], 1);
        pagination.page.push({ pageNumber: currentPage-1 });
      }else{
        pagination.page.push({ pageNumber: currentPage-1 });
      }

      this.urlParamGenerate();
    }
    
    onMounted(() => {
      const defaultPage = new URLSearchParams({page:"1"});
      const queryDefaultPage = defaultPage.toString();

      const genderFilterParam = new URLSearchParams(route.query);
      const queryFilterParam = genderFilterParam.toString();

      let urlParam = queryDefaultPage+'&'+ queryFilterParam;
      fetchShoesData(urlParam), fetchOptionsData();
     
    });

    return {
      shoesData,
      optionsData,
      favouriteItems,
      selectFilters,
      metaData,
      onClickPage,
      onClickNextPage,
      onClickPreviousPage,
      urlParamGenerate
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