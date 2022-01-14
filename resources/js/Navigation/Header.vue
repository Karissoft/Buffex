<template>
  <div
    class=" w-full z-40 transition ease-in-out duration-300 bg-white"
    :class="active ? ' fixed shadow' : ''"
  >
    <nav
      class="container px-5 mx-auto relative flex justify-between items-center"
    >
      <div class="logo py-5"><Link href="/" class=" flex items-center"><img src="/images/logo.png" class="mr-2 logoimg" alt="keke foundation"/> </Link></div>
      <MenuAlt3Icon
        @click="toggleMobileNav = !toggleMobileNav"
        class="h-7 w-6 text-purple-500"
        v-if="mobile"
      />
      <ul
        v-if="toggleMobileNav"
        class="
          flex flex-col
          md:flex-row
          items-center
          p-4
          md:p-0
          transition
          ease-in-out
          duration-300
          z-50
        "
        :class="
          mobile ? 'absolute w-full top-0 left-0 bg-white text-center shadow ' : ''
        "
      >
        <span class="p-4 absolute left-0 top-0" v-if="mobile">
          <XIcon
            @click="toggleMobileNav = !toggleMobileNav"
            class="h-5 w-5 text-black"
          />
        </span>
        <li>
          <Link
            href="/"
            :class="{ 'text-purple-500': $page.url === '/' }"
            class="hover:text-purple-500"
            >Home</Link
          >
        </li>
        <li>
          <Link
            class="hover:text-purple-500 "
            :class="{ 'text-purple-500': $page.url.includes('/#about') }"
            href="/#about"
            >About us</Link
          >
        </li>

        <li>
          <Link
            class="hover:text-purple-500 "
            :class="{ 'text-purple-500': $page.url.includes('/gallery') }"
            :href="route('login')"
            >Sign in</Link
          >
        </li>

        <li>
          <Link
            class="hover:text-purple-500 "
            :class="{ 'text-purple-500': $page.url.includes('/#contact') }"
            href="/#contact"
            >Contact</Link
          >
        </li>

      </ul>
    </nav>
  </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import BreezeButton from "@/Components/Button.vue";
import { MenuAlt3Icon, XIcon } from "@heroicons/vue/solid";

export default {
  data() {
    return {
      active: false,
      innerHeight: 0,
      mobile: false,
      toggleMobileNav: true,
      innerWidth: 0,
    };
  },
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
  },
  components: {
    Link,
    BreezeButton,
    MenuAlt3Icon,
    XIcon,
  },
  mounted() {
    if(this.$page.url !== '/'){

        this.active = true
      }
    window.addEventListener("scroll", () => {
      if(this.$page.url === '/'){
        if (window.scrollY > window.innerHeight * 0.5) {
        this.active = true;
      } else {
        this.active = false;
      }

      }else{
        this.active = true
      }
       if (this.mobile) {
        this.toggleMobileNav = false;
      }
    });

    window.addEventListener("resize", () => {

      this.innerWidth = window.innerWidth;
      this.handleScreen();
    });
    this.handleScreen();
  },
  methods: {
    handleScreen() {
      if (window.innerWidth < 768) {
        this.mobile = true;
        this.toggleMobileNav = false;
      } else {
        this.mobile = false;
        this.toggleMobileNav = true;
      }
    },
  },
};
</script>
<style scoped lang="scss">
nav {
  .logo {

    font-weight: bold;
  }
  ul {
    li {
      text-align: center;
      padding: 5px 15px;
      font-size: 0.89rem;
      a {
        font-weight: bold;
       

      }

      .login-button {
        border: 1px solid;
        margin-left: 4rem;
        border-radius: 1.7rem 3px 1.7rem 3px;
        font-size: 0.8rem;
        @media (max-width: 767px) {
          margin-left: 0;
        }
      }
    }
  }
}
.logoimg{
  width:120px;
  height:auto;
   @media (max-width: 767px) {
          width:100px;
        }
}
</style>