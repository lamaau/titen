<script setup name="VFormContainer">
defineProps({
  actions: {
    type: Object,
    default: {},
  },
  title: String,
});
</script>
<template>
  <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
    <div class="bg-white rounded-lg shadow relative">
      <div class="flex items-start justify-between p-4 border-b rounded-t">
        <h3 class="text-xl font-semibold">{{ title }}</h3>
        <button
          type="button"
          @click="$modal.close()"
          class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
        >
          <svg
            class="w-5 h-5"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>
      </div>

      <div class="p-6 space-y-6">
        <slot />
      </div>

      <div class="items-center p-3 border-t border-gray-200 rounded-b">
        <slot name="buttons">
          <button
            v-for="(action, index) in actions"
            :key="index"
            class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            type="submit"
          >
            {{ action.text }}
          </button>
        </slot>
      </div>
    </div>
  </div>
</template>
