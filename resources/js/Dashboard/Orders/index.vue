<template>
    <div class="w-full overflow-hidden">
        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-1">
                <div class="grid grid-cols-3 gap-6 mb-4">
                    <form
                        @submit.prevent="searchorders"
                        class="w-full lg:w-[300px] h-[40px] flex rounded-md shadow-sm overflow-hidden"
                    >
                        <input
                            placeholder="Search orders"
                            type="search"
                            v-model="query"
                            class="form-input px-3 py-1 w-[86%] focus:ring-purple-100 focus:border-purple-100 block w-full sm:text-sm border-gray-300"
                        />
                        <button
                            type="submit"
                            class="bg-purple-500 text-white py-4 px-1 w-[14%] flex items-center justify-center"
                        >
                            <SearchIcon class="w-5 h-5 text-white" />
                        </button>
                    </form>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="py-2 align-middle inline-block min-w-full sm:px-2 lg:px-8"
                        >
                            <div
                                class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg responsive"
                            >
                                <table
                                    class="min-w-full divide-y divide-gray-200"
                                >
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            >
                                                Order No
                                            </th>

                                            <th
                                                scope="col"
                                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            >
                                                Customer
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200"
                                    >
                                        <tr
                                            v-for="orders in filteredorders"
                                            :key="orders.id"
                                            class="cursor-pointer"
                                            :class="
                                                orders.order_no == orderNo
                                                    ? 'bg-purple-100'
                                                    : ''
                                            "
                                            @click="handleHistory(orders)"
                                        >
                                            <td
                                                class="px-3 py-4 whitespace-nowrap"
                                            >
                                                <div class="flex items-center">
                                                    <div class="">
                                                        <div
                                                            class="text-sm font-medium text-gray-900"
                                                        >
                                                            {{
                                                                orders.order_no
                                                            }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-2 py-4">
                                                <div
                                                    class="text-sm text-gray-900"
                                                >
                                                    <p class="capitalize">
                                                        {{ orders.user.name }}
                                                    </p>
                                                    <p
                                                        class="capitalize text-xs"
                                                    >
                                                        {{ orders.user.phone }}
                                                    </p>
                                                    <p class="text-xs">
                                                        {{ orders.user.email }}
                                                    </p>
                                                </div>
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
                                    current_page > 1
                                        ? ''
                                        : 'opacity-70 text-slate-300'
                                "
                                @click="prev"
                                class="cursor-pointe w-8 h-8 text-purple-700 mr-2"
                        /></span>
                        <input
                            class="form-input w-12 py-1 px-3 text-center border border-purple-700 rounded"
                            :disabled="current_page.value == last_page.value"
                            v-model="current_page" />
                        <span class="font-bold ml-2 text-sm"
                            >of {{ last_page }}</span
                        >
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

            <div class="col-span-2">
                <div class="grid grid-cols-1 gap-6 mb-4">
                    <div class="flex justify-between h-[40px]">
                        <h2 class="font-bold">{{ orderNo }}</h2>
                        <span class="flex items-center">
                            <h2 class="font-bold">{{ currency(total) }}</h2>
                            <span
                                v-if="status == 'paid'"
                                class="text-sm ml-3 bg-green-100 text-green-600 rounded-full px-3 py-1 capitalize"
                                >{{ status }}</span
                            >
                            <span
                                v-if="status == 'failed'"
                                class="text-sm ml-3 bg-red-100 text-red-600 rounded-full px-3 py-1 capitalize"
                                >{{ status }}</span
                            >
                            <span
                                v-if="status == 'pending'"
                                class="text-sm ml-3 bg-yellow-100 text-yellow-600 rounded-full px-3 py-1 capitalize"
                                >{{ status }}</span
                            >
                        </span>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div
                            class="py-2 align-middle inline-block min-w-full sm:px-2 lg:px-8"
                        >
                            <div
                                class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg responsive"
                            >
                                <table
                                    class="min-w-full divide-y divide-gray-200"
                                >
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                scope="col"
                                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            >
                                                Product
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            >
                                                Price
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            >
                                                Quantity
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                            >
                                                Subtotal
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200"
                                    >
                                        <tr
                                            v-for="history in histories"
                                            :key="history.id"
                                        >
                                            <td
                                                class="px-2 py-4 whitespace-nowrap"
                                            >
                                                <div class="flex items-center">
                                                    <div class="">
                                                        <div
                                                            class="text-sm font-medium text-gray-900"
                                                        ></div>
                                                        <div
                                                            class="text-sm text-gray-700 text-ellipsis overflow-hidden ..."
                                                        >
                                                            {{
                                                                history.product
                                                                    .name
                                                            }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-2 py-4">
                                                <div
                                                    class="text-sm text-gray-900"
                                                >
                                                    <p class="line-clamp-2">
                                                        {{
                                                            currency(
                                                                history.price
                                                            )
                                                        }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td
                                                class="px-2 py-4 whitespace-nowrap"
                                            >
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                                >
                                                    {{ history.quantity }}
                                                </span>
                                            </td>

                                            <td
                                                class="px-2 py-4 whitespace-nowrap"
                                            >
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                                                >
                                                    {{
                                                        currency(
                                                            history.price *
                                                                history.quantity
                                                        )
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
        filteredorders() {
            var orders = this.orders;

            if (this.filterData) {
                if (
                    this.filterData.ordersIds.length ||
                    this.filterData.categoryIds.length
                ) {
                    return orders.filter(
                        (item) =>
                            this.filterData.ordersIds.includes(item.user_id) ||
                            this.filterData.categoryIds.includes(
                                item.category_id
                            )
                    );
                }

                if (this.filterData.priceType == "lth") {
                    return orders.sort((a, b) => {
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
                    return orders.sort((a, b) => {
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
            return orders;
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
        const orders = ref([]);
        const current_page = ref(1);
        const last_page = ref(1);
        const query = ref("");
        const status = ref("");
        const orderNo = ref("");
        const total = ref("");
        const histories = ref(null);
        onMounted(() => {
            axios.get(`admin-get-orders?page=${current_page}`).then((res) => {
                if (res.status === 200) {
                    orders.value = res.data.data;
                    last_page.value = res.data.last_page;
                    handleHistory(res.data.data[0]);
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

        function handleHistory(item) {
            total.value = item.grand_total;
            histories.value = item.orderhistories;
            orderNo.value = item.order_no;
            status.value = item.status;
        }

        function searchorders() {
            axios.get(`searchorders?query=${query.value}`).then((res) => {
                if (res.status === 200) {
                    if (res.data.data.length) {
                        orders.value = res.data.data;
                        last_page.value = res.data.last_page;
                        handleHistory(res.data.data[0]);
                    }
                }
            });
        }
        function getorders(page) {
            axios.get(`get-orders?page=${page}`).then((res) => {
                if (res.status === 200) {
                    orders.value = res.data.data;
                    last_page.value = res.data.last_page;
                    handleHistory(res.data.data[0]);
                }
            });
        }

        watch(current_page, (current_page, prevCurrent_page) => {
            getorders(current_page);
        });
        watch(query, (query, prevQuery) => {
            if (query === "") {
                getorders(1);
            }
        });

        return {
            status,
            handleHistory,
            total,
            histories,
            orderNo,
            orders,
            last_page,
            next,
            prev,
            query,
            current_page,
            searchorders,
        };
    },
};
</script>
