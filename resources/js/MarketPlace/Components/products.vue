<template>
  <div class="bg-transparent">
    <div
      class="
        max-w-2xl
        mx-auto
        py-16
        px-4
        sm:py-24 sm:px-6
        lg:max-w-7xl lg:px-8
        max-h-screen
        overflow-auto
      "
    >
      <div class="flex justify-between">
        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">
          Products
        </h2>
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
      >
        <div
          v-for="product in products"
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
            <Link href="/product/1">
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
                <a :href="product.href">
                  <span aria-hidden="true" class="" />
                  {{ product.name }}
                </a>
              </h3>

              <p class="mt-1 text-sm text-gray-500">{{ product.user.name }}</p>
            </div>
            <p class="text-sm font-medium text-gray-900">{{ product.price }}</p>
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
             :class="inCart(product.id)?'bg-slate-400 opacity-70':''"
          >
            <span class="text-white"> {{inCart(product.id) ? 'Added':'Add' }} to cart</span>

            <ShoppingCartIcon class="w-4 h-4 text-white" />
          </button>
        </div>
      </div>
      <div class="pagination text-center mt-8">
        <span class="flex justify-center items-center">
          <span
            ><ArrowCircleLeftIcon
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
            value="1" />
          <span class="font-bold ml-2 text-sm">of 300</span>
          <span
            ><ArrowCircleRightIcon
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
import { SortAscendingIcon, SortDescendingIcon } from "@heroicons/vue/solid";

import { usePage } from "@inertiajs/inertia-vue3";

export default {
  inject: ["emitter"],
  computed: {
    products() {
      let productArray = usePage().props.value.products;
      if (this.filterData) {
        if (
          this.filterData.storeIds.length ||
          this.filterData.categoryIds.length
        ) {
          productArray = productArray.filter(
            (item) =>
              this.filterData.storeIds.includes(item.user_id) ||
              this.filterData.categoryIds.includes(item.category_id)
          );
        }

        if (this.filterData.priceType == "lth") {
          return productArray.sort((a, b) => {
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
          return productArray.sort((a, b) => {
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
      return productArray;
    },
  },

  components: {
    ShoppingCartIcon,
    ArrowCircleLeftIcon,
    ArrowCircleRightIcon,
    SortAscendingIcon,
    SortDescendingIcon,

    Link,
  },
  data() {
    return {
      filterData: null,
      cartItems:[]
    };
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
  methods: {
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