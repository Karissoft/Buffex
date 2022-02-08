<!-- This example requires Tailwind CSS v2.0+ -->
<template>

<div>
  <h3>Users list</h3>
  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
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
              <tr v-for="product in products" :key="product.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="">


                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ product.name }}
                      </div>
                        <div class="text-sm text-gray-900 text-ellipsis overflow-hidden ... w-[160px]">
                    {{ product.email }}
                  </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 ">
                    {{ product.address }}
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
                    {{ product.phone_no }}
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
  <!-- This example requires Tailwind CSS v2.0+ -->


</template>

<script>
import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import { ExclamationIcon } from "@heroicons/vue/outline";

import { PlusCircleIcon } from "@heroicons/vue/solid";

export default {
  props: ["products"],
  inject: ["emitter","currency"],
  components: {
    PlusCircleIcon,
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    ExclamationIcon,

  },
  data() {
    return {
      open: false,
      type: "",
      products: []
    };
  },
  created(){
  this.getusers()
  },
  methods: {
    getusers(){
     axios.get('get-users').then(res=>{
       if(res.status=== 200){
         this.products = res.data.data
       }
     })
    },

    updatepage() {
      this.open = false;
    },
    dropProduct(id) {
      var res = confirm("Are you sure");
      if (res) {
        this.$inertia.delete(`/products/${id}`);
      }
    },
  },
};
</script>