<template>
  <div class="flex flex-col rounded border bg-white shadow">
    <template v-if="!$slots['title'] && title">
      <div class="flex flex-row border-b px-4 py-4">
        <h1 class="text-xl">{{ title }}</h1>
      </div>
    </template>
    <template v-if="$slots['title']">
      <div class="flex flex-row border-b px-4 py-4">
        <slot name="title" />
      </div>
    </template>
    <div class="px-4 py-6">
      <slot />
    </div>
    <div class="ml-auto flex flex-row items-center space-x-2 p-4">
      <button @click.prevent="$emit('onCancel')" class="btn-red btn-ring-red">
        Cancel
      </button>
      <button
        @click.prevent="$emit('onSubmit')"
        class="btn-purple btn-ring-purple"
      >
        {{ submitText }}
      </button>
    </div>
  </div>
</template>
<script>
export default {
  emits: ["onSubmit", "onCancel"],
  props: {
    title: {
      type: String,
      required: false,
    },
    loading: {
      type: Boolean,
      default: false,
    },
    submitText: {
      type: String,
      default: () => "Save",
    },
    cancelText: {
      type: String,
      default: () => "Cancel",
    },
  },
};
</script>
