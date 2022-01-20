
<template>
  <TopBar />
  <div class="container mx-auto py-10">
    <div class="w-2/6 mx-auto">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Order Information
            </h3>
          </div>

          <div class="px-4 py-5 bg-white sm:p-6 ">
             <div class="flex flex-col align items-center justify-center mb-8">

            <CheckCircleIcon class="w-36 h-36 text-green-700"/>
            <p>Your order has been placed successfully</p>
          </div>
            <div class="flex justify-between">
              <p>Order No</p>
              <p>#686866896</p>
            </div>

            <div class="flex justify-between">
              <p>Order Date</p>
              <p>#686866896</p>
            </div>
              <div class="flex justify-between">
                  <p>Items</p>
                   <p>5</p>
               </div>
                 <div class="flex justify-between">
                  <p>Total Price</p>
                   <p>NGN20,000</p>
               </div>
                 <div class="flex justify-between">
                  <p>Status</p>
                   <p>Paid</p>
               </div>
                 <div class="flex justify-between">
                  <p>Delivery Status</p>
                   <p>Out for delivery</p>
               </div>

                 <div class=" flex justify-center mt-4">
                      <button
            type="button"
            class="
              font-bold

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
          >
            <span class="text-white">Back to marketplace</span>


          </button>

               </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { ref } from "vue";
import { StarIcon,CheckCircleIcon } from "@heroicons/vue/solid";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import TopBar from "../layout/topbar.vue";

const products = [
  {
    id: 1,
    name: "Throwback Hip Bag",
    href: "#",
    color: "Salmon",
    price: "$90.00",
    quantity: 1,
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg",
    imageAlt:
      "Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt.",
  },
  {
    id: 2,
    name: "Medium Stuff Satchel",
    href: "#",
    color: "Blue",
    price: "$32.00",
    quantity: 1,
    imageSrc:
      "https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg",
    imageAlt:
      "Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch.",
  },
  // More products...
];

const breadcrumbs = [
  { id: 1, name: "Home", href: "/home" },
  { id: 2, name: "Marketplace", href: "/" },
];
const reviews = { href: "#", average: 4, totalCount: 117 };

export default {
  components: {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
    StarIcon,
    TopBar,
    CheckCircleIcon
  },
  setup() {
    return {
      products,
      reviews,

      breadcrumbs,
    };
  },
};
</script>