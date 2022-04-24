<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="w-full overflow-hidden">
    <div class="grid grid-cols-3 gap-6 mb-4">
      <div
        class="
          w-full
          lg:w-[300px]
          h-[40px]
          flex
          rounded-md
          shadow-sm
          overflow-hidden
        "
      >
        <input
          placeholder="Search payments"
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
          @click="searchpayments"
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
    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="
              shadow
              overflow-hidden
              border-b border-gray-200
              sm:rounded-lg
              responsive
            "
          >
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Date
                  </th>
                   <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Customer name
                  </th>

                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Reference
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Transaction Ref
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Type
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    message
                  </th>

                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Price
                  </th>
                  <th
                    scope="col"
                    class="
                      px-6
                      py-3
                      text-left text-xs
                      font-medium
                      text-gray-500
                      uppercase
                      tracking-wider
                    "
                  >
                    Status
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="payments in filteredpayments" :key="payments.id">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div>
                      <div class="">
                        <div class="text-sm font-medium text-gray-900">
                          {{ moment(payments.created_at).format('MMM-DD, Y') }}
                        </div>
                      </div>
                    </div>
                  </td>
                   <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">

                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                          {{ payments.user.name }}
                        </div>
                        <div
                          class="
                            text-sm text-gray-700 text-ellipsis
                            overflow-hidden
                            ...
                            w-[140px]
                          "
                        >
                          {{ payments.user.email }}
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">
                      {{ payments.reference }}
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="text-sm font-medium text-gray-900">
                      <p class="line-clamp-2">{{ payments.transactionRef }}</p>
                    </div>
                  </td>
                     <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="
                        px-2
                        inline-flex
                        text-xs
                        leading-5
                        font-semibold

                      "
                    >
                      {{ payments.type }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="
                        px-2
                        inline-flex
                        text-xs
                        leading-5
                        font-semibold
                        rounded-full
                      "
                    >
                      {{ payments.message }}
                    </span>
                  </td>

                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="
                        px-2
                        inline-flex
                        text-xs
                        leading-5
                        font-semibold
                        rounded-full
                      "
                    >
                      {{ currency(payments.amount) }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="
                        px-2
                        inline-flex
                        text-xs
                        leading-5
                        font-semibold
                        rounded-full
                        bg-gray-100
                        text-gray-800
                        capitalize
                      "
                    >
                      {{ payments.status }}
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
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
          :disabled="current_page.value == last_page.value"
          v-model="current_page" />
        <span class="font-bold ml-2 text-sm">of {{ last_page }}</span>
        <span
          ><ArrowCircleRightIcon
            :class="current_page < last_page ? '' : 'opacity-70 text-slate-300'"
            @click="next"
            class="w-8 h-8 text-purple-700 ml-2 cursor-pointer" /></span
      ></span>
    </div>
  </div>
  <!-- This example requires Tailwind CSS v2.0+ -->
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
import moment from 'moment'
export default {
  inject: ["emitter", "currency"],
  computed: {
    filteredpayments() {
      var payments = this.payments;

      if (this.filterData) {
        if (
          this.filterData.paymentsIds.length ||
          this.filterData.categoryIds.length
        ) {
          return payments.filter(
            (item) =>
              this.filterData.paymentsIds.includes(item.user_id) ||
              this.filterData.categoryIds.includes(item.category_id)
          );
        }

        if (this.filterData.priceType == "lth") {
          return payments.sort((a, b) => {
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
          return payments.sort((a, b) => {
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
      return payments;
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

      search: "",
    };
  },

  created() {},

  setup() {
    const payments = ref([]);
    const current_page = ref(1);
    const last_page = ref(1);
    const query = ref("");
    const categories = ref([]);
    onMounted(() => {
      axios.get(`get-payments?page=${current_page}`).then((res) => {
        if (res.status === 200) {
          payments.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });

      axios.get(`get-categories`).then((res) => {
        if (res.status === 200) {
          categories.value = res.data;
        }
      });
    });

    function next() {
      if (current_page.value == last_page.value) return;
      current_page.value++;
    }
    function prev() {
      if (current_page.value == 1) return;
      current_page.value--;
    }

    function searchpayments() {
      axios.get(`searchpayments?query=${query.value}`).then((res) => {
        if (res.status === 200) {
          payments.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });
    }
    function getpayments(page) {
      axios.get(`get-payments?page=${page}`).then((res) => {
        if (res.status === 200) {
          payments.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });
    }

    watch(current_page, (current_page, prevCurrent_page) => {
      getpayments(current_page);
    });
    watch(query, (query, prevQuery) => {
      if (query === "") {
        getpayments(1);
      }
    });

    return {
      payments,
      last_page,
      next,
      prev,
      query,
      current_page,
      searchpayments,
      categories,
      moment
    };
  },
};
</script>
