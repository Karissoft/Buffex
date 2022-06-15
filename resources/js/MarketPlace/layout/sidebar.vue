<template lang="">
  <div class="px-8 py-10 hidden lg:block h-full overflow-auto">

   <div class="flex justify-between py-2 border-b-2 border-purple-500 mb-4">
    <span class="font-bold text-sm text-purple-900 cursor-pointer" >Filter</span>
    <span class="font-bold text-sm text-slate-500 cursor-pointer" @click="resetFilter">Clear all</span>
   </div>


   <div class="mb-1">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">STORE</span>
          <span class="font-bold text-sm text-slate-500 cursor-pointer" @click="isStoreEnabled=!isStoreEnabled" v-if="isStoreEnabled"><ChevronUpIcon class="cursor-pointer w-4 h-4" /></span>
           <span class="font-bold text-sm text-slate-500 cursor-pointer" @click="isStoreEnabled=!isStoreEnabled" v-else><ChevronDownIcon class="cursor-pointer w-4 h-4" /></span>
        </div>
          <div class="mb-2" v-if="isStoreEnabled">
            <input
            v-model="store"
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
        <ul class="pl-3 max-h-48 overflow-auto" v-if="isStoreEnabled">
            <li class="text-sm flex items-center " v-for="item in filteredStores" :key="item.id"><input type="checkbox" v-model="storeIds" class="form-checkbox rounded text-purple-500 w-[.9rem] h-[.9rem] mr-2" :value="item.id" /> {{item.name}}</li>

        </ul>

   </div>


    <div class="mb-1">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">CATEGORY</span>
          <span class="font-bold text-sm text-slate-500 cursor-pointer" @click="isCategoryEnabled=!isCategoryEnabled" v-if="isCategoryEnabled"><ChevronUpIcon class="cursor-pointer w-4 h-4" /></span>
          <span class="font-bold text-sm text-slate-500 cursor-pointer" @click="isCategoryEnabled=!isCategoryEnabled" v-else><ChevronDownIcon class="cursor-pointer w-4 h-4" /></span>
        </div>
         <div class="mb-2" v-if="isCategoryEnabled">
            <input
              placeholder="Search category"
               type="search"
               v-model="category"
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
        <ul class="max-h-48 overflow-auto pl-3 " v-if="isCategoryEnabled">
        <li class="text-sm flex items-center " v-for="item in filteredCategories" :key="item.id"><input type="checkbox" class="form-checkbox rounded text-purple-500 w-[.9rem] h-[.9rem] mr-2" :value="item.id" v-model="categoryIds" /> {{item.name}}</li>

        </ul>

   </div>
     <div class="mb-8">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">PRICE</span>
          <span class="font-bold text-sm text-slate-500 cursor-pointer" @click="isPriceEnabled=!isPriceEnabled" v-if="isPriceEnabled"><ChevronUpIcon class="cursor-pointer w-4 h-4" /></span>
          <span class="font-bold text-sm text-slate-500 cursor-pointer" @click="isPriceEnabled=!isPriceEnabled" v-else><ChevronDownIcon class="cursor-pointer w-4 h-4" /></span>
        </div>
      <div class="pl-3" v-if="isPriceEnabled">
          <div class=" text-sm">
        <label>  <input type="radio" class="form-checkbox rounded text-purple-500" v-model="priceType"  value="lth" />  <span>Low</span> - <span>High</span></label>
        </div>
         <div class=" text-sm">
        <label>
           <input type="radio" class="form-checkbox rounded text-purple-500" v-model="priceType" value="htl" />  <span>High</span> - <span>Low</span>
        </label>
        </div>
      </div>

   </div>
  </div>
   <Popover class="relative bg-purple-100 h-16 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 w-full h-full">
      <div class="flex justify-between items-center h-full">

        <div class="-mr-2 -my-2 lg:hidden flex">

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
          lg:hidden
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


   <div class="mb-1">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">STORE</span>
          <span class="font-bold text-sm text-slate-500" @click="isStoreEnabled=!isStoreEnabled" v-if="isStoreEnabled"><ChevronUpIcon class="cursor-pointer w-4 h-4" /></span>
           <span class="font-bold text-sm text-slate-500" @click="isStoreEnabled=!isStoreEnabled" v-else><ChevronDownIcon class="cursor-pointer w-4 h-4" /></span>
        </div>
         <div class="mb-2" v-if="isStoreEnabled">
            <input
              placeholder="Search store"
               type="search"
               v-model="store"
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
        <ul class="pl-3 max-h-48 overflow-auto" v-if="isStoreEnabled">
           <li class="text-sm flex items-center " v-for="item in filteredStores" :key="item.id"><input type="checkbox" v-model="storeIds" class="form-checkbox rounded text-purple-500 w-[.9rem] h-[.9rem] mr-2" :value="item.id" /> {{item.name}}</li>

        </ul>

   </div>


    <div class="mb-1">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">CATEGORY</span>
          <span class="font-bold text-sm text-slate-500" @click="isCategoryEnabled=!isCategoryEnabled" v-if="isCategoryEnabled"><ChevronUpIcon class="cursor-pointer w-4 h-4" /></span>
           <span class="font-bold text-sm text-slate-500" @click="isCategoryEnabled=!isCategoryEnabled" v-else><ChevronDownIcon class="cursor-pointer w-4 h-4" /></span>
        </div>
         <div class="mb-2" v-if="isCategoryEnabled">
            <input
              placeholder="Search category"
               type="search"
               v-model="category"
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
        <ul class="max-h-48 overflow-auto pl-3" v-if="isCategoryEnabled">
         <li class="text-sm flex items-center " v-for="item in filteredCategories" :key="item.id"><input type="checkbox" v-model="categoryIds" class="form-checkbox rounded text-purple-500 w-[.9rem] h-[.9rem] mr-2" :value="item.id" /> {{item.name}}</li>

        </ul>

   </div>
     <div class="mb-8">
      <div class="flex justify-between py-2  ">
          <span class="font-bold text-sm text-purple-900">PRICE</span>
          <span class="font-bold text-sm text-slate-500" @click="isPriceEnabled=!isPriceEnabled" v-if="isPriceEnabled"><ChevronUpIcon class="cursor-pointer w-4 h-4" /></span>
          <span class="font-bold text-sm text-slate-500" @click="isPriceEnabled=!isPriceEnabled" v-else><ChevronDownIcon class="cursor-pointer w-4 h-4" /></span>
        </div>
      <div class="pl-3" v-if="isPriceEnabled">
          <div class=" text-sm">
        <label>  <input type="radio" class="form-checkbox rounded text-purple-500" v-model="priceType"  value="lth" />  <span>Low</span> - <span>High</span></label>
        </div>
         <div class=" text-sm">
        <label>
           <input type="radio" class="form-checkbox rounded text-purple-500" v-model="priceType" value="htl" />  <span>High</span> - <span>Low</span>
        </label>
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
  FilterIcon,
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
    FilterIcon,
  },
  inject: ["emitter"],
  data() {
    return {
      isCategoryEnabled: false,
      isStoreEnabled: false,
      isPriceEnabled: false,
      category: "",
      store: "",
      storeIds: [],
      categoryIds: [],
      priceType: "",
    };
  },
  computed: {
    filteredCategories() {
      return this.$page.props.categories.filter((item) =>
        item.name.toLowerCase().includes(this.store.toLowerCase())
      );
    },
    filteredStores() {
      return this.$page.props.stores.filter((item) =>
        item.name.toLowerCase().includes(this.store.toLowerCase())
      );
    },
  },
  watch: {
    storeIds: "sendInfo",
    categoryIds: "sendInfo",
    priceType: "sendInfo",
  },
  methods: {
    resetFilter() {
      // this.isCategoryEnabled = false;
      // this.isStoreEnabled = false;
      // this.isPriceEnabled = false;
      this.category = "";
      this.store = "";
      this.storeIds = [];
      this.categoryIds = [];
      this.priceType = "";
      this.emitter.emit("sendFilterInfo", null);
    },

    sendInfo() {
      this.emitter.emit("sendFilterInfo", {
        storeIds: this.storeIds,
        categoryIds: this.categoryIds,
        priceType: this.priceType,
      });
    },
  },
};
</script>
<style lang="">
</style>