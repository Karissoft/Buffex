<template>
  <span class="flex items-center rounded-md shadow-sm border-gray-300 p-0">
    <input
      class="
        grow
        focus:border-indigo-300
        focus:ring
        focus:ring-indigo-200
        focus:ring-opacity-50
        border-0
      "
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      ref="input"
      :type="isVisible ? 'text' : 'password'"
    />
    <span class="px-3 py-1 flex justify-between">
      <EyeIcon class="w-4 h-4" v-if="isVisible" @click="isVisible = false" />
      <EyeOffIcon class="w-4 h-4" v-if="!isVisible" @click="isVisible = true" />
    </span>
  </span>
</template>

<script>
import { EyeIcon, EyeOffIcon } from "@heroicons/vue/solid";
export default {
  components: {
    EyeIcon,
    EyeOffIcon,
  },
  props: ["modelValue"],

  emits: ["update:modelValue"],
  data() {
    return {
      isVisible: false,
    };
  },
  methods: {
    focus() {
      this.$refs.input.focus();
    },
  },
};
</script>
