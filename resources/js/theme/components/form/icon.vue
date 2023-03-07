<template>
  <div>
    <component :is="iconName"></component>
  </div>
</template>
<script setup name="VIcon">
import { ref, onMounted } from "vue";

const iconName = ref(null);

const props = defineProps({
  name: {
    type: String,
    required: true,
  },
  type: {
    type: String,
    default: "solid",
  },
});

onMounted(async () => {
  const icon = await import(
    /* @vite-ignore */ `../../../../../node_modules/@heroicons/vue/24/${props.type}/esm/${props.name}.js`
  );

  iconName.value = icon.default;
});
</script>
