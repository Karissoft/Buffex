<template>
  <Head title="Products" />

  <BreezeValidationErrors class="mb-4" />

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

  <form @submit.prevent="update">
    <legend class="text-center font-bold mb-4">Update Product</legend>

    <div class="mt-4">
      <BreezeLabel for="name" value="Name" />
      <BreezeInput
        id="name"
        type="text"
        class="mt-1 block w-full"
        v-model="form.name"
        required
        autocomplete="name"
      />
    </div>
    <div class="mt-4">
      <div class="col-span-6 sm:col-span-3">
        <label for="country" class="block text-sm font-medium text-gray-700"
          >Category</label
        >
        <select
          id="country"
          name="country"
          autocomplete="country-name"
          class="
            mt-1
            block
            w-full
            py-2
            px-3
            border border-gray-300
            bg-white
            rounded-md
            shadow-sm
            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
            sm:text-sm
          "
        >
           <option value="">Select category </option>
          <option :value="category.id" v-for="(category,id) in categories" :key="id">{{category.name}}</option>
        </select>
      </div>
    </div>
    <div class="grid grid-cols-2 gap-5">
      <div class="mt-4">
        <BreezeLabel for="price" value="Price" />
        <BreezeInput
          id="price"
          type="number"
          class="mt-1 block w-full"
          v-model="form.price"
          required
          autocomplete="price"
        />
      </div>
      <div class="mt-4">
        <BreezeLabel for="in_stock" value="In Stock" />
        <BreezeInput
          id="in_stock"
          type="number"
          class="mt-1 block w-full"
          v-model="form.in_stock"
          required
          autocomplete="in_stock"
        />
      </div>
    </div>

    <div class="mt-4">
      <BreezeLabel for="description" value="Description" />
      <BreezeTextarea
        id="description"
        type="text"
        class="mt-1 block w-full"
        v-model="form.description"
        required
        autocomplete="description"
      />
    </div>
   <div class="mt-4">
      <div
        class="
          mt-1
          flex
          justify-center
          px-6
          pt-5
          pb-6
          border-2 border-gray-300 border-dashed
          rounded-md
        "
      >
        <div class="space-y-1 text-center">
           <label
              for="file-upload"
              class="
                relative
                cursor-pointer
                bg-white
                rounded-md
                font-medium
                text-indigo-600
                hover:text-indigo-500
                focus-within:outline-none
                focus-within:ring-2
                focus-within:ring-offset-2
                focus-within:ring-indigo-500
              "
            >
          <svg
            class="mx-auto h-12 w-12 text-gray-400"
            stroke="currentColor"
            fill="none"
            viewBox="0 0 48 48"
            aria-hidden="true"
          >
            <path
              d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          </label>
          <div class="flex text-sm text-gray-600 text-center ">

              <div>

              <input
                id="file-upload"
                @change="handleFileUpload($event)"
                name="file-upload"
                type="file"
                multiple
                class="sr-only"
              />
              </div>


          </div>
          <span>Upload product images</span>
        </div>
      </div>

    </div>
     <div v-if="form.images.length" class="grid grid-cols-3 span-3 my-4">
    <img v-for="item in form.images" :key="item" :src="item" class="h-8 w-8" alt="image"/>
      </div>

    <div class="mt-4">
      <button
        type="submit"
        class="
          mt-3
          w-full
          inline-flex
          justify-center
          rounded-md
          border border-purple-300
          shadow-sm
          px-4
          py-2
          bg-purple-600
          text-base
          font-medium
          text-slate-200
          hover:bg-purple-300
          focus:outline-none
          focus:ring-2
          focus:ring-offset-2
          focus:ring-purple-500
          sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm
        "
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Submit
      </button>
    </div>
  </form>
</template>

<script>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeTextarea from "@/Components/Textarea.vue";
import BreezeLabel from "@/Components/Label.vue";

import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
export default {
  layout: BreezeGuestLayout,
  components: {
    BreezeButton,
    BreezeCheckbox,
    BreezeInput,
    BreezeTextarea,
    BreezeLabel,
    BreezeValidationErrors,
    Head,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
    product: Object,
  },
  emits: ["updatepage"],
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        category: "",
        description: "",
        images: [],
        in_stock: null,
        price: null,
      }),
      cloudinary: {
         uploadPreset: "arudovwen_preset",
        cloudName: "dv6hfpky1",
      },
      start: false,
      files: [],
    };
  },
  mounted() {
    this.form = this.$props.product;
  },

  methods: {
    handleFileUpload(e) {
      this.start = true;
      var cloudName = this.cloudinary.cloudName;
      var upload_preset = this.cloudinary.uploadPreset;
      var url = "https://api.cloudinary.com/v1_1/" + cloudName + "/upload";

      var files = e.target.files;
      const uploads = Array.from(Array(e.target.files.length).keys()).map(
        (i) => {
          const formData = new FormData();
          formData.append("file", files[i]);
          formData.append("upload_preset", upload_preset); // Replace the preset name with your own
          formData.append("api_key", "843343413274745"); // Replace API key with your own Cloudinary API key
          formData.append("timestamp", (Date.now() / 1000) | 0);

          return axios
            .post(`${url}`, formData, {
              headers: { "X-Requested-With": "XMLHttpRequest" },
            })
            .then((response) => this.form.images.push(response.data.secure_url))
            .catch((err) => {
              this.start = false;
            });
        }
      );

      axios.all(uploads).then(() => {
        this.start = false;
      });
    },
    update() {
      this.$inertia.put(this.route("products.update", this.$props.product.id), this.form,{
        onFinish: () => {
          this.$emit("updatepage");
        },
      });
    },
  },
   computed:{
    categories(){
      return this.$page.props.categories
    }
  }
};
</script>
