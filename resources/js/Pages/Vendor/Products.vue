

<template>
<Head title="Products" />
  <div class="min-h-screen bg-purple-50">
    <Navigation />
    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        <h1
          class="text-xl md:text-3xl font-bold text-gray-900"
          v-if="$page.url === '/products'"
        >
          Products
        </h1>

      </div>
    </header>
    <main class="bg-purple-50">
      <div class="max-w-7xl mx-auto py-6 px-6 lg:px-8">
        <!-- Replace with your content -->

        <Products  :products="products"/>

        <!-- /End replace -->
      </div>
    </main>
  </div>
</template>

<script>
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
import { Link, Head } from "@inertiajs/inertia-vue3";

import Products from "@/Dashboard/Products/index";
import Navigation from './Navigation.vue'
const user = {
  name: "Tom Cook",
  email: "tom@example.com",
  image:
    "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80",
};
const navigation = [
  { name: "Dashboard", href: "/dashboard", current: true },
  { name: "Products", href: "/products", current: false },
   { name: "Orders", href: "/store/orders", current: false },
  { name: "Reports", href: "/reports", current: false },
];
const userNavigation = [
  { name: "Your Profile", href: "/profile", method: "get" },

  { name: "Sign out", href: route("logout"), method: "post" },
];

export default {
    props:['auth','products'],
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
    Products,
    Link,
    Head
  },
  setup() {
    return {
      user,
      navigation,
      userNavigation,
    };
  },
};
</script>