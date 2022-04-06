<template>
  <v-main-menu
    v-bind="{ ...$attrs }"
    as="div"
    class="relative inline-block text-left"
    v-slot="{ open }"
  >
    <slot name="button" :open="open" />

    <v-menu-button
      v-if="!$slots['button'] && buttonLabel"
      class="btn-purple flex items-center"
      :class="{ 'bg-purple-500': open }"
    >
      {{ buttonLabel }}
      <v-icon
        name="ChevronDownIcon"
        type="outline"
        class="ml-2 h-4 w-4"
        aria-hidden="true"
      />
    </v-menu-button>

    <transition
      enter-active-class="transition duration-200 ease-out"
      enter-from-class="translate-y-1 opacity-0"
      enter-to-class="translate-y-0 opacity-100"
      leave-active-class="transition duration-150 ease-in"
      leave-from-class="translate-y-0 opacity-100"
      leave-to-class="translate-y-1 opacity-0"
    >
      <v-menu-items
        :class="[
          position == 'right'
            ? 'right-0'
            : position == 'left'
            ? 'left-0'
            : position,
        ]"
        class="absolute right-0 mt-2 min-w-[12rem] origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
      >
        <slot name="content" />
      </v-menu-items>
    </transition>
  </v-main-menu>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    position: {
      type: String,
      default: "right",
    },
    buttonLabel: {
      type: String,
      default: null,
    },
  },
};
</script>
