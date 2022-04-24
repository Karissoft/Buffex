<!-- This example requires Tailwind CSS v2.0+ -->
<template>

<div class="w-full  overflow-hidden">

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
            placeholder="Search store"
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
            @click="searchstores"
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
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg responsive"
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
                  Name
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
                  Address
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
                  Phone
                </th>

              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="store in filteredstores" :key="store.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">

<img class="w-8 h-8 rounded-md" :src="store.cover" />
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ store.name }}
                      </div>
                        <div class="text-sm text-gray-900 text-ellipsis overflow-hidden ... w-[160px]">
                    {{ store.email }}
                  </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 ">
                    {{ store.address }}
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
                      rounded-full
                      bg-green-100
                      text-green-800
                    "
                  >
                    {{ store.phone_no }}
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
              :class="
                current_page < last_page ? '' : 'opacity-70 text-slate-300'
              "
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
export default {
  inject: ["emitter", "currency"],
  computed: {
    filteredstores() {
      var stores = this.stores;

      if (this.filterData) {
        if (
          this.filterData.storeIds.length ||
          this.filterData.categoryIds.length
        ) {
          return stores.filter(
            (item) =>
              this.filterData.storeIds.includes(item.user_id) ||
              this.filterData.categoryIds.includes(item.category_id)
          );
        }

        if (this.filterData.priceType == "lth") {
          return stores.sort((a, b) => {
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
          return stores.sort((a, b) => {
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
      return stores;
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

  created() {

  },

  setup() {
    const stores = ref([]);
    const current_page = ref(1);
    const last_page = ref(1);
    const query = ref("");
    onMounted(() => {
      axios.get(`get-stores?page=${current_page}`).then((res) => {
        if (res.status === 200) {
          stores.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });
    });

    function next() {
      if (current_page === last_page) return;
      current_page.value++;
    }
    function prev() {
      if (current_page.value == 1) return;
      current_page.value--;
    }

    function searchstores() {
      axios.get(`searchstores?query=${query.value}`).then((res) => {
        if (res.status === 200) {
          stores.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });
    }
    function getstores(page) {
      axios.get(`get-stores?page=${page}`).then((res) => {
        if (res.status === 200) {
          stores.value = res.data.data;
          last_page.value = res.data.last_page;
        }
      });
    }

    watch(current_page, (current_page, prevCurrent_page) => {
      getstores(current_page);
    });
    watch(query, (query, prevQuery) => {
      if (query === "") {
        getstores(1);
      }
    });

    return {
      stores,
      last_page,
      next,
      prev,
      query,
      current_page,
      searchstores,
    };
  },

};
</script>
