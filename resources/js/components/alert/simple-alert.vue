<template>
  <div class="mb-4 flex rounded-lg bg-purple-100 p-4 text-sm text-purple-700 dark:bg-purple-200 dark:text-purple-800" role="alert">
    <v-icon :name="icon" class="mr-3 inline h-5 w-5 flex-shrink-0" />
    <p>{{ message }}</p>
  </div>
</template>
<script setup>
const props = defineProps({
  icon: String,
  message: String,
});
</script>
