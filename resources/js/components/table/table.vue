<template>
  <div class="border border-gray-200 shadow dark:border-cool-gray-700 sm:rounded-lg">
    <div class="p-4" v-if="title">
      <h2 class="text-xl font-bold text-gray-700 dark:text-cool-gray-300">{{ title }}</h2>
    </div>

    <div class="flex items-center border-t border-dashed bg-white p-5 dark:border-cool-gray-700 dark:bg-cool-gray-600" :class="[$slots['attributes'] ? 'justify-between' : 'justify-end']">
      <slot name="attributes" />
    </div>

    <div class="overflow-auto">
      <table class="min-w-full divide-y divide-gray-200 dark:divide-cool-gray-500">
        <thead class="border-t bg-gray-50 dark:border-cool-gray-500">
          <slot name="head" />
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white dark:divide-cool-gray-700">
          <slot name="body" />
        </tbody>
        <tfoot v-if="$slots['tfoot']" class="border-t border-dashed dark:border-cool-gray-700">
          <slot name="tfoot" />
        </tfoot>
      </table>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    title: String,
  },
};
</script>
