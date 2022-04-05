<template>
  <label
    v-if="text"
    class="form-label mb-2 text-sm font-semibold capitalize"
    :for="id"
    >{{ text }}</label
  >
</template>
<script>
import { v4 as uuid } from "uuid";

export default {
  props: {
    id: {
      type: String,
      default: () => `text-input-${uuid()}`,
    },
    text: {
      type: String,
      default: null,
    },
  },
};
</script>
