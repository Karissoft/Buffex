<!-- This example requires Tailwind CSS v2.0+ -->
<template>

  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 sm:px-6 lg:px-8 md:w-[60%] mx-auto">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >

          <table class="min-w-full divide-y divide-gray-200 border-separate border border-slate-400" v-if="order">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="
                  border border-slate-300
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                    font-bolder
                  "
                >
                  Order No
                </th>
                 <th
                  scope="col"
                  class="
                  font-bolder
                    px-6
                    border border-slate-300
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider

                  "
                >
                {{ order.order_no }}
                </th>

              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

 <tr>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                       Date
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                        {{ order.created_at }}
                      </div>
                    </div>
                  </div>
                </td>

              </tr>
                <tr>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                       Product
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                        {{ order.product.name }}
                      </div>
                    </div>
                  </div>
                </td>

              </tr>
                <tr>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                      Quantity
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                        {{ order.quantity}}
                      </div>
                    </div>
                  </div>
                </td>

              </tr>
                <tr>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                      Total amount
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                        {{ currency(order.price) }}
                      </div>
                    </div>
                  </div>
                </td>

              </tr>

                <tr>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                     Customer   information
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                        <h6> {{ order.orderinfo.firstName }}  {{ order.orderinfo.lastName }}</h6>
                        <p> {{ order.orderinfo.shipping_address }}</p>
                         <p> {{ order.orderinfo.email }}</p>
                          <p> {{ order.orderinfo.phoneNumber }}</p>
                           <p> {{ order.orderinfo.city }}, {{ order.orderinfo.state }}.</p>
                      </div>
                    </div>
                  </div>
                </td>

              </tr>
                <tr>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                      Extra information
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                       {{ order.orderinfo.extra_instruction? order.orderinfo.extra_instruction:'-' }}
                      </div>
                    </div>
                  </div>
                </td>

              </tr>
                <tr>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900">
                     Status
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap border border-slate-300">
                  <div class="">

                    <div class="">
                      <div class="text-sm font-medium text-gray-900 capitalize"  :class="order.order.status=='pending'?'text-yellow-500':'text-green-500'">
                       {{ order.order.status }}
                      </div>
                    </div>
                  </div>
                </td>

              </tr>
            </tbody>
          </table>



        </div>

      </div>
        <div class="text-center p-3"> <a href="/store/orders">Go back</a></div>
    </div>
  </div>

</template>

<script>

import { ExclamationIcon } from "@heroicons/vue/outline";
import { PlusCircleIcon } from "@heroicons/vue/solid";
import {ref,reactive} from 'vue';
import { usePage } from "@inertiajs/inertia-vue3";
export default {

  inject: ["emitter","currency"],
  components: {
    PlusCircleIcon,

    ExclamationIcon,

  },
  setup(){
    const order = ref(null)

    order.value = usePage().props.value.order

    return {
      order
    }

  },

  methods: {
    dropOrder(id) {
      var res = confirm("Are you sure");
      if (res) {
        this.$inertia.delete(`/orders/${id}`);
      }
    },
  },
};
</script>