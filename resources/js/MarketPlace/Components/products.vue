<template>
  <div class="bg-transparent">
    <div
      class="
        max-w-2xl
        mx-auto
        py-8
        md:py-12
        px-4
        sm:py-12 sm:px-6
        lg:max-w-7xl lg:px-8
        max-h-screen
        overflow-auto
      "
    >
      <div class="flex flex-col md:flex-row justify-between mb-4">
        <h2
          class="
            text-2xl
            font-extrabold
            tracking-tight
            text-gray-900
            mb-4
            md:mb-0
          "
        >
          Products
        </h2>

        <div
          class="
            w-full
            md:w-[300px]
            h-[40px]
            flex
            rounded-md
            shadow-sm
            overflow-hidden
          "
        >
          <input
            placeholder="Search product name"
            type="search"
            v-model="query"
            class="
              form-input
              px-3
              py-1
              w-[86%]
              focus:ring-purple-100 focus:border-purple-100
              block
              w-full
              sm:text-sm
              border-gray-300
            "
          />
          <button
            @click="searchproducts"
            class="
              bg-purple-500
              text-white
              py-4
              px-1
              w-[14%]
              flex
              items-center
              justify-center
            "
          >
            <SearchIcon class="w-5 h-5 text-white" />
          </button>
        </div>
      </div>

      <div
        class="
          mt-6
          grid grid-cols-2
          gap-y-10 gap-x-6
          sm:grid-cols-2
          lg:grid-cols-4
          xl:gap-x-8
        "
        v-if="filteredproducts.length"
      >
        <div
          v-for="product in filteredproducts"
          :key="product.id"
          class="group relative mb-4"
        >
          <div
            class="
              min-h-72
              bg-purple-500/30
              aspect-w-1 aspect-h-1
              rounded-md
              overflow-hidden
              group-hover:opacity-75
              lg:h-72 lg:aspect-none
            "
          >
            <Link :href="`/product/${product.id}`">
              <img
                :src="product.images[0]"
                :alt="product.images[0]"
                class="
                  w-full
                  h-full
                  object-center object-cover
                  lg:w-full lg:h-full
                "
              />
            </Link>
          </div>

          <div class="mt-4 flex justify-between mb-3">
            <div>
              <h3 class="text-sm text-gray-700">
                <Link :href="`/product/${product.id}`">
                  <span aria-hidden="true" class="" />
                  {{ product.name }}
                </Link>
              </h3>

              <p class="mt-1 text-sm text-gray-500">{{ product.user.name }}</p>
            </div>
            <div class="leading-3">
              <p class="text-sm font-medium text-gray-900 mb-0">
                {{ currency(product.price) }}
              </p>
              <small class="text-muted text-xs dollar" v-if="rate"
                >${{ (product.price / rate).toFixed(2) }}</small
              >
            </div>
          </div>

          <button
            :disabled="inCart(product.id)"
            @click="addtocart(product)"
            type="button"
            class="
              font-bold
              w-full
              px-4
              py-2
              text-sm
              whitespace-nowrap
              relative
              cursor-pointer
              border border-transparent
              rounded-md
              shadow-sm
              bg-purple-700
              hover:bg-purple-500
              flex
              justify-between
            "
            :class="inCart(product.id) ? 'bg-slate-400 opacity-70' : ''"
          >
            <span class="text-white">
              {{ inCart(product.id) ? "Added" : "Add" }} to cart</span
            >

            <ShoppingCartIcon class="w-4 h-4 text-white" />
          </button>
        </div>
      </div>

      <div class="pagination text-center mt-8" v-show="last_page > 1">
        <span class="flex justify-center items-center">
          <span
            ><ArrowCircleLeftIcon
              :class="current_page > 1 ? '' : 'opacity-70 text-slate-300'"
              @click="prev"
              class="cursor-pointe w-8 h-8 text-purple-700 mr-2"
          /></span>
          <input
            class="
              form-input
              w-12
              py-1
              px-3
              text-center
              border border-purple-700
              rounded
            "
            :disabled="current_page == last_page"
            v-model="current_page" />
          <span class="font-bold ml-2 text-sm">of {{ last_page }}</span>
          <span
            ><ArrowCircleRightIcon
              :class="
                current_page < last_page ? '' : 'opacity-70 text-slate-300'
              "
              @click="next"
              class="w-8 h-8 text-purple-700 ml-2 cursor-pointer" /></span
        ></span>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import {
  ShoppingCartIcon,
  ArrowCircleLeftIcon,
  ArrowCircleRightIcon,
} from "@heroicons/vue/solid";
import {
  SortAscendingIcon,
  SortDescendingIcon,
  SearchIcon,
} from "@heroicons/vue/solid";
import axios from "axios";
import _ from "lodash";
import { ref, onMounted, computed, watch } from "vue";
export default {
  inject: ["emitter", "currency"],
  computed: {
    filteredproducts() {
      var products = this.products;

      if (this.filterData) {
        if (
          this.filterData.storeIds.length ||
          this.filterData.categoryIds.length
        ) {
          return products.filter(
            (item) =>
              this.filterData.storeIds.includes(item.user_id) ||
              this.filterData.categoryIds.includes(item.category_id)
          );
        }

        if (this.filterData.priceType == "lth") {
          return products.sort((a, b) => {
            if (a.price < b.price) {
              return -1;
            }
            if (a.price > b.price) {
              return 1;
            }
            return 0;
          });
        }
        if (this.filterData.priceType == "htl") {
          return products.sort((a, b) => {
            if (a.price > b.price) {
              return -1;
            }
            if (a.price < b.price) {
              return 1;
            }
            return 0;
          });
        }
      }
      return products;
    },
  },

  components: {
    ShoppingCartIcon,
    ArrowCircleLeftIcon,
    ArrowCircleRightIcon,
    SortAscendingIcon,
    SortDescendingIcon,
    SearchIcon,
    Link,
  },
  data() {
    return {
      filterData: null,
      cartItems: [],
      // current_page: 1,
      // products: [],
      // last_page: null,
      // query: "",
      search: "",
      rate: null,
    };
  },

  created() {
    this.convertCurrency("USD", "NGN");
  },
  mounted() {
    this.cartItems = JSON.parse(localStorage.getItem("cartItems"));
    this.emitter.on("sendFilterInfo", (data) => {
      this.filterData = data;
    });
    this.emitter.on("updatecart", () => {
      this.cartItems = JSON.parse(localStorage.getItem("cartItems"));
    });
  },
  setup() {
    const products = ref([]);
    const current_page = ref(1);
    const last_page = ref(1);
    const query = ref("");
    onMounted(() => {
      axios.get(`get-products?page=${current_page}`).then((res) => {
        if (res.status === 200) {
          products.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });
    });

    function next() {
      if (current_page == last_page) return;
      current_page.value++;
    }
    function prev() {
      if (current_page == 1) return;
      current_page.value--;
    }

    function searchproducts() {
      axios.get(`searchproducts?query=${query.value}`).then((res) => {
        if (res.status === 200) {
          products.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });
    }
    function getproducts(page) {
      axios.get(`get-products?page=${page}`).then((res) => {
        if (res.status === 200) {
          products.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });
    }

    watch(current_page, (current_page, prevCurrent_page) => {
      getproducts(current_page);
    });
    watch(query, (query, prevQuery) => {
      if (query === "") {
        getproducts(1);
      }
    });

    return {
      products,
      last_page,
      next,
      prev,
      query,
      current_page,
      searchproducts,
    };
  },
  methods: {
    convertCurrency(fromCurrency, toCurrency) {
      var apiKey = "53f033dd7da6dbc5695d";
      var query = fromCurrency + "_" + toCurrency;
      var url =
        "https://free.currconv.com/api/v7/convert?q=" +
        query +
        "&compact=ultra&apiKey=" +
        apiKey;
      axios.get(url).then((res) => {
        this.rate = res.data.USD_NGN;
      });
    },

    addtocart(product) {
      this.emitter.emit("addtocart", product);
      this.cartItems = JSON.parse(localStorage.getItem("cartItems"));
    },
    inCart(id) {
      return this.cartItems.some((item) => item.id == id);
    },
  },
};
</script>
