<template>
  <div
    v-for="(item, index) in items"
    :key="index"
    class="flex flex-col space-y-3 rounded-md border bg-white p-3 text-gray-600 shadow dark:border-cool-gray-700 dark:bg-cool-gray-600 dark:text-cool-gray-200"
  >
    <h2 class="text-lg font-semibold">{{ item.label.toUpperCase() }}</h2>
    <span
      class="text-sm font-semibold"
      :class="{ 'text-gray-400': item.value === 'N/A' || item.value === null }"
      >{{ item.value || "N/A" }}</span
    >
  </div>
</template>
<script>
export default {
  props: {
    items: Object,
  },
};
</script>
