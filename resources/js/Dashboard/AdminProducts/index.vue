<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div class="w-full overflow-hidden">
        <div class="flex items-center mb-4">
            <div
                class="w-full lg:w-[300px] h-[40px] flex rounded-md shadow-sm overflow-hidden"
            >
                <input
                    placeholder="Search products by name ,category, store"
                    type="search"
                    v-model="query"
                    class="form-input px-3 py-1 w-[86%] focus:ring-purple-100 focus:border-purple-100 block w-full sm:text-sm border-gray-300"
                />
                <button
                    @click="searchproducts"
                    class="bg-purple-500 text-white py-4 px-1 w-[14%] flex items-center justify-center"
                >
                    <SearchIcon class="w-5 h-5 text-white" />
                </button>
            </div>
            <div class="ml-4">
                <select
                    @change="searchproductsbycategory"
                    v-model="category"
                    class="border-gray-200 border rounded-md text-sm"
                >
                    <option value="">All categories</option>
                    <option
                        v-for="item in categories"
                        :key="item.id"
                        :value="item.name"
                    >
                        {{ item.name }}
                    </option>
                </select>
            </div>
            <div class="ml-4">
                <select
                    @change="searchproductsbystore"
                    v-model="store"
                    class="border-gray-200 border rounded-md text-sm"
                >
                    <option value="">All stores</option>
                    <option
                        v-for="item in stores"
                        :key="item.id"
                        :value="item.name"
                    >
                        {{ item.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
                >
                    <div
                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg responsive"
                    >
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Description
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        In stock
                                    </th>

                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Price
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Category
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Colors
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                    >
                                        Size
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="products in filteredproducts"
                                    :key="products.id"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img
                                                class="w-8 h-8 rounded-md"
                                                :src="
                                                    products.images.length
                                                        ? products.images[0]
                                                        : ''
                                                "
                                            />
                                            <div class="ml-4">
                                                <div
                                                    class="text-sm font-medium text-gray-900"
                                                >
                                                    {{ products.name }}
                                                </div>
                                                <div
                                                    class="text-xs text-gray-700 text-ellipsis overflow-hidden ... w-[140px]"
                                                >
                                                    {{ products.user.name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div
                                            class="text-sm text-gray-900 w-[180px]"
                                        >
                                            <p class="line-clamp-2">
                                                {{ products.description }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        >
                                            {{ products.in_stock }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        >
                                            {{ currency(products.price) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        >
                                            {{
                                                products.category
                                                    ? products.category.name
                                                    : ""
                                            }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        >
                                            {{
                                                products.colors
                                                    ? products.colors.toString()
                                                    : "-"
                                            }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                        >
                                            {{
                                                products.size
                                                    ? products.size.toString()
                                                    : "-"
                                            }}
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
                        :class="
                            current_page > 1 ? '' : 'opacity-70 text-slate-300'
                        "
                        @click="prev"
                        class="cursor-pointe w-8 h-8 text-purple-700 mr-2"
                /></span>
                <input
                    class="form-input w-12 py-1 px-3 text-center border border-purple-700 rounded"
                    :disabled="current_page.value == last_page.value"
                    v-model="current_page" />
                <span class="font-bold ml-2 text-sm">of {{ last_page }}</span>
                <span
                    ><ArrowCircleRightIcon
                        :class="
                            current_page < last_page
                                ? ''
                                : 'opacity-70 text-slate-300'
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
        filteredproducts() {
            var products = this.products;

            if (this.filterData) {
                if (
                    this.filterData.productsIds.length ||
                    this.filterData.categoryIds.length
                ) {
                    return products.filter(
                        (item) =>
                            this.filterData.productsIds.includes(
                                item.user_id
                            ) ||
                            this.filterData.categoryIds.includes(
                                item.category_id
                            )
                    );
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

            search: "",
        };
    },

    created() {},

    setup() {
        const products = ref([]);
        const current_page = ref(1);
        const last_page = ref(1);
        const query = ref("");
        const categories = ref([]);
        const stores = ref([]);
        const store = ref("");
        const category = ref("");
        onMounted(() => {
            axios.get(`admin-get-products?page=${current_page}`).then((res) => {
                if (res.status === 200) {
                    products.value = res.data.data;
                    last_page.value = res.data.last_page;
                }
            });

            axios.get(`get-categories`).then((res) => {
                if (res.status === 200) {
                    categories.value = res.data;
                }
            });

            axios.get(`get-vendors`).then((res) => {
                if (res.status === 200) {
                    stores.value = res.data.data;
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

        function searchproducts() {
            axios.get(`searchproducts?query=${query.value}`).then((res) => {
                if (res.status === 200) {
                    if (res.data.data.length) {
                        products.value = res.data.data;
                        last_page.value = res.data.last_page;
                    }
                }
            });
        }
        function searchproductsbycategory() {
            axios.get(`searchproducts?query=${category.value}`).then((res) => {
                if (res.status === 200) {
                   if (res.data.data.length) {
                        products.value = res.data.data;
                        last_page.value = res.data.last_page;
                    }
                }
            });
        }
        function searchproductsbystore() {
            axios.get(`searchproducts?query=${store.value}`).then((res) => {
                if (res.status === 200) {
                      if (res.data.data.length) {
                        products.value = res.data.data;
                        last_page.value = res.data.last_page;
                    }
                }
            });
        }
        function getproducts(page) {
            axios.get(`admin-get-products?page=${page}`).then((res) => {
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
        watch(store, (store, prevQuery) => {
            if (store === "") {
                getproducts(1);
            }
        });
        watch(category, (category, prevQuery) => {
            if (category === "") {
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
            categories,
            stores,
            store,
            category,
            searchproductsbycategory,
            searchproductsbystore,
        };
    },
};
</script>
