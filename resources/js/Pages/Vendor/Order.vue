

<template>
<Head title="Orders" />
  <div class="min-h-screen bg-purple-50">
   <Navigation />
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">

        <h1
          class="text-sm md:text-base font-bold text-gray-900"

        >
          Order
        </h1>
      </div>
    </header>
    <main class="bg-purple-50">
      <div class="max-w-7xl mx-auto py-6 px-6 lg:px-8">
        <!-- Replace with your content -->

         <Order/>

        <!-- /End replace -->
      </div>
    </main>
  </div>
</template>

<script>
import Navigation from './Navigation.vue'
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Menu,
  MenuButton,
  MenuItem,
  MenuItems,
} from "@headlessui/vue";
import { BellIcon, MenuIcon, XIcon } from "@heroicons/vue/outline";
import { Link,Head } from "@inertiajs/inertia-vue3";

import Order from "@/Dashboard/order";

const navigation = [
  { name: "Dashboard", href: "/dashboard", current: true },
  { name: "Products", href: "/products", current: false },
   { name: "Orders", href: "/orders", current: false },
  { name: "Reports", href: "/reports", current: false },
];
const userNavigation = [
  { name: "Your Profile", href: "/profile", method: "get" },
  { name: "Sign out", href: route("logout"), method: "post" },
];

export default {

    components: {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    BellIcon,
    MenuIcon,
    XIcon,
  Navigation,
    Order,
    Link,
    Head
  },
  setup() {
    return {
      navigation,
      userNavigation,
    };
  },
};
</script>