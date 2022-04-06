<template>
  <div
    class="relative text-gray-600 focus-within:text-gray-400 dark:text-cool-gray-500"
  >
    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
      <button type="button" class="focus:shadow-outline p-1 focus:outline-none">
        <v-icon name="SearchIcon" type="outline" class="h-5 w-5" />
      </button>
    </span>
    <input
      name="q"
      type="search"
      autocomplete="off"
      aria-label="search"
      v-model="modelValue"
      placeholder="Search..."
      @input="$emit('update:modelValue', $event.target.value)"
      class="appearance-none rounded-md border border-gray-300 py-2 pl-10 text-sm text-gray-800 outline-none focus:border-purple-500 focus:ring-0 dark:border-cool-gray-500 dark:bg-cool-gray-700 dark:text-cool-gray-300 dark:placeholder:text-cool-gray-400"
    />
  </div>
</template>
<script>
export default {
  props: {
    modelValue: String,
  },
  emits: ["update:modelValue"],
};
</script>
