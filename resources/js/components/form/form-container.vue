<template>
  <div class="bg-white shadow rounded border flex flex-col">
    <template v-if="!$slots['title'] && title">
      <div class="px-4 py-4 flex flex-row border-b">
        <h1 class="text-xl">{{ title }}</h1>
      </div>
    </template>
    <template v-if="$slots['title']">
      <div class="px-4 py-4 flex flex-row border-b">
        <slot name="title" />
      </div>
    </template>
    <div class="px-4 py-6">
      <slot />
    </div>
    <div class="flex flex-row items-center space-x-2 ml-auto p-4">
      <button @click.prevent="$emit('onReset')" class="btn-purple">Reset</button>
      <button @click.prevent="$emit('onSubmit')" class="btn-purple">Save</button>
    </div>
  </div>
</template>
<script>
export default {
  emits: ["onSubmit", "onReset"],
  props: {
    title: {
      type: String,
      required: false,
    },
  },
};
</script>