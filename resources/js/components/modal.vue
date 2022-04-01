<template>
  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" :initialFocus="focusRef" @close="closeModal">
      <div class="fixed inset-0 z-10 overflow-y-auto bg-white/30 backdrop-blur-sm transition duration-100">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
          >
            <DialogOverlay class="fixed inset-0" />
          </TransitionChild>

          <span class="inline-block h-screen align-middle" aria-hidden="true"> &#8203; </span>

          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95"
          >
            <div
              class="my-8 inline-block w-full max-w-md transform overflow-hidden rounded-lg border border-gray-200 bg-white text-left align-middle shadow-xl transition-all dark:bg-cool-gray-800"
            >
              <DialogTitle v-if="title" as="h3" class="border-b bg-gray-50 p-4 text-xl"> {{ title }} </DialogTitle>

              <!-- slot -->
              <slot name="content" />
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup>
import { ref } from "vue";
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle } from "@headlessui/vue";

const isOpen = ref(false);
const focusRef = ref();

const props = defineProps({
  title: {
    type: String,
    default: null,
  },
});

const closeModal = function () {
  isOpen.value = false;
};

const openModal = function (attr) {
  isOpen.value = true;
};

defineExpose({
  openModal,
  closeModal,
});
</script>
