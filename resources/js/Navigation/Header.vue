<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <Popover
    class="h-16 w-full top-0 z-30 transition ease-in-out duration-300"
    :class="active ? ' fixed shadow  bg-white' : ' bg-transparent absolute'"
  >
    <div class="px-4 sm:px-6 max-w-screen-xl mx-auto h-full">
      <div class="flex justify-between items-center h-full">
        <div class="flex justify-start items-center mr-6">
          <div class="mr-7 flex-none">
            <a href="/">
              <span class="sr-only">BUFFEX</span>
              <img
                class="h-7 w-auto sm:h-9"
                src="/images/buffex2.png"
                alt="Buffex"
              />
            </a>
          </div>
        </div>

        <div class="-mr-2 -my-2 md:hidden flex">
          <span class="px-4 py-2 relative" @click="open = !open"
            ><ShoppingCartIcon class="w-6 h-6 text-purple-700" />
            <span
              class="
                px-1
                absolute
                top-[0px]
                right-[8px]
                rounded-md
                bg-white
                text-sm
              "
              >{{ cartItems.length }}</span
            >
          </span>
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
            <span class="sr-only">Open menu</span>
            <MenuAlt3Icon class="h-6 w-6" aria-hidden="true" />
          </PopoverButton>
        </div>
        <PopoverGroup
          as="nav"
          class="hidden md:flex justiy-between items-center w-[45%]"
        >
          <a
            href="/marketplace"
            class="
              w-[20%]
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
                w-full
                hover:bg-purple-500
                text-sm
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
                'text-purple-100 bg-purple-700 border-purple-500':
                  $page.url === '/marketplace',
                'bg-transparent': !active,
                'bg-white': active,
              }"
            >
              Marketplace
            </div>
          </a>
          <a
            href="https://buffex.co/instant-payout/"
            class="
              w-[20%]
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
                w-full
                hover:bg-purple-500
                text-sm
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
                'text-purple-100 bg-purple-700 border-purple-500':
                  $page.url === '/stores',
              }"
            >
              Instant Pay
            </div>
          </a>

          <a
            href="/#about"
            class="
              w-[20%]
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
                w-full
                hover:bg-purple-500
                text-sm
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
                'text-purple-100 bg-purple-700 border-purple-500':
                  $page.url === '/#about',
                'bg-transparent': !active,
                'bg-white': active,
              }"
            >
              About
            </div>
          </a>
          <a
            href="https://blog.buffex.co"
            targt="_blank"
            class="
              w-[20%]
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
                w-full
                hover:bg-purple-500
                text-sm
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
                'text-purple-100 bg-purple-700 border-purple-500':
                  $page.url === '/blog',
                'bg-transparent': !active,
                'bg-white': active,
              }"
            >
              Blog
            </div>
          </a>
          <a
            href="/#contact"
            class="
              w-[20%]
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
                w-full
                hover:bg-purple-500
                text-sm
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
                'text-purple-100 bg-purple-700 border-purple-500':
                  $page.url === '/#contact',
                'bg-transparent': !active,
                'bg-white': active,
              }"
            >
              Contact
            </div>
          </a>
        </PopoverGroup>
        <div class="hidden md:flex items-center justify-end">
          <a
            v-if="!$page.props.auth.user"
            href="/login"
            class="
              whitespace-nowrap
              text-base
              font-medium
              text-gray-500
              hover:text-gray-700
              text-sm
            "
          >
            Sign in
          </a>
          <a
            v-if="!$page.props.auth.user"
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
          <div
            class="hidden sm:flex sm:items-center sm:ml-6"
            v-if="$page.props.auth.user"
          >
            <!-- Settings Dropdown -->
            <div class="ml-3 relative">
              <BreezeDropdown align="right" width="48">
                <template #trigger>
                  <span class="inline-flex rounded-md">
                    <button
                      type="button"
                      class="
                        inline-flex
                        items-center
                        px-3
                        py-2
                        border border-transparent
                        text-sm
                        leading-4
                        font-medium
                        rounded-md
                        text-gray-500
                        bg-white
                        hover:text-gray-700
                        focus:outline-none
                        transition
                        ease-in-out
                        duration-150
                      "
                    >
                      {{ $page.props.auth.user.name }}

                      <svg
                        class="ml-2 -mr-0.5 h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </span>
                </template>

                <template #content>
                  <BreezeDropdownLink
                    :href="route('logout')"
                    method="post"
                    as="button"
                  >
                    Log Out
                  </BreezeDropdownLink>
                </template>
              </BreezeDropdown>
            </div>
          </div>
          <span class="px-4 py-2 relative" @click="open = !open"
            ><ShoppingCartIcon class="w-6 h-6 text-purple-700" />
            <span
            v-if="cartItems.length"
              class="
                px-1
                absolute
                top-[0px]
                right-[8px]
                rounded-md
                bg-white
                text-sm
              "
              >{{ cartItems.length }}</span
            >
          </span>
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
                <img class="h-8 w-auto" src="/images/buffex.png" alt="buffex" />
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
                    focus:ring-purple-500
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
                    class="flex-shrink-0 h-6 w-6 text-purple-600"
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
                href="/"
                class="text-base font-medium text-gray-700 hover:text-gray-700"
              >
                Home
              </a>

              <a
                href="marketplace"
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
            <div v-if="!$page.props.auth.user">
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
                  bg-purple-600
                  hover:bg-purple-700
                "
              >
                Sign up
              </a>
              <p class="mt-6 text-center text-base font-medium text-gray-500">
                Existing customer?
                {{ " " }}
                <a href="/login" class="text-purple-600 hover:text-purple-500">
                  Sign in
                </a>
              </p>
            </div>
            <div
              class="md:hidden pt-4 pb-1 border-t border-gray-200"
              v-if="$page.props.auth.user"
            >
              <div class="">
                <div class="font-medium text-base text-gray-800">
                  {{ $page.props.auth.user.name }}
                </div>
              </div>

              <div class="mt-3 space-y-1">
                <Link :href="route('logout')" method="post" as="button">
                  Log Out
                </Link>
              </div>
            </div>
          </div>
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
  <Cart :open="open" />
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
import Cart from "@/MarketPlace/Components/cart";
import { ref } from "vue";
import BreezeDropdown from "@/Components/Dropdown.vue";
import BreezeDropdownLink from "@/Components/DropdownLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
const callsToAction = [
  { name: "Watch Demo", href: "#", icon: PlayIcon },
  { name: "Contact Sales", href: "#", icon: PhoneIcon },
];
const resources = [
  {
    name: "Instant Pay",
    href: "https://buffex.co/instant-payout",
  },
  {
    name: "About",
    href: "/#about",
  },
  {
    name: "Blog",
    href: "https://blog.buffex.co",
  },
  {
    name: "Contact",
    href: "/#contact",
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
  props: ["auth"],
  components: {
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    ChevronDownIcon,
    MenuAlt3Icon,
    ShoppingCartIcon,
    XIcon,
    Cart,
    BreezeDropdown,
    BreezeDropdownLink,
    Link,
  },
  setup() {
    const open = ref(false);
    return {
      callsToAction,
      resources,
      recentPosts,
      open,
    };
  },
  data() {
    return {
      active: false,
      cartItems: [],
    };
  },
  mounted() {
    this.cartItems = JSON.parse(localStorage.getItem("cartItems"));
    window.addEventListener("scroll", () => {
      if (window.scrollY > window.innerHeight * 0.4) {
        this.active = true;
      } else {
        this.active = false;
      }
    });
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