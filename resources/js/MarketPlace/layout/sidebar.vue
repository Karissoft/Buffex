<template lang="">
  <div class="px-8 py-10 hidden md:block">
   <div class="flex justify-between py-2 border-b-2 border-purple-500 mb-4">
    <span class="font-bold text-sm text-purple-900">Filter</span>
    <span class="font-bold text-sm text-slate-500">Clear all</span>
   </div>


   <div class="mb-8">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">STORE</span>
          <span class="font-bold text-sm text-slate-500"><ChevronUpIcon class="w-4 h-4" /></span>
        </div>
          <div class="mb-2">
            <input
              placeholder="Search store"
               type="search"
              class="
                form-input
                px-3
                py-1
                rounded-md
                mt-1
                focus:ring-purple-100 focus:border-purple-100
                block
                w-full
                shadow-sm
                sm:text-sm
                border-gray-300
                rounded-md
              "
            />
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
         <div class="mb-2">
            <input
              placeholder="Search category"
               type="search"
              class="
                form-input
                px-3
                py-1
                rounded-md
                mt-1
                focus:ring-purple-100 focus:border-purple-100
                block
                w-full
                shadow-sm
                sm:text-sm
                border-gray-300
                rounded-md
              "
            />
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
   <Popover class="relative bg-purple-100 h-16 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 w-full h-full">
      <div class="flex justify-between items-center h-full">

        <div class="-mr-2 -my-2 md:hidden flex">

          <PopoverButton
            class="
              bg-white
              rounded-md
              p-2
              inline-flex
              items-center
              justify-center
              text-gray-400
              hover:text-gray-500 hover:bg-gray-100
              focus:outline-none
              focus:ring-2
              focus:ring-inset
              focus:ring-purple-500
            "
          >
            <span class="sr-only">Filter</span>
            <FilterIcon  class="h-4 w-4" aria-hidden="true"/>

          </PopoverButton>
        </div>


      </div>
    </div>

    <transition
      enter-active-class="duration-100 ease-out"
      enter-from-class="opacity-0 scale-95"
      enter-to-class="opacity-100 scale-100"
      leave-active-class="duration-100 ease-in"
      leave-from-class="opacity-100 scale-100"
      leave-to-class="opacity-0 scale-95"
    >
      <PopoverPanel
        focus
        class="
          absolute
          top-0
          inset-x-0
          p-2
          transition
          transform
          origin-top-right
          md:hidden
          z-40
        "
      >
        <div
          class="
            rounded-lg
            shadow-lg
            ring-1 ring-black ring-opacity-5
            bg-white
            divide-y-2 divide-gray-50
          "
        >
          <div class="pt-5 pb-6 px-5">
            <div class="flex items-center justify-between">

              <div class="-mr-2">
                <PopoverButton
                  class="
                    bg-white
                    rounded-md
                    p-2
                    inline-flex
                    items-center
                    justify-center
                    text-gray-400
                    hover:text-gray-500 hover:bg-gray-100
                    focus:outline-none
                    focus:ring-2
                    focus:ring-inset
                    focus:ring-indigo-500
                  "
                >
                  <span class="sr-only">Close menu</span>
                  <XIcon class="h-6 w-6" aria-hidden="true" />
                </PopoverButton>
              </div>
            </div>

          </div>
          <div class="px-8 py-10 z-40">
   <div class="flex justify-between py-2 border-b-2 border-purple-500 mb-4">
    <span class="font-bold text-sm text-purple-900">Filter</span>
    <span class="font-bold text-sm text-slate-500">Clear all</span>
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


        </div>
      </PopoverPanel>
    </transition>
  </Popover>
</template>
<script>
import {
  ChevronDownIcon,
  ChevronUpIcon,
  SortAscendingIcon,
  SortDescendingIcon,
  FilterIcon
} from "@heroicons/vue/solid";
import {
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
} from "@headlessui/vue";
import {
  BookmarkAltIcon,
  CalendarIcon,
  MenuAlt3Icon,
  PhoneIcon,
  PlayIcon,
  ShieldCheckIcon,
  SupportIcon,
  ShoppingCartIcon,
  XIcon,
} from "@heroicons/vue/outline";
export default {
  components: {
    ChevronDownIcon,
    ChevronUpIcon,
    SortAscendingIcon,
    SortDescendingIcon,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
     BookmarkAltIcon,
  CalendarIcon,
  MenuAlt3Icon,
  PhoneIcon,
  PlayIcon,
  ShieldCheckIcon,
  SupportIcon,
  ShoppingCartIcon,
  XIcon,
  FilterIcon
  },
};
</script>
<style lang="">
</style>