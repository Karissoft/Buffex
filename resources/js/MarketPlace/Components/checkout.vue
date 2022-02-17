
<template>
  <TopBar />
  <div class="container mx-auto py-10">
    <BreezeValidationErrors class="mb-4" />
    <form @submit.prevent="submit" class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-3">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Personal Information
              </h3>
              <p class="mt-1 text-sm text-gray-600">
                Use a permanent address where you can receive mail.
              </p>
            </div>
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="first-name"
                    class="block text-sm font-medium text-gray-700"
                    >Full name</label
                  >
                  <input
                    required
                    v-model="form.name"
                    type="text"
                    name="first-name"
                    id="first-name"
                    autocomplete="given-name"
                    class="
                      mt-1
                      focus:ring-purple-500 focus:border-purple-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                  />
                </div>

                <div class="col-span-6 sm:col-span-4">
                  <label
                    for="email-address"
                    class="block text-sm font-medium text-gray-700"
                    >Email address</label
                  >
                  <input
                    
                    required
                    type="text"
                    v-model="form.email"
                    name="email-address"
                    id="email-address"
                    autocomplete="email"
                    class="
                      mt-1
                      focus:ring-purple-500 focus:border-purple-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                  />
                </div>
                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label
                    for="phone"
                    class="block text-sm font-medium text-gray-700"
                    >Phone number</label
                  >
                  <input
                    required
                    v-model="form.phone"
                    type="tel"
                    name="phone"
                    id="phone"
                    class="
                      mt-1
                      focus:ring-purple-500 focus:border-purple-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                  />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="country"
                    class="block text-sm font-medium text-gray-700"
                    >Country</label
                  >
                  <select
                    v-model="form.country"
                    id="country"
                    name="country"
                    autocomplete="country-name"
                    class="
                      mt-1
                      block
                      w-full
                      py-2
                      px-3
                      border border-gray-300
                      bg-white
                      rounded-md
                      shadow-sm
                      focus:outline-none
                      focus:ring-purple-500
                      focus:border-purple-500
                      sm:text-sm
                    "
                  >
                    <option>United States</option>
                    <option>Nigeria</option>
                    <option>South africa</option>
                  </select>
                </div>

                <div class="col-span-6">
                  <label
                    for="street-address"
                    class="block text-sm font-medium text-gray-700"
                    >Delivery address</label
                  >
                  <input
                    required
                    v-model="form.address"
                    type="text"
                    name="street-address"
                    id="street-address"
                    autocomplete="street-address"
                    class="
                      mt-1
                      focus:ring-purple-500 focus:border-purple-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                  />
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label
                    for="city"
                    class="block text-sm font-medium text-gray-700"
                    >City</label
                  >
                  <input
                    required
                    v-model="form.city"
                    type="text"
                    name="city"
                    id="city"
                    autocomplete="address-level2"
                    class="
                      mt-1
                      focus:ring-purple-500 focus:border-purple-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                  />
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label
                    for="region"
                    class="block text-sm font-medium text-gray-700"
                    >State / Province</label
                  >
                  <input
                    required
                    v-model="form.state"
                    type="text"
                    name="region"
                    id="region"
                    autocomplete="address-level1"
                    class="
                      mt-1
                      focus:ring-purple-500 focus:border-purple-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                  />
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label
                    for="postal-code"
                    class="block text-sm font-medium text-gray-700"
                    >ZIP / Postal code</label
                  >
                  <input
                    required
                    type="text"
                    name="postal-code"
                    id="postal-code"
                    autocomplete="postal-code"
                    v-model="form.zipcode"
                    class="
                      mt-1
                      focus:ring-purple-500 focus:border-purple-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                  />
                </div>
              </div>
            </div>

            <hr />

            <div class="px-4 py-4">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Extra Information
              </h3>
            </div>
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-1 gap-6">
                <div class="col-span-6 sm:col-span-6">
                  <textarea
                    name="first-name"
                    id="information"
                    v-model="form.extra_instruction"
                    class="
                      mt-1
                      focus:ring-purple-500 focus:border-purple-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="md:col-span-1 px-2">
          <div class="bg-slate-50 p-4 rounded-md">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                Order Information
              </h3>
            </div>
            <div class="mt-8 overflow-y-auto h-[50vh]">
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
                        w-20
                        h-20
                        border border-gray-200
                        rounded-md
                        overflow-hidden
                      "
                    >
                      <img
                        :src="product.images[0]"
                        :alt="product.images[0]"
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
                            <a href="#">
                              {{ product.name }}
                            </a>
                          </h3>
                          <small
                            class="text-gray-400 mb-0 leading-3 text-center"
                          >
                            <span class="text-xs text-muted">Unit price</span>
                            <br />
                            <span class="text-xs">
                              {{ currency(product.price) }}</span
                            >
                            <br />
                            <span class="text-xs" v-if="rate">
                              ${{ (product.price / rate).toFixed(2) }}</span
                            >
                          </small>

                          <div class="leading-3 ml-3">
                            <span class="text-xs text-muted">Subtotal</span>
                            <p class="text-sm font-medium text-gray-900 mb-0">
                              {{ currency(product.price * product.quantity) }}
                            </p>
                            <small class="text-muted text-xs dollar" v-if="rate"
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
                        class="flex-1 flex items-end justify-between text-sm"
                      >
                        <p class="text-gray-500">Qty {{ product.quantity }}</p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
              <div
                class="flex justify-between text-base font-medium text-gray-900"
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
            </div>
            <div class="col-span-3 mb-4">
              <select
                v-model="form.currency"
                id="currency"
                name="currency"
                autocomplete="country-name"
                class="
                  mt-1
                  py-2
                  px-3
                  border border-gray-300
                  bg-white
                  rounded-md
                  shadow-sm
                  focus:outline-none
                  focus:ring-purple-500
                  focus:border-purple-500
                  sm:text-sm
                "
              >
                <option value="" disabled>-Select Cryptocurrency-</option>
                <option :value="item" v-for="item in currencies" :key="item">
                  {{ item }}
                </option>
              </select>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
              <button
                type="submit"
                class="
                  inline-flex
                  justify-center
                  py-2
                  px-4
                  border border-transparent
                  shadow-sm
                  text-sm
                  font-medium
                  rounded-md
                  text-white
                  bg-purple-600
                  hover:bg-purple-700
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-purple-500
                "
                :disabled="!form.currency"
              >
                Proceed to payment
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import { StarIcon } from "@heroicons/vue/solid";
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from "@headlessui/vue";
import TopBar from "../layout/topbar.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import axios from "axios";
const breadcrumbs = [
  { id: 1, name: "Home", href: "/home" },
  { id: 2, name: "Marketplace", href: "/" },
];
const reviews = { href: "#", average: 4, totalCount: 117 };
const currencies = ["BTC", "ETH"];
export default {
  components: {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
    StarIcon,
    TopBar,
    BreezeValidationErrors,
  },
  inject: ["emitter", "currency"],
  setup() {
    const cartItems = JSON.parse(localStorage.getItem("cartItems"));
    return {
      cartItems,
      reviews,
      breadcrumbs,
      currencies,
    };
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        currency: "",
        phone: "",
        country: "",
        address: "",
        city: "",
        state: "",
        zipcode: "",
        extra_instruction: "",
        email: "",
        total: null,
        cartItems: [],
      }),

      rate: null,
    };
  },
  created() {
    this.convertCurrency("USD", "NGN");
  },
  mounted() {
    if (this.$page.props.auth) {
      this.form.email = this.$page.props.auth.user.email;
      this.form.name = this.$page.props.auth.user.name;
    }
  },
  computed: {
    total() {
      if (!this.cartItems.length) return 0;
      return this.cartItems
        .map((item) => item.price * item.quantity)
        .reduce((a, b) => a + b);
    },
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
    submit() {
      this.form.total = this.total / this.rate;
      this.form.cartItems = this.cartItems;

      axios.post("/orders", this.form).then((res) => {
        if (res.status == 200) {
          window.location.href = res.data.url;
        }
      });
    },
  },
};
</script>