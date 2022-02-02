<template lang="">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
   <div class="p-5 shadow  bg-white rounded-md flex justify-between items-center">
      <div class="h-full w-full  flex  items-center">
        <ShoppingBagIcon class="w-16 md:w-20 h-16 md:h-20 px-3 py-4 bg-purple-600 text-white rounded-full mr-5" />
        <div class=" text-left">
           <span class="font-bold text-xl md:text-3xl text-slate-800">{{$page.props.total_products}}</span> <br>
      <span class="font-bold text-sm md:text-xl text-slate-400">Available Products</span>

    </div>
      </div>
   </div>
     <div class="p-5 shadow  bg-white rounded-md flex justify-between items-center">
      <div class="h-full w-full  flex  items-center">
         <ShoppingCartIcon class="w-16 md:w-20 h-16 md:h-20 px-3 py-4 bg-pink-600 text-white rounded-full mr-5" />
        <div class="text-left">
           <span class="font-bold text-xl md:text-3xl text-slate-800">{{$page.props.total_orders}}</span> <br>
      <span class="font-bold text-sm md:text-xl text-slate-400">Total Orders</span>

    </div>
      </div>
   </div>
      <div class="p-5 shadow  bg-white rounded-md flex justify-between items-center">
      <div class="h-full w-full  flex  items-center">
         <CreditCardIcon class="w-16 md:w-20 h-16 md:h-20 px-3 py-4 bg-green-600 text-white rounded-full mr-5" />
        <div class="text-left">
           <span class="font-bold text-xl md:text-3xl text-slate-800">8</span> <br>
      <span class="font-bold text-sm md:text-xl text-slate-400">Total Sales</span>

    </div>
      </div>
   </div>

  </div>
</template>
<script>
import {
  ShoppingBagIcon,
  ShoppingCartIcon,
  CreditCardIcon,
} from "@heroicons/vue/solid";
export default {
  components: {
    ShoppingBagIcon,
    ShoppingCartIcon,
    CreditCardIcon,
  },
};
</script>
<style lang="">
</style>