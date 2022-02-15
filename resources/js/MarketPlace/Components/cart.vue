<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <TransitionRoot as="template" :show="open">
    <Dialog
      as="div"
      class="fixed inset-0 overflow-hidden"
      style="z-index: 999"
      @close="open = false"
    >
      <div class="absolute inset-0 overflow-hidden">
        <TransitionChild
          as="template"
          enter="ease-in-out duration-500"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="ease-in-out duration-500"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay
            class="
              absolute
              inset-0
              bg-gray-500 bg-opacity-75
              transition-opacity
            "
          />
        </TransitionChild>

        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
          <TransitionChild
            as="template"
            enter="transform transition ease-in-out duration-500 sm:duration-700"
            enter-from="translate-x-full"
            enter-to="translate-x-0"
            leave="transform transition ease-in-out duration-500 sm:duration-700"
            leave-from="translate-x-0"
            leave-to="translate-x-full"
          >
            <div class="w-screen max-w-md">
              <div
                class="
                  h-full
                  flex flex-col
                  bg-white
                  shadow-xl
                  overflow-y-scroll
                "
              >
                <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                  <div class="flex items-start justify-between">
                    <DialogTitle class="text-lg font-medium text-gray-900">
                      Shopping cart
                    </DialogTitle>
                    <div class="ml-3 h-7 flex items-center">
                      <button
                        type="button"
                        class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                        @click="open = false"
                      >
                        <span class="sr-only">Close panel</span>
                        <XIcon class="h-6 w-6" aria-hidden="true" />
                      </button>
                    </div>
                  </div>

                  <div class="mt-8">
                    <div class="flow-root">
                      <ul role="list" class="-my-6 divide-y divide-gray-200">
                        <li
                          v-for="product in cartItems"
                          :key="product.id"
                          class="py-6 flex"
                        >
                          <div
                            class="
                              flex-shrink-0
                              w-24
                              h-24
                              border border-gray-200
                              rounded-md
                              overflow-hidden
                            "
                          >
                            <img
                              :src="product.images[0]"
                              :alt="product.name"
                              class="w-full h-full object-center object-cover"
                            />
                          </div>

                          <div class="ml-4 flex-1 flex flex-col">
                            <div>
                              <div
                                class="
                                  flex
                                  justify-between
                                  text-base
                                  font-medium
                                  text-gray-900
                                "
                              >
                                <h3>
                                  <a :href="product.href">
                                    {{ product.name }}
                                  </a>
                                </h3>
                                <small class=" text-gray-400 mb-0 leading-3 text-center">
                                  <span class="text-xs text-muted">Unit price</span> <br>
                                <span class="text-xs">  {{ currency(product.price) }}</span> <br>
                                  <span class="text-xs"  v-if="rate">  ${{(product.price/rate).toFixed(2) }}</span>
                                </small>

                                <div class="leading-3 ml-3">
                                    <span class="text-xs text-muted">Subtotal</span>
                                  <p
                                    class="
                                      text-sm
                                      font-medium
                                      text-gray-900
                                      mb-0
                                    "
                                  >
                                    {{
                                      currency(product.price * product.quantity)
                                    }}
                                  </p>
                                  <small
                                    class="text-muted text-xs dollar"
                                    v-if="rate"
                                    >${{
                                      (
                                        (product.price * product.quantity) /
                                        rate
                                      ).toFixed(2)
                                    }}</small
                                  >
                                </div>
                              </div>
                              <p class="mt-1 text-sm text-gray-500">
                                {{ product.user.name }}
                              </p>
                            </div>
                            <div
                              class="
                                flex-1 flex
                                items-end
                                justify-between
                                text-sm
                              "
                            >
                              <p class="text-gray-500">Qty</p>

                              <span class="flex justify-center items-center">
                                <span @click="reducecart(product.id)"
                                  ><MinusCircleIcon
                                    class="
                                      cursor-pointe
                                      w-5
                                      h-5
                                      text-purple-500
                                    "
                                /></span>
                                <span class="mx-2 text-sm text-gray-500">
                                  {{ product.quantity }}</span
                                >

                                <span @click="addcart(product.id)"
                                  ><PlusCircleIcon
                                    class="
                                      w-5
                                      h-5
                                      text-purple-500
                                      cursor-pointer
                                    " /></span
                              ></span>

                              <div class="flex">
                                <button
                                  @click="removefromcart(product.id)"
                                  type="button"
                                  class="
                                    font-medium
                                    text-purple-600
                                    hover:text-purple-500
                                  "
                                >
                                  Remove
                                </button>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <div v-if="!cartItems.length" class="text-center py-40">
                        <p>Your cart is empty!</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="border-t border-gray-200 py-6 px-4 sm:px-6"
                  v-if="cartItems.length"
                >
                  <div
                    class="
                      flex
                      justify-between
                      text-base
                      font-medium
                      text-gray-900
                    "
                  >
                    <p>Subtotal</p>
                    <div class="leading-3">
                      <p class="text-sm font-medium text-gray-900 mb-0">
                        {{ currency(total) }}
                      </p>
                      <small class="text-muted text-xs dollar" v-if="rate"
                        >${{ (total / rate).toFixed(2) }}</small
                      >
                    </div>
                  </div>
                  <p class="mt-0.5 text-sm text-gray-500">
                    Shipping and taxes calculated at checkout.
                  </p>
                  <div class="mt-6">
                    <a
                      href="/checkout"
                      class="
                        flex
                        justify-center
                        items-center
                        px-6
                        py-3
                        border border-transparent
                        rounded-md
                        shadow-sm
                        text-base
                        font-medium
                        text-white
                        bg-purple-600
                        hover:bg-purple-700
                      "
                      >Checkout</a
                    >
                  </div>
                  <div
                    class="
                      mt-6
                      flex
                      justify-center
                      text-sm text-center text-gray-500
                    "
                  >
                    <p>
                      or
                      <button
                        type="button"
                        class="
                          text-purple-600
                          font-medium
                          hover:text-purple-500
                        "
                        @click="open = false"
                      >
                        Continue Shopping<span aria-hidden="true"> &rarr;</span>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { ref } from "vue";
import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import { XIcon } from "@heroicons/vue/outline";
import { PlusCircleIcon, MinusCircleIcon } from "@heroicons/vue/solid";

export default {
  components: {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    XIcon,
    PlusCircleIcon,
    MinusCircleIcon,
  },
  inject: ["emitter", "currency"],
  props: ["open"],
  setup() {
    const open = ref(false);

    return {};
  },
  data() {
    return {
      cartItems: [],
      rate: null,
    };
  },
  created() {
    this.cartItems = JSON.parse(localStorage.getItem("cartItems"));
    this.emitter.on("addtocart", () => {
      this.cartItems = JSON.parse(localStorage.getItem("cartItems"));
    });
    this.convertCurrency("USD", "NGN");
  },
  computed: {
    total() {
      if (!this.cartItems.length) return 0;
      return this.cartItems
        .map((item) => item.price * item.quantity)
        .reduce((a, b) => a + b);
    },
  },
  watch: {
    open: "getcart",
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
    getcart() {
      this.cartItems = JSON.parse(localStorage.getItem("cartItems"));
    },
    removefromcart(id) {
      this.cartItems = this.cartItems.filter((item) => item.id !== id);
      localStorage.setItem(
        "cartItems",
        JSON.stringify(this.cartItems.length ? this.cartItems : [])
      );
      this.emitter.emit("updatecart");
    },
    reducecart(id) {
      this.cartItems = this.cartItems.map((item) => {
        if (item.id == id && item.quanity > 1) {
          item.quanity = item.quantity--;
        }
        return item;
      });
      localStorage.setItem("cartItems", JSON.stringify(this.cartItems));
    },
    addcart(id) {
      this.cartItems = this.cartItems.map((item) => {
        if (item.id == id) {
          item.quanity = item.quantity++;
        }
        return item;
      });
      localStorage.setItem("cartItems", JSON.stringify(this.cartItems));
    },
  },
};
</script>