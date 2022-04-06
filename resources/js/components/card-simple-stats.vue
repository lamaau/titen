<template>
  <div
    class="rounded-lg border bg-white p-4 shadow dark:border-cool-gray-600 dark:bg-cool-gray-700 sm:p-6 xl:p-8"
  >
    <div class="flex items-center">
      <div class="flex-shrink-0">
        <span
          class="text-2xl font-bold leading-none text-gray-900 dark:text-cool-gray-200 sm:text-3xl"
          >{{ item.value }}</span
        >
        <h3
          class="mt-2 text-base font-normal text-gray-500 dark:text-cool-gray-300"
        >
          {{ item.label }}
        </h3>
      </div>
      <div
        class="ml-5 flex w-0 flex-1 items-center justify-end text-base font-bold text-gray-200 dark:text-cool-gray-500"
      >
        <v-icon :name="item.icon" class="h-16 w-16" />
      </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps({
  item: Object,
});
</script>
