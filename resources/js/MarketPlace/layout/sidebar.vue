<template lang="">
  <div class="px-8 py-10 ">
   <div class="flex justify-between py-2 border-b-2 border-purple-500 mb-4">
    <span class="font-bold text-sm text-purple-900">Filter</span>
    <span class="font-bold text-sm text-slate-500">Clear all</span>
   </div>
     <div class="mb-8">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">Alpha Order</span>
          <span class="font-bold text-sm text-slate-500"><ChevronUpIcon class="w-4 h-4" /></span>
        </div>
       <div class="flex pl-3">
          <SortAscendingIcon class="w-6 h-6 mr-2"/>

          <SortDescendingIcon class="w-6 h-6"/>
       </div>


   </div>

   <div class="mb-8">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">STORE</span>
          <span class="font-bold text-sm text-slate-500"><ChevronUpIcon class="w-4 h-4" /></span>
        </div>
        <ul class="pl-3 max-h-48 overflow-auto">
            <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
            <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
              <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
              <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
                <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
                  <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
            <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
              <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
              <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
                <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
                  <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
            <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
              <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
              <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
                <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
        </ul>

   </div>


    <div class="mb-8">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">CATEGORY</span>
          <span class="font-bold text-sm text-slate-500"><ChevronUpIcon class="w-4 h-4" /></span>
        </div>
        <ul class="max-h-48 overflow-auto pl-3">
          <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
            <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
              <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
              <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
                <li class="text-md"><input type="checkbox" class="form-checkbox rounded text-purple-500" /> Hubmart</li>
        </ul>

   </div>
     <div class="mb-8">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">PRICE</span>
          <span class="font-bold text-sm text-slate-500"><ChevronUpIcon class="w-4 h-4" /></span>
        </div>
      <div class="pl-3">
          <div class=" text-sm">
        <span>  <input type="checkbox" class="form-checkbox rounded text-purple-500" />  <span>Low</span> - <span>High</span></span>
        </div>
         <div class=" text-sm">
         <input type="checkbox" class="form-checkbox rounded text-purple-500" />  <span>High</span> - <span>Low</span>
        </div>
      </div>

   </div>
  </div>
</template>
<script>
import { ChevronDownIcon , ChevronUpIcon, SortAscendingIcon, SortDescendingIcon} from "@heroicons/vue/solid";

export default {
  components: {
    ChevronDownIcon , ChevronUpIcon,SortAscendingIcon,SortDescendingIcon
  }
};
</script>
<style lang="">
</style>