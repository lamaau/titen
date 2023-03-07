<script setup>
import { onUnmounted } from "vue";
import { router } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import Toast from "../toast";

const page = usePage();

let removeFinshEventListener = Inertia.on("finish", () => {
  if (page.props.value.toast) {
    Toast.add({
      message: page.props.value.toast,
    });
  }
});

onUnmounted(() => removeFinshEventListener());

function remove(index) {
  Toast.remove(index);
}
</script>
<template>
  <TransitionGroup
    tag="div"
    enter-from-class="translate-x-full opacity-0"
    enter-active-class="duration-500"
    leave-active-class="duration-500"
    leave-to-class="translate-x-full opacity-0"
    class="fixed top-4 right-4 z-50 w-full max-w-xs space-y-4"
  >
    <component
      v-for="(item, index) in Toast.items"
      :key="item.key"
      :type="item.type"
      :is="item.component"
      :title="item?.title"
      :icon="item?.icon"
      :message="item.message"
      @remove="remove(index)"
    />
  </TransitionGroup>
</template>
