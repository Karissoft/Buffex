<template>
  <div class="bg-transparent">
    <div
      class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8  max-h-screen
          overflow-auto"
    >
      <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">
        Products
      </h2>

      <div
        class="
          mt-6
          grid grid-cols-1
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
              w-full
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
              :src="product.imageSrc"
              :alt="product.imageAlt"
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
              <p class="mt-1 text-sm text-gray-500">{{ product.color }}</p>
            </div>
            <p class="text-sm font-medium text-gray-900">{{ product.price }}</p>
          </div>

          <button
            type="button"
            class="
              font-bold
              w-full
              px-4
              py-2
              text-sm
              whitespace-nowrap
              z-40
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
          >
            <span class="text-white"> Add to cart</span>

            <ShoppingCartIcon class="w-4 h-4 text-white" />
          </button>
        </div>


      </div>
       <div class="pagination text-center mt-8">

         <span class="flex justify-center items-center"> <span><ArrowCircleLeftIcon class="cursor-pointe w-8 h-8 text-purple-700 mr-2"/></span>
          <input class="form-input w-12 py-1 px-3 text-center border border-purple-700 rounded" value="1"/> <span class="font-bold ml-2 text-sm">of 300</span>
           <span><ArrowCircleRightIcon class="w-8 h-8 text-purple-700 ml-2 cursor-pointer"/></span></span>
        </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { ShoppingCartIcon,ArrowCircleLeftIcon, ArrowCircleRightIcon } from "@heroicons/vue/outline";
const products = [
  {
    id: 1,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  {
    id: 2,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  {
    id: 3,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  {
    id: 4,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  {
    id: 4,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  {
    id: 5,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  {
    id: 6,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  {
    id: 7,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  {
    id: 8,
    name: "Basic Tee",
    href: "#",
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
    imageAlt: "Front of men's Basic Tee in black.",
    price: "$35",
    color: "Black",
  },
  // More products...
];

export default {
  setup() {
    return {
      products,


    };
  },
  components: {
    ShoppingCartIcon,
    ArrowCircleLeftIcon, ArrowCircleRightIcon,
      Link,
  },
};
</script>