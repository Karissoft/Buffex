<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <Popover class="relative bg-purple-100 h-16 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 w-full h-full">
      <div class="flex justify-between items-center h-full">
        <div class="flex justify-start">
          <a href="#">
            <span class="sr-only">BUFFEX</span>
            <img
              class="h-7 w-auto sm:h-9"
              src="/images/logo.png"
              alt=""
            />
          </a>
        </div>

        <div class="-mr-2 -my-2 md:hidden flex">
           <span class=" px-4
              py-2"><ShoppingCartIcon @click="open=!open" class="w-6 h-6 text-purple-700"/></span>
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
            <span class="sr-only">Open menu</span>
            <MenuAlt3Icon class="h-6 w-6" aria-hidden="true" />
          </PopoverButton>
        </div>
        <PopoverGroup
          as="nav"
          class="hidden md:flex justiy-center items-center"
        >
          <a
            href="/home"
            class="
              text-base
              font-medium
              text-gray-500
              hover:text-gray-700
              flex
              items-center
              justify-center
            "
          >
            <div
              class="
                w-48
                bg-purple-100
                hover:bg-purple-500
                h-full
                flex
                items-center
                justify-center
                text-purple-700
                hover:text-purple-100
                border-b-4 border-transparent
                hover:border-purple-500
                font-bold
              "
              :class="{
                'text-purple-100 bg-purple-700 border-purple-500': $page.url.includes('/home'),
              }"
            >
              Home
            </div>
          </a>
          <a
            href="/"
            class="
              text-base
              font-medium
              text-gray-500
              hover:text-gray-700
              flex
              items-center
              justify-center
            "
          >
            <div
              class="
                w-48
                bg-purple-100
                hover:bg-purple-500
                h-full
                flex
                items-center
                justify-center
                text-purple-700
                hover:text-purple-100
                border-b-4 border-transparent
                hover:border-purple-300
                font-bold
              "
              :class="{
                'text-purple-100 bg-purple-700 border-purple-500': $page.url==='/',
              }"
            >
              Marketplace
            </div>
          </a>
           <a
            href="/about"
            class="
              text-base
              font-medium
              text-gray-500
              hover:text-gray-700
              flex
              items-center
              justify-center
            "
          >
            <div
              class="
                w-48
                bg-purple-100
                hover:bg-purple-500
                h-full
                flex
                items-center
                justify-center
                text-purple-700
                hover:text-purple-100
                border-b-4 border-transparent
                hover:border-purple-300
                font-bold
              "
              :class="{
                'text-purple-100 bg-purple-700 border-purple-500': $page.url==='/about',
              }"
            >
              About
            </div>
          </a>
           <a
            href="/contact"
            class="
              text-base
              font-medium
              text-gray-500
              hover:text-gray-700
              flex
              items-center
              justify-center
            "
          >
            <div
              class="
                w-48
                bg-purple-100
                hover:bg-purple-500
                h-full
                flex
                items-center
                justify-center
                text-purple-700
                hover:text-purple-100
                border-b-4 border-transparent
                hover:border-purple-300
                font-bold
              "
              :class="{
                'text-purple-100 bg-purple-700 border-purple-500': $page.url==='/contact',
              }"
            >
              Contact
            </div>
          </a>
        </PopoverGroup>
        <div class="hidden md:flex items-center justify-end">
          <a
            href="/login"
            class="
              whitespace-nowrap
              text-base
              font-medium
              text-gray-500
              hover:text-gray-700
            "
          >
            Sign in
          </a>
          <a
            href="/register"
            class="
              ml-8
              whitespace-nowrap
              inline-flex
              items-center
              justify-center
              px-4
              py-2
              border border-transparent
              rounded-md
              shadow-sm
              text-base
              font-medium
              text-white
              bg-purple-700
              hover:bg-purple-600
            "
          >
            Sign up
          </a>
          <span class=" px-4
              py-2"><ShoppingCartIcon @click="open=!open" class="w-6 h-6 text-purple-700"/></span>
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
              <div>
                <img
                  class="h-8 w-auto"
                  src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                  alt="Workflow"
                />
              </div>
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
            <div class="mt-6">
              <nav class="grid gap-y-8">
                <a
                  v-for="item in solutions"
                  :key="item.name"
                  :href="item.href"
                  class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50"
                >
                  <component
                    :is="item.icon"
                    class="flex-shrink-0 h-6 w-6 text-indigo-600"
                    aria-hidden="true"
                  />
                  <span class="ml-3 text-base font-medium text-gray-700">
                    {{ item.name }}
                  </span>
                </a>
              </nav>
            </div>
          </div>
          <div class="py-6 px-5 space-y-6">
            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
              <a
                href="#"
                class="text-base font-medium text-gray-700 hover:text-gray-700"
              >
                Home
              </a>

              <a
                href="#"
                class="text-base font-medium text-gray-700 hover:text-gray-700"
              >
                Marketplace
              </a>
              <a
                v-for="item in resources"
                :key="item.name"
                :href="item.href"
                class="text-base font-medium text-gray-700 hover:text-gray-700"
              >
                {{ item.name }}
              </a>
            </div>
            <div>
              <a
                href="/register"
                class="
                  w-full
                  flex
                  items-center
                  justify-center
                  px-4
                  py-2
                  border border-transparent
                  rounded-md
                  shadow-sm
                  text-base
                  font-medium
                  text-white
                  bg-indigo-600
                  hover:bg-indigo-700
                "
              >
                Sign up
              </a>
              <p class="mt-6 text-center text-base font-medium text-gray-500">
                Existing customer?
                {{ " " }}
                <a href="/login" class="text-indigo-600 hover:text-indigo-500">
                  Sign in
                </a>
              </p>
            </div>
          </div>
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
  <Cart :open="open"/>
</template>

<script>
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
import { ChevronDownIcon } from "@heroicons/vue/solid";
import Cart from '@/MarketPlace/Components/cart'
import { ref } from 'vue'
const callsToAction = [
  { name: "Watch Demo", href: "#", icon: PlayIcon },
  { name: "Contact Sales", href: "#", icon: PhoneIcon },
];
const resources = [
  {
    name: "Help Center",
    description:
      "Get all of your questions answered in our forums or contact support.",
    href: "#",
    icon: SupportIcon,
  },
  // {
  //   name: "Guides",
  //   description:
  //     "Learn how to maximize our platform to get the most out of it.",
  //   href: "#",
  //   icon: BookmarkAltIcon,
  // },
  // {
  //   name: "Events",
  //   description:
  //     "See what meet-ups and other events we might be planning near you.",
  //   href: "#",
  //   icon: CalendarIcon,
  // },
  {
    name: "Security",
    description: "Understand how we take your privacy seriously.",
    href: "#",
    icon: ShieldCheckIcon,
  },
];
const recentPosts = [
  { id: 1, name: "Boost your conversion rate", href: "#" },
  {
    id: 2,
    name: "How to use search engine optimization to drive traffic to your site",
    href: "#",
  },
  { id: 3, name: "Improve your customer experience", href: "#" },
];

export default {
  components: {
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    ChevronDownIcon,
    MenuAlt3Icon,
    ShoppingCartIcon,
    XIcon,
    Cart
  },
  setup() {
     const open = ref(false)
    return {
      callsToAction,
      resources,
      recentPosts,
      open
    };
  },
};
</script>
<style scoped lang="scss">
nav {
  height: 100%;

  a {
    height: 100%;
    div {
      height: 100%;
      clip-path: polygon(15% 0, 100% 0, 85% 100%, 0 100%);
      margin-left: -2em;
    }
  }
}
</style>