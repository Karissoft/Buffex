<template>
  <TopBar />
  <div class="bg-purple-50">
    <div class="pt-6">
      <nav aria-label="Breadcrumb">
        <ol
          role="list"
          class="
            max-w-2xl
            mx-auto
            px-4
            flex
            items-center
            space-x-2
            sm:px-6
            lg:max-w-7xl lg:px-8
          "
        >
          <li v-for="breadcrumb in breadcrumbs" :key="breadcrumb.id">
            <div class="flex items-center">
              <a
                :href="breadcrumb.href"
                class="mr-2 text-sm font-medium text-gray-900"
              >
                {{ breadcrumb.name }}
              </a>
              <svg
                width="16"
                height="20"
                viewBox="0 0 16 20"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
                aria-hidden="true"
                class="w-4 h-5 text-gray-300"
              >
                <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
              </svg>
            </div>
          </li>
          <li class="text-sm">
            {{ product.name }}
          </li>
        </ol>
      </nav>

      <!-- Image gallery -->
      <div
        class="
          mt-6
          max-w-2xl
          mx-auto
          sm:px-6
          lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8
        "
        v-if="product.images > 0"
      >
        <div
          class="
            hidden
            aspect-w-3 aspect-h-4
            rounded-lg
            overflow-hidden
            lg:block
          "
        >
          <img
            :src="product.images[0].src"
            :alt="product.images[0].alt"
            class="w-full h-full object-center object-cover"
          />
        </div>
        <div
          class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8"
          v-if="product.images > 1"
        >
          <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
            <img
              :src="product.images[1].src"
              :alt="product.images[1].alt"
              class="w-full h-full object-center object-cover"
            />
          </div>
          <div
            class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden"
            v-if="product.images > 2"
          >
            <img
              :src="product.images[2].src"
              :alt="product.images[2].alt"
              class="w-full h-full object-center object-cover"
            />
          </div>
        </div>
        <div
          class="
            aspect-w-4 aspect-h-5
            sm:rounded-lg sm:overflow-hidden
            lg:aspect-w-3 lg:aspect-h-4
          "
          v-if="product.images > 3"
        >
          <img
            :src="product.images[3].src"
            :alt="product.images[3].alt"
            class="w-full h-full object-center object-cover"
          />
        </div>
      </div>

      <!-- Product info -->
      <div
        class="
          max-w-2xl
          mx-auto
          pt-10
          pb-16
          px-4
          sm:px-6
          lg:max-w-7xl
          lg:pt-16
          lg:pb-24
          lg:px-8
          lg:grid
          lg:grid-cols-3
          lg:grid-rows-[auto,auto,1fr]
          lg:gap-x-8
        "
      >
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1
            class="
              text-2xl
              font-extrabold
              tracking-tight
              text-gray-900
              sm:text-3xl
            "
          >
            {{ product.name }}
          </h1>
           <h3
            class="
              text-sm
              font-bold
              tracking-tight
              text-gray-900
              sm:text-md
            "
          >
            {{ product.user.name }}
          </h3>
        </div>

        <!-- Options -->
        <div class="mt-4 lg:mt-0 lg:row-span-3">
          <h2 class="sr-only">Product information</h2>
          <p class="text-3xl text-gray-900">{{ currency(product.price) }}</p>

          <!-- Reviews -->
          <div class="mt-6">
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <StarIcon
                  v-for="rating in [0, 1, 2, 3, 4]"
                  :key="rating"
                  :class="[
                    reviews.average > rating
                      ? 'text-gray-900'
                      : 'text-gray-200',
                    'h-5 w-5 flex-shrink-0',
                  ]"
                  aria-hidden="true"
                />
              </div>
              <p class="sr-only">{{ reviews.average }} out of 5 stars</p>
              <a
                :href="reviews.href"
                class="
                  ml-3
                  text-sm
                  font-medium
                  text-purple-600
                  hover:text-purple-500
                "
                >{{ reviews.totalCount }} reviews</a
              >
            </div>
          </div>

          <form class="mt-10">
            <button
              type="button"
              :class="inCart(product.id) ? 'bg-slate-400 opacity-70' : ''"
              :disabled="inCart(product.id)"
              @click="addtocart(product)"
              class="
                mt-10
                w-full
                bg-purple-600
                border border-transparent
                rounded-md
                py-3
                px-8
                flex
                items-center
                justify-between
                text-base
                font-medium
                text-white
                hover:bg-purple-700
                focus:outline-none
                focus:ring-2
                focus:ring-offset-2
                focus:ring-purple-500
              "
            >
              <span class="text-white mr-3">
                {{ inCart(product.id) ? "Added" : "Add" }} to cart</span
              >

              <ShoppingCartIcon class="w-4 h-4 text-white" />
            </button>
          </form>
        </div>
          <div
          class="
            pt-10
            pb-3
            lg:pt-3
            lg:pb-4
            lg:col-start-1
            lg:col-span-2
            lg:border-r
            lg:border-gray-200
            lg:pr-8
          "
        >
          <!-- Description and details -->
          <div>
            <h3 class="text-slate-600 text-sm">Category</h3>

            <div class="space-y-6">
              <p class="text-base text-gray-900 text-sm md:text-md">{{ product.category.name }}</p>
            </div>
          </div>
        </div>

        <div
          class="
            py-1
            lg:pt-6
            lg:pb-16
            lg:col-start-1
            lg:col-span-2
            lg:border-r
            lg:border-gray-200
            lg:pr-8
          "
        >
          <!-- Description and details -->
          <div>
            <h3 class="text-slate-600 text-sm">Description</h3>

            <div class="space-y-6">
              <p class="text-base text-gray-900 text-sm md:text-md">{{ product.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { StarIcon } from "@heroicons/vue/solid";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import TopBar from "../layout/topbar.vue";
import { usePage } from "@inertiajs/inertia-vue3";
const breadcrumbs = [
  { id: 1, name: "Home", href: "/" },
  { id: 2, name: "Marketplace", href: "/marketplace" },
];
const reviews = { href: "#", average: 4, totalCount: 117 };
import {
  ShoppingCartIcon,

} from "@heroicons/vue/solid";
export default {
  inject: ["currency", "emitter"],
  components: {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
    StarIcon,
    TopBar,
    ShoppingCartIcon
  },
  setup() {
    const product = computed(() => usePage().props.value.product);

    return {
      product,
      reviews,
      breadcrumbs,
    };
  },
  data() {
    return {
      cartItems: [],
    };
  },
  mounted() {
    this.cartItems = JSON.parse(localStorage.getItem("cartItems"));

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