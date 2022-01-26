<template>
  <Head title="Log in" />

  <BreezeValidationErrors class="mb-4" />

  <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
    {{ status }}
  </div>

  <form @submit.prevent="update">
    <legend class="text-center font-bold mb-4">Update Category</legend>

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
      <label class="block text-sm font-medium text-gray-700">
        Cover photo
      </label>
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
          <div class="flex text-sm text-gray-600">
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
              <span>Upload a file</span>
              <input
                id="file-upload"
                @change="handleFileUpload($event)"
                name="file-upload"
                type="file"

                class="sr-only"
              />
            </label>
            <p class="pl-1">or drag and drop</p>
          </div>
          <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
        </div>
      </div>
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
    category: Object,
  },
  emits: ["updatepage"],
  data() {
    return {
      form: this.$inertia.form({
        name: "",

        images: '',

      }),
      cloudinary: {
        uploadPreset: "nzukoor_preset",
        cloudName: "nzukoor",
      },
      start: false,
      files: [],
    };
  },
  mounted() {
    this.form = this.$props.category;
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
          formData.append("api_key", ""); // Replace API key with your own Cloudinary API key
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
      this.$inertia.put(this.route("categories.update", this.$props.category.id), this.form,{
        onFinish: () => {
          this.$emit("updatepage");
        },
      });
    },
  },
};
</script>
