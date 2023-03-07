<script setup>
import { onMounted, computed } from "vue";

const props = defineProps({
  title: String,
  type: String,
  message: [String, undefined],
  icon: {
    type: String,
    default: "FireIcon",
  },
  duration: {
    type: Number,
    default: 7000,
  },
});

const typeClasses = computed(() => {
  return {
    error: "bg-red-100 text-red-500",
    default: "bg-indigo-100 text-indigo-500",
    success: "bg-blue-100 text-blue-500",
  }[props.type];
});

onMounted(() => {
  setTimeout(() => emit("remove"), props.duration);
});

const emit = defineEmits(["remove"]);
</script>
<template>
  <div
    class="flex items-center rounded-lg bg-white p-4 text-gray-500 shadow-lg border"
    role="alert"
  >
    <div
      :class="typeClasses"
      class="h-8 w-8 border shadow rounded-lg inline-flex items-center flex-shrink-0 justify-center"
    >
      <v-icon class="w-5 h-5" :name="props.icon" />
      <span class="sr-only">Dynamic Icon</span>
    </div>
    <div class="flex flex-col ml-3">
      <h1 class="text-sm font-semibold text-gray-700">{{ props.title }}</h1>
      <p v-show="props?.message" class="text-xs text-gray-400">
        {{ props?.message }}
      </p>
    </div>
    <button
      @click="emit('remove')"
      type="button"
      class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300"
      data-dismiss-target="#toast-default"
      aria-label="Close"
    >
      <span class="sr-only">Close</span>
      <svg
        aria-hidden="true"
        class="h-5 w-5"
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
</template>
