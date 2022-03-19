<template>
  <Head title="Log in" />

  <BreezeValidationErrors class="mb-4" />

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

  <form @submit.prevent="submit" class="mb-5">
    <legend class="text-center mb-4 font-bold">Account Login</legend>
    <div>
      <BreezeLabel for="email" value="Email" />
      <BreezeInput
        id="email"
        type="email"
        class="mt-1 block w-full"
        v-model="form.email"
        required
        autofocus
        autocomplete="username"
      />
    </div>

    <div class="mt-4">
      <BreezeLabel for="password" value="Password" />
      <BreezeInput
        id="password"
        type="password"
        class="mt-1 block w-full"
        v-model="form.password"
        required
        autocomplete="current-password"
      />
    </div>

    <div class="block mt-4">
      <label class="flex items-center">
        <BreezeCheckbox name="remember" v-model:checked="form.remember" />
        <span class="ml-2 text-sm text-gray-600">Remember me</span>
      </label>
    </div>
    <div class="mt-4">
      <BreezeButton
        class=" bg-purple-800 text-white w-full text-center justify-center"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Log in
      </BreezeButton>
    </div>

    <div class="mt-4 text-center">
      <Link
        :href="route('register')"
        class=" text-sm text-gray-600 hover:text-gray-900 block"
      >
        Sign up
      </Link>

      <Link
        v-if="canResetPassword"
        :href="route('password.request')"
        class=" text-sm text-gray-600 hover:text-gray-900 block"
      >
        Forgot your password?
      </Link>
    </div>
  </form>
  <div>
    <p class="text-sm text-center">
      Are you a vendor?
      <span class="text-purple-800">
        <a href="/vendor-register">Sign up here</a></span
      >
    </p>
  </div>
</template>

<script>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeInputPassword from "@/Components/InputPassword.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default {
  layout: BreezeGuestLayout,

  components: {
    BreezeButton,
    BreezeCheckbox,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
    BreezeInputPassword,
    Head,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("login"), {
        onFinish: () => this.form.reset("password"),
      });
    },
  },
};
</script>
